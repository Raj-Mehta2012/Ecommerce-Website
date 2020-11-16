<?php
session_start();
require_once("dbcon.php");
$db_handle = new DBController();
$con= $db_handle->connectDB();
        if(!$con)
        {
	        die('Could not connect:'.mysql_error());
        } 
        $ORDER_ID=$_GET['orderId'];
        $qry="SELECT * FROM order_table WHERE order_id = '$ORDER_ID'";
        $rs = mysqli_query($con,$qry);
        $orderinfo = mysqli_fetch_assoc($rs);
        $qry1="SELECT * FROM order_details WHERE order_id = '$ORDER_ID'";
        $rs1 = $con->query($qry1);
     
       // $productinfo=mysqli_fetch_assoc($rs1);




$img="Images/finalLogo.png";
require('fpdf17/fpdf.php');
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',25);
$pdf->SetDrawColor(0,80,180);
$pdf->SetFillColor(22,30,0);
$pdf->SetFillColor(10,20,0);
$pdf->Image($img,65,5,80,70);
$pdf -> SetY(80);
$pdf->Cell(189 ,10,'',0,1);
$pdf->Cell(189 ,10,'',0,1);

$pdf->Cell(130 ,5,'Cake-N-Bake',0,0);
$pdf->Cell(59 ,5,'INVOICE',0,1);	
$pdf->SetFont('Arial','',12);
$pdf->Cell(130,5,'',0,1);
$pdf->Cell(130 ,5,'207, GM Road, LMT marg, Ghatkopar West,',0,1);


$date=date('d-m-yy');
$pdf->Cell(115 ,5,'Mumbai, Maharashtra 400086',0,0);
$pdf->Cell(25 ,5,'Date',0,0);
$pdf->Cell(34 ,5,$orderinfo['date'],0,1);//end of line

$pdf->Cell(115 ,5,'Phone: 9702940769 / 22208467',0,0);
$pdf->Cell(25 ,5,'ORDER_ID',0,0);
$pdf->Cell(34 ,5,$ORDER_ID,0,1);//end of line

$pdf->Cell(130 ,5,'Email: enquiry@javabakers.org',0,0);


//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line
$pdf->Cell(189 ,10,'',0,1);
$pdf->Cell(189 ,10,'',0,1);
//billing address
$pdf->SetFont('Arial','B',18);
$pdf->Cell(100 ,5,'Bill to:',0,1);//end of line
$pdf->SetFont('Arial','',12);
//add dummy cell at beginning of each line for indentation
$pdf->Cell(20 ,5,'Name ',0,0);
$pdf->Cell(80 ,5,$orderinfo['name'],0,1);

$pdf->Cell(20 ,5,'Address ',0,0);
$pdf->Cell(80 ,5,$orderinfo['address'],0,1);

$pdf->Cell(20 ,5,'Contact ',0,0);
$pdf->Cell(80 ,5,$orderinfo['phone'],0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(120 ,5,'Description',1,0);
$pdf->Cell(30,5,'Price_Unit',1,0);
$pdf->Cell(10,5,'Qty',1,0);
$pdf->Cell(29 ,5,'Amount',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter
     $final=0;
       if($rs1->num_rows > 0){
  while($row=$rs1->fetch_assoc())
  {
    $pdf->Cell(120 ,5,$row['nop'],1,0);
    $pdf->Cell(30,5,$row['price_unit'],1,0);
    $pdf->Cell(10,5,$row['qty'],1,0);
    $am=($row['price_unit'])*($row['qty']);
    $final=$final+$am;
    $pdf->Cell(29 ,5,$am,1,1,'R');//end of line
  }
       }
      $gst = ($final * 0.12);
    $total = ($final+$gst);

//summary
$pdf->Cell(120 ,5,'',0,0);
$pdf->Cell(30 ,5,'Subtotal',0,0);
$pdf->Cell(10 ,5,'Rs.',1,0);
$pdf->Cell(29 ,5,$final,1,1,'R');//end of line

$pdf->Cell(120 ,5,'',0,0);
$pdf->Cell(30 ,5,'GST',0,0);
$pdf->Cell(10 ,5,'',1,0);
$pdf->Cell(29 ,5,'12%',1,1,'R');//end of line

$pdf->Cell(120 ,5,'',0,0);
$pdf->Cell(30 ,5,'GST Paid',0,0);
$pdf->Cell(10,5,'Rs.',1,0);
$pdf->Cell(29 ,5,$gst,1,1,'R');//end of line

$pdf->Cell(110 ,5,'',0,0);
$pdf->Cell(40,5,'Total Amount Paid',0,0);
$pdf->Cell(10,5,'Rs.',1,0);
$pdf->Cell(29,5,$orderinfo['amount'],1,1,'R');

$pdf->Cell(189 ,10,'',0,1);//end of line
$pdf->Cell(189 ,10,'Note:',0,1);
$pdf->Cell(189,10,'This is a computer generated bill and does not require any physical signature.',0,1);
$pdf->Cell(189,10,'Restricted to Mumbai Juridiction only',0,1);
$pdf->Cell(50 ,10,'',0,0);
$pdf->Cell(30 ,10,' © 2020, Cake-N-Bake. All Rights Reserved',0,0);
$pdf->Cell(80 ,10,'',0,1);


$pdf->Output();	
echo 1;
?>