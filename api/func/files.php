<?php 
function delete_file($file){ if (!unlink($file)) { return false; } else { return true; } }