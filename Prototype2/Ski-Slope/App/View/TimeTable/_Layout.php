<?php
    //TODO: Route page to display that they are on timetable.
    //TODO: Set navigation tab of timetable to active.
    //TODO: Retrieve data from timetable, to automate display.
    //TODO: Update select statements to be collected from database.
?>
<div class="container margin-top-50">
    <h1>Timetable</h1>
    <div class="info-sm">
        <div class="info-box hidden-lg hidden-md">
            <p>
                Here you can find the times of all available sessions scheduled for our Slopes, as well as details about each session so you can make the most out of your day out. Please use the filter below to find sessions that match your requirements:
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 col-md-3 filters">
            <h2>Filter Sessions</h2>
            <?php include($_SERVER['DOCUMENT_ROOT']."/App/View/TimeTable/Partials/_searchField.php") ?>
        </div>
        <div class="col-sm-8 col-md-9">
            <h2>Times Available</h2>
            <div class="info-lg">
                <div class="info-box hidden-sm hidden-xs">
                    <p>
                        Here you can find the times of all available sessions scheduled for our Slopes, as well as details about each session so you can make the most out of your day out. Please use the filter below to find sessions that match your requirements:
                    </p>
                </div>
            </div>
            <?php include($_SERVER['DOCUMENT_ROOT']."/App/View/TimeTable/Partials/_tableDisplay.php") ?>
        </div>
    </div>
</div>

<script>
    
</script>