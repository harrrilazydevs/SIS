<?php

    include_once '../../../database/database.php';
    include_once '../../func/files.php';

    $output = false;

    if (!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    
    header('Content-Type: application/json');

    $uploads_dir = '../../../storage/files';
    $file_dl_dir = '../storage/files';

    $feedback = [
        [
            //0
            'status'=>'200',
            'feedback'=>'Requirement has been successfully removed!',
        ],
        [
            //1
            'status'=>'400',
            'feedback'=>'Bad Request!',
        ]
    ];

    $db = new db();

    if ( isset($_POST) && $_POST['token'] === $_SESSION['TOKEN']){

        $output = [];

        $data = [];
    
        ( get_applicant_data() == 500 ) ?  $output = ['status'=>'500','feedback'=>'Get query fail!'] : $data = get_applicant_data();
        
        if ( empty($output) )
        {
            if ( delete_file( '../../'.$data[0]['file_directory'] ) ){

                $sql = '
                        UPDATE
                                applicant_requirement_records
                        SET  
                                file_name = "",
                                file_directory = "",
                                date_submitted = "",
                                requirement_status = "PENDING"
                        WHERE
                                id = :id
                                ';

                $value = [
                            ":id" => $_POST['id']
                ];

                ($db->post_($sql,[":id" => $_POST['id']]) == 500 ) ?  $output = ['status'=>'500','feedback'=>'Get query fail!'] : $output = $feedback[0];
            }
        }

        echo json_encode($output);
    }
    else
    {
        echo json_encode($feedback[1]);
    }

    function get_applicant_data()
    {
        $sql = '
                    SELECT
                            file_directory
                    FROM  
                            applicant_requirement_records
                    WHERE
                            id = :id
                ';

        return $GLOBALS['db']->get_( $sql,  [$_POST['id']] );
    }
   


    

    // // move_uploaded_file($_FILES['file']['tmp_name'], $uploads_dir.'/'.$file_name);

    // exec_import($_POST, $file_name, $course_list);

    // // echo json_encode($feedback[0]);

    // function exec_import( $data, $file, $course_list)
    // {

      

    // }


    // function exec_import( $data, $file, $course_list)
    // {

    //     $db = new db();

    //     $status = false;

    //     $count = count( $data );
        

    //     $counter = 1;

    //     $values = array();

    //     $sql = '
    //                 INSERT INTO
    //                             monitoring_table
    //                             (
    //                                 student_no,
    //                                 school_id,
    //                                 year,
    //                                 academic_year,
    //                                 semester,
    //                                 date_enrolled,
    //                                 enrollment_type,
    //                                 inputted_by,
    //                                 date_created,
    //                                 date_updated,
    //                                 file_dir
    //                             )
    //                 VALUES
    //                             (
    //                                 :student_no, 
    //                                 :school_id, 
    //                                 :year, 
    //                                 :academic_year, 
    //                                 :semester, 
    //                                 :date_enrolled, 
    //                                 :enrollment_type, 
    //                                 :inputted_by, 
    //                                 :date_created, 
    //                                 :date_updated, 
    //                                 :file_dir
    //                             )';

    //     $password = generate_password();

    //     $value = [
    //         ":student_no" => $data['student_no'],
    //         ":school_id" => $data['school_id'],
    //         ":year" => $data['year'],
    //         ":academic_year" => $data['academic_year'],
    //         ":semester" => $data['semester'],
    //         ":date_enrolled" => $data['date_enrolled'],
    //         ":enrollment_type" => $data['enrollment_type'],
    //         ":inputted_by" => $data['inputted_by'],
    //         ":date_created" => date('Y-m-d'),
    //         ":date_updated" => null,
    //         ":file_dir" => $file
    //     ];

    //     $host = "localhost";
    //     $uid = "root";
    //     $pwd = "";
    //     $dbName = "ld_systems_sis";

    //     $pdo = new PDO('mysql:host='.$host.'; dbname='.$dbName,$uid,$pwd, [PDO::ATTR_EMULATE_PREPARES=>false]);

    //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //     $insert_stmt = $pdo->prepare($sql);

    //     $insert_stmt->execute($value);

    //     $newId = $pdo->lastInsertId();

    //     if( isset($newId) )
    //     {
    //         foreach ($GLOBALS['course_list'] as $key => $value) {

    //             $sql = '
    //                         INSERT INTO
    //                                     monitoring_course_table
    //                                     (
    //                                         monitoring_student_id ,
    //                                         name
    //                                     )
    //                         VALUES
    //                                     (
    //                                         :monitoring_student_id, 
    //                                         :name
    //                                     )';

    //             $ar_val = [
    //                 ":monitoring_student_id" => $newId,
    //                 ":name" => $value
    //             ];

    //             $stmt = $db->connect()->prepare($sql);

    //             $stmt->execute( $ar_val );
    //         }
    //     }

    // }