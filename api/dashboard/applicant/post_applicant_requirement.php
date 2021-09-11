<?php

    include_once '../../../database/database.php';

    $output = false;

    header('Content-Type: application/json');

    $uploads_dir = '../../../storage/files';

    $feedback = [
        [
            //0
            'status'=>'200',
            'feedback'=>'Requirement Submission Successful!',
        ],
        [
            //1
            'status'=>'201',
            'feedback'=>'Internal Server Error',
            'sub_feedback'=>'Please try again',
        ],
        [
            //2
            'status'=>'414',
            'feedback'=>'Requirement Submission Failed!',
        ]

    ];

    if (isset($_POST)){

        $output = array();

        if ($_FILES){

            $temp = explode('.pdf',strtolower( $_FILES['file']['name'] ));

            $file_name = sha1($temp[0]).'.pdf';
    
            $db = new db();
    
            $sql = '
                        UPDATE
                                applicant_requirement_records
                                   
                        SET  
                                  
                                applicant_id = :applicant_id,
                                requirement_id = :requirement_id,
                                file_name = :file_name,
                                file_directory = :file_directory,
                                date_submitted = :date_submitted,
                                requirement_status = :requirement_status
                        WHERE
                                id = :id
                                ';
    
            $value = [
                        ":applicant_id" => $_POST['applicant_id'],
                        ":requirement_id" => $_POST['requirement_id'],
                        ":id" => $_POST['record_id'],
                        ":file_name" => $file_name,
                        ":file_directory" => $uploads_dir,
                        ":date_submitted" => date('Y-m-d'),
                        ":requirement_status" =>'SUBMITTED'
            ];
    
    
            $insert_stmt = $db->connect()->prepare($sql);
    
            $insert_stmt->execute($value);

            move_uploaded_file($_FILES['file']['tmp_name'], $uploads_dir.'/'.$file_name);
            
            echo json_encode($feedback[0]);
            
        }
        else
        {
            die('REQUIREMENT NOT FOUND!');
        }
    }
    else
    {
        die('ERROR');
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