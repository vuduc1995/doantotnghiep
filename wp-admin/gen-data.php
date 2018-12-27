<?php

    include('wp-mpdf-master/mpdf/mpdf.php');
    $mpdf = new mPDF();
    $mpdf->shrink_tables_to_fit=0;
    ob_start();
    require 'gen-data-content-2.php';
    $x = ob_get_contents();
    ob_end_clean();
    $mpdf->WriteHTML($x);
    $today = date('Y-m-d');
    $r = rand(5, 1500);
    $pdfName = 'weekly-report-'.$today;
    $mpdf->shrink_tables_to_fit=0;
    $content = $mpdf->Output($pdfName.'.pdf', 'D');

//     $fromMail='aaaaa@gmail.com';
//     $fromName='AAAAA';
//     $mailTo='vuduc20101995@gmail.com';
//     $subject='abcfffff';
//     $filename='report.pdf';
//     $this->load->library('email');
//     $this->email->set_mailtype("html");
//     $this->email->set_newline("\r\n");
//     $this->email->from($fromMail, $fromName);
//     $this->email->to($mailTo);
//     $this->email->subject($subject);
//     //$this->email->attach($content, 'attachment', $filename, 'application/pdf');
//     $this->email->send();

// $mailTo='vuduc20101995@gmail.com';
// // the message
// $msg = "First line of text\nSecond line of text";
// // use wordwrap() if lines are longer than 70 characters
// $msg = wordwrap($msg,70);
// // send email
// mail($mailTo,"My subject",$msg);

?>
