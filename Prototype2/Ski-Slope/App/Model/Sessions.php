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
        
        public function filterSessionList($conn, $params) {
            if ($params['sessionsId']=='' && $params['date']=='' && ($params['type']=='') && $params['instructor']=='') {
                $rows = $this->getSessionList($conn);
                return $rows;
            } else {
                $whereClauses = array();
                $sql = "SELECT * FROM Session";
                if ($params['sessionsId']!='') {
                    $whereClauses[] = "sessionId=".mysqli_real_escape_string($conn, $params['sessionsId']);
                }
                if ($params['date']!='') {
                    $whereClauses[] = "DATE(sessionDate)='".$params['date']."'";
                }
                if ($params['type']!='' && $params['type']!='4') {
                    $whereClauses[] = "type=".mysqli_real_escape_string($conn,$params['type']);
                }
                if ($params['startTime']!='') {
                    if ($params['startTime'] == ''){
                        $params['startTime'] = '00:00:00';
                    }
                    $whereClauses[] = "CAST(startTime as TIME) >= ".mysqli_real_escape_string($conn,$params['startTime']);
                }
                if ($params['endTime']!='') {
                    if ($params['endTime'] == ''){
                        $params['endTime'] = '23:59:59';
                    }
                    $whereClauses[] = "CAST(endTime as TIME) <= ".mysqli_real_escape_string($conn,$params['endTime']);
                }
                if ($params['instructor']!='') {
                    $whereClauses[] = "assignedInstructor=".mysqli_real_escape_string($conn,$params['instructor']);
                }
                
                if (count($whereClauses) > 0) {
                    $where = ' WHERE '.implode(' AND ',$whereClauses);
                    $sql .= $where;
                    echo($sql);
                }
                
                $result = mysqli_query($conn, $sql);
                $rows = array();
                
                if ($result) {
                    while($row = mysqli_fetch_row($result)){
                        array_push($rows, $row);
                    }
                }
                
                return $rows;
            }
        }
        
    }
?>