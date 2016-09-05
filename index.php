<?php
session_start();
 include("sqlcon.php"); 
include("indexheader.php"); 
 $perpage = 9;

if(isset($_GET["page"]))

{

$page = intval($_GET["page"]);

}

else

{

$page = 1;

}

$calc = $perpage * $page;

$start = $calc - $perpage;

if(isset($_GET["catid"]))
  {
  $result= mysql_query("SELECT * FROM products where cat_id='$_GET[catid]' order  by prod_id desc Limit  $start, $perpage");
  }
  else
  {
	    $result= mysql_query("SELECT * FROM products order by prod_id desc Limit  $start, $perpage");
  }
  $rows = mysql_num_rows($result);

if($rows)

{

$i =0;?>

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
					<img src="pics/shop.jpg" alt="Slider 01" width="685" height="404" />
				</div><!-- /item -->
                <div class="item item_2">
					<img src="pics/ft.jpg" alt="Slider 03" width="734" height="350" />
				</div><!-- /item -->
				
              <div class="item item_3">
					<img src="pics/girl.jpg" alt="Slider 03" width="669" height="350" />
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
        	<h1>New Products</h1>
             <?php 
	while($row=mysql_fetch_array($result))
	{			
				
			
				?>
                
                
                 <div class="product_box no_margin_right">
                 <?php	if($row[qty] == 0)
				{
					mysql_query("update products set stock_status='Not available' where prod_id='$row[prod_id]'");

					echo "<a href='$row[imge];'><img src='$row[imge]' alt='Image 01' width='200' height='100' /></a>
               <h3>$row[product_name];</h3>
                <p class='product_price'> $row[price]</p>
                <a  class='detail1'>OUT OF STOCK </a>
                <a href='productdetail.php?prodid= $row[prod_id];' class='detail'>Detail</a>";
				}
				else
				{
				?>
                
            	<a href="<?php echo $row[imge];?>"><img src="<?php echo $row[imge];?>" alt="Image 01" width='200' height="100"/></a>
               <h3><?php echo $row[product_name];?></h3>
                <p class="product_price"><?php echo $row[price];?></p>
                <a href="shoppingcart.php?prodid=<?php echo $row[prod_id];?>" class="add_to_card">Select the product</a>
                <a href="productdetail.php?prodid=<?php echo $row[prod_id];?>" class="detail">Detail</a>
                <?php
				}?>
            </div>    
                	
         <?php
			}
}
?>
<br />
<br />
<br />
<br /><br />
<br />
<br />
<br />


<?php

if(isset($page))
{
$result = mysql_query("select Count(*) As Total from products");
  $rows = mysql_num_rows($result);
  if($rows)
  {
   $rs = mysql_fetch_array($result);
   $total = $rs["Total"];
  }
  $totalPages = ceil($total / $perpage);
  if($page <=1 )
  {
   echo "<span id='page_links' style='font-weight:bold;border:1px solid black;margin:3px;padding:4px' >&nbsp;Pre&nbsp;</span>";
  }
  else
  {
   $j = $page - 1;
   echo "<span><a id='page_a_link' href='index.php?page=$j'>&nbsp;Pre&nbsp;</a></span>";
  }
  for($i=1; $i <= $totalPages; $i++)
  {
   if($i<>$page)
   {
    echo "<span><a href='index.php?page=$i' id='page_a_link'>&nbsp;$i&nbsp;</a></span>";
   }
   else
   {
    echo "<span id='page_links' style='font-weight:bold;border:1px solid black;margin:3px;padding:4px' >&nbsp;$i&nbsp;</span>";
   }
  }
  if($page == $totalPages )
  {
   echo "<span id='page_links'style='font-weight:bold;border:1px solid black;margin:3px;padding:4px' >&nbsp;Next&nbsp;</span>";
  }
  else
  {
   $j = $page + 1;
   echo "<span ><a href='index.php?page=$j' id='page_a_link'>Next</a></span>";
  }
 }?>
 
			
			
	
         
 <div class="cleaner"></div>
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
    <?php include("footer.php"); ?>
     <!-- END of templatemo_footer -->
    
</div> <!-- END of templatemo_wrapper -->


<script type='text/javascript' src='js/logging.js'></script>
</body>
</html>

