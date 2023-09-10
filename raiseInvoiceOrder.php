<?php include_once('commonFunction.php');
include_once('inc_connection.php');

$raisePOId = base64_decode($_REQUEST['raisePoId']);

$SelQueryQ = "SELECT * FROM oxy2_raise_povendor  WHERE raisePoId = $raisePOId";

$SelExecQ = mysqli_query($con,$SelQueryQ);
$cnttQ = mysqli_num_rows($SelExecQ);
if($cnttQ > 0){
				$iQ = 0;
				while($SelResultQ = mysqli_fetch_array($SelExecQ))
				{
				$iQ++;
								
				$idQ= $SelResultQ['id'];
				$vendorIdQ= $SelResultQ['vendorId'];
				$leadNumberQ= $SelResultQ['leadNumber'];
				$categoryQ= $SelResultQ['category'];
				$vendorQ= $SelResultQ['vendor'];
				$contactPersonQ= $SelResultQ['contactPerson'];
				$cityQ= $SelResultQ['city'];
				$telephoneQ= $SelResultQ['telephone'];
				$faxQ= $SelResultQ['fax'];
				$emailQ= $SelResultQ['email'];
				$quotationRefQ= $SelResultQ['quotationRef'];
				$deliveryDateQ= $SelResultQ['deliveryDate'];
				$deliveryInstructionQ= $SelResultQ['deliveryInstruction'];
				$remarksQ= $SelResultQ['remarks'];
				$yearQ= $SelResultQ['year'];
				$monthQ= $SelResultQ['month'];
				$raisePoIdQ= $SelResultQ['raisePoId'];
				$status1Q= $SelResultQ['status1'];
				$orderByQ= $SelResultQ['orderBy'];
				$approvedByQ= $SelResultQ['approvedBy'];
				$dateAddedQ= $SelResultQ['dateAdded'];
				
				$explLead = explode("/",$leadNumberQ);
				$leadno = $explLead['2'];
				$dept = $explLead['1'];
				
				
				$getleadDetailsbased = getleadDetailsbased($leadno,$dept);
				}
}
				


?>

<style type="text/css">

td{padding:5px; font-size:13px;font-family: 'CorbelRegular';}

</style>

<!--One_Wrap-->
            <div class="one_wrap fl_left">
                <div class="widget">
                    <div class="widget_title"><span class="iconsweet">E</span>
                        <h5>Purchase Order</h5>
                    </div>
                    <div class="widget_body">
                      <div class="content_pad" id="printd2" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:14px">
                        	
                          



<table width="100%" border="0" cellspacing="3" cellpadding="3" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:14px" >

 <tr>
 
 <?php 
 
 $getPOAprovalcount = getPOAprovalcount($raisePOId);
 $getPODisapprovalcount = getPODisapprovalcount($raisePOId);
 if($getPOAprovalcount == $getPODisapprovalcount){$statMessage = "HOLD";}
 else if($getPOAprovalcount > $getPODisapprovalcount & $getPOAprovalcount >= "2"){$statMessage = "Approved";}
  else if($getPODisapprovalcount > $getPOAprovalcount & $getPODisapprovalcount >= "2"){$statMessage = "Disapproved";}
  else{$statMessage = "";}
 ?>
 
 
 <td width="36%">
  
  <a href="javascript:void(0);" onclick="printPage();" class="button_small whitishBtn"><span class="iconsweet">v</span>Print</a>
 </td>
 
 
   <td width="26%" align="center"><h2>Purchase Order</h2></td>
    <td width="38%" align="center"></td>
    
  </tr>

  <tr>
    <td><h2>Sercon India Pvt. Ltd.</h2></td>
    <td align="right">&nbsp;</td>
    <td align="right">
    
      <img src="images/black_BCHI_SERCON.png"/></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="3" cellpadding="3" style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:14px" >
  <tr>
    <td><h2>&nbsp;</h2></td>
    <td align="right">
    	<?php if($statMessage == "HOLD") {?>
             <img src="barcode.php?code=Request on Hold" />
        <?php } else {?>     
             
          <img src="barcode.php?code=Sercon/Del/<?php echo $monthQ; ?>/<?php echo $yearQ; ?>/<?php echo $raisePoIdQ; ?>" />   
          <?php } ?>   
             
             </td>
  </tr>
