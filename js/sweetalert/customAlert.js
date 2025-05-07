//Alert Sukses Standar
function successAlert($param){
    Swal.fire({
    position: 'top-end',
    icon: 'success',
    title: $param,
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true
  })
}
//Alert Sukses Generate Rekening
function successAlertRek($param){
    Swal.fire({
    position: "top-end",
    icon: "success",
    title: "Berhasil membuat rekening an "+$param,
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: true
  })
}

//Alert Info
function infoAlert(){
    Swal.fire({
    position: 'top-end',
    icon: 'info',
    title: 'Info Aplikasi',
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: true,
  })
}

//Alert Gagal Menemukan data CIF
function errorAlertCIF($param) {
    //console.log(Swal);
    Swal.fire({
    position: "top-end",
    icon: "error",
    title: "Data CIF " + $param + " tidak ditemukan !!!",
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: true
  });
}

//Alert Gagal Membuat Rekening
function errorAlertRek($param) {
    //console.log(Swal);
    Swal.fire({
    position: "top-end",
    icon: "error",
    title: "Gagal Membuat Rekening An " + $param,
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: true
  });
}
