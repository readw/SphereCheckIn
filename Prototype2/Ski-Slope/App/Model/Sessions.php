<?php 
    class Sessions {
        
        public function getTableTitles($conn, $table) {
            $sql = "SELECT * FROM ".$table.";";
            $result = mysqli_query($conn, $sql);

            $fields = array();
            
            while ($field = mysqli_fetch_field($result)) {
                array_push($fields, $field);
            }
            
            return $fields;
        }
        
        public function getSessionList($conn) {
            $sql = "SELECT * FROM Session";
            $result = mysqli_query($conn, $sql);
            $rows = array();
            
            while($row = mysqli_fetch_row($result)){
                array_push($rows, $row);
            }
            
            return $rows;
        }
        
    }
?>