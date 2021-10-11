<?php
//============================================================+
// File name   : example_002.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 002 for TCPDF class
//               Removing Header and Footer
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
 * @abstract TCPDF - Example: Removing Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
//require_once('../../libraries/tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Laporan Peminjaman Buku Bacaan');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times');

// add a page
$pdf->AddPage();

// set some text to print
$table1 = '<table border="0" width="650px">';
  $table1 .= '<tr>
                <td style="text-align:center; font-family:sans-serif; font-size:16px; font-weight:bold;">Laporan Peminjaman Buku Bacaan</td>
              </tr>';
  $table1 .= '</table><br><br><br>';

  $table12 = '<table style="font-size:12px;">';
  
 
  $table12 .= '<tr>
                <td width="100">Dari Tanggal </td>
                <td width="15">:</td>
                <td>'.$this->session->userdata('tanggal_awal').'</td>
              </tr>';
  $table12 .= '<tr>
                <td width="100">Sampai Tanggal </td>
                <td width="15">:</td>
                <td>'.$this->session->userdata('tanggal_akhir').'</td>
              </tr>';
              
  $table12 .= '</table><br><br>';
  


  $table2 = '<table border="1" style="font-size:12px; margin:0 auto;">';
  $table2 .= '<tr style="background-color:lightgrey;">
                <td style="text-align:center; font-weight:bold; margin:0 auto;" width="40" height="30">no </td>
                <td style="text-align:center; font-weight:bold;"  width="100">Nama Siswa </td>
                <td style="text-align:center; font-weight:bold;" width="150">Nama Buku</td>
                <td style="text-align:center; font-weight:bold;" width="150">Tanggal Pinjam</td>
                <td style="text-align:center; font-weight:bold;"  width="150">Tanggal Kembali</td>
                <td style="text-align:center; font-weight:bold;" width="40" > Kelas</td>
              </tr>';
              $no=1;
              foreach($laporan as $lp) {
                $table2 .=  
                '<tr>
                  <td style="text-align:center; font-family:sans-serif; font-size:12px;" height="20">'.$no++.' </td>
                  <td style="text-align:center; font-family:sans-serif; font-size:12px;">'.$lp->nama.' </td>
                  <td style="text-align:center; font-family:sans-serif; font-size:12px;">'.$lp->judul.' </td>
                  <td style="text-align:center; font-family:sans-serif; font-size:12px;">'.mediumdate_indo($lp->tgl_pinjam).'</td>
                  <td style="text-align:center; font-family:sans-serif; font-size:12px;">'.mediumdate_indo($lp->tgl_kembalikan).'</td>
                  <td style="text-align:center; font-family:sans-serif; font-size:12px;">'.$lp->nama_kelas.' </td>
              </tr>';
              }
  $table2 .= '</table>';

// print a block of text using Write()
//$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
$pdf->WriteHTMLCell(0, 0, '','', $table1, 0,1,0,true,'L',true);
$pdf->WriteHTMLCell(0, 0, '','', $table12, 0,1,0,true,'L',true);
$pdf->WriteHTMLCell(0, 0, '','', $table2, 0,1,0,true,'L',true);
// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('peminjaman buku bacaan.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+