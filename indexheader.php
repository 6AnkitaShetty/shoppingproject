<?php session_start();?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Station Shop Theme, About Our Company</title>
<meta name="keywords" content="station shop, theme, about us, company, free templates, web design, CSS, HTML" />
<meta name="description" content="Station Shop, About Us, Company, free CSS template by templatemo.com" />
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

</head>

<body>

<div id="templatemo_wrapper">
	<div id="templatemo_header">
 
    	<div id="site_title">
        	<font style="font-family:
            
            'Comic Sans MS', cursive, Geneva, sans-serif; font-size:20px; font-weight:300; color:
            
            #903;">
            <marquee> BE STYLISH ONLINE SHOPPING</marquee></font>
        </div>
        
        <div id="header_right">
	   
     Hi <?php echo $_SESSION[name];?> (Customer)
            
		</div>
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_header -->
    
    <div id="templatemo_menu">
    	<div id="top_nav" class="ddsmoothmenu">
            <ul>
               <li><a href="index.php">Home</a>
                
                </li>
            
                    <ul>
                    <?php
					$sql=mysql_query("select * from maincategory");
					while($row=mysql_fetch_array($sql))
					{
						?>
					                        <li><a href="viewsubcategory.php?catid=<?php echo $row[cid];?>"><?php echo $row[catname];?></a></li>
                                           
<?php
					}
					?>
                  </ul>
                </li>
                <li><a href="about.php">About</a></li>
           
                
                <li><a href="contact.php">Contact</a></li>
                
                   
                </li>
                
         
                <?php
				if(isset($_SESSION['custid']))
				{
					?>
                     <li><a href="customerprofile.php">Customer profile</a>
                   
                </li>
                  <li><a href="custchange.php">Change password</a>
                <li><a href="custlogout.php">Logout</a></li>
                <?php
				}
				
				
				else
				{
					?>
                           <li><a href="custreg.php">Register</a></li>
                    <li><a href="customerlogin.php">Login</a></li>
                    <?php
				}
				?>
            </ul>
            <br style="clear: left" />
        </div> <!-- end of ddsmoothmenu -->
        <div id="menu_second_bar">
        	
        	
            <div class="cleaner"></div>
    	</div>
    </div> <!-- END of templatemo_menu -->
