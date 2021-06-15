<?php
	function cetak_pdf(){
    $CI =& get_instance();
        
    $CI->load->library('pdf');
                
    $CI->pdf->AddPage('P','A4');
        
    $date = date('d-m-Y');        
    
    $CI->pdf->SetFont('Arial','B',10);       
    $CI->pdf->Cell(150,5,'Laporan',0,0,'L');
    $CI->pdf->SetFont('Arial','',10);  
    $CI->pdf->Cell(40,5,'Tgl : '.$date,0,0,'R');
    $CI->pdf->Ln(10);


    $CI->pdf->SetFont('Arial','B',9);
    $CI->pdf->Cell(20,6,'No',1,0,'C');
    $CI->pdf->Cell(110,6,'Nama',1,0,'C');
    $CI->pdf->Cell(60,6,'Kelas',1,0,'C');
    $CI->pdf->Ln();

    $no=1;
    foreach ($this->model_home->limit()->result() as $key) {
      $CI->pdf->SetFont('Arial','',8);
      $CI->pdf->Cell(20,6,$no,1,0,'C');
      $CI->pdf->Cell(110,6,$key->nama,1,0,'L');
      $CI->pdf->Cell(60,6,$key->kelas,1,0,'C');
      $CI->pdf->Ln();
    $no++;
    }

    $CI->pdf->Output('Laporan'.'.pdf','D');
  }
  ?>