<?php 
function rupiah($rp){
    if($rp!=0){
      $hasil = number_format($rp, 0, ',', '.');
        }else{
      $hasil=0;
         }
       return $hasil;
       }
	   
function rupiah2($angka){
	
	//JIKA INGIN MENAMBAH 2 DIGIT DIBELAKANG TANDA "," MAKA GANTI ANGKA 0 DISAMPING VARIABEL $angka
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
 
}

?>