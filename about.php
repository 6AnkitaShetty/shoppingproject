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
							
						</div><!-- /detail -->
						
						<div class="detail">
							<h2><a href="#">Fabulous and Cute</a></h2>
                            <p>Be Stylish and buy stylish items online to add grace to your 21st-century appearance. ... Add to the shopping cart. Stylish shopping gives you the best things with the best price!!!</p>
							
						</div><!-- /detail -->
						
						<div class="detail">
							<h2><a href="#">Men..Women & Kid</a></h2>
                            <p>Buy Stylish Watch Online ✓Best Price in India ✓Cash On Delivery ✓Amazing Offers onStylish Watch from Fastrack, Casio etc. Find Stylish Watches, 2 Stylish ...</p>
							
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
					<img src="pics/never-ending-wait-for-the-product.jpg" alt="Slider 01" width="685" height="367" />
				</div><!-- /item -->
                <div class="item item_2">
					<img src="pics/why-shop-online.jpg" alt="Slider 03" width="734" height="350" />
				</div><!-- /item -->
				
              <div class="item item_3">
					<img src="pics/mmm.jpg" alt="Slider 03" width="669" height="350" />
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
      color="#0000FF">About www.Bestylish.com</font></h1>

 
 <h5><font 
color="#660066">  Bestylish.com is a young and vibrant company that aims to provide good quality branded products. Bestylish.com caters to the fashion needs of men, women and kids across accessories, sunglasses,toysl, jewellery and bags.
At Bestylish.com we strive to achieve the highest level of “Customer Satisfaction” possible. Our cutting edge E-commerce platform, highly experienced buying team, agile warehouse systems and state of the art customer care centre provides customer with:
•	Broader selection of products<br />
•	Superior buying experience<br />
•	On-time delivery of products<br />
•	Quick resolution of any concerns<br /></font>
<h4><font color="#CC3344">Avail added online shopping benefits</font></h4>	
<font 
color="#660066"> You choose your product, order it online, and we deliver it right at your doorstep anywhere in India. You just need to pay for the product, while we ensure Free Shipping all the time on almost everything, of course, with no strings attached. For any second thoughts after purchase, we have in place a 30-day no questions asked return policy as well. To offer you a safe and risk-free online shopping experience, we offer COD facility. Buy gifts for your loved ones and avail our special gift wrap facility at a nominal cost! Could you have asked for more?</font>

<h4><font color="#CC3344">Bestylish.com: the 24 x7 Online Fashion & Lifestyle Store for everyone</font></h4>
<font 
color="#660066"> Forget the fashion streets of the world. We, at Bestylish.com, have all that you need to glam up your fashion quotient. From an extensive range of men’s perfumes, fashion and precious jewellery for women, bed sheets mats  and toys umbrella for kids and laptop bags , watches and accessories for everyone, we purvey diversity of choices in online shopping in India under one umbrella. Your Bestylish Online Shop has arrived! Do not miss the attractive best buy prices and super discount offers. Get more, pay less! For any query, drop a line at care@bestylish.com or give us a call at 0124–6128000.</font>

</h5>
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
    <div id="templatemo_footer">
    	<p>
			<a href="index.php">Home</a>  | <a href="about.php">About</a>  | <a href="checkout.php">Checkout</a> | <a href="contact.php">Contact</a>
		</p>

    	Copyright © 2048 <a href="#">Your Company Name</a> | Designed by <a href="http://www.templatemo.com" target="_parent">Free CSS Templates</a>
    </div> <!-- END of templatemo_footer -->
    
</div> <!-- END of templatemo_wrapper -->
<script type='text/javascript' src='js/logging.js'></script>
</body>
</html>