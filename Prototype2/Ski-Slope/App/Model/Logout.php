<?php

    class Logout 
    {
        function __construct() {
            session_destroy();
        }
    }

?>