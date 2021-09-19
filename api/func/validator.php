<?php

include_once 'authenticate/generate.php';

function required_fields_validated( $REQUIRED_FIELDS, $_POSTDATA, $_FILEDATA = array(), $FILEEXTS = array()){

    $STATUS = 0;
    $FEEDBACK = [];
    $POST_DATA_KEYS = array_keys( $_POSTDATA );
    $REQUIRED_DATA_KEYS = array_keys( $REQUIRED_FIELDS );

    // var_dump($POST_DATA_KEYS);
    // var_dump($REQUIRED_DATA_KEYS);

    // check if token matches
    $_SESSION['TOKEN'] !== $_POSTDATA['token'] ? $STATUS = 400 : regenerate_token();

    // check if fields are satisfied
    !isset_fields( $POST_DATA_KEYS, $REQUIRED_DATA_KEYS ) ? $STATUS = 403 : '';

    // if status=0 status conditions are satisfied
    if ($STATUS === 0){

        // validate all fields
        foreach ($REQUIRED_FIELDS as $key => $v) {
            if ( $v == 'alphanum' )
            {
                if( ctype_alnum( $_POSTDATA[$key] ) === false || is_numeric( $_POSTDATA[$key] ))
                {
                    array_push($FEEDBACK, [415,$key,' should consist of numbers and letters.']);
                }
            }
            else if ( $v == 'email' )
            {
                if( filter_var( $_POSTDATA[$key] , FILTER_VALIDATE_EMAIL) === false  )
                {
                    array_push($FEEDBACK, [$key, 'please enter a valid email']);
                }
            }
            else if ( $v == 'numeric' )
            {
                if ( is_numeric($_POSTDATA[$key]) === false  )
                {
                    array_push($FEEDBACK, [$key, 'input must be numbers.']);
                }
            }
            else if ( $v == 'alpha' )
            {
                if ( ctype_alpha(str_replace(' ','',$_POSTDATA[$key])) === false )
                {
                    array_push($FEEDBACK, [$key, 'input must be letters.']);
                }
            }
            else if ( $v == 'file' )
            {
                if ( isset($_FILEDATA) === false)
                {
                    array_push($FEEDBACK, ['FILE NOT FOUND!']);
                }
                else
                {
                    $exp = explode('.', $_FILEDATA[$key]['name'] );
                    $ext = end($exp);
                    $file_ext = strtolower($ext);

                    if( in_array($file_ext, $FILEEXTS) === false )
                    {
                        array_push($FEEDBACK, ['FILE TYPE INVALID!']); 
                    }
                }
            }
        }

        // check if no feedback from validation
        isset($FEEDBACK) ? $STATUS = $FEEDBACK : '';
    }

    return $STATUS;
}

function isset_fields($b, $a) {

    $at = array_flip($a);

    $d = array();

    foreach ($b as $i)
    {
        if (!isset($at[$i])) 
        {
            return false;
        }
        else
        {
            return true;
        }
    }
    
}

function format_user_input($_POSTDATA){

    $output = [];
   
    foreach ($_POSTDATA as $key => $v) 
    {
        $output[$key] = substr(strtolower($v),0,64);
    }

    return $output;
}

function format_user_file($_FILEDATA){

    $output = [];
   
    foreach ($_FILEDATA as $key => $v) 
    {
        $output[$key] = substr(strtolower($v),0,64);
    }
    
    return $output;
}

function birth_date_valid($date){

    $dob = new DateTime($date);
        
    $now = new DateTime();
     
    $difference = $now->diff($dob);
     
    $age = $difference->y;
    
    if($age >= 18)
    return true;
    else
    return false;
}

function validate_file(){
    
}


?>