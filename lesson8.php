
<?php
    
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "";//Enter The DataBase Name here

    //For Connection of DataBase
    function connect() {
        $connnection = mysqli_connect($this->host, $this->username, $this->password, $this->db);
        return $connnection;
    }
?>