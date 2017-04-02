<div class="modal fade" id="sessionModal<?php echo($session[0]); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Session <?php echo($session[0]); ?></h4>
            </div>
            <div class="modal-body sessions">
                <dl>
                <?php
                    echo "<dt>Session ID:</dt><dd>".$session[0]."</dd>";
	                echo "<dt>Session Date:</dt><dd>".$session[2]."</dd>";
	                echo "<dt>Session Times:</dt><dd>".$session[3]." - ".$session[4]."</dd>";
                    if ($session[5] != '') {
                        echo "<dt>Assigned Instructor:</dt><dd>".$session[5]."</dd>";
                    } else {
                        echo "<dt>Assigned Instructor:</dt><dd>None</dd>";
                    }
                    echo("<dt>Session Spaces:</dt><dd>".$session[6]."</dd>");
                    echo("<dt>Session Price:</dt><dd>£".$session[7]."</dd>");
                ?>
                </dl>
                <button class="btn btn-warning btn-block">
                    Book Session
                    <span class="glyphicon glyphicon-book"></span>
                </button>
                
                <button class="btn btn-danger btn-block">
                    Cancel Session
                    <span class="glyphicon glyphicon-remove"></span>
                </button>
            </div>
        </div>
    </div>
</div>