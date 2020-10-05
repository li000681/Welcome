<?php require_once('./dao/customerDAO.php');?>

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
			 <style type="text/css">
			 td,tr{
				 text-align: center;
			 }
			 </style>
            <?php
                    echo "<form name=\"customerList\" method=\"post\" action=\"mailing_list.php\">";
                    echo "<table><tr>";
                    echo "<th>Name: </th>";
                    echo "<th>Phone Number: </th>";
                    echo "<th>Email Address: </th>";  
                    echo "<th>How did you hear about us? </th>";  
                    echo "<th>Delete? </th></tr>";          
                    
                    $customerDAO = new customerDAO();
                    $result = $customerDAO->getmailingList();
 
                    if ($result) {
                        foreach($result as $customer) {
                            echo "<tr>"; 
                            echo "<td >" . $customer->getName() . "</td>";
                            echo "<td >" . $customer->getPhoneNumber() . "</td>";
                            echo "<td >" . $customer->getEmailAddress() . "</td>";
                            echo "<td >" . $customer->getReferral() . "</td>";
							echo '<td ><a
							onclick="return confirm(\'Are you sure you want to delete '.$customer->getName().' with '.$customer->getEmailAddress().'?\');"
							href="mailing_list.php?emailAddress='.$customer->getEmailAddress().'&action=delete"
							>Delete</a></td></tr>';
						} 
					}
                    echo "</table></form>";


                    if(isset($_GET['action'])&&($_GET['action'] == "delete")){
                            if(isset($_GET['emailAddress'])){
                                $customerDAO = new customerDAO();
								$emailAddress = $_GET['emailAddress'];
                                $result = $customerDAO->deleteCustomer($emailAddress);
                                if($result){
                                    Header("Location:mailing_list.php?deleted=true");

								} 
                            }
                        }
					if(isset($_GET['deleted'])){
                        if($_GET['deleted'] == true){
                            echo '<h5><br>Cusomer Deleted</h5>';
                        }
                    }
                ?>
                
 
           
                 </div><!-- End Main -->
        </div><!-- End Content -->
        <?php include 'footer.php'; ?>
    </body>
</html>        