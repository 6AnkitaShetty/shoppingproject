<?php
session_start();
 include("sqlcon.php"); 

 if(isset($_POST["submit"]))
{
$pay="insert into payment(billid,payment_type,creditcardnum,expirydate,cvv,nameoncard,amount) values('$_SESSION[billno]','$_POST[paynum]','$_POST[creditcardnum]','$_POST[date]','$_POST[cvv]','$_POST[card]','$_POST[amount]')";
if(mysql_query($pay)) 
{
$msg="Thank You for Shopping";

}
 else
 echo "error".mysql_error();
}
 include("indexheader.php");
      include("orderdetail.php");
?>

    <script type="text/javascript" language="javascript">
 window.onload=blinkOn;
 
function blinkOn()
{
  document.getElementById("blink").style.color="#FF0000"
  setTimeout("blinkOff()",500)
}
 
function blinkOff()
{
  document.getElementById("blink").style.color="#000000"
  setTimeout("blinkOn()",500)
}
 
 
 
</script>
<body>

<?php


{
echo "<br /><br /><br /><center><font color='black' size='+3'><div id='blink'>Thank you for shopping</div></font></center>";
}
?>
 <!-----end------->
 <div class="cleaner"></div>
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
 <center>   <?php include("footer.php"); ?></center>
     <!-- END of templatemo_footer -->
    
</div> <!-- END of templatemo_wrapper -->


<script type='text/javascript' src='js/logging.js'></script>