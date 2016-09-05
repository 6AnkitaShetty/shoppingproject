<?php
session_start();
 include("sqlcon.php"); 
include("indexheader.php"); 
if(isset($_GET["catid"]))
  {
  $result= mysql_query("SELECT * FROM products where cat_id='$_GET[catid]'");
  }
  else
  {
	    $result= mysql_query("SELECT * FROM products order by prod_id desc");
  }
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Station Shop Theme - Free CSS Template</title>
<meta name="keywords" content="station shop, theme, free template, templatemo, CSS, HTML" />
<meta name="description" content="Station Shop Theme, free CSS template provided by templatemo.com" />
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js">

/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>

<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "top_nav", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>

<link rel="stylesheet" type="text/css" media="all" href="css/jquery.dualSlider.0.2.css" />

<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="js/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="js/jquery.timers-1.2.js" type="text/javascript"></script>
<script src="js/jquery.dualSlider.0.3.min.js" type="text/javascript"></script>

<script type="text/javascript">
    
    $(document).ready(function() {
        
        $(".carousel").dualSlider({
            auto:true,
            autoDelay: 6000,
            easingCarousel: "swing",
            easingDetails: "easeOutBack",
            durationCarousel: 1000,
            durationDetails: 600
        });
        
    });
    
</script> 
 <div id="templatemo_middle" class="carousel">
    	<div class="panel">
				
				<div class="details_wrapper">
					
					<div class="details">
					
						<div class="detail">
							<h2><a href="#">Style Shop</a></h2>
                            <p><a href="http://www.templatemo.com/">Stylish Shop</a> Online shopping in India at best prices with great hot deals on sun glasses, handbags, leather products, electronic accessories, designer jewelery, watches . </p>
							<a href="about.php" title="Read more" class="more">Read more</a>
						</div><!-- /detail -->
						
						<div class="detail">
							<h2><a href="#">Fabulous and Cute</a></h2>
                            <p>Be Stylish and buy stylish items online to add grace to your 21st-century appearance. ... Add to the shopping cart. Stylish shopping gives you the best things with the best price!!!</p>
							<a href="about.php" title="Read more" class="more">Read more</a>
						</div><!-- /detail -->
						
						<div class="detail">
							<h2><a href="#">Men..Women & Kid</a></h2>
                            <p>Buy Stylish Watch Online ✓Best Price in India ✓Cash On Delivery ✓Amazing Offers onStylish Watch from Fastrack, Casio etc. Find Stylish Watches, 2 Stylish ...</p>
							<a href="about.php" title="Read more" class="more">Read more</a>
						</div><!-- /detail -->
						
					</div><!-- /details -->
					
				</div><!-- /details_wrapper -->
				
				<div class="paging">
					<div id="numbers"></div>
					<a href="javascript:void(0);" class="previous" title="Previous" >Previous</a>
					<a href="javascript:void(0);" class="next" title="Next">Next</a>
				</div><!-- /paging -->
				
				<a href="javascript:void(0);" class="play" title="Turn on autoplay">Play</a>
				<a href="javascript:void(0);" class="pause" title="Turn off autoplay">Pause</a>
				
			</div><!-- /panel -->
	
			<div class="backgrounds">
				
				<div class="item itsem_1">
					<img src="pics/plk.jpg" alt="Slider 01" width="666" height="340" />
				</div><!-- /item -->
                <div class="item item_2">
					<img src="pics/cx.jpg" alt="Slider 03" width="734" height="350" />
				</div><!-- /item -->
				
              <div class="item item_3">
					<img src="pics/df.jpg" alt="Slider 03" width="669" height="350" />
				</div><!-- /item -->
				
			</div><!-- /backgrounds -->
    </div> <!-- END of templatemo_middle -->
    
    <div id="templatemo_main">
   		<div id="sidebar" class="float_l">
        	<div class="sidebar_box"><span class="bottom"></span>
            	<h3>Categories <a href="http://jp.vectorhq.com" title="ベクトルのダウンロード" class="more_link"  target="_blank"></a></h3>   
                <div class="content"> 
                	<ul class="sidebar_list">
                    	<?php
$res=mysql_query("select * from maincategory");
while($row=mysql_fetch_array($res))
{
	echo "<li><a href='viewsubcategory.php?catid=$row[cid]'>$row[catname]</a></li>";
	
}
?>
    </ul>
                </div>
            </div>
          
        </div>
        <div id="content" class="float_r">
      <h1><font 
      color="#0000FF">Contact Us</font></h1>

 
 <h5>Customer care</h5>
<font 
color="#CC0099">Want to know about order status or queries related to a product give us a call or drop a line<br>
Phone number:	0124-6128000<br>
Email us:	care@bestylish.com<br></font><br>

<h5>Complaint</h5>
<font 
color="#CC0099">If you are not happy with our services call the number above and ask for a Complaint to be raised. Our complaint handling champs would attend to your issue straightaway.
If your concern still remains unresolved, please drop an email to: vishwanath@bestylish.com</font><br><br>

<h5>Feedback</h5>
<font 
color="#CC0099">Want to share a quick feedback? Awesumed by us? Or Not happy with the product? Join the Bestylish community at http://support.Bestylish.com and give us a shout!</font><br><br>

<h5>International Enquiries</h5>
<font 
color="#CC0099">BestylishWorld.com is the fashion and lifestyle e-commerce portal dedicated to our international customers. From stylish accessories to gorgeous jewellery,BestylishWorld.com delivers to more than 200 countries worldwide. </font><br><br>

<font 
color="#CC0099">Want to know more? Visit us at www.BestylishWorld.com or reach out to us at sales@BestylishWorld.com.</font><br><br>

<h5>Alternate Retail Partnership</h5>
<font 
color="#CC0099">Storm is the offline retail partnership model for sales & marketing of bestylish products through alternate channels. For any proposals contact us atalternate.sales@bestylish.com to partner with bestylish.</font><br><br>

<h5>Other Enquiries</h5>
<font 
color="#CC0099">Corporate Sales	corporate.sales@bestylish.com

Business Development & Partnerships	partners@bestylish.com

Careers	careers@bestylish.com

Press Relations	pr@bestylish.com</font><br><br>

<h5>Our address is:</h5>
<font color="#660000">Xerion Retail Pvt Ltd.<br>
Plot no. 109,<br>
Udyog Vihar, Phase 4,<br>
Gurgaon 122015</font>


</h5>
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
    <div id="templatemo_footer">
    	<p>
			<a href="index.php">Home</a>  | <a href="about.php">About</a> | <a href="checkout.php">Checkout</a> | <a href="contact.php">Contact</a>
		</p>

    	Copyright © 2048 <a href="#">Your Company Name</a> | Designed by <a href="http://www.templatemo.com" target="_parent">Free CSS Templates</a>
    </div> <!-- END of templatemo_footer -->
    
</div> <!-- END of templatemo_wrapper -->
<script type='text/javascript' src='js/logging.js'></script>
</body>
</html>