</table>

<table width="100%"  cellspacing="5" cellpadding="5"  style="border:2px solid gray;">
   <tr>
    <td width="23%" align="left">
    	<table width="100%"  cellspacing="1" cellpadding="1">
  <tr>
    <td><span style="font-size:13px;font-weight:bold">Supplier Name & Address</span></td>
  </tr>
  <tr>
    <td><?php echo $vendorQ; ?></td>
  </tr>
  <tr>
    <td><?php  echo $cityQ;?></td>
  </tr>
  <tr>
    <td><span style="font-size:12px;font-weight:bold">Tel: </span><?php echo $telephoneQ;?></td>
  </tr>
  <tr>
    <td><span style="font-size:13px;font-weight:bold">Atten. : </span><?php echo $contactPersonQ; ?></td>
  </tr>
</table>

    </td>
    <td width="52%"></td>
     <td width="25%" align="right">
     	
        <table width="100%"  cellspacing="1" cellpadding="1">
  <tr>
    <td><span style="font-size:13px;font-weight:bold">Purchase Order Detail</span></td>
  </tr>
  <tr>
    
    <td><span style="font-size:12px;font-weight:bold">No. : </span>
	
    <?php if($statMessage == "HOLD") {?>
             <?php echo "Request on Hold"; ?>
        <?php } else {?>     
             
          <?php echo "Sercon/Del/".$monthQ."/".$yearQ."/".$raisePoIdQ;?>  
          <?php } ?>  
	
	</td>
  </tr>
  <tr>
    <td><span style="font-size:12px;font-weight:bold">Date : </span><?php echo $dateAddedQ; ?></td>
  </tr>
  <tr>
    <td><span style="font-size:12px;font-weight:bold">Event : </span><?php echo $getleadDetailsbased['0']; ?></td>
  </tr>
  <tr>
    <td><span style="font-size:12px;font-weight:bold">Lead No. : </span><?php echo $leadNumberQ;?></td>
  </tr>
</table>
        
     </td>
  </tr>
</table>
<br/>

<table width="100%"  cellspacing="5" cellpadding="5"  style="border:2px solid gray;">
   <tr>
    <td width="23%" align="left">
    	<table width="100%"  cellspacing="1" cellpadding="1">
  <tr>
    <td><span style="font-size:13px;font-weight:bold">Deliver To</span></td>
  </tr>
  <tr>
    <td>8A, 2nd Floor,Milap Niketan,</td>
  </tr>
  <tr>
    <td>Bahadurshah Zafar Marg,</td>
  </tr>
  <tr>
    <td>New Delhi</td>
  </tr>
  <tr>
    <td>India</td>
  </tr>
</table>

    </td>
    <td width="52%"></td>
     <td width="25%" align="right">
     	
        <table width="100%"  cellspacing="1" cellpadding="1">
  <tr>
    <td><span style="font-size:13px;font-weight:bold">Send Invoice To</span></td>
  </tr>
  <tr>
    <td>Sercon India Pvt Ltd.</td>
  </tr>
  <tr>
    <td>8A 2nd Floor</td>
  </tr>
  <tr>
    <td>BahadurShah </td>
  </tr>
  <tr>
    <td>New Delhi ,India</td>
  </tr>
</table>
        
     </td>
  </tr>
</table>

<br/>

<table width="100%"  cellspacing="1" cellpadding="1"  style="border:2px solid gray;">
  <tr style="border-bottom:1px solid gray;">
    <td><span style="font-size:12px;font-weight:bold">S.No</span></td>
    <td><span style="font-size:12px;font-weight:bold">Item Name</span></td>
    <td><span style="font-size:12px;font-weight:bold">Item Descrip.</span></td>
    <td><span style="font-size:12px;font-weight:bold">Qty.</span></td>
    <td><span style="font-size:12px;font-weight:bold">Rate</span></td>
    <td><span style="font-size:12px;font-weight:bold">Tax</span></td>
    <td><span style="font-size:12px;font-weight:bold">Amt(INR)</span></td>
  </tr>
  
  <?php
  $totAmount = 0;
