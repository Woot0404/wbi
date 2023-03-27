<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Web Based Instruction</title>
    <?php require('components/header.php') ?>
    <style>
        * {
            font-family: 'Noto Sans Thai', sans-serif;
        }

        body {
            background-image: url("https://png.pngtree.com/thumb_back/fw800/back_our/20190620/ourmid/pngtree-taobao-classroom-learning-minimalistic-texture-poster-background-image_150906.jpg");
            background-size: cover;
            background-position: center;
            
            background-position: center bottom;
            overflow: hidden;
            height:100vh;
        }

        .card-hover:hover {
            transform: scale(1.03);
            cursor: pointer;
        }
    </style>
</head>

<body>
    <center>
        <div class="position-absolute start-50  translate-middle" style="color:rgb(253, 253, 253);  height: 5vh; top: 20%; width: 100vw;">
            <h3 id="title" class="d-none mt-5 text-wrap animate__animated" style="font-size: 3.5rem;">บทเรียนคอมพิวเตอร์ช่วยสอนออนไลน์<br><span style="font-size: 2rem;"> เทคโนโลยีสารสนเทศและการสื่อสาร</spans/h3>
        </div>
    </center>
    <div class="row p-0 m-0 d-flex justify-content-center aligns-items-center" style="height: 100vh;">
        <div class="col-md-3 card my-auto mx-3 border-0 py-4 px-5 shadow card-hover animate__animated animate__fadeInUp" style="background-color: #4169E1;" onclick="modal_student()">
            <div class="card-body d-flex justify-content-center align-items-center">
                <i class="fas fa-graduation-cap h2"></i>&nbsp;&nbsp;&nbsp;
                <h3>สำหรับนักเรียน</h3>
            </div>
        </div>
        <div class="col-md-3 card my-auto mx-3 border-0 py-4 px-5 shadow card-hover animate__animated animate__fadeInUp" style="background-color: #2E8B57;" onclick="modal_teacher()">
            <a>
                <div class="card-body d-flex justify-content-center align-items-center">
                    <i class="fas fa-chalkboard-teacher h2"></i>&nbsp;&nbsp;&nbsp;
                    <h3>สำหรับคุณครู</h3>
                </div>
            </a>
        </div>
    </div>
    <!-- Modal Student-->
    <div class="modal fade" id="ModalStudent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ModalStudentLabel" aria-hidden="true" >
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header" style="background-color: #4169E1;">
                    <h5 class="modal-title" id="ModalStudentLabel">ยินดีต้อนรับ : นักเรียน</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="login_student">
                        <div class="mb-3">
                            <label for="student_id" class="form-label">รหัสประจำตัวนักเรียน</label>
                            <input type="text" class="form-control" id="student_id" name="student_id" placeholder="รหัสประจำตัวนักเรียน" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">รหัสผ่าน</label>
                            <input type="password" class="form-control" id="student_password" name="student_password" placeholder="รหัสผ่าน" autocomplete="off" required>
                        </div>
                        <div class="d-flex justify-content-end d-grid gap-3">
                            <a href="std_register.php" type="button" class="btn btn-secondary">ลงทะเบียนใช้งาน</a>
                            <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
                        </div>
                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Modal Teacher-->
    <div class="modal fade" id="ModalTeacher" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ModalTeacherLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #009933;">
                    <h5 class="modal-title" id="ModalTeacherLabel">ยินดีต้อนรับ : คุณครู</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="login_teacher">
                        <div class="mb-3">
                            <label for="teacher_id" class="form-label">เลขบัตรประชาชน</label>
                            <input type="text" class="form-control" id="teacher_id" name="teacher_id" placeholder="เลขบัตรประชาชน" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">รหัสผ่าน</label>
                            <input type="password" class="form-control" id="teacher_password" name="teacher_password" placeholder="รหัสผ่าน" autocomplete="off" required>
                        </div>
                        <div class="d-flex justify-content-end d-grid gap-3" >
                            <a href="tea_register.php" type="button" class="btn btn-secondary">ลงทะเบียนใช้งาน</a>
                            <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
                        </div>
                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div> -->
            </div>
        </div>
    </div>

    <?php require "components/linkscript.php" ?>
    <script>
        var modalStudent = new bootstrap.Modal(document.getElementById("ModalStudent"));

        function modal_student() {
            modalStudent.show();
        }
        var modalTeacher = new bootstrap.Modal(document.getElementById("ModalTeacher"));

        function modal_teacher() {
            modalTeacher.show();
        }

        function show_title() {
            setTimeout(() => {
                document.getElementById("title").classList.remove('d-none')
                document.getElementById("title").classList.add('animate__rubberBand')
            }, 1100)
        }
        show_title();

        const loginStudent = document.getElementById("login_student")
        const loginTeacher = document.getElementById("login_teacher")
        loginStudent.addEventListener('submit', (e) => {
            e.preventDefault()
            const student_id = document.getElementById("student_id")
            const student_password = document.getElementById("student_password")
            axios.post('process.php', {
                action: 'loginStudent',
                method: 'POST',
                student_id: student_id.value,
                password_con: student_password.value
            }).then((res) => {
                const data = res.data;
                if (data.resultCode == 200) {
                    toastr['success'](data.msg)
                    window.location = 'student'
                } else {
                    toastr['error'](data.msg)
                }
            })
        })

        loginTeacher.addEventListener('submit', (e) => {
            e.preventDefault()
            const teacher_id = document.getElementById("teacher_id")
            const teacher_password = document.getElementById("teacher_password")
            axios.post('process.php', {
                action: 'loginTeacher',
                method: 'POST',
                teacher_id: teacher_id.value,
                password_con: teacher_password.value
            }).then((res) => {
                const data = res.data;
                console.log(data)
                if (data.resultCode == 200) {
                    toastr['success'](data.msg)
                    window.location = 'teacher'
                } else {
                    toastr['error'](data.msg)
                }
            })
        })
    </script>
</body>

</html>