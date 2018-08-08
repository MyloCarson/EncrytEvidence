/*
	Tessellate by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/

(function($) {

    skel.breakpoints({
        wide: '(max-width: 1680px)',
        normal: '(max-width: 1280px)',
        narrow: '(max-width: 1000px)',
        mobile: '(max-width: 736px)'
    });

    $(function() {

        var $window = $(window),
            $body = $('body');

        // Disable animations/transitions until the page has loaded.
        $body.addClass('is-loading');

        $window.on('load', function() {
            $body.removeClass('is-loading');
        });

        // Fix: Placeholder polyfill.
        $('form').placeholder();

        // CSS polyfills (IE<9).
        if (skel.vars.IEVersion < 9)
            $(':last-child').addClass('last-child');

        // Scrolly links.
        $('.scrolly').scrolly();

        // Prioritize "important" elements on narrow.
        skel.on('+narrow -narrow', function() {
            $.prioritize(
                '.important\\28 narrow\\29',
                skel.breakpoint('narrow').active
            );
        });

    });

})(jQuery);


// SIMILEOLUWA ALUKO STARTED HERE!//

function signUp2() {
    $(".signInForm").css("display", "none");
    $('.signUpForm').removeAttr("style");
    $(".signInInput1").val("");
    $(".signInInput2").val("");
}

function showSignIn() {
    $(".signUpForm").css("display", "none");
    $('.signInForm').css("display", "block");
    $(".names1").val("");
    $(".email1").val("");
    $(".phoneNo1").val("");
    $(".resAddr1").val("");
    $(".passw1").val("");
    $(".confpassw1").val("");
}

function FP() {
    $(".signUpForm").css("display", "none");
    $('.signInForm').css("display", "none");
    $('.forgotPasswordForm').css("display", "block");
}

function back() {
    $(".signUpForm").css("display", "none");
    $('.signInForm').css("display", "block");
    $('.forgotPasswordForm').css("display", "none");
    $(".form3email").val("");
    $(".form3phoneNo").val("");
    // $(".altphoneNo2").val("");
}

function fpsubmit() {
    var email2 = $(".form3email").val();
    // var phoneNo2 = $(".form3phoneNo").val();
    // var altphoneNo2 = $(".altphoneNo2").val("");

    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    // var phoneNoFormat = /^0\d{3}\d{3}\d{4}$/;

    if (!email2.match(mailformat) || email2 === "") {
        alertify.alert("Please provide a valid email address.");
    } else {
        $.ajax({
            type: "post",
            url: "assets/php/api.php",
            data: $('.form3').serialize() + "&forgotpass=" + "success" + "&verifycode=" + "" + "&verify=" + "",
            success: function(reply) {
                // alert(reply);

                if ($.trim(reply) == "Message has been sent. Check your mail for a verification code!") {
                    alertify.alert(reply);
                    enterVerificationCode();
                } else {
                    alertify.alert(reply);
                    $(".form3email").val("");
                    
                    // $(".form3phoneNo").val("");
                    // $(".names1").val("");
                    // $(".email1").val("");
                    // $(".phoneNo1").val("");
                    // $(".resAddr1").val("");
                    // $(".passw1").val("");
                    // $(".confpassw1").val("");
                }
            }
        });
    }
}

function marketPlace() {
    alertify.alert("Oops! Market Place is under construction, will be available soon.");
}

function enterVerificationCode() {
    $(".signUpForm").css("display", "none");
    $('.signInForm').css("display", "none");
    $('.forgotPasswordForm').css("display", "none");
    $('.verificationForm').css("display", "block");
}

function verifysubmit() {
    if ($("#verifycode").val() !=="" && $("#verifycode").val().length > 4) {
        $.ajax({
            type: "post",
            url: "assets/php/api.php",
            data: $('.form4').serialize() + "&verify=" + "success" + "&forgotpass=" + "" + "&FPEmail=" +
                "" + "&phoneNo2=" + "",
            success: function(reply) {
                // alert(reply);
                if ($.trim(reply) == "You can now change your password!") {
                    alertify.alert(reply);
                    setTimeout(function() {
                        changeYourPassword();
                    }, 1000);
                    
                } else {
                    alertify.alert(reply);
                    $(".verifycode").val("");
                }
            }
        });
    }else{
        alertify.alert("Enter valid verification code.");
    }
    
}

function changeYourPassword() {
    $(".signUpForm").css("display", "none");
    $('.signInForm').css("display", "none");
    $('.forgotPasswordForm').css("display", "none");
    $('.verificationForm').css("display", "none");
    $('.updatePassword').css("display", "block");
}

$("#birthdate").keyup(function(e) {
    var key = String.fromCharCode(e.keyCode);
    if (!(key >= 0 && key <= 9)) $(this).val($(this).val().substr(0, $(this).val().length - 1));
    var value = $(this).val();
    if (value.length == 2) $(this).val($(this).val() + '/');
});
$("#dateMoved").keyup(function(e) {
    var key = String.fromCharCode(e.keyCode);
    if (!(key >= 0 && key <= 9)) $(this).val($(this).val().substr(0, $(this).val().length - 1));
    var value = $(this).val();
    if (value.length == 2 || value.length == 5) $(this).val($(this).val() + '/');
});

function times() {
    $(".names1").val("");
    $(".email1").val("");
    $(".phoneNo1").val("");
    $(".resAddr1").val("");
    $(".passw1").val("");
    $(".confpassw1").val("");
    $(".signInInput1").val("");
    $(".signInInput2").val("");
}

function signIn(){
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    // var phoneNoFormat = /^0\d{3}\d{3}\d{4}$/;
    var email =  $("#signInEmail").val();
    var pwd = $("#signInPassword").val();
    if (!email.match(mailformat) || email === "") {
        alertify.alert("Please provide a valid email address.");
    }else if(pwd===""){
        alertify.alert("Fill in password");
    }else if (pwd.length < 5){
        alertify.alert("Password must  be more than 4 characters.");
    }else{
       $.ajax({
            type: "post",
            url: "goTo.php",
            // data: $('.form1').serialize(),
            data: {signin:"yes",signInEmail:$("#signInEmail").val(),signInPassword:$("#signInPassword").val()},
            success: function(reply) {
                var resp = JSON.parse(reply);
                if (resp.code == 1) {
                    location.reload();
                }else{
                    alertify.alert(resp.response);
                }
            },
            error:function(resp){
                alertify.alert("Try again later. Thanks");
            },
        }); 
    }
    
}

function resetPwd(){
    $('#pwdError').css("display","none");
    $('#pwdError2').css("display","none");
    var first = $("#newpassword").val();
    var second = $("#newpassword2").val();
    if ($("#newpassword").val()!=="" && $("#newpassword2").val()!=="") {
        // console.log(first);
        // console.log(second);
        // console.log(first.toLocaleLowerCase());
        // console.log(second.toLocaleLowerCase());
        if ($("#newpassword").val().toLocaleLowerCase() == $("#newpassword2").val().toLocaleLowerCase()) {
            $.ajax({
                type: "post",
                url: "goTo.php",
                // data: $('.form1').serialize(),
                data: {confirmnewpassword:"yes",newpassword:$("#newpassword").val(),newpassword2:$("#newpassword2").val()},
                success: function(reply) {
                    var resp = JSON.parse(reply);
                    if (resp.code == 1) {
                        alertify.alert(resp.response, function(){
                            location.reload();
                        });
                    }else{
                        alertify.alert(resp.response);
                    }
                },
                error:function(resp){
                    alertify.alert("Try again later. Thanks");
                },
            });
        }else{
            // alertify.alert("Passwords don't match.");
            $('#pwdError').css("display","block");
        }       
    }
    else{
        $('#pwdError2').css("display","block");
    }
}

function getSignUp(){
    console.log($("#zone").val());
    console.log($("#plotNo").val());
    console.log($("#streetName").val());
    console.log($("#resName").val());
    console.log($("#sublesse").val());
    console.log($("#selectResNoCode").val());
    console.log($("#phoneNumber1").val());
    console.log($("#resEmail").val());
    console.log($("#altName").val());
    console.log($("#selectAltNoCode").val());
    console.log($("#phoneNumber2").val());
    console.log($("#dateMoved").val());
    console.log($("#selectWhatappCode").val());
    console.log($("#whatsappNo").val());
    console.log($("#daySelect").val());
    console.log($("#selectMonth").val());
    console.log($("#password1").val());
    console.log($("#password2").val());

    var zone = $("#zone").val();
    var plotNo = $("#plotNo").val();
    var streetName = $("#streetName").val();
    var resName = $("#resName").val();
    var sublesse = $("#sublesse").val();
    var selectResNoCode = $("#selectResNoCode").val();
    var phoneNumber1 = $("#phoneNumber1").val();
    var resEmail = $("#resEmail").val();
    var altName = $("#altName").val();
    var selectAltNoCode = $("#selectAltNoCode").val();
    var phoneNumber2 = $("#phoneNumber2").val();
    var dateMoved = $("#dateMoved").val();
    var selectWhatappCode = $("#selectWhatappCode").val();
    var whatsappNo = $("#whatsappNo").val();
    var daySelect = $("#daySelect").val();
    var selectMonth = $("#selectMonth").val();
    var password1 = $("#password1").val();
    var password2 = $("#password2").val();

    var selectCheck = "Select Country".toLocaleLowerCase();
    if (zone=="" || plotNo=="" || streetName=="" || resName==""|| sublesse=="" || phoneNumber1=="" || phoneNumber2 ==""
        || altName=="" || dateMoved=="" ) {
        alertify.alert("Please fill all fields on the form.");
    }else if(selectWhatappCode.toLocaleLowerCase() ==selectCheck || selectResNoCode.toLocaleLowerCase() == selectCheck ||
        selectAltNoCode.toLocaleLowerCase() == selectCheck){
        alertify.alert("Please select country code");
    }else{
        if(!(password2=="" && password1=="") ){
            if(password2.toLocaleLowerCase() == password1.toLocaleLowerCase()){
                var data = { 
                    signup : "yes",
                    zone : zone,
                    plotNo :plotNo,
                    streetName: streetName,
                    resName : resName,
                    sublesse : sublesse,
                    selectResNoCode : selectResNoCode,
                    phoneNumber : convertToMsisdn(phoneNumber1),
                    email : resEmail,
                    altName : altName,
                    selectAltNoCode : selectAltNoCode,
                    phoneNumber2 : convertToMsisdn(phoneNumber2),
                    dateMovedToRge : dateMoved,
                    selectWhatappCode : selectWhatappCode,
                    whatsappNo : convertToMsisdn(whatsappNo),
                    day : daySelect,
                    month : selectMonth,
                    password : password1,
                    confirmPassword : password2

                };
                $.ajax({
                    type: "post",
                    url: "goTo.php",
                    // data: $('.form1').serialize(),
                    data: data,
                    success: function(reply) {
                        console.log(reply);
                        var resp = JSON.parse(reply);
                        if (resp.code == 1) {
                            alertify.alert(resp.response, function(){
                                location.reload();
                            });
                        }else{
                            alertify.alert(resp.response);
                        }
                    },
                    error:function(resp){
                        alertify.alert("Try again later. Thanks");
                    },
                });
            }else{
                alertify.alert("Passwords do not match.");
            }
        }else{
            alertify.alert("Password cannot be empty.");
        }   
    }
    
    
    
    
}

function convertToMsisdn(shortCode, number){
    var msisdn ="";
    if (number == 7){

        msisdn = "+"+shortCode + number;
    }
    // else if (number == 13)
    // {
    //     number = "+" + number;
    // }
    else if (number == 10)
    {
        msisdn = "+"+shortCode + number;
    }
    else if (number == 9)
    {
        msisdn = "+"+ shortCode + number;
    }
    return msisdn;
}
// by mylo carson >>>> this is settings for alertify

alertify.defaults = {
        // dialogs defaults
        autoReset:true,
        basic:false,
        closable:true,
        closableByDimmer:true,
        frameless:false,
        maintainFocus:true, // <== global default not per instance, applies to all dialogs
        maximizable:true,
        modal:true,
        movable:true,
        moveBounded:false,
        overflow:true,
        padding: true,
        pinnable:true,
        pinned:true,
        preventBodyShift:false, // <== global default not per instance, applies to all dialogs
        resizable:true,
        startMaximized:false,
        transition:'pulse',

        // notifier defaults
        notifier:{
            // auto-dismiss wait time (in seconds)  
            delay:5,
            // default position
            position:'bottom-right',
            // adds a close button to notifier messages
            closeButton: false
        },

        // language resources 
        glossary:{
            // dialogs default title
            title:'ROYAL GARDENS ESTATE',
            // ok button text
            ok: 'OK',
            // cancel button text
            cancel: 'Cancel'            
        },

        // theme settings
        theme:{
            // class name attached to prompt dialog input textbox.
            input:'ajs-input',
            // class name attached to ok button
            ok:'ajs-ok',
            // class name attached to cancel button 
            cancel:'ajs-cancel'
        }
    };
