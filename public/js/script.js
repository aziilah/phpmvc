//jquery

$(function() {

    
    //bila button Edit diklik
    $('.buttonTambahData').on('click', function() {
        
        $('#judulModal').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');


    });

    $('.tampilModalEdit').on('click', function() {
        
        $('#judulModal').html('Edit Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Edit Data');
        $('.modal-body form').attr('action', 'http://localhost:8080/phpmvc/public/mahasiswa/edit'); //penting juga ni!!!


        const id = $(this).data('id');
        
        //AJAX
        //request data tanpa mereload seluruh halaman
        $.ajax({
            //method getedit mengembalikan data mahasiswa sesuai dgn id yg kita kirim dari .data('id');
            url: 'http://localhost:8080/phpmvc/public/mahasiswa/getedit',   //jalankan method getedit dlm controllers mahasiswa
            data: {id : id},    //id sebelah kiri adalah nama data yg dikirim //id sebelah kanan adalah isi data yg akan dikirim
            method: 'POST', //data yg dikirim menggunakan method apa
            dataType: 'json',   //akan mengembalikan data dlm objek json
            success: function(data) {
                // console.log(data);
                
                // // data = JSON.parse(data); 
                    $('#nama').val(data.nama); //cari elemen id 'nama'..ubah value ganti dgn data iaitu nama nya
                    $('#nrp').val(data.nrp);
                    $('#email').val(data.email);
                    $('#jurusan').val(data.jurusan);
                    $('#id').val(data.id);
                
            }
        
        });
        

    });
});

//ajax