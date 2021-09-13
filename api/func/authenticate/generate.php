<?php

function regenerate_token(){
    if( !empty($_SESSION['TOKEN'])) { unset($_SESSION['TOKEN']); $_SESSION['TOKEN'] = bin2hex(random_bytes(32)); } else { $_SESSION['TOKEN'] = bin2hex(random_bytes(32)); }
}
