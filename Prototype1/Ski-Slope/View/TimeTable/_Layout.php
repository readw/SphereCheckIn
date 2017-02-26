<?php
    //TODO: Route page to display that they are on timetable.
    //TODO: Set navigation tab of timetable to active.
    //TODO: Retrieve data from timetable, to automate display.
    //TODO: Update select statements to be collected from database.
?>
<div class="container margin-top-50">
    <h1>Sphere-Slopes Timetable</h1>
    <div class="row">
        <div class="col-sm-4 col-md-3 filters">
            <h2>Filter Sessions</h2>
            <form action="." method="get">
                
                <div class="filter-group">
                    <input type="text" class="form-control" placeholder="ID" name="usersID">
                </div>
                
                <div class="filter-group">
                    <input type="text" class="form-control" placeholder="DD-MM-YYYY" name="date" />
                </div>
                
                <div class="filter-group">
                    <select class="form-control" name="type">
                        <option>Select a session type</option>
                        <option>Free session</option>
                        <option>Membership session</option>
                        <option>Instructor session</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <input type="text" class="form-control" placeholder="Instructor name" name="instuctor">
                </div>
                
                <div class="filter-group">
                    <button class="btn btn-info btn-block" type="submit" name="submit">
                        <span class="glyphicon glyphicon-magnify"></span>
                        Search
                    </button>
                </div>
            </form>
        </div>
        <div class="col-sm-8 col-md-9">
            <h2>Times Available</h2>
            <div class="timetable"></div>
            <?php print_r($_REQUEST['dateList']); ?>
        </div>
    </div>
</div>

<script>
    
</script>