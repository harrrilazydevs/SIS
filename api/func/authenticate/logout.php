<?php

session_destroy();
setcookie(session_name(), session_id(), 1); // to expire the session
$_SESSION = [];