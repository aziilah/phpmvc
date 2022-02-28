<?php 

class Mahasiswa extends Controller {
    public function index()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);      
        $this->view('templates/footer');
    }

    public function detail($id) 
    {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id); 
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);      
        $this->view('templates/footer');
    }

    public function tambah() 
    {
        
        if ( $this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {        
            
            Flasher::setFlash('BERJAYA', 'DITAMBAH', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('GAGAL', 'DITAMBAH', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }
    public function delete($id) 
    {
        
        if ( $this->model('Mahasiswa_model')->deleteDataMahasiswa($id) > 0) {       
            
            Flasher::setFlash('BERJAYA', 'DELETED', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('GAGAL', 'DELETED', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function getedit()
    {   
        
       echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id'])); // json_encode 
       //dataType ajax
    }

    public function edit()
    {   
        
        if ( $this->model('Mahasiswa_model')->editDataMahasiswa($_POST) > 0) {        
            
            Flasher::setFlash('BERJAYA', 'DIUBAH', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('GAGAL', 'DIUBAH', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function cari() 
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);      
        $this->view('templates/footer');
    }

} 

?>