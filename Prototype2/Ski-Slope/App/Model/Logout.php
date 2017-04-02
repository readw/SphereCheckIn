<?php

    class Logout 
    {
        function __construct() {
            session_unset();
            session_destroy();
        }
    }

?>