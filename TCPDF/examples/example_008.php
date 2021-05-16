<?php
//============================================================+
// File name   : example_008.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 008 for TCPDF class
//               Include external UTF-8 text file
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
 * @abstract TCPDF - Example: Include external UTF-8 text file
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(VBHAN_PDF_PAGE_ORIENTATION, VBHAN_PDF_UNIT, VBHAN_PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(VBHAN_PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 008');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, VBHAN_PDF_HEADER_LOGO_WIDTH, VBHAN_PDF_HEADER_TITLE.' 008', VBHAN_PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(VBHAN_PDF_FONT_NAME_MAIN, '', VBHAN_PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(VBHAN_PDF_FONT_NAME_DATA, '', VBHAN_PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(VBHAN_PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(VBHAN_PDF_MARGIN_LEFT, VBHAN_PDF_MARGIN_TOP, VBHAN_PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(VBHAN_VBHAN_PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, VBHAN_PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(VBHAN_PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// set font
$pdf->SetFont('freeserif', '', 12);

// add a page
$pdf->AddPage();

// get esternal file content
$utf8text = file_get_contents('data/utf8test.txt', false);

// set color for text
$pdf->SetTextColor(0, 63, 127);

//Write($h, $txt, $link='', $fill=0, $align='', $ln=false, $stretch=0, $firstline=false, $firstblock=false, $maxh=0)

// write the text
$pdf->Write(5, $utf8text, '', 0, '', false, 0, false, false, 0);


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_008.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
