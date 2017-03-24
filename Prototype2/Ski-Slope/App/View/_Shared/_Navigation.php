<?php if(isset($_REQUEST['user_permission'])) { ?>

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid navbar-container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="/Home">
                    <img alt="SkiSlopeLogo" src="/Public/Media/Images/logo.png" />
                </a>

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse">

                <ul class="nav navbar-nav">
                    <li>
                        <a href="/TimeTable/Sessions">
                            <span class="glyphicon glyphicon-calendar"></span>
                            Timetable
                        </a>
                    </li>
                    <?php if ($_REQUEST['user_permission'] == 1 || $_REQUEST['user_permission'] == 3) { ?>
                        <li>
                            <a href="/CheckIn">
                                <span class="glyphicon glyphicon-time"></span>
                                Check-In
                            </a>
                    </li>
                    <?php } ?>
                    <?php if ($_REQUEST['user_permission'] == 3) { ?>
                        <li>
                            <a href="/Admin">
                                <span class="glyphicon glyphicon-dashboard"></span>
                                Admin
                            </a>
                    </li>
                    <?php } ?>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <span class="glyphicon glyphicon-user"></span>
                            <?php echo($_REQUEST['user']) ?>
                            <span class="caret"></span>
                        </a>
                        <?php if ($_REQUEST['user'] != 'Guest'){ ?>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="">
                                    <span class="glyphicon glyphicon-cog"></span>
                                    User Settings
                                </a>
                            </li>
                            <?php if ($_REQUEST['user_permission'] == 3) { ?>
                                <li>
                                    <a href="">
                                        <span class="glyphicon glyphicon-wrench"></span>
                                        Admin Settings
                                    </a>
                            </li>
                            <?php } ?>
                            <li role="separator" class="divider"></li>
                            <li>
                                <!--<a href="Logout">-->
                                <a href="/Home/Logout">
                                    <span class="glyphicon glyphicon-log-out"></span>
                                    Log-Out
                                </a>
                            </li>
                        </ul>
                        <?php } ?>
                    </li>
                </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

<?php } ?>