<?php
session_start();
 include("sqlcon.php"); 
if(isset($_POST[submit]))
{
mysql_query("update customerregistration set pincode='$_POST[pincode]', connum='$_POST[mbl]',altnum='$_POST[altp]',address='$_POST[addr1]',billing_addr='$_POST[addr2]',locality='$_POST[loc]',city='$_POST[city]',state='$_POST[state]' where custid='$_SESSION[custid]'");

}

if($_POST['debit card'])
{
	
	


  include("indexheader.php");
      include("orderdetail.php");

?>  

    
    <div id="templatemo_main">
   		 <div id="content" class="float_r">
        	<h2>Payment</h2>
            
            
            
    
      <table border="1" align="center" class="CSSTableGenerator">
      <tr><th colspan="2"><h5><strong>PAYMENT DETAILS</strong></h5></th></tr>
            <tr>
            <th>              Payment type:  </th>   
					<td><select name="pay">
<option value="">--SELECT--</option>
<option value= "debit card" >debit card</option>

</select>
</tr>
              <tr> <th> debit card no:</th>
               <td> <input type="text" name="fname"  /></td></tr>
                <tr><th>Amount:</th>
               <td> <input type="text"  name="lname"  /></td></tr>
               <tr><th>  Expiry date:
				 </th>
               <td> <input type="date" name="mbl" /></td></tr>   
              <tr><th> cvv:</th>
				<td><input type="text"  name="altp" size="10" maxlength="4" /></td></tr>
                 
                           				
                <tr><th> Name on card:  </th>              				
               <td> <input type="text"  name="name"  /></td></tr>
               
                <tr>
                <th colspan="2" align="center"><input type="submit" name="submit" value="Pay"></tr>
                </table>
                 </div>
           
      </div>
        </form>
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    <?php
	include("footer.php");?>
</body>
</html>