<?php

static $authenticated = false;

function authenticate(){
    return $GLOBALS['authenticated'];
}

function set_authenticate($value){
    $GLOBALS['authenticated'] = $value;
}