$SelQuery = "SELECT * FROM oxy2_raise_vendoritem WHERE raisePoId = $raisePOId";
$SelExec = mysqli_query($con,$SelQuery);
$cntt = mysqli_num_rows($SelExec);
if($cntt > 0){
				$i = 0;
				while($SelResult = mysqli_fetch_array($SelExec))
				{
				$i++;
				if($i % 2 == "0"){$col = "gradeA even";}
				else
				{$col = "gradeA odd";}
				
				$id= $SelResult['id'];
				$raisePoId= $SelResult['raisePoId'];
				$vendorId= $SelResult['vendorId'];
				$itemId= $SelResult['itemId'];
				$quantity= $SelResult['quantity'];
				$rate= $SelResult['rate'];
				$tax= $SelResult['tax'];
				$amount= $SelResult['amount'];
				$dateAdded= $SelResult['dateAdded'];
				
				$choice= $SelResult['choice'];
				$finalTax= $SelResult['finalTax'];
				
				$getitemDetails = getitemDetails($itemId);
				$itemName = $getitemDetails['1'];
				$itemDesc = $getitemDetails['2'];
?>				
  
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $itemName; ?></td>
    <td><?php echo $itemDesc; ?></td>
    <td><?php echo $quantity; ?></td>
    <td><?php echo $rate; ?></td>
    <td><?php echo $tax; ?></td>
    <td><?php echo $amount; ?></td>
  </tr>


<?php 
				$totAmount = $totAmount + $amount;
				
				}

?>

<tr>
    <td colspan="7"><br/></td>
      </tr>

<tr>
    <td colspan="4"></td>
    <td><span style="font-size:12px;font-weight:bold"><?php echo "Sub Total"; ?></span></td>
    <td></td>
    <td><?php echo $totAmount; ?></td>
  </tr>
  
  <tr>
    <td colspan="4"></td>
    <td><span style="font-size:12px;font-weight:bold"><?php if($choice == "ads"){ echo "Additional";} else { echo "Discount"; } ?></span></td>
    <td><?php echo $finalTax."%"; ?></td>
    <td><?php if($choice == "ads"){ echo "+";} else { echo "-"; }
	echo $taxinAmountforSpe = round(($finalTax * $totAmount)/100);?></td>
  </tr>
  
  <tr>
    <td colspan="4"></td>
    <td><span style="font-size:12px;font-weight:bold"><?php echo "Sub total"; ?></span></td>
    <td></td>
    <td><?php if($choice == "ads"){echo $Pototally = $totAmount + $taxinAmountforSpe;} else{echo $Pototally = $totAmount - $taxinAmountforSpe;}?></td>
  </tr>
  
<tr>
    <td colspan="4"></td>
    <td><span style="font-size:12px;font-weight:bold"><?php echo "Service Tax"; ?></span></td>
    <td><?php echo "12.36%"; ?></td>
    <td><?php echo $taxinAmount = "+".round((12.36 * $Pototally)/100);?></td>
  </tr>


<tr style="border-top:1px solid gray;">
    <td colspan="4"></td>
    <td><span style="font-size:14px;font-weight:bold"><?php echo "Gross Total"; ?></span></td>
    <td></td>
    <td><span style="font-size:14px;font-weight:bold"><?php 
	echo $Pototal = $Pototally + $taxinAmount;
	 ?></span></td>
  </tr>
  
  <?php }//If Ended
  else {
  
  ?>
  
  <tr style="border-top:1px solid gray;">
    <td colspan="7">No P.O. Raised </td>
  </tr>
  <?php } ?>
  
  
</table>

<script type="text/javascript">
     function printPage(){
            var tableData = '<table border="1">'+document.getElementById('printd2').innerHTML+'</table>';
            var data = '<button onclick="window.print()">Print this page</button>'+tableData;       
            myWindow=window.open('','','width=800,height=600');
            myWindow.innerWidth = screen.width;
            myWindow.innerHeight = screen.height;
            myWindow.screenX = 0;
            myWindow.screenY = 0;
            myWindow.document.write(data);
            myWindow.focus();
        };
     </script>
                          
                            
                            
                                                       
                            
                      </div>
                    </div>
                </div>
            </div>
          
            
        
         <br class="clear" />