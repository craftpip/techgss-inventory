<?php

require('D:/xampp/php/pear/fpdf/fpdf.php');

//require '/home/numbehip/php/PEAR/fpdf/fpdf.php';

class PDF extends FPDF {

    function Header() {
        // Logo
        //$this->Image('logo.png', 10, 6, 30);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Title
        $this->Cell(0, 15, 'Main header', 1, 0, 'C');
        $this->Ln(20);
    }

    function Sub_Header() {
        // $this->Cell(50, 15, 'Address', 1, 0, 'C');
        //$this->Cell(50, 15, 'Address', 1, 0, 'C');
        $this->MultiCell(100, 30, 'asdfasd', 1);
        $this->SetLeftMargin(115);
        $this->SetX(30);
        $this->SetY(30);
        $this->MultiCell(85, 30, 'Address', 1);
        $this->Ln(5);
        return $this;
    }

    function Details() {
        $this->SetLeftMargin(10);
        $this->SetX(0);
        $this->SetY(65);
        $this->MultiCell(60, 30, 'asdfasd', 1);
        $this->SetLeftMargin(73);
        $this->SetX(30);
        $this->SetY(65);
        $this->MultiCell(59, 30, 'detailsAddress', 1);
        $this->SetLeftMargin(135);
        $this->SetX(30);
        $this->SetY(65);
        $this->MultiCell(65, 30, ' detailsAddress', 1);
        $this->Ln(5);
        return $this;
    }

    function Basic_Table() {
         $this->SetFont('Arial','', 7.5);
        $this->SetLeftMargin(10);
        $this->SetX(0);
        $this->SetY(100);
        $this->Cell(50, 15, 'Address', 1, 0);
        $this->Cell(50, 15, 'Address', 1, 0, 'C');
        $this->Cell(50, 15, 'Address', 1, 0, 'C');
        $this->Cell(35, 15, 'Address', 1, 0, 'C');
        $this->Ln();
        $this->Cell(50, 15, 'asd', 1, 0, 'C');
        $this->Cell(50, 15, 'Address', 1, 0, 'C');
        $this->Cell(50, 15, 'Address', 1, 0, 'C');
        $this->Cell(35, 15, 'Address', 1, 0, 'C');
        $this->Ln();
        $this->Cell(50, 15, 'asd', 1, 0, 'C');
        $this->Cell(50, 15, 'Address', 1, 0, 'C');
        $this->Cell(50, 15, 'Address', 1, 0, 'C');
        $this->Cell(35, 15, 'Address', 1, 0);
        
        $this->Ln(20);
        $this->MultiCell(0, 30, 'Basic Table', 1, '', 0);
        $this->Ln(5);
        return $this;
    }

    function End_Table() {
        $this->MultiCell(0, 30, 'End Table', 1, '', 0);
        $this->Ln(5);
        return $this;
    }

// Page footer
    function Footer() {
        // Position at 1.5 cm from bottom
        $this->SetY(-10);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

}

?>