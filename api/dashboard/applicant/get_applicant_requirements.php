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
                                        a.requirement_status as `status`,
                                        a.requirement_id,
                                        b.name as `requirement_name`,
                                        a.file_name as `file_name`,
                                        a.file_directory as `file_dir`
                                
                                FROM 
                                        applicant_requirement_records a
                                INNER JOIN
                                        requirement_list b
                                ON
                                        a.requirement_id = b.id
                                INNER JOIN
                                        applicant_accounts c
                                ON
                                        a.applicant_id = c.id

                                WHERE
                                        c.id = ?
                        ';

                $stmt = $db->connect()->prepare($sql);

                $data = [$_POST['id']];

                $output = $db->get_( $sql, $data );

                if ( !empty( $output ) )
                {
                        echo json_encode($output);
                }
                else
                {
                        echo json_encode('ERROR');
                }

        }





