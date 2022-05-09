<?php
include("include/configure.inc.php");
$guery=mysqli_query($conn,"select * from property where property_for='rent'And type='Flat'");
$count2=mysqli_num_rows($guery);

echo $count2;

?>