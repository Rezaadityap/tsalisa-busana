// tombol-keluar
$('.tombol-keluar').on('click',function (e){

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin ingin keluar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'iya'
      }).then((result) => {
        if (result.isConfirmed) {
          document.location.href = href;
        }
    });
}); 

// hapus keranjang
$('.tombol-hapus').on('click',function (e){

  e.preventDefault();
  const href = $(this).attr('href');

  Swal.fire({
      title: 'Apakah anda yakin ingin menghapus data ini?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'iya, hapus'
    }).then((result) => {
      if (result.isConfirmed) {
        document.location.href = href;
      }
  });
}); 

// tombol
const flashData = $('.flash-data').data('flashdata');
if(flashData){
  Swal.fire(
    'Sukses',
    flashData,
    'success'
  );
}

const flashLogin = $('.dataFlash').data('flashdata');
if(flashLogin){
  Swal.fire(
    'Maaf',
    flashLogin,
    'error'
  );
}

