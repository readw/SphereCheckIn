<?php
    class dbConnect {
     
        public function __construct(){
            $this->servername = "localhost";
            $this->username = "root";
            $this->password = "test";
            $this->database = "Sphere-Slopes";
        }
   
        public function connect(){
            $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
            if ($conn) {
                return $conn;
            } else {
?>
<div class="alert alert-danger" role="alert">
    <p>
        <b>Connection Error: <?php echo(mysqli_connect_error()); ?></b>
    </p>
</div> 
<?php
            }
        }
    }

?>