<!DOCTYPE html>
<html>
<!--header.php starts here--> 
		   <?php include 'header.php'; ?>		
           	<!--header.php ends-->
            <div id="content" class="clearfix">
                <aside>
                        <h2><?php echo date("l"); ?>'s Specials</h2>
                        <hr>
						<?php
						include  'menuItem.php';
						?>
						<?php
						$allItem = Array();
						$i = 0;
						$star="*";
						while ($i < 6){
							
							if ($i%2==0){
								$allItem[$i]=new menuItem("The WP Burger".$star.($i+1),"Freshly made all-beef patty served up with homefries - ",'$14');
							}else{
								$allItem[$i]=new menuItem("The WP Kebobs".$star.($i+1),"Tender cuts of beef and chicken, served with your choice of side - ",'$17');
							}
						//print_r($allItem);
						$i++;
						$star.='*';
						}
							echo "
							<img src='images/burger_small.jpg' alt='Burger' title='Burger'>";
							echo "<h3>".$allItem[0]->get_itemName()."</h3>";
							echo "<p>".$allItem[0]->get_description().$allItem[0]->get_price()."</p>";
							echo"<hr>";
							echo '<img src="images/kebobs.jpg" alt="Kebobs" title="WP Kebobs">
							<h3>'.$allItem[1]->get_itemName().'</h3>
							<p>'.$allItem[1]->get_description().$allItem[1]->get_price().'</p>
							<hr>';
						
							echo "
							<img src='images/burger_small.jpg' alt='Burger' title=' Burger'>";
							echo "<h3>".$allItem[2]->get_itemName()."</h3>";
							echo "<p>".$allItem[2]->get_description().$allItem[2]->get_price()."</p>";
							echo "<hr>";
							echo "<img src='images/kebobs.jpg' alt='Kebobs' title='WP Kebobs'>";
							echo "<h3>".$allItem[3]->get_itemName()."</h3>";
							echo "<p>".$allItem[3]->get_description().$allItem[3]->get_price()."</p>";
							echo "<hr>";
						
							echo "
							<img src='images/burger_small.jpg' alt='Burger' title=' Burger'>";
							echo "<h3>".$allItem[4]->get_itemName()."</h3>";
							echo "<p>".$allItem[4]->get_description().$allItem[4]->get_price()."</p>";
							echo "<hr>";
							echo "<img src='images/kebobs.jpg' alt='Kebobs' title='WP Kebobs'>";
							echo "<h3>".$allItem[5]->get_itemName()."</h3>";
							echo "<p>".$allItem[5]->get_description().$allItem[5]->get_price()."</p>";
							echo "<hr>";
							
						
						
						?>
							
                </aside>
                <div class="main">
                    <h1>Welcome</h1>
                    <img src="images/dining_room.jpg" alt="Dining Room" title="The WP Eatery Dining Room" class="content_pic">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    <h2>Book your Christmas Party!</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                </div><!-- End Main -->
            </div><!-- End Content -->
            <?php include 'footer.php'; ?>
        <!-- End Wrapper  this dv is included in footer.php-->
    </body>
</html>