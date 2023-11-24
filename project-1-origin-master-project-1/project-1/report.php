<?php
require 'fpdf/fpdf.php';
require 'connection/connection.php';

class PDF extends FPDF
{
    public function Header()
    {
        // Logo
        //$this->Image('logo.png',10,6,30);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(75, 10, 'Clients Report' , 1, 0, 'C');
        // Line break
        $this->Ln(20);
    }

    // Page footer
    public function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);

        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' .$this->PageNo() . '/' .$this->PageNo(), 0, 0, 'C');

       // $this->Cell(0,10,'Powered by FPDF.',0,1,'L');
    }
    // Load data
    public function LoadData($pdo)
    {
        $client_stmt = $pdo->prepare("SELECT client_Firstname, client_Address, client_Email, client_Subscribe FROM clients");
        $client_stmt->execute();
        $data = $client_stmt->fetchAll(\PDO::FETCH_ASSOC);
        // print_r($data);exit;
        return $data;
    }

    // Simple table
    public function BasicTable($header, $data)
    {
        // Header
        foreach ($header as $col) {
            if ($col == 'Address') {
                $this->Cell(85, 7, $col, 1);
            } else if ($col == 'First Name') {
                $this->Cell(30, 7, $col, 1);
            } else if ($col == 'Email') {
                $this->Cell(78, 7, $col, 1);}
//            } else if ($col == 'Other info') {
//                $this->Cell(70, 7, $col, 1);
//            }
             else if ($col == 'client_Subscribe') {
            $this->Cell(35, 7, $col, 1);}
            else {
                $this->Cell(35, 7, $col, 1);
            }
        }

        $this->Ln();

        // Data
        foreach ($data as $row) {
            foreach ($row as $key => $value) {
                if ($key == 'client_Address') {
                    $this->Cell(85, 6, $value, 1);
                } else if($key == 'client_Firstname') {
                    $this->Cell(35, 6, $value, 1);
                } else if($key == 'client_Email') {
                    $this->Cell(78, 6, $value, 1);
                }
//                else if($key == 'client_Other_information') {
//                    $this->Cell(70, 6, $value, 1);}

            else if ($key == 'client_Subscribe') {
                    $this->Cell(35, 6, $value, 1);}

                else {
                    $this->Cell(35, 6, $value, 1);
                }
            }
            $this->Ln();
        }
    }
}

$pdf = new PDF();
// Column headings
$header = ['Firstname', 'Address',  'Email', 'Subscribe?'];
// Data loading
$data = $pdf->LoadData($pdo);
$pdf->SetFont('Arial', '', 14);
$pdf->AddPage('L');
$pdf->BasicTable($header, $data);
// set page number




$pdf->Output();
