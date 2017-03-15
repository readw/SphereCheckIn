<form action="." method="get">     
    <div class="filter-group">
        <input type="text" class="form-control" placeholder="Session ID" name="usersId" 
               value="<?php if(isset($_GET['usersId'])){ echo($_GET['usersId']); }  ?>">
    </div>

    <div class="filter-group">
        <input type="text" class="form-control" placeholder="DD-MM-YYYY" name="date" 
               value="<?php if(isset($_GET['date'])){ echo($_GET['date']); }  ?>"/>
    </div>

    <div class="filter-group">
        <select class="form-control" name="type">
            <option value="none" disabled <?php if(!isset($_GET['type'])) { echo('selected="selected"'); } ?>>
                Select Session Type...
            </option>

            <option value="free" <?php if(isset($_GET['type'])) { if($_GET['type']=='free'){ echo('selected="selected"'); }} ?>>
                Free sessions
            </option>

            <option value="member" <?php if(isset($_GET['type'])) { if($_GET['type']=='member'){ echo('selected="selected"'); }} ?>>
                Membership sessions
            </option>

            <option value="instructor" <?php if(isset($_GET['type'])) { if($_GET['type']=='instructor'){ echo('selected="selected"'); }} ?>>
                Instructor sessions
            </option>
        </select>
    </div>

    <div class="filter-group">
        <input type="text" class="form-control" placeholder="Instructor name" name="instructor" 
               value="<?php if(isset($_GET['instructor'])){ echo($_GET['instructor']); }  ?>">
    </div>

    <div class="filter-group">
        <button class="btn btn-info btn-block" type="submit" name="submit">
            <span class="glyphicon glyphicon-magnify"></span>
            Search
        </button>
    </div>
</form>