<?php
require('mysql_table_blood_report.php');

function generate_blood_test_pdf($rnum){
class PDF extends PDF_MySQL_Table
{
function Header()
{
	//Title
	$this->SetFont('Arial','',25);
	$this->Cell(0,6,'Blood Test Report',0,1,'C');
	$this->Ln(10);
	//Ensure table header is output
	parent::Header();
}
}

//Connect to database
$dbhost = 'sql6.freemysqlhosting.net';
$dbuser = 'sql6139629';
$dbpass = 'FKeMD1yudJ';
error_reporting(E_ALL ^ E_DEPRECATED);
mysql_connect($dbhost,$dbuser,$dbpass);
mysql_select_db('sql6139629');

$pdf=new PDF();
$pdf->AddPage();
//First table: put all columns automatically
$PDF_LOC="BLOOD_TEST_REPORT_Room_".$rnum."_".date('d-M-y_h-i-s').".pdf";
$FILE_PATH="dbfile/".$PDF_LOC;

$sql="select test_name,Resvalue,Refvalue,units from $mysql_database.lab_test_info where rnum="."$rnum";
$pdf->Table($sql);

$pdf->Output($FILE_PATH,'F');
return $PDF_LOC;
}
?>