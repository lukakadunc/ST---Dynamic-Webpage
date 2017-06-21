<?php
if(isset($_SESSION['username']))
{

    unset($_SESSION['username'], $_SESSION['userid']);
    session_unset();
}

