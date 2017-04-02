<form action="" method="GET">     
    <div class="filter-group">
        <input type="text" class="form-control" placeholder="Session ID" name="sessionsId" 
               value="<?php if(isset($_GET['sessionsId'])){ echo($_GET['sessionsId']); }  ?>">
    </div>

    <div class="filter-group input-group">
        <span class="input-group-addon">
            <i class="glyphicon glyphicon-calendar"></i>
        </span>
        <input type="text" class="form-control selectDate" placeholder="DD-MM-YYYY" name="date" 
               value="<?php if(isset($_GET['date'])){ echo($_GET['date']); }  ?>" />
    </div>
    
    <div class="row">
        <div class="filter-group col-xs-6 col-sm-12">
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-time"></i>
                </span>
                <input type="text" class="form-control" placeholder="Start Time" name="startTime" 
                    value="<?php if(isset($_GET['startTime'])){ echo($_GET['startTime']); }  ?>">
            </div>
        </div>
    
        <div class="filter-group col-xs-6 col-sm-12">
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-time"></i>
                </span>
                <input type="text" class="form-control" placeholder="End Time" name="endTime" 
                    value="<?php if(isset($_GET['endTime'])){ echo($_GET['endTime']); }  ?>">
            </div>
        </div>
    </div>

    <!-- TODO: Automate the generation of the options from DB Modal. -->
    <div class="filter-group">
        <select class="form-control" name="type">
            <option value="none" disabled <?php if(!isset($_GET['type'])) { echo('selected="selected"'); } ?>>
                Select Session Type...
            </option>
            
            <option value="4" <?php if(isset($_GET['type'])) { if($_GET['type']=='4'){ echo('selected="selected"'); }} ?>>
                All
            </option>

            <option value="1" <?php if(isset($_GET['type'])) { if($_GET['type']=='1'){ echo('selected="selected"'); }} ?>>
                Standard
            </option>

            <option value="2" <?php if(isset($_GET['type'])) { if($_GET['type']=='2'){ echo('selected="selected"'); }} ?>>
                Member
            </option>

            <option value="3" <?php if(isset($_GET['type'])) { if($_GET['type']=='3'){ echo('selected="selected"'); }} ?>>
                Instructor
            </option>
        </select>
    </div>

    <div class="filter-group">
        <input type="text" class="form-control" placeholder="Instructor ID" name="instructor" 
               value="<?php if(isset($_GET['instructor'])){ echo($_GET['instructor']); }  ?>" maxlength="6">
    </div>

    <div class="filter-group">
        <button class="btn btn-info btn-block" type="submit" name="searchSessions">
            <span class="glyphicon glyphicon-magnify"></span>
            Search
        </button>
    </div>
</form>