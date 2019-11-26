<?php
//============================================================+
// File name   : example_005.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 005 for TCPDF class
//               Multicell
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Multicell
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('ARH PARON NGAWI');
$pdf->SetSubject('');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData('apotek1.png', 59, 'APOTEK RAHANI HUSADA' . ' ', 'JL.PARON II NO.54 NGAWI JAWATIMUR');

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', 11));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();

// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 127);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

// set some text for example


$datanota = '<h3>' . $nota . '</h3>';

$hr1 = <<<EDD
    <h3>----------------------------------------------------------------------------------------------------------------------------</h3>
EDD;

$table = '<table style="padding: 5px;">';
foreach ($process as $p) {
    $table .= '<tr>
                    <td style="width: 390px;">' . $p->product . '</td>
                    <td style="width: 80px;">' . $p->price . '</td>
                    <td style="width: 80px;">' . $p->qty . '</td>
                    <td style="width: 80px;">' . number_format($p->total) . '</td>
                </tr>';
}
$table .= '</table>';

$hr2 = <<<EDD
    <h3>----------------------------------------------</h3>
EDD;

$table2 = '<table style="padding: 5px;">
                <tr>
                    <td style="width: 500px;">HARGA JUAL</td>
                    <td style="width: 30px;">:</td>
                    <td style="width: 80px;">' . number_format($pricemoney) . '</td>
                </tr>
                <tr>
                    <td style="width: 500px;">DISCOUNT</td>
                    <td style="width: 30px;">:</td>
                    <td style="width: 80px;">' . number_format($pricediscount) . '</td>
                </tr>
            </table>';

$hr3 = <<<EDD
    <h3>----------------------------------------------</h3>
EDD;

$table3 = '<table style="padding: 5px;">
                <tr>
                    <td style="width: 500px;">TOTAL</td>
                    <td style="width: 30px;">:</td>
                    <td style="width: 80px;">' . number_format($pricetotal) . '</td>
                </tr>
                <tr>
                    <td style="width: 500px;">TUNAI</td>
                    <td style="width: 30px;">:</td>
                    <td style="width: 80px;">' . number_format($pricebayar) . '</td>
                </tr>
                <tr>
                    <td style="width: 500px;">KEMBALI</td>
                    <td style="width: 30px;">:</td>
                    <td style="width: 80px;">' . number_format($pricekembalian) . '</td>
                </tr>
            </table>';

$hr4 = <<<EDD
    <h3>----------------------------------------------------------------------------------------------------------------------------</h3>
EDD;

$bottom = '<h3>TERIMA KASIH. SELAMAT BELANJA KEMBALI</h3>
            <h3>===== LAYANAN KONSUMEN A.RAHANI HUSADA =====</h3>
            <h3>SMS 086 777 888 333 TELP 021 999 333</h3>
            <h3>EMAIL : A-RAHANIHUSADA@GMAIL.COM</h3>
';

$pdf->writeHTMLCell(0, 0, '', '', $datanota, 0, 1, 0, true, 'C', true);
$pdf->writeHTMLCell(0, 0, '', '', $hr1, 0, 1, 0, true, 'C', true);
$pdf->writeHTMLCell(0, 0, '', '', $table, 0, 1, 0, true, 'L', true);
$pdf->writeHTMLCell(0, 0, '', '', $hr2, 0, 1, 0, true, 'R', true);
$pdf->writeHTMLCell(0, 0, '', '', $table2, 0, 1, 0, true, 'R', true);
$pdf->writeHTMLCell(0, 0, '', '', $hr3, 0, 1, 0, true, 'R', true);
$pdf->writeHTMLCell(0, 0, '', '', $table3, 0, 1, 0, true, 'R', true);
$pdf->writeHTMLCell(0, 0, '', '', $hr4, 0, 1, 0, true, 'C', true);
$pdf->writeHTMLCell(0, 0, '', '', $bottom, 0, 1, 0, true, 'C', true);


// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
ob_clean();
$pdf->Output('arhparonngawi.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
