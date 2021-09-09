<?php

include_once '../../../database/database.php';

    $output = false;

    header('Content-Type: application/json');
    
    if( isset($_POST) )
    {
        $db = new db();

        $sql = '  
                    SELECT 
                            a.id,
                            concat(a.lastname,", ", a.firstname," " a.middlename) as `name`,
                            b.name as `program` 
                    FROM 
                            applicant_information a
                    INNER JOIN
                            program_list b
                    ON
                            a.program_id = b.id
                    INNER JOIN
                            applicant_accounts c
                    ON
                            a.applicant_id = c.id

                    INNER JOIN
                            school_List d
                    ON  
                            b.school_id = d.id
                    WHERE
                            a.status = ?
                ';


        $stmt = $db->connect()->prepare($sql);

        $stmt ->execute(["COMPLETE"]);

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

    



