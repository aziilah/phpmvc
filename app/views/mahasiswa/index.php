
<div class="container mt-3">

<div class="row">
    <div class="col-lg-6">
        <?php 
        
        Flasher::flash() //CALL class Flasher AND ITS METHOD
        
        ?>
    </div>
</div>

<div class="row mb-3">
    <div class="col-lg-6">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary buttonTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
            Tambah data Mahasiswa
        </button>
    </div>
</div>

<div class="row mb-3">
    <div class="col-lg-6">
       
       <form action="<?php echo BASEURL;?>/mahasiswa/cari" method="POST">
       <div class="input-group">
            <input type="text" class="form-control" placeholder="Search Mahasiswa.." name="keyword" id="keyword" autocomplete="off">
            <button class="btn btn-primary" type="submit" id="buttonCari">Search</button>
    </div>
    </form>
    </div>
</div>

    <div class="row">
        <div class="col-lg-6">
   
            <h3>Daftar Mahasiswa</h3>
            
            
            
            <ul class="list-group">
                <?php foreach( $data['mhs'] as $mhs) : ?>

                     <li class="list-group-item "><?php echo $mhs['nama']; ?>
                     
                     
                     <a href="<?php echo BASEURL; ?>/mahasiswa/delete/<?php echo $mhs['id']; ?>" class="badge bg-danger float-end " onclick="return confirm('Yakin?');">Delete</a>
                     
                     
                     <a href="<?php echo BASEURL; ?>/mahasiswa/edit/<?php echo $mhs['id']; ?>" class="badge bg-success float-end tampilModalEdit" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?php echo $mhs['id']; ?>">Edit</a>

                     <a href="<?php echo BASEURL; ?>/mahasiswa/detail/<?php echo $mhs['id']; ?>" class="badge bg-primary float-end  ">Details</a>
                    
                    </li>
                <?php endforeach; ?>
            </ul>


        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Tambah Data Mahasiswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="<?php echo BASEURL; ?>/mahasiswa/tambah" method="POST">
        <!-- //field id-->
        <input type="hidden" name="id" id="id">
        <div class="form-group">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama">
        </div>
        
        <div class="form-group">
            <label for="nrp" class="form-label">NRP</label>
            <input type="number" class="form-control" id="nrp" name="nrp">
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        
        <div class="form-group mt-3">
            <label for="jurusan">Jurusan</label>
            <select class="form-select" id="jurusan" name="jurusan">
                <option value="Teknik Informatik">Teknik Informatik</option>
                <option value="Software Engineering">Software Engineering</option>
                <option value="Database Management">Database Management</option>
                <option value="Seni Muzik">Seni Muzik</option>
            </select>
        </div>
        
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>  
        </form>
      </div>
    </div>
  </div>
</div>