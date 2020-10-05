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
                    <h1>Removed Customers Lists</h1>
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
                        echo "</tr>";     
                        $customerDAO = new customerDAO();
                        $removed = $customerDAO->getRemoved();
                        if ($removed) {
                        foreach($removed as $customer) {
                            echo "<tr>"; 
                            echo "<td >" . $customer->getName() . "</td>";
                            echo "<td >" . $customer->getPhoneNumber() . "</td>";
                            echo "<td >" . $customer->getEmailAddress() . "</td>";
							echo "</tr>"; 
						}
                    } 
                        echo "</table></form>";
                    ?>
                </div><!-- End Main -->
            </div><!-- End Content -->
        <?php include 'footer.php'; ?>
    </body>
</html>
    