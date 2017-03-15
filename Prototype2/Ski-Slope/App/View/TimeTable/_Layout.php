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
            <?php include($_SERVER['DOCUMENT_ROOT']."/App/View/TimeTable/Partials/_searchField.php") ?>
        </div>
        <div class="col-sm-8 col-md-9">
            <h2>Times Available</h2>
            <?php include($_SERVER['DOCUMENT_ROOT']."/App/View/TimeTable/Partials/_tableDisplay.php") ?>
        </div>
    </div>
</div>

<script>
    
</script>