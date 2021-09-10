<?php

include_once '../../database/database.php';

    $output = false;

    header('Content-Type: application/json');
    
    if( isset($_POST) )
    {
        $db = new db();

        $sql = '  
                    SELECT 
                           file_dir,
                           date_enrolled,
                            inputted_by 
                      
                            
                    FROM 
                            monitoring_table 
                 
                ';

        $stmt = $db->connect()->prepare($sql);

        $stmt->execute();

        $output = $stmt->fetchAll();

        if ( count( $output ) > 0 )
        {
            echo json_encode($output);
        }
        else
        {
            echo json_encode('ERROR');
        }
        
    }

    



