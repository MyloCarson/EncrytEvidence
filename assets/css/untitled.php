<?php


                    if(isset($_POST['signup'])){
                        $dateMovedToRGE = $_POST['dateMovedToRGE'];
                        // $birthDate = $_POST['birthDate'];
                        $birthDate = $_POST['day']."/".$_POST['month'];
                        $zone = $_POST['zone'];
                        $plotNo = $_POST['plotNo'];
                        $streetName = $_POST['streetName'];
                        $resName = $_POST['resName'];
                        $sublesse = $_POST['sublesse'];
                        $phoneNumber = $_POST['phoneNumber'];
                        $msisdnLength = strlen($phoneNumber);

                              // if ($msisdnLength == 11)
                              // {
                              //    $phoneNumber = substr($phoneNumber,1);
                              //    // $phoneNumber = "+234" . $phoneNumber;
                              //    $phoneNumber =  $phoneNumber;
                              // }
                              // else if ($msisdnLength == 13)
                              // {
                              //    // $phoneNumber = "+" . $phoneNumber;
                              //   $phoneNumber = $phoneNumber;
                              // }
                              // else if ($msisdnLength == 10)
                              // {
                              //    // $phoneNumber = "+234" . $phoneNumber;
                              //   $phoneNumber = $phoneNumber;
                              // }
                              // else if ($msisdnLength == 14 and $phoneNumber[0] === '+')
                              // {
                              //    $phoneNumber = $phoneNumber;
                              // }
                              // else
                              // {   //invalid MSISDN
                              //   // exit("Invalid Phone number");
                              //   echo '<script type="text/javascript">alert("Invalid Phone Number in Residents Phone Number field!")</script>';
                              // }
                        $email1 = $_POST['email'];
                        $altName = $_POST['altName'];
                        $phoneNumber2 = $_POST['phoneNumber2'];
                        $msisdnLength2 = strlen($phoneNumber2);

                              // if ($msisdnLength2 == 11)
                              // {
                              //    $phoneNumber2 = substr($phoneNumber2,1);
                              //    // $phoneNumber2 = "+234" . $phoneNumber2;
                              //    $phoneNumber2 = $phoneNumber2;
                              // }
                              // else if ($msisdnLength2 == 13)
                              // {
                              //    // $phoneNumber2 = "+" . $phoneNumber2;
                              //   $phoneNumber2 =  $phoneNumber2;
                              // }
                              // else if ($msisdnLength2 == 10)
                              // {
                              //    // $phoneNumber2 = "+234" . $phoneNumber2;
                              //   $phoneNumber2 = $phoneNumber2;
                              // }
                              // else if ($msisdnLength2 == 14 and $phoneNumber2[0] === '+')
                              // {
                              //    $phoneNumber2 = $phoneNumber2;
                              // }
                              // else
                              // {   //invalid MSISDN
                              //   // exit("Invalid Phone number");
                              //   echo '<script type="text/javascript">alert("Invalid Phone Number in Alternate Phone Number field!")</script>';
                              // }
                        $whatsappNo = $_POST['whatsappNo'];
                        $msisdnLength3 = strlen($whatsappNo);

                              // if ($msisdnLength3 == 11)
                              // {
                              //    $whatsappNo = substr($whatsappNo,1);
                              //    // $whatsappNo = "+234" . $whatsappNo;
                              //    $whatsappNo =  $whatsappNo;
                              // }
                              // else if ($msisdnLength3 == 13)
                              // {
                              //    // $whatsappNo = "+" . $whatsappNo;
                              //   $whatsappNo = $whatsappNo;
                              // }
                              // else if ($msisdnLength3 == 10)
                              // {
                              //    // $whatsappNo = "+234" . $whatsappNo;
                              //   $whatsappNo = $whatsappNo;
                              // }
                              // else if ($msisdnLength3 == 14 and $whatsappNo[0] === '+')
                              // {
                              //    $whatsappNo = $whatsappNo;
                              // }
                              // else
                              // {   //invalid MSISDN
                              //   // exit("Invalid Phone number");
                              //   echo '<script type="text/javascript">alert("Invalid Phone Number in Whatsapp Number field!")</script>';
                              // }
                                    $password1 = $_POST['password'];
                                                    $confPassw = $_POST['confirmPassword'];
                                                    $date = date('l jS \of F Y h:i:s A');

                                                if($password1 === $confPassw){
                                                    $sql1 = "SELECT `resEmail`,`resTelNo` FROM `rgera_table` WHERE `resEmail`='$email1' OR `resTelNo`='$phoneNumber'";

                                                $result1 = $conn->query($sql1);
                                                // var_dump($result1);
                                                $rowcount1 = mysqli_num_rows($result1);
                                                // var_dump($rowcount1);
                                                if($rowcount1>=1){
                                                 echo '<script type="text/javascript">alert("Sorry, user with that email OR phone number exists!")</script>';
                                                 }else{
                                                $sql2 = "INSERT INTO `rgera_table` (`zone`,`plotNo`,`streetName`,`resName`,`sublesseName`,`resTelNo`,`resEmail`,`altName`,`altTelNo`,`dateMovedToRge`,`whatsappNo`,`birthDate`,`Date`,`passw`,`emailVerify`,`status`) VALUES ('$zone','$plotNo','$streetName','$resName','$sublesse','$phoneNumber','$email1','$altName','$phoneNumber2','$dateMovedToRGE','$whatsappNo','$birthDate','$date','$password1','','pending')";
                                                $result2 = $conn->query($sql2);
                                                if($result2===TRUE){
                                                    echo '<script type="text/javascript">alert("You have successfully Signed Up! You will recieve a confirmation for your eligibility to Sign In.")</script>';
                                                }else{
                                                    echo '<script type="text/javascript">alert("Error Signing Up. Please try again!")</script>';
                                                }
                                                }
                                                }else{
                                                    echo '<script type="text/javascript">alert("Please, your passwords do not match!")</script>';
                                                }

                                            }
                            ?>