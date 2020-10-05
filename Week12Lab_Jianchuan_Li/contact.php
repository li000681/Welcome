<?php require_once('./dao/customerDAO.php'); ?>
<!DOCTYPE html>
<html>
   <?php include 'header.php'; ?>
        <div id="content" class="clearfix">
            <aside>
                <h2>Mailing Address</h2>
                <h3>1385 Woodroffe Ave<br>
                Ottawa, ON K4C1A4</h3>
                <h2>Phone Number</h2>
                <h3>(613)727-4723</h3>
                <h2>Fax Number</h2>
                <h3>(613)555-1212</h3>
                <h2>Email Address</h2>
                <h3>info@wpeatery.com</h3>
            </aside>
            <div class="main">
                <h1>Sign up for our newsletter</h1>
                <p>Please fill out the following form to be kept up to date with news, specials, and promotions from the WP eatery!</p>
                 <?php 
					 try{
						$customerDAO = new customerDAO();
						$hasError = false;
						$errorMessages = Array();
						if(isset($_POST['customerName']) ||
							isset($_POST['phoneNumber']) || 
							isset($_POST['emailAddress']) ||
							isset($_POST['referral'])){
							if($_POST['customerName'] == ""){
								$hasError = true;
								$errorMessages['customerNameError'] = 'Please enter a name.';
							} 
							
							if($_POST['phoneNumber'] == ""|| !preg_match("/^[1-9]{3}[-][0-9]{3}[-][0-9]{4}$/", $_POST['phoneNumber'])){
								$errorMessages['phoneNumberError'] = "Please enter a phone number like 000-000-0000.";
								$hasError = true;
							} 
													
							if ($_POST['emailAddress'] == "" || !preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $_POST['emailAddress'])) {
								$hasError = true;
								$errorMessages['emailAddressError'] = 'Please enter a email.';
							}elseif ($customerDAO->getCustomer($_POST['emailAddress']) != false){
								$hasError = true;
								$errorMessages['emailAddressError'] = 'Duplicate email. Please use another email';
							}
							
							if (!isset($_POST['referral'])) {
								$hasError = true;
								$errorMessages['referralError'] = 'Please select a referral option';
							}
							
							if(!$hasError){
								$customer = new Customer($_POST['customerName'], $_POST['phoneNumber'], $_POST['emailAddress'], $_POST['referral']);
								$addSuccess = $customerDAO->addCustomer($customer);
								echo '<h3>' . $addSuccess . '</h3>';
							}
						}  
					} catch(Exception $e){
						echo '<h3>Error on page.</h3>';
						echo '<p>' . $e->getMessage() . '</p>';            
					}
				?>
				<form name="frmNewsletter" id="frmNewsletter" method="post" action="contact.php">
                    <table>
                        <tr>
                            <td>Name:</td>
                            <td><input type="text" name="customerName" id="customerName" size='40'>
                            <?php
								if(isset($errorMessages['customerNameError'])){
									echo '<br><span style=\'color:red\'>' . $errorMessages['customerNameError'] . '</span>';
                                }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Phone Number:</td>
                            <td><input type="text" name="phoneNumber" id="phoneNumber" size='40'>
                            <?php
								if(isset($errorMessages['phoneNumberError'])){
                                    echo '<br><span style=\'color:red\'>' . $errorMessages['phoneNumberError'] . '</span>';
                                }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Email Address:</td>
                            <td><input type="text" name="emailAddress" id="emailAddress" size='40'>
                            <?php
								if(isset($errorMessages['emailAddressError'])){
                                   echo '<br><span style=\'color:red\'>' . $errorMessages['emailAddressError'] . '</span>';
                                }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td>How did you hear<br> about us?</td>
                            <td>Newspaper<input type="radio" name="referral" id="referralNewspaper" value="newspaper">
								Radio<input type="radio" name='referral' id='referralRadio' value='radio'>
                                TV<input type='radio' name='referral' id='referralTV' value='TV'>
                                Other<input type='radio' name='referral' id='referralOther' value='other'>
                            <?php
								if(isset($errorMessages['referralError'])){
                                    echo '<br><span style=\'color:red\'>' . $errorMessages['referralError'] . '</span>';
                                }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan='2'><input type='submit' name='btnSubmit' id='btnSubmit' value='Sign up!'>&nbsp;&nbsp;<input type='reset' name="btnReset" id="btnReset" value="Reset Form">
                            </td>
                        </tr>
                    </table>
                </form>
            </div><!-- End Main -->
        </div><!-- End Content -->
        <?php include 'footer.php'; ?>
    </body>
    </html>
    