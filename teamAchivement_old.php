<?php
include_once('commonFunction.php');
if (isset($_POST['start_date']) && $_POST['start_date'] != '' && isset($_POST['end_date']) && $_POST['end_date'] != '') {
    $start_date = Date('Y-m-d', strtotime($_POST['start_date']));
    $end_date = Date("Y-m-d", strtotime($_POST['end_date']));
    $where = " WHERE leadno < 2566 AND (DATE_FORMAT(reg_time,'%Y-%m-%d')>='" . $start_date . "' AND DATE_FORMAT(reg_time,'%Y-%m-%d')<='" . $end_date . "')";
} else {
    $where = 'WHERE leadno < 2566';
}

$SelQuery = "SELECT * FROM oxy2_lead $where ORDER BY leadno DESC";
    //print_r($SelQuery);
$SelExec = mysqli_query($con, $SelQuery);
$cntt = mysqli_num_rows($SelExec);
?>

<style type="text/css">

    table.display span.pj_cat {
        display: inline-block;
        line-height: 100%;
        background: #757673;
        padding: 3px 5px;
        font-size: 10px;
        text-transform: uppercase;
        color: white;
        text-shadow: 0px 1px 0px #646464;
        border-radius: 3px;
    }
    table.display span.green_highlight {
        background:#87AC51;
    }
    table.display span.blue_highlight {
        background: #4572A7;
    }

    table.display span.grey_highlight {
        background:#3D434B;
    }

    table.display span.yellow_highlight {
        background: #FF0;
        color:#000;
    }
    table.display span.red_highlight {
        background: #800000;
    }

</style>


<!--One_Wrap-->
<div class="one_wrap">
    <div class="widget">
        <div class="widget_title"><span class="iconsweet">f</span>
            <h5>Team Achievement Report</h5>
        </div>
        
        <div class="widget_body">
            <div class="content">
                <div class="stepContainer" ">
            <div class="row formwiz content">
                <div class="col-md-8">
                    <form name="frmSearch" method="post" class="stdform stdform2" id="frmSearch" action="">
                        <div class="row">
                            <div class="col-md-6" style="padding: 15">
                                <div class="form-group"> <!-- Date input -->
                                    <label class="control-label" for="date">Start Date</label>
                    <!--                <input type="hidden" name="id" value="2">
                                    <input type="hidden" name="subid" value="27">-->
                                    <input class="form-control" id="start_date" name="start_date" placeholder="MM/DD/YYYY" type="text"/>
                                    <label class="control-label" style="padding-left: 10" for="date">End Date</label>
                                    <input class="form-control" id="end_date" name="end_date" placeholder="MM/DD/YYYY" type="text"/>
                                    <button class="btn btn-primary " style="padding: 5" name="submit" type="submit">Submit</button>
                                    &nbsp;&nbsp;&nbsp;
                                    <a class="button_big" href="./reportExcle.php"><span class="iconsweet"></span>Download Report</a>
									
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group" > <!-- Submit button -->
                            
                        </div>
                    </form>
                    
                </div>
                
            </div>
        </div>
            </div>
            <div class="demo_jui">  
                <table cellpadding="0" cellspacing="0" border="0" class="display" id="jqtable">
                    <thead>
                        <tr>
                            <th width="67" align="left">Employee Name</th>
                            <th width="67">Client</th>
                            <th width="67">Client Name</th>
                            <th width="72">Lead No.</th>
                            <th width="72">Lead Name.</th>
                            <th width="72">City</th>
                            <th width="92">Grand Total</th>
                            <th width="64">Pre-event P&L amount</th>
                            <th width="123">Pre-event P&L(%)</th>
                            <th width="172">Final P&L amount</th>
                            <th width="128">Final P&L amount</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if ($cntt > 0) {
                            $i = 0;
                            $sum_invoice_amount = 0;
                            $sum_pl_amount = 0;
                            $sum_final_pl = 0;
                            while ($SelResult = mysqli_fetch_array($SelExec)) {
                                $i++;
                                $lid = $SelResult['id'];
                                $leadname = $SelResult['leadname'];
                                $companyname = $SelResult['companyname'];
                                $clientNamee = getClientListDetails($companyname);
                                $employee_name = $SelResult['creator'];
                                $client = $clientNamee['0'];
                                $client_name = $SelResult['contact'];
                                $project_pl_amount = ceil($SelResult['project_pl_amount']);
                                $pl_percentage = $SelResult['pl_percentage'];
                                $revnue = $SelResult['revnue'];
                                $profit = $SelResult['profit'];
                                $invoiced_amount = ceil($SelResult['grand_amount_total']);
                                $leadno = $SelResult['leadno'];
                                $ccity = $SelResult['ccity'];
                                /////calculation
                                $sum_invoice_amount = $sum_invoice_amount + $invoiced_amount;
                                $sum_pl_amount = $sum_pl_amount + $project_pl_amount;
                                $sum_final_pl = $sum_final_pl + $revnue;

                                //Client Information
//                                $contact = $SelResult['contact'];
//                                $lid = $SelResult['id'];
//                                $companyname = $SelResult['companyname'];
//                                $clientName = $clientNamee['0'];
//                                
//                                $add1 = $SelResult['add1'];
//                                $ccity = $SelResult['ccity'];
//                                $country = $SelResult['country'];
//                                $mob = $SelResult['mob'];
//                                $email = $SelResult['email'];
//                                $desg = $SelResult['desg'];
//                                $bdstatus = $SelResult['bdstatus'];
//                                //Account Information
//                                $leadname = $SelResult['leadname'];
//                                $dept = $SelResult['dept'];
//                                $leadtype = $SelResult['leadtype'];
//                                $othersact = $SelResult['othersact'];
//                                $eventbrief = $SelResult['eventbrief'];
//                                $event_country = $SelResult['event_country'];
//                                $event_city = $SelResult['event_city'];
//                                $keydel = $SelResult['keydel'];
//                                $specinst = $SelResult['specinst'];
//                                $revnue = $SelResult['revnue'];
//                                $reg_time = $SelResult['reg_time'];
//                                //Department Wise Data
//                                //B2B
//                                $lgs = $SelResult['lgs'];
//                                $beventStartDate = $SelResult['beventStartDate'];
//                                $beventEndDate = $SelResult['beventEndDate'];
//                                //B2C
//                                $coutelet_type = $SelResult['coutelet_type'];
//                                $c_permission = $SelResult['c_permission'];
//                                $cnumber_outlets = $SelResult['cnumber_outlets'];
//                                $cnumberOfdays = $SelResult['cnumberOfdays'];
//                                $ceventStartDate = $SelResult['ceventStartDate'];
//                                $ceventEndDate = $SelResult['ceventEndDate'];
//                                //Digital
//                                $digital_work = $SelResult['digital_work'];
//                                $otherDigitalWork = $SelResult['otherDigitalWork'];
//                                $creator = $SelResult['creator'];
//                                $grand_amount_total = $SelResult['grand_amount_total'];
                                ?>                         
                                <tr class="<?php echo $col; ?>">
                                    <td align="left" style="background:none;"><a class="tip_north" href="#" style="color:#6C6C6C;padding:0 5px;text-decoration:none;"><b style="font-weight:bold;"><?php echo $employee_name; ?></b></a></td>
                                    <td align="center"><span ><?php echo $client; ?></span></td>
                                    <td align="center"><span><?php echo $client_name; ?></span></td>
                                    <td align="center"><?php echo $leadno; ?></td>
                                    <td align="center"><?php echo $leadname; ?></td>
                                    <td align="center"><?php echo $ccity; ?></td>
                                    <td align="center"><?php echo $invoiced_amount; ?></td>
                                    <td align="center"><?php echo $project_pl_amount; ?></td>
                                    <td align="center"><?php echo $pl_percentage; ?></td>
                                    <td align="center"><?php echo $revnue; ?></td>
                                    <td align="center"><?php echo $profit; ?></td>

                                </tr>

                                <?php
                            }
                            ?>

                            <?php
                        } else {
                            ?>   
                            <tr>
                                <td colspan="3" align="center" style="font-size:14px; font-weight:bold;">No record Found</td>
                            </tr>
                        <?php } ?> 
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td> 
                            <td></td>
                            <td>Total Amount</td>
                            <td>Total Amount(%)</td>
                            <td></td>
                            <td>Total Amount</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td> 
                            <td></td>
                            <td><?= $sum_invoice_amount ?></td>
                            <td><?= $sum_pl_amount ?></td>
                            <td></td>
                            <td><?= $sum_final_pl ?></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>      



    </div>
</div>   
<script>
    $(document).ready(function () {
        $('#start_date').datepicker({
            format: 'yyyy-mm-dd'

        });
        $('#end_date').datepicker({
            format: 'yyyy-mm-dd'
        });
    });
</script>
