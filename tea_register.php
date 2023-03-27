<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="img/logo.png">
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
    <div class="row p-0 m-0 mt-5 d-flex justify-content-center aligns-items-center" style="height: 90vh;" >
        <div class="col-md-6 px-0 card my-auto mx-3 border-0 py-4 px-5 shadow animate__animated animate__bounceIn"
            style="background-color: #0099cc;" onclick="modal_student()">
            <h3 class="text-center mt-4">ลงทะเบียนใช้งานระบบ สำหรับคุณครู</h3>
            <div class="card-body">
                <div class="col-12 justify-content-center">
                    <form id="register_teacher">
                        <div class="mb-3">
                            <label for="teacher_id" class="form-label">เลขบัตรประชาชน</label>
                            <input type="text" class="form-control" id="teacher_id" placeholder="เลขบัตรประชาชน" autocomplete="off" minlength="13" maxlength="13" required>
                            <div id="emailHelp" class="form-text" style="color: #000000;">กรุณากรอกตามความจริง เพื่อความถูกต้องในการใช้งาน
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="fname" class="form-label">ชื่อ</label>
                                <input type="text" class="form-control" id="fname" name="fname"  placeholder="ชื่อจริง" autocomplete="off" required>
                            </div>
                            <div class="col">
                                <label for="lname" class="form-label">นามสกุล</label>
                                <input type="text" class="form-control" id="lname" name="lname" placeholder="นามสกุล" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">รหัสผ่าน</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="รหัสผ่าน" autocomplete="off" required>
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
    const registerStudent = document.getElementById('register_teacher');
    const teacher_id = document.getElementById('teacher_id');
    const fname = document.getElementById('fname');
    const lname = document.getElementById('lname');
    const password = document.getElementById('password');

    register_teacher.addEventListener('submit', (e) => {
        e.preventDefault();
        axios.post('process.php', {
            action: 'registerTeacher',
            method: 'POST',
            teacher_id: teacher_id.value,
            fname: fname.value,
            lname: lname.value,
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