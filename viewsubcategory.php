<?php
 include("sqlcon.php"); 
include("indexheader.php"); 
if(isset($_GET["catid"]))
  {
  $result= mysql_query("SELECT * FROM subcategory where cid='$_GET[catid]'");
  }
  else
  {
	    $result= mysql_query("SELECT * FROM subcategory order by subcatid desc");
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
                            <p><a href="http://www.templatemo.com/">Be Stylish Shop</a> Online shopping in India at best prices with great hot deals on sun glasses, handbags, leather products, electronic accessories, designer jewelery, watches . </p>
							<a href="about.php" title="Read more" class="more">Read more</a>
						</div><!-- /detail -->
						
						<div class="detail">
							<h2><a href="#">Fabulous and Cute</a></h2>
                            <p>Be Stylish and buy stylish items online to add grace to your 21st-century appearance. ... Add to the shopping cart. Stylish shopping gives you the best things with the best price!!!</p>
							<a href="more.php" title="Read more" class="more">Read more</a>
						</div><!-- /detail -->
						
						<div class="detail">
							<h2><a href="#">Men..Women & Kid</a></h2>
                            <p>Buy Stylish Watch Online ✓Best Price in India ✓Cash On Delivery ✓Amazing Offers onStylish Watch from Fastrack, Casio etc. Find Stylish Watches, 2 Stylish ...</p>
							<a href="indexheader.php" title="Read more" class="more">Read more</a>
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
				
				<div class="item item_1">
						<img src="pics/Kosher-Solid-Black-Leatherette-Jacket-3082-109545-1-catalog.jpg" alt="Slider 03" width="607" height="328" /> 
				</div><!-- /item -->
				
				<div class="item item_2">
					<img src="pics/top.jpg" alt="Slider 02" width="668" height="372" />
				</div><!-- /item -->
				
				<div class="item item_3">
					<img src="pics/www.jpg" alt="Slider 03" width="665" height="372" /> 
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
        	
             <?php while($row=mysql_fetch_array($result))
			{
				?>
            <div class="product_box no_margin_right">
        <img src=<?php echo $row[imge];?> width="200" height="200" />
                <h3><a href="product.php?subcatid=<?php echo $row[subcatid];?>"><?php echo $row[subname];?></a></h3>
                
            </div>        	
         <?php
			}?>
        
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
    <div id="templatemo_footer">
    	<p>
			<a href="index.php">Home</a> |<a href="about.php">About</a> |  <a href="checkout.php">Checkout</a> | <a href="contact.php">Contact</a>
		</p>

    	Copyright © 2048 <a href="#">Your Company Name</a> | Designed by <a href="http://www.templatemo.com" target="_parent">Free CSS Templates</a>
    </div> <!-- END of templatemo_footer -->
    
</div> <!-- END of templatemo_wrapper -->


<script type='text/javascript' src='js/logging.js'></script>
</body>
</html>