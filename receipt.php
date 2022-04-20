<?php  
include("include/configure.inc.php");
$fid=$_GET['id'];
function AmountInWords(float $amount)
{
   $amount_after_decimal = round($amount - ($num = floor($amount)), 2) * 100;
   // Check if there is any number after decimal
   $amt_hundred = null;
   $count_length = strlen($num);
   $x = 0;
   $string = array();
   $change_words = array(0 => '', 1 => 'One', 2 => 'Two',
     3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
     7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
     10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
     13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
     16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
     19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
     40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
     70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
    $here_digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
    while( $x < $count_length ) {
      $get_divider = ($x == 2) ? 10 : 100;
      $amount = floor($num % $get_divider);
      $num = floor($num / $get_divider);
      $x += $get_divider == 10 ? 1 : 2;
      if ($amount) {
       $add_plural = (($counter = count($string)) && $amount > 9) ? 's' : null;
       $amt_hundred = ($counter == 1 && $string[0]) ? ' and ' : null;
       $string [] = ($amount < 21) ? $change_words[$amount].' '. $here_digits[$counter]. $add_plural.' 
       '.$amt_hundred:$change_words[floor($amount / 10) * 10].' '.$change_words[$amount % 10]. ' 
       '.$here_digits[$counter].$add_plural.' '.$amt_hundred;
        }
   else $string[] = null;
   }
   $implode_to_Rupees = implode('', array_reverse($string));
   $get_paise = ($amount_after_decimal > 0) ? "And " . ($change_words[$amount_after_decimal / 10] . " 
   " . $change_words[$amount_after_decimal % 10]) . ' Paise' : '';
   return ($implode_to_Rupees ? $implode_to_Rupees . 'Rupees ' : '') . $get_paise;
}
?>
<!doctype html>
<html>
<head>
	<link rel="stylesheet" href="RECEIPT.css">
<meta charset="utf-8">
<title>R E C E I P T</title>
</head>

<body ><h1 style="text-align: center">Receipt</h1>
<?php $sql=mysqli_query($conn,"select tenant.fullname as tname, payment.security_deposit as rent from payment inner join tenant on payment.document_no=tenant.document_no where payment.document_no='$fid'");
                 
                    while($arr=mysqli_fetch_array($sql)){
						$amt_words=$arr['rent'];
		$get_amount= AmountInWords($amt_words);
                    ?>

		<p>RECEIVED OF AND FROM the withinamed LICENSEE MR/Mss:&nbsp;<b><u><?php echo $arr['tname'];?></u></b></p>
		<p>The sum of Rs.<b><u><?php echo $arr['rent'];?></u></b>/- (<b><u><?php echo $get_amount;?>Only</u></b>)</p>
<?php } ?>
	<br>
	<br>
	<div>
	<table style="width: 100%;">
	<?php 
	
	$sql=mysqli_query($conn,"select * from property_details where document_no='$fid'");
	 while($arr=mysqli_fetch_array($sql)){
	?>
	<tbody>

		<tr>
			<td>FLAT/SHOP NO.</td>
			<td>PLOT NO.</td>
			<td>SECTOR</td>
			<td>AREA(in Sq.feet)</td>
		</tr>
		<tr>
			<td><?php echo $arr['address'];?></td>
			<td><?php echo $arr['plot_no'];?></td>
			<td><?php echo $arr['sector'];?></td>
			<td><?php echo $arr['area'];?></td>
		</tr>
		<tr>
			<td colspan="4">CIDCO APARTMENT:<b><?php echo $arr['cidco'];?></b></td>
		</tr>
		<tr>
			<td colspan="4">CO.OP.HSG.SOCITY:<b><?php echo $arr['chs'];?></b></td>
		</tr>
		<tr>
			<td colspan="4">NODE:<b><?php echo $arr['node'];?></b></td>
		</tr>
	</tbody>
	<?php } ?>
 
</table>
</div>
	<br>
	<br>
	<br>
	<div>
		<table style="width: 100%;">
		<?php 
	
	$sql=mysqli_query($conn,"select * from payment where document_no='$fid'");
	 while($arr=mysqli_fetch_array($sql)){
	?>
	<tbody style="text-align: center">
		<tr style="text-align: center">
			<td colspan="4">PAYMENT SCHEDULE OF SECURITY DEPOSIT</td>
		</tr>
		<tr style="text-align: center">
			<td>Cheque/Cash</td>
			<td>Date</td>
			<td>Amount</td>
			<td>Bank</td>
		</tr>
		<tr>
			<td><?php echo $arr['method'];?></td>
			<td><?php echo $arr['date'];?></td>
			<td><?php echo $arr['security_deposit'];?></td>
			<td><?php echo $arr['bank'];?></td>
		</tr>
	</tbody>
	<?php } ?>
		</table>
	</div>

			<br>
			<br>
			<div style="padding-left: 70%;">I SAY RECEIVED</div>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<?php $sql=mysqli_query($conn,"select owner.fullname as oname,owner.abbreviation as abb, payment.security_deposit as rent from payment inner join owner on payment.document_no=owner.document_no where payment.document_no='$fid'");
                 
                    while($arr=mysqli_fetch_array($sql)){
						$amt_words=$arr['rent'];
		$get_amount= AmountInWords($amt_words);
                    ?>

			<div style="padding-left: 70%;">Rs.<u><b><?php echo $get_amount;?>/-</u></b></div>
			<br>
			<br>
			<div style="padding-left: 70%;"><u><b><?php echo $arr['abb'];?>.<?php echo $arr['oname'];?></u></b></div><br>
			<div style="padding-left: 76%;">(LICENSOR)</div>
			<?php } ?>
			<div>WITNESSES:</div>
			<br>
			<br>
			<div>1.</div>
			<br>
			<br>
			<br>
			<div>2.</div>
			
</body>
</html>
