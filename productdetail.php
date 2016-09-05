<?php
 include("sqlcon.php"); 
include("indexheader.php"); 
if(isset($_GET["prodid"]))
  {
  $result= mysql_query("SELECT * FROM products where prod_id='$_GET[prodid]'");
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
							<h2><a href="#"><font 
color="#CC0099">Varieties in Bestylish</font></a></h2>
                            <p>Variety
Most physical stores have a limited array of products. They can only hold so many items, and there are often many policies affecting the availability of products.
Shopping online allows you to find many products that you wouldn’t be able to find in a physical store.
 </p>
							
						</div><!-- /detail -->
						
						<div class="detail">
							<h2><a href="#"><font 
color="#CC0099">Better Prices</font></a></h2>
                            <p>Better Prices
The vast majority of online stores offer prices that are much lower than what you will find at a physical store. You can also buy products that may not logically go together like candy canes and quilts.</p>
							
						</div><!-- /detail -->
						
						<div class="detail">
							<h2><a href="#"><font 
color="#CC0099">Privacy</font></a></h2>
                            <p>Shopping online gives you privacy because you won’t have people looking at you while you shop. Not only that, but the receipts are usually made so that no one will know what you bought.</p>
						
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
					<img src="pics/womens-fashion-online-shopping.jpg" alt="Slider 01" width="659" height="334" />
				</div><!-- /item -->
				
				<div class="item item_2">
					<img src="pics/xz.jpg" alt="Slider 02" alt="Slider 01" width="659" height="334" />
				</div><!-- /item -->
				
				<div class="item item_3">
					<img src="pics/ooo.jpg" alt="Slider 02" alt="Slider 01" width="659" height="334" />
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
        	<h1>Product Details</h1>
             <?php while($row=mysql_fetch_array($result))
			{
				?>
            <div class="product_box">
           <a href="productdetail.php"><img src="<?php echo $row[imge];?>" alt="Image 01" width='100' height="100"/></a>
           </div>
                  <div class="product_box no_margin_right">
                  <table>
                <tr><th><h3>Product Name</h3></th><th>:</th><td><?php echo $row[product_name];?></td></tr>
               <tr><th> <p class="product_price">Price</th><th>:</th><td><?php echo $row[price];?></p></td></td>
          <tr><th><h3>Warranty</h3></th><th>:</th><td><?php echo $row[warranty];?></td></tr>
             <tr><th><h3>Stock status</h3></th><th>:</th><td><?php echo $row[stock_status];?></td></tr>
             <?php if($row[qty] == 0)
			 {
				 echo "<font color='red'>OUT OF STOCK</font><br />";
			 }
			 else
			 {
              echo " <tr><th><a href='shoppingcart.php?prodid=<?php echo $row[prod_id];?>'>add to cart</a></td></tr>";
			 }
			 ?>
             </table>
            </div> 
            <div class="cleaner"></div>  
                 <div class="float_l">
      <h3>Product Specification:</h3><?php echo $row[prod_specification];?>
           </div> 	
         <?php
			}?>
        
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
    <div id="templatemo_footer">
    	<p>
			<a href="index.html">Home</a> | <a href="products.html">Products</a> | <a href="about.html">About</a> | <a href="faqs.html">FAQs</a> | <a href="checkout.html">Checkout</a> | <a href="contact.html">Contact</a>
		</p>

    	Copyright © 2048 <a href="#">Your Company Name</a> | Designed by <a href="http://www.templatemo.com" target="_parent">Free CSS Templates</a>
    </div> <!-- END of templatemo_footer -->
    
</div> <!-- END of templatemo_wrapper -->


<script type='text/javascript' src='js/logging.js'></script>
</body>
</html>