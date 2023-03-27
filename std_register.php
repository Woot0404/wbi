<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="img/987.png">
    <title>Web Based Instruction</title>
    <?php require('components/header.php') ?>
    <style>
    * {
        font-family: 'Noto Sans Thai', sans-serif;
    }

    body {
        background-image: url('img/55555.png');
        background-repeat: no-repeat;
        background-size: cover;
    }

    .card-hover:hover {
        transform: scale(1.03);
        cursor: pointer;
    }
    </style>
</head>

<body>
    <div class="row p-0 m-0 mt-5 d-flex justify-content-center aligns-items-center" style="height: 90vh;">
        <div class="col-md-6 px-0 card my-auto mx-3 border-0 py-4 px-5 shadow animate__animated animate__bounceIn"
            style="background-color: #3399ff;">
            <h3 class="text-center mt-4";>ลงทะเบียนใช้งานระบบ สำหรับนักเรียน</h3>
            <div class="card-body">
                <div class="col-12 justify-content-center">
                    <form id="register_student" name="register_student">
                        <div class="mb-3">
                            <label for="student_id" class="form-label">รหัสประจำตัวนักเรียน</label>
                            <input type="text" class="form-control" id="student_id" name="student_id"
                                placeholder="รหัสประจำตัวนักเรียน" autocomplete="off" required>
                            <div class="form-text" style="color: #000000;">กรุณากรอกตามความจริง เพื่อความถูกต้องในการใช้งาน
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="prefix" class="form-label">คำนำหน้า</label>
                                <select class="form-select" id="prefix" name="prefix" autocomplete="off" required>
                                    <option selected disabled>เลือก...</option>
                                    <option value="เด็กชาย">เด็กชาย</option>
                                    <option value="เด็กหญิง">เด็กหญิง</option>
                                    <option value="นาย">นาย</option>
                                    <option value="นางสาว">นางสาว</option>
                                    <option value="นาง">นาง</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="fname" class="form-label">ชื่อ</label>
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="ชื่อจริง"
                                    autocomplete="off" required>
                            </div>
                            <div class="col">
                                <label for="lname" class="form-label">นามสกุล</label>
                                <input type="text" class="form-control" id="lname" name="lname" placeholder="นามสกุล"
                                    autocomplete="off" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="gender" class="form-label">เพศ</label>
                                <select class="form-select" id="gender" name="gender" autocomplete="off" required>
                                    <option selected disabled>เลือก...</option>
                                    <option value="ชาย">ชาย</option>
                                    <option value="หญิง">หญิง</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="class" class="form-label">ชั้น</label>
                                <select class="form-select" id="class" name="class" autocomplete="off" required>
                                    <option selected disabled>เลือก...</option>
                                    <option value="S1">ชั้นมัธยมศึกษาปีที่ 1</option>
                                    <option value="S2">ชั้นมัธยมศึกษาปีที่ 2</option>
                                    <option value="S3">ชั้นมัธยมศึกษาปีที่ 3</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="no" class="form-label">เลขที่</label>
                                <input type="text" class="form-control" id="no" name="no" placeholder="เลขที่"
                                    autocomplete="off" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">รหัสผ่าน</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="รหัสผ่าน" autocomplete="off" required>
                        </div>
                        <div class="gap-2 col-8 mx-auto d-flex justify-content-center">
                            <a href="index.php" type="button" class="col-12 col-md-6  btn btn-secondary">ยกเลิก</a>
                            <button type="submit" class="col-12 col-md-6 btn btn-primary">ลงทะเบียน</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php require "components/linkscript.php" ?>
    <script>
    const registerStudent = document.getElementById('register_student');
    const student_id = document.getElementById('student_id');
    const prefix = document.getElementById('prefix');
    const fname = document.getElementById('fname');
    const lname = document.getElementById('lname');
    const gender = document.getElementById('gender');
    const class_no = document.getElementById('class');
    const no = document.getElementById('no');
    const password = document.getElementById('password');

    register_student.addEventListener('submit', (e) => {
        e.preventDefault();
        axios.post('process.php', {
            action: 'registerStudent',
            method: 'POST',
            student_id: student_id.value,
            prefix: prefix.value,
            fname: fname.value,
            lname: lname.value,
            gender: gender.value,
            class_no: class_no.value,
            no: no.value,
            password_con: password.value
        }).then((res) => {
            const data = res.data;
            console.log(data);
            if (data.resultCode == 200) {
                toastr['success'](data.msg);
                setTimeout(() => {
                    location.href = "index.php";
                }, 1300)
            } else {
                toastr['error'](data.msg);
            }
        })
    })
    </script>
</body>

</html>