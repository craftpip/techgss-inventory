<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Controller_Api_Report extends Controller {

    /**
     * The basic welcome message
     *
     * @access  public
     * @return  Response
     */
    public static function _init() {
        // this is called upon loading the class
    }

    public function action_index() {
        $pdf = new PDF();
        //print_r(get_class_methods($pdf));
// Instanciation of inherited class

        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->Sub_Header();
        $pdf->Details();
        $pdf->Basic_Table();
        $pdf->End_Table();
        $pdf->SetFont('Times', '', 12);
//        for ($i = 1; $i <= 40; $i++)
//            $pdf->Cell(0, 10, 'Printing line number ' . $i, 0, 1);

       // $pdf->Cell(0, 10, 'Printing line number ', 0, 1);
        $pdf->Output();

//        $pdf->SetTopMargin(0.5);
//        $pdf->Cell(110, 20, 'Tax Invoadsasdasdasdasdasdice', 0, 0, 'L');
//        $pdf->Ln();
//        $company = "Bhargava Communnication Pvt. Ltd;";
//        $pdf->SetFont('Times', 'U', 12);
//        $pdf->MultiCell(70, 5, $company, 'LR', 'L', 0);
//        $pdf->SetFont('Times', '', 14);
//        $pdf->Output();
        //return true;
    }

    public function action_salesinqy() {
        $pdf = new PDF();
        $pdf->SetTopMargin(0.5);
        $pdf->Cell(110, 20, 'Tax Invoice', 0, 0, 'L');
        $pdf->Ln();
        $pdf->SetFont('Times', '', 14);
        $pdf->Output();
        return true;
    }

}
