<div class="timetable">
    <?php 
        if(isset($_REQUEST['sessions'])) {
    ?>
    <table class="table table-striped table-responsive table-hover">
        <thead>
            <tr>
                <th>
                    Date
                </th>
                <th>
                    Start Time
                </th>
                <th>
                    End Time
                </th>
                <th>
                    Spaces
                </th>
                <th>
                    Type
                </th>
                <?php
                    if ($_REQUEST['user_permission'] >= 1) {
                ?>
                    <th>
                        Book
                    </th>
                <?php
                    }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
                $sessions = array();
                $counter = 0;

                foreach($_REQUEST['sessions'] as $session){
                    if ($session[6] > 0) {
                        echo "<tr>";
                        echo "<td>".$session[2]."</td>";
                        echo "<td>".$session[3]."</td>";
                        echo "<td>".$session[4]."</td>";
                        echo "<td>".$session[6]."</td>";
                        if ($session[1] == 1) {
                            echo "<td>Free</td>";
                        } 
                        elseif ($session[1] == 2) {
                            echo "<td>Member</td>";
                        }
                        elseif ($session[1] == 3) {
                            echo "<td>Instructor</td>";
                        }


                        if ($_REQUEST['user_permission'] >= 1){
                            echo "<td>";

                            echo (
                                "<a class='btn btn-block btn-warning margin-bottom-5' data-toggle='modal' data-target='#sessionModal".$counter."' id='booking-'".$session[0]."'>
                                    Book
                                    <span class='glyphicon glyphicon-book'></span>
                                </a>"
                            );
                            
                            include($_SERVER['DOCUMENT_ROOT']."/App/View/Session/_Layout.php");

                            if ($_REQUEST['user_permission'] == 3){
                                echo(
                                    "<a class='btn btn-block btn-danger' data-toggle='modal' data-target='#editSessionModal".$counter."' id='edit-".$session[0]."'>
                                        Edit
                                        <span class='glyphicon glyphicon-edit'></span>
                                    </a>");
                                
                                include($_SERVER['DOCUMENT_ROOT']."/App/View/Admin/Partials/_editSessions.php");
                            }

                            echo "</td>";
                        } 
                        array_push($sessions, $session[0]);
                        echo "</tr>";
                    }
                
                $counter++;
                continue;
                }
            ?>
        </tbody>
    </table>
    <?php
        }
    ?>
</div>