<?php 
    session_start();
    header('Connent-Type: application/json; charset=utf-8');

    $received_data = json_decode(file_get_contents("php://input"));
    $method = $received_data->method;
    $action = $received_data->action;

    if($action == 'registerStudent' && $method == 'POST'){
        $student_id = $received_data->student_id;
        $prefix = $received_data->prefix;
        $fname = $received_data->fname;
        $lname = $received_data->lname;
        $gender = $received_data->gender;
        $class_no = $received_data->class_no;
        $no = $received_data->no;
        $password_con = md5($received_data->password_con);
        require_once("connect.php");
        $return = array();
        $sql = "INSERT INTO students (std_id, std_prefix, std_fname, std_lname, std_gender, std_class, std_no, `std_password`) VALUES('$student_id', '$prefix', '$fname','$lname','$gender','$class_no','$no','$password_con')";

        if($conn -> query($sql)){
            $return = array(
                'resultCode' => '200',
                'msg' => 'เพิ่มข้อมูลสำเร็จ'
            );
        }else{
            $return = array(
                'resultCode' => '503',
                'msg' => 'เพิ่มข้อมูลไม่สำเร็จ'
            );
        }
        echo json_encode($return, JSON_UNESCAPED_UNICODE);
    }elseif($action == 'registerTeacher' && $method == 'POST'){
        $teacher_id = $received_data->teacher_id;
        $fname = $received_data->fname;
        $lname = $received_data->lname;
        $password_con = md5($received_data->password_con);
        require_once("connect.php");
        $return = array();
        $sql = "INSERT INTO teachers (tea_id,tea_fname,tea_lname,tea_password) VALUES('$teacher_id','$fname','$lname','$password_con')";

        if($conn -> query($sql)){
            $return = array(
                'resultCode' => '200',
                'msg' => 'เพิ่มข้อมูลสำเร็จ'
            );
        }else{
            $return = array(
                'resultCode' => '503',
                'msg' => 'เพิ่มข้อมูลไม่สำเร็จ'
            );
        }
        echo json_encode($return, JSON_UNESCAPED_UNICODE);
    }elseif($action == 'loginStudent' && $method == 'POST'){
        $student_id = $received_data->student_id;
        $password_con = md5($received_data->password_con);
        require_once("connect.php");
        $return = array();
        $sql = "SELECT * FROM students WHERE std_id = '$student_id' AND std_password = '$password_con' ";
        $result = $conn -> query($sql);
            if($result -> num_rows == 1){
                while($row = $result -> fetch_assoc()){
                    $_SESSION['student_id'] = $row['std_id'];
                    $_SESSION['std_full'] = $row['std_fname']." ".$row['std_lname'];
                    $_SESSION['std_class'] = $row['std_class'];
                    $return = array(
                        'resultCode' => '200',
                        'msg' => 'ยินดีต้อนรับเข้าสู่ระบบ'
                    );
                }
                
            }else{
            $return = array(
                'resultCode' => '503',
                'msg' => 'รหัสประจำตัวนักเรียน หรือรหัสผ่านไม่ถูกต้อง'
            );
        }
        echo json_encode($return, JSON_UNESCAPED_UNICODE);
    }elseif($action == 'loginTeacher' && $method == 'POST'){
        $teacher_id = $received_data->teacher_id;
        $password_con = md5($received_data->password_con);
        require_once("connect.php");
        $return = array();
        $sql = "SELECT * FROM teachers WHERE tea_id = '$teacher_id' AND tea_password = '$password_con' ";
        $result = $conn -> query($sql);
  
            if($result -> num_rows == 1){
                while($row = $result -> fetch_assoc()){
                    $_SESSION['teacher_id'] = $row['tea_id'];
                    $_SESSION['tea_full'] = $row['tea_fname']." ".$row['tea_lname'];
                    $return = array(
                        'resultCode' => '200',
                        'msg' => 'ยินดีต้อนรับเข้าสู่ระบบ'
                    );
                }
                
            }else{
                $return = array(
                    'resultCode' => '503',
                    'msg' => 'เลขบัตรประชาชน หรือรหัสผ่านไม่ถูกต้อง'
                );
            }
        
        echo json_encode($return, JSON_UNESCAPED_UNICODE);
    }
    
?>