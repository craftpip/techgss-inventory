<?php

//require('C:/xampp/php/pear/fpdf/fpdf.php');
require '/home/numbehip/php/PEAR/fpdf/fpdf.php';

class datacardPDF extends FPDF {

    function BasicTable($id, $count) {
        $this->SetFont('Times');
        $this->Image(\Uri::base(false) . 'assets/img/numberbazaar.png', 10, 0, 65, 25);
        $this->Cell(80, 28, '', 0);
        $this->SetFont('Times', 'B', 28);
        $this->Cell(110, 28, 'Tax Invoice', 0, 0, 'L');
        $this->Ln();

        $current_y = $this->GetY();
        $current_x = $this->GetX();

        $shippedby = "BHARGAVA COMMUNICATION PRIVATE LIMITED";
        $this->SetFont('Times', 'B', 20);
        $this->MultiCell(190, 8, $shippedby, 'TLR', 'C', 0);

        $shippedbyadd = "                         C/O B-301, Rajnigandha Apt, Opp Swapnil Lodge, Near Platform No-1                             Station Road, Anand nagar, Vasai(W), Dist-Thane-401202,Maharashtra ";
        $this->SetFont('Times', '', 12);
        $this->MultiCell(190, 6, $shippedbyadd, 'BLR', 'C', 0);

        $this->SetXY($current_x, $current_y + 20);
        $current_x = $this->GetX();

        $vattin = "VAT TIN :- 12345678";
        $this->SetFont('Times', 'B', 12);
        $this->MultiCell(95, 6, $vattin, 'BLR', 'L', 0);

        $this->SetXY($current_x + 95, $current_y + 20);
        $current_x = $this->GetX();

        $csttin = "CST TIN :- 12345678";
        $this->SetFont('Times', 'B', 12);
        $this->MultiCell(95, 6, $csttin, 'BR', 'L', 0);

        $this->Ln();

        $this->SetXY($current_x - 95, $current_y + 26);
        $current_x = $this->GetX();

        $consinee = "Consignee :-" . $this->get_customername($id);
        $this->SetFont('Times', 'B', 12);
        $this->MultiCell(190, 6, $consinee, 'LBR', 'L', 0);

        $this->SetXY($current_x, $current_y + 32);
        $current_x = $this->GetX();

        $address = "Address :- ";
        $this->SetFont('Times', 'B', 12);
        $this->MultiCell(95, 6, $address, 'LR', 'L', 0);

        $this->SetXY($current_x, $current_y + 38);
        $current_x = $this->GetX();

        $deliveryadd = $this->get_shippingaddress($id);
        $this->SetFont('Times', '', 12);
        $this->MultiCell(95, 8, $deliveryadd, 'L	', 'L', 0);


        $this->SetXY($current_x + 95, $current_y + 32);
        $current_x = $this->GetX();

        $invoice = "Invoice No";
        $this->SetFont('Times', 'B', 12);
        $this->MultiCell(47.5, 6, $invoice, 'BR', 'L', 0);

        $this->SetXY($current_x + 47.5, $current_y + 32);
        $current_x = $this->GetX();

        $invoiceno = $id;
        $this->SetFont('Times', '', 12);
        $this->MultiCell(47.5, 6, $invoiceno, 'BR', 'C', 0);

        $this->SetXY($current_x - 47.5, $current_y + 38);
        $current_x = $this->GetX();

        $order = "Order No";
        $this->SetFont('Times', 'B', 12);
        $this->MultiCell(47.5, 6, $order, 'LBR', 'L', 0);

        $this->SetXY($current_x + 47.5, $current_y + 38);
        $current_x = $this->GetX();

        $orderno = 1;
        $this->SetFont('Times', '', 12);
        $this->MultiCell(47.5, 6, $orderno, 'BR', 'C', 0);

        $this->SetXY($current_x - 47.5, $current_y + 44);
        $current_x = $this->GetX();

        $date = "Booking Date";
        $this->SetFont('Times', 'B', 12);
        $this->MultiCell(47.5, 6, $date, 'LBR', 'L', 0);

        $this->SetXY($current_x + 47.5, $current_y + 44);
        $current_x = $this->GetX();

        $orderdate = $this->get_bookingdate($id);
        $this->SetFont('Times', '', 12);
        $this->MultiCell(47.5, 6, $orderdate, 'BR', 'C', 0);

        $this->SetXY($current_x - 47.5, $current_y + 50);
        $current_x = $this->GetX();

        $delivery = "Delivery Through";
        $this->SetFont('Times', 'B', 12);
        $this->MultiCell(47.5, 6, $delivery, 'LBR', '', 0);

        $this->SetXY($current_x + 47.5, $current_y + 50);
        $current_x = $this->GetX();

        $deliverythrough = "NB";
        $this->SetFont('Times', '', 12);
        $this->MultiCell(47.5, 6, $deliverythrough, 'BR', 'C', 0);


        $this->SetXY($current_x - 47.5, $current_y + 56);
        $current_x = $this->GetX();

        $payment = "Payment Term";
        $this->SetFont('Times', 'B', 12);
        $this->MultiCell(47.5, 6, $payment, 'LR', 'L', 0);

        $this->SetXY($current_x + 47.5, $current_y + 56);
        $current_x = $this->GetX();

        $paymentterm = $this->get_paymentterm($id);
        $this->SetFont('Times', '', 12);
        $this->MultiCell(47.5, 6, $paymentterm, 'R', 'C', 0);

        $this->SetXY($current_x - 142.5, $current_y + 62);
        $current_x = $this->GetX();

        $sr = "Sr No.";
        $this->SetFont('Times', 'B', 12);
        $this->MultiCell(15, 6, $sr, 'TLBR', 'C', 0);

        $this->SetXY($current_x + 15, $current_y + 62);
        $current_x = $this->GetX();

        $description = "Description Of Goods";
        $this->SetFont('Times', 'B', 12);
        $this->MultiCell(65, 6, $description, 'TLBR', 'C', 0);

        $this->SetXY($current_x + 65, $current_y + 62);
        $current_x = $this->GetX();

        $quantity = "Quantity (No)";
        $this->SetFont('Times', 'B', 12);
        $this->MultiCell(35, 6, $quantity, 'TLBR', 'C', 0);

        $this->SetXY($current_x + 35, $current_y + 62);
        $current_x = $this->GetX();

        $rate = "Rate (Rs.)";
        $this->SetFont('Times', 'B', 12);
        $this->MultiCell(27.5, 6, $rate, 'TLBR', 'C', 0);

        $this->SetXY($current_x + 27.5, $current_y + 62);
        $current_x = $this->GetX();

        $amount = "Amount (Rs.)";
        $this->SetFont('Times', 'B', 12);
        $this->MultiCell(0, 6, $amount, 'TLBR', 'C', 0);


        $query = \DB::select('*')
                ->from('bill_details')
                ->where('invoice_no', '=', $id)
                ->execute();

        $query->as_array();
        $i = 0;
        foreach ($query as $data) {
            $this->setrowdata($invoiceno, $data['sr_no']);
            $i++;
        }

        if ($i == 1) {
            $this->setrowspace();
            $this->setrowspace();
        } elseif ($i == 2) {
            $this->setrowspace();
        } else {
            
        }


        //$this->setrowspace();
        //$this->setrowspace();
        //$this->setrowspace();
        //$this->setrowspace();

        $current_y = $this->GetY();
        $current_x = $this->GetX();

        $this->Ln();

        for ($i = 1; $i <= 6; $i++) {
            switch ($i) {
                case 1:
                    $this->SetFont('Times', '', 12);
                    $this->SetXY($current_x, $current_y);
                    $this->MultiCell(15, 8, '', 'BLR', 'C', 0);
                    break;

                case 2:
                    $this->SetXY($current_x + 15, $current_y);
                    $this->SetFont('Times', '', 12);
                    $this->MultiCell(65, 8, '', 'BLR', 'C', 0);
                    break;

                case 3:
                    $this->SetXY($current_x + 80, $current_y);
                    $this->SetFont('Times', 'B', 12);
                    $this->MultiCell(35, 8, 'Sub Total', 'BLR', 'C', 0);

                    break;

                case 4:
                    $this->SetXY($current_x + 115, $current_y);
                    $this->SetFont('Times', '', 12);
                    $this->MultiCell(27.5, 8, '-', 'BLR', 'C', 0);
                    break;

                case 5:
                    $this->SetXY($current_x + 142.5, $current_y);
                    $this->SetFont('Times', '', 12);
                    $this->MultiCell(47.5, 8, $this->subtotal($id), 'BLR', 'C', 0);
                    break;
            }
        }

        $current_y = $this->GetY();
        $current_x = $this->GetX();

        $this->Ln();

        for ($i = 1; $i <= 6; $i++) {
            switch ($i) {
                case 1:
                    $this->SetFont('Times', '', 12);
                    $this->SetXY($current_x, $current_y);
                    $this->MultiCell(15, 8, '', 'BLR', 'C', 0);
                    break;

                case 2:
                    $this->SetXY($current_x + 15, $current_y);
                    $this->SetFont('Times', '', 12);
                    $this->MultiCell(65, 8, '', 'BLR', 'C', 0);
                    break;

                case 3:
                    $this->SetXY($current_x + 80, $current_y);
                    $this->SetFont('Times', 'B', 12);
                    $this->MultiCell(35, 8, 'Discount', 'BLR', 'C', 0);

                    break;

                case 4:
                    $this->SetXY($current_x + 115, $current_y);
                    $this->SetFont('Times', '', 12);
                    $this->MultiCell(27.5, 8, '-', 'BLR', 'C', 0);
                    break;

                case 5:
                    $this->SetXY($current_x + 142.5, $current_y);
                    $this->SetFont('Times', '', 12);
                    $this->MultiCell(47.5, 8, '-', 'BLR', 'C', 0);
                    break;
            }
        }

        $current_y = $this->GetY();
        $current_x = $this->GetX();

        $this->Ln();

        for ($i = 1; $i <= 6; $i++) {
            switch ($i) {
                case 1:
                    $this->SetFont('Times', '', 12);
                    $this->SetXY($current_x, $current_y);
                    $this->MultiCell(15, 8, '', 'BLR', 'C', 0);
                    break;

                case 2:
                    $this->SetXY($current_x + 15, $current_y);
                    $this->SetFont('Times', '', 12);
                    $this->MultiCell(65, 8, '', 'BLR', 'C', 0);
                    break;

                case 3:
                    $this->SetXY($current_x + 80, $current_y);
                    $this->SetFont('Times', 'B', 12);
                    $this->MultiCell(35, 8, 'Other Charges', 'BLR', 'C', 0);

                    break;

                case 4:
                    $this->SetXY($current_x + 115, $current_y);
                    $this->SetFont('Times', '', 12);
                    $this->MultiCell(27.5, 8, '-', 'BLR', 'C', 0);
                    break;

                case 5:
                    $this->SetXY($current_x + 142.5, $current_y);
                    $this->SetFont('Times', '', 12);
                    $this->MultiCell(47.5, 8, '-', 'BLR', 'C', 0);
                    break;
            }
        }

        $current_y = $this->GetY();
        $current_x = $this->GetX();

        $this->Ln();

        for ($i = 1; $i <= 6; $i++) {
            switch ($i) {
                case 1:
                    $this->SetFont('Times', '', 12);
                    $this->SetXY($current_x, $current_y);
                    $this->MultiCell(15, 8, '', 'BLR', 'C', 0);
                    break;

                case 2:
                    $this->SetXY($current_x + 15, $current_y);
                    $this->SetFont('Times', '', 12);
                    $this->MultiCell(65, 8, '', 'BLR', 'C', 0);
                    break;

                case 3:
                    $this->SetXY($current_x + 80, $current_y);
                    $this->SetFont('Times', 'B', 12);
                    $this->MultiCell(35, 8, 'VAT', 'BLR', 'C', 0);

                    break;

                case 4:
                    $this->SetXY($current_x + 115, $current_y);
                    $this->SetFont('Times', 'B', 12);
                    $this->MultiCell(27.5, 8, '5.00%', 'BLR', 'C', 0);
                    break;

                case 5:
                    $this->SetXY($current_x + 142.5, $current_y);
                    $this->SetFont('Times', '', 12);
                    $this->MultiCell(47.5, 8, $this->get_Vat($id), 'BLR', 'C', 0);
                    break;
            }
        }

        $current_y = $this->GetY();
        $current_x = $this->GetX();

        $this->Ln();

        for ($i = 1; $i <= 6; $i++) {
            switch ($i) {
                case 1:
                    $this->SetFont('Times', '', 12);
                    $this->SetXY($current_x, $current_y);
                    $this->MultiCell(15, 10, '', 'BLR', 'C', 0);
                    break;

                case 2:
                    $this->SetXY($current_x + 15, $current_y);
                    $this->SetFont('Times', '', 12);
                    $this->MultiCell(65, 10, '', 'BLR', 'C', 0);
                    break;

                case 3:
                    $this->SetXY($current_x + 80, $current_y);
                    $this->SetFont('Times', 'B', 12);
                    $this->MultiCell(35, 10, 'Grand Total', 'BLR', 'C', 0);

                    break;

                case 4:
                    $this->SetXY($current_x + 115, $current_y);
                    $this->SetFont('Times', 'B', 12);
                    $this->MultiCell(27.5, 10, '-', 'BLR', 'C', 0);
                    break;

                case 5:
                    $this->SetXY($current_x + 142.5, $current_y);
                    $this->SetFont('Times', '', 12);
                    $this->MultiCell(47.5, 10, $this->grand_total($id), 'BLR', 'C', 0);
                    break;
            }
        }

        $this->Ln();

        $this->SetXY($current_x, $current_y + 10);
        $current_x = $this->GetX();

        $declaration = "DECLARATION";
        $this->SetFont('Times', 'B', 14);
        $this->MultiCell(190, 8, $declaration, 'LBR', 'C', 0);

        $this->SetXY($current_x, $current_y + 18);
        $current_x = $this->GetX();

        $declarationdesc = "I/We hereby certify that my/our registration certificate under the Maharashtra Value Added Tax Act, 2002 is in force on the date on which the sale of the goods specified in this Tax Invoice is made by me/us and that the transaction of sale covered by this Tax Invoice has been effected by me/us and it shall be accounted for in the turnover of sales while filing of return and the due tax, if any, payable on the sale has been paid or shall be paid";
        $this->SetFont('Times', '', 11.5);
        $this->MultiCell(190, 4.5, $declarationdesc, 'LBR', 'L', 0);

        $this->Ln();

        $this->SetXY($current_x, $current_y + 36);
        $current_x = $this->GetX();

        $term = "Term & Conditions Of Payments :-";
        $this->SetFont('Times', '', 12);
        $this->MultiCell(95, 8, $term, 'BLR', 'L', 0);

        $this->SetXY($current_x + 95, $current_y + 36);
        $current_x = $this->GetX();

        $for = "For Bhargava Communication Private Limited ";
        $this->SetFont('Times', '', 12);
        $this->MultiCell(95, 8, $for, 'BR', 'L', 0);

        $this->SetXY($current_x - 95, $current_y + 44);
        $current_x = $this->GetX();

        $space = "VAT is charged only on product price and not on FRC";
        $this->SetFont('Times', '', 12);
        $this->MultiCell(95, 30, $space, 'LBR', 'L', 0);
        $this->SetXY($current_x + 95, $current_y + 44);
        $current_x = $this->GetX();

        $space1 = "";
        $this->SetFont('Times', '', 12);
        $this->MultiCell(95, 20, $space1, 'BR', 'L', 0);

        $this->SetXY($current_x, $current_y + 64);
        $current_x = $this->GetX();

        $sign = "Authorised Signatory";
        $this->SetFont('Times', 'B', 14);
        $this->MultiCell(95, 10, $sign, 'BR', 'C', 0);

        $this->Ln();

        $this->SetXY($current_x - 95, $current_y + 74);
        $current_x = $this->GetX();

        $footer = "Registered Office:- C-30, Om Lata Jain Tower, Anand Nagar, Vasai (W), Dist:- Thane-401202,M.H    Mobile:- 9890444311 Web:- www.numberbazaar.com Email:-rupeshbhargava@numberbazaar.com";
        $this->SetFont('Times', '', 12);
        $this->MultiCell(190, 6, $footer, 'LBR', 'C', 0);
    }

    public function setrowspace() {

        $current_y = $this->GetY();
        $current_x = $this->GetX();

        $this->SetFont('Times', '', 12);
        $this->SetXY($current_x, $current_y);
        $this->MultiCell(15, 15, '', 'BLR', 'C', 0);

        $this->SetXY($current_x + 15, $current_y);

        $this->SetFont('Times', '', 12);
        $this->MultiCell(65, 15, '', 'BLR', 'C', 0);

        $this->SetXY($current_x + 80, $current_y);

        $this->SetFont('Times', '', 12);
        $this->MultiCell(35, 15, '', 'BLR', 'C', 0);

        $this->SetXY($current_x + 115, $current_y);

        $this->SetFont('Times', '', 12);
        $this->MultiCell(27.5, 15, '', 'BLR', 'C', 0);

        $this->SetXY($current_x + 142.5, $current_y);

        $this->SetFont('Times', '', 12);
        $this->MultiCell(47.5, 15, '', 'BLR', 'C', 0);
    }

    public function setrowdata($id, $sro_no) {

        $current_y = $this->GetY();
        $current_x = $this->GetX();

        $this->SetFont('Times', '', 12);
        $this->SetXY($current_x, $current_y);
        $this->MultiCell(15, 15, '1', 'BLR', 'C', 0);

        $this->SetXY($current_x + 15, $current_y);

        $this->SetFont('Times', '', 12);
        $this->MultiCell(65, 7, $this->get_description($sro_no), 'BLR', 'C', 0);

        $this->SetXY($current_x + 15, $current_y + 7);
        $this->MultiCell(65, 8, 'FRC -' . $this->get_frc($sro_no), 'BLR', 'C', 0);

        $this->SetXY($current_x + 80, $current_y);

        $this->SetFont('Times', '', 12);
        $this->MultiCell(35, 7, $this->get_quantity($sro_no), 'BLR', 'C', 0);

        $this->SetXY($current_x + 80, $current_y + 7);
        $this->MultiCell(35, 8, '-', 'BLR', 'C', 0);

        $this->SetXY($current_x + 115, $current_y);

        $this->SetFont('Times', '', 12);
        $this->MultiCell(27.5, 7, $this->get_datacardrate($sro_no), 'BLR', 'C', 0);

        /*
         * frc details view 
         */
        $this->SetXY($current_x + 115, $current_y + 7);
        $this->MultiCell(27.5, 8, $this->get_frc($sro_no), 'BLR', 'C', 0);

        $this->SetXY($current_x + 142.5, $current_y);

        $this->SetFont('Times', '', 12);
        $this->MultiCell(47.5, 7, $this->get_amount($sro_no), 'BLR', 'C', 0);

        $this->SetXY($current_x + 142.5, $current_y + 7);
        $this->MultiCell(47.5, 8, $this->get_frc($sro_no), 'BLR', 'C', 0);
    }

    public function get_customername($id) {

        return \Model_billing::get_billdata(array('invoiceno' => $id, 'display_value' => 'ship_to_name'));
    }

    public function get_shippingaddress($id) {
        return \Model_billing::get_billdata(array('invoiceno' => $id, 'display_value' => 'ship_to_address'));
    }

    public function get_bookingdate($id) {

        return \Model_billing::get_billdata(array('invoiceno' => $id, 'display_value' => 'booking_date'));
    }

    public function get_paymentterm($id) {
        return \Model_billing::get_billdata(array('invoiceno' => $id, 'display_value' => 'payment_type'));
    }

    public function get_description($sro_no) {

        return \Model_billing::get_billdetails(array('sr_no' => $sro_no, 'display_value' => 'datacard_details'));
    }

    public function get_frc($sro_no) {
        return \Model_billing::get_billdetails(array('sr_no' => $sro_no, 'display_value' => 'frc'));
    }

    public function get_quantity($sro_no) {
        return \Model_billing::get_billdetails(array('sr_no' => $sro_no, 'display_value' => 'qty'));
    }

    public function get_datacardrate($sro_no) {
        return \Model_billing::get_billdetails(array('sr_no' => $sro_no, 'display_value' => 'rate'));
    }

    public function get_amount($sro_no) {

        $quantity = $this->get_quantity($sro_no);
        $rate = $this->get_datacardrate($sro_no);
        $vat = (5 * $rate) / 100;
        $amount = $quantity * $rate;
        return $amount;
    }

    public function get_Vat($id) {

        $total = \DB::select('service_tax')
                ->from('bill_details')
                ->group_by('invoice_no')
                ->having('invoice_no', '=', $id)
                ->execute();
        $total->as_array();
        return $total[0]['service_tax'];
    }

    public function grand_total($id) {
        $amount = $this->subtotal($id);
        $vat = $this->get_Vat($id);

        $grandtotal = $amount + $vat;

        return round($grandtotal,2);
    }

    public function subtotal($id) {

        $total = \DB::select(DB::expr('sum(amount) as total'))
                ->from('bill_details')
                ->group_by('invoice_no')
                ->having('invoice_no', '=', $id)
                ->execute();
        $total->as_array();

        $frctotal = \DB::select(DB::expr('sum(frc) as frctotal'))
                ->from('bill_details')
                ->group_by('invoice_no')
                ->having('invoice_no', '=', $id)
                ->execute();
        $frctotal->as_array();
        $finaltotal1 = $total[0]['total'] + $frctotal[0]['frctotal'];
        $finaltotal = round($finaltotal1, 2);
        return $finaltotal;
    }

}

?>