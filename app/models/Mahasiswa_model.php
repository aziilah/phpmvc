<?php 



class Mahasiswa_model {

   
    // public function __construct()
    // {
    //     // data source name
    //     $dsn = 'mysql:host=localhost;dbname=phpmvc';

    //     try {
    //         $this->dbh = new PDO($dsn, 'root', '');
    //     } catch(PDOException $e) {
    //         die($e->getMessage());
    //     }
    // }

   

    // //data dalam Array
    // private $mhs = [
    //     [
    //         "nama" => "Ilah",
    //         "nrp" => "0484511",
    //         "email" => "aziilah@gmail.com",
    //         "jurusan" => "Database Management",

    //     ],
    //     [
    //         "nama" => "Alexis",
    //         "nrp" => "546464",
    //         "email" => "alexis@gmail.com",
    //         "jurusan" => "Software Engineer",

    //     ],
    //     [
    //         "nama" => "Giselle",
    //         "nrp" => "79798",
    //         "email" => "gg@gmail.com",
    //         "jurusan" => "Seni Muzik",

    //     ]
    //     ];

    
    private $table = 'mahasiswa';
    private $db;

    
    public function __construct()
    {
        $this->db = new Database;   
    }
    
    
    
        public function getAllMahasiswa() 
        {
            // // return $this->mhs;

            // $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
            // $this->stmt->execute();
            // return $this->stmt->fetchAll(PDO::FETCH_ASSOC);

            $this->db->query('SELECT * FROM ' . $this->table);
            return $this->db->resultSet(); 
        }

        public function getMahasiswaById($id) 
        {
            
            $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id'); 
            $this->db->bind('id', $id); 
            return $this->db->single(); 
        }

        public function tambahDataMahasiswa($data) 
        {
            $query = "INSERT INTO mahasiswa VALUES ('', :nama, :nrp, :email, :jurusan)";
            $this->db->query($query); 
            $this->db->bind('nama', $data['nama']); 
            $this->db->bind('nrp', $data['nrp']); 
            $this->db->bind('email', $data['email']);
            $this->db->bind('jurusan', $data['jurusan']); 

            $this->db->execute();

            return $this->db->rowCount();
        }

        public function deleteDataMahasiswa($id) 
        {
            $query = "DELETE FROM mahasiswa WHERE id = :id";
            $this->db->query($query); 
            $this->db->bind('id', $id); //$data['nama']

            $this->db->execute();

            return $this->db->rowCount();
        }

        public function editDataMahasiswa($data) 
        {
            $query = "UPDATE mahasiswa SET 
                            nama = :nama, 
                            nrp = :nrp, 
                            email = :email, 
                            jurusan = :jurusan 
                            WHERE id = :id";

            $this->db->query($query); 
            $this->db->bind('nama', $data['nama']); 
            $this->db->bind('nrp', $data['nrp']); 
            $this->db->bind('email', $data['email']); 
            $this->db->bind('jurusan', $data['jurusan']); 
            $this->db->bind('id', $data['id']);

            $this->db->execute();

            return $this->db->rowCount();
        }

        public function cariDataMahasiswa() 
        {
            $keyword = $_POST['keyword']; //textarea seacrh
            $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
            $this->db->query($query);
            $this->db->bind('keyword', "%$keyword%");

            return $this->db->resultSet();
        }

} 

?>