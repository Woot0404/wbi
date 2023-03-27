<link rel="stylesheet" href="../plugins/datatables/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables/css/select.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/toastr/toastr.min.css">


<style>
    label {
        font-weight: 500 !important;
    }
</style>
<!-- Content Header (Page header) -->
<div class="content-header"style="background-color:#0099CC;">
    <div class="container-fluid">
        <div class="row mb-2 justify-content-between">
            <div class="col-sm-8">
                <h1 class="m-0">ข้อมูลนักเรียน</h1>
            </div><!-- /.col -->
            <div class="col-sm-4 d-flex justify-content-end">
                <h6 class="mb-0">ข้อมูลล่าสุดวันที่ <span id="dateNow">NaN</span></h6>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content"style="background-color:#0099CC;">
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-md-12 connectedSortable">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title" style="font-size: 1.3em;font-weight: 600;">รายชื่อนักเรียน</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="students_table" class="table table-striped table-bordered dt-responsive nowrap table-sm " style="width: 100%;">
                            <thead>
                                <tr class="text-center">
                                    <th data-priority="1">รหัสประจำตัวนักเรียน</th>
                                    <th data-priority="2">ชื่อ - สกุล</th>
                                    <th data-priority="3">เพศ</th>
                                    <th data-priority="4">ชั้น</th>
                                    <th data-priority="5">เลขที่</th>
                                    <th data-priority="10">ตัวเลือก</th>

                                </tr>
                            </thead>
                            <!-- data from scritp -->

                        </table>
                        <div class="mt-3">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_addStudent">
                                <i class="fas fa-user-plus"></i>&nbsp; เพิ่มนักเรียน
                            </button>
                            <!-- <button type="button" class="btn btn-primary" onclick="getScoreStudent()">
                                <i class="fas fa-star"></i></i>&nbsp; ข้อมูลคะแนน
                            </button> -->
                        </div>
                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->
            </section>
            <!-- /.Left col -->
        </div>
        <!-- Modal Add Student-->
        <div class="modal fade" id="modal_addStudent" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addStudentBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addStudentBackdropLabel">
                            <i class="fas fa-user-plus"></i>&nbsp;เพิ่มข้อมูลนักเรียน
                        </h5>
                    </div>
                    <div class="modal-body">
                        <form id="addStudentForm" name="addStudentForm" method="POST">
                            <div class="mb-3">
                                <label for="student_id" class="form-label">รหัสประจำตัวนักเรียน</label>
                                <input type="text" class="form-control" id="student_id" name="student_id" placeholder="รหัสประจำตัวนักเรียน" autocomplete="off" required>
                                <div class="form-text">กรุณากรอกตามความจริง เพื่อความถูกต้องในการใช้งาน
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="prefix" class="form-label">ชื่อ</label>
                                    <select class="form-control" id="prefix" name="prefix" autocomplete="off" required>
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
                                    <input type="text" class="form-control" id="fname" name="fname" placeholder="ชื่อจริง" autocomplete="off" required>
                                </div>
                                <div class="col">
                                    <label for="lname" class="form-label">นามสกุล</label>
                                    <input type="text" class="form-control" id="lname" name="lname" placeholder="นามสกุล" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="gender" class="form-label">เพศ</label>
                                    <select class="form-control" id="gender" name="gender" autocomplete="off" required>
                                        <option selected disabled>เลือก...</option>
                                        <option value="ชาย">ชาย</option>
                                        <option value="หญิง">หญิง</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="class" class="form-label">ชั้น</label>
                                    <select class="form-control" id="class" name="class" autocomplete="off" required>
                                        <option selected disabled>เลือก...</option>
                                        <option value="P1">ชั้นประถมศึกษาปีที่ 1</option>
                                        <option value="P2">ชั้นประถมศึกษาปีที่ 2</option>
                                        <option value="P3">ชั้นประถมศึกษาปีที่ 3</option>
                                        <option value="P4">ชั้นประถมศึกษาปีที่ 4</option>
                                        <option value="P5">ชั้นประถมศึกษาปีที่ 5</option>
                                        <option value="P6">ชั้นประถมศึกษาปีที่ 6</option>
                                        <option value="S1">ชั้นมัธยมศึกษาปีที่ 1</option>
                                        <option value="S2">ชั้นมัธยมศึกษาปีที่ 2</option>
                                        <option value="S3">ชั้นมัธยมศึกษาปีที่ 3</option>
                                        <option value="S4">ชั้นมัธยมศึกษาปีที่ 4</option>
                                        <option value="S5">ชั้นมัธยมศึกษาปีที่ 5</option>
                                        <option value="S6">ชั้นมัธยมศึกษาปีที่ 6</option>
                                        <option value="v1">ปวช.1</option>
                                        <option value="v2">ปวช.2</option>
                                        <option value="v3">ปวช.3</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="no" class="form-label">เลขที่</label>
                                    <input type="text" class="form-control" id="no" name="no" placeholder="เลขที่" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="password" class="form-label">รหัสผ่าน</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="รหัสผ่าน" autocomplete="off" required>
                                </div>
                                <div class="col">
                                    <label for="password" class="form-label">ยืนยันรหัสผ่าน</label>
                                    <input type="password" class="form-control" id="conPassword" name="conPassword" placeholder="รหัสผ่าน" autocomplete="off" required>
                                    <span class="text-danger" id="msgError_pass" style="display: none;">**
                                        รหัสผ่านไม่ตรงกัน **</span>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary px-md-4" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" id="submitAddStudent" class="btn btn-primary px-md-4">บันทึก</button>
                    </div>
                    <script>
                        const password = document.getElementById('password');
                        const conPassword = document.getElementById('conPassword');
                        const msgError_pass = document.getElementById('msgError_pass');
                        const submitAddStudent = document.getElementById('submitAddStudent');
                        conPassword.addEventListener('input', (e) => {
                            if (password.value != conPassword.value) {
                                msgError_pass.style.display = 'block';
                                submitAddStudent.setAttribute("disabled", "disabled");
                            } else {
                                msgError_pass.style.display = 'none';
                                submitAddStudent.removeAttribute("disabled");
                            }
                        })
                    </script>
                    </form>
                </div>
            </div>
        </div>
        <!-- ./ Modal Add Student-->

        <!-- Modal Edit Student-->
        <div class="modal fade" id="modal_editStudent" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addStudentBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addStudentBackdropLabel">
                            <i class="fas fa-user-edit"></i>&nbsp;แก้ไขข้อมูลนักเรียน
                        </h5>
                    </div>
                    <div class="modal-body">
                        <form id="editStudentForm" name="editStudentForm" method="POST">
                            <div class="mb-3">
                                <label for="student_id" class="form-label">รหัสประจำตัวนักเรียน</label>
                                <input type="text" class="form-control" id="u_student_id" name="u_student_id" placeholder="รหัสประจำตัวนักเรียน" autocomplete="off" required>
                                <div class="form-text">กรุณากรอกตามความจริง เพื่อความถูกต้องในการใช้งาน
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="u_prefix" class="form-label">ชื่อ</label>
                                    <select class="form-control" id="u_prefix" name="u_prefix" autocomplete="off" required>
                                        <option selected disabled>เลือก...</option>
                                        <option value="เด็กชาย">เด็กชาย</option>
                                        <option value="เด็กหญิง">เด็กหญิง</option>
                                        <option value="นาย">นาย</option>
                                        <option value="นางสาว">นางสาว</option>
                                        <option value="นาง">นาง</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="u_fname" class="form-label">ชื่อ</label>
                                    <input type="text" class="form-control" id="u_fname" name="u_fname" placeholder="ชื่อจริง" autocomplete="off" required>
                                </div>
                                <div class="col">
                                    <label for="lname" class="form-label">นามสกุล</label>
                                    <input type="text" class="form-control" id="u_lname" name="u_lname" placeholder="นามสกุล" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="gender" class="form-label">เพศ</label>
                                    <select class="form-control" id="u_gender" name="u_gender" autocomplete="off" required>
                                        <option selected disabled>เลือก...</option>
                                        <option value="ชาย">ชาย</option>
                                        <option value="หญิง">หญิง</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="class" class="form-label">ชั้น</label>
                                    <select class="form-control" id="u_class" name="u_class" autocomplete="off" required>
                                        <option selected disabled>เลือก...</option>
                                        <option value="P1">ชั้นประถมศึกษาปีที่ 1</option>
                                        <option value="P2">ชั้นประถมศึกษาปีที่ 2</option>
                                        <option value="P3">ชั้นประถมศึกษาปีที่ 3</option>
                                        <option value="P4">ชั้นประถมศึกษาปีที่ 4</option>
                                        <option value="P5">ชั้นประถมศึกษาปีที่ 5</option>
                                        <option value="P6">ชั้นประถมศึกษาปีที่ 6</option>
                                        <option value="S1">ชั้นมัธยมศึกษาปีที่ 1</option>
                                        <option value="S2">ชั้นมัธยมศึกษาปีที่ 2</option>
                                        <option value="S3">ชั้นมัธยมศึกษาปีที่ 3</option>
                                        <option value="S4">ชั้นมัธยมศึกษาปีที่ 4</option>
                                        <option value="S5">ชั้นมัธยมศึกษาปีที่ 5</option>
                                        <option value="S6">ชั้นมัธยมศึกษาปีที่ 6</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="no" class="form-label">เลขที่</label>
                                    <input type="text" class="form-control" id="u_no" name="u_no" placeholder="เลขที่" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="u_password" class="form-label">รหัสผ่าน</label>
                                    <input type="password" class="form-control" id="u_password" name="u_password" placeholder="รหัสผ่าน" autocomplete="off" required>
                                </div>
                                <div class="col">
                                    <label for="u_conPassword" class="form-label">ยืนยันรหัสผ่าน</label>
                                    <input type="password" class="form-control" id="u_conPassword" name="u_conPassword" placeholder="รหัสผ่าน" autocomplete="off" required>
                                    <span class="text-danger" id="u_msgError_pass" style="display: none;">**
                                        รหัสผ่านไม่ตรงกัน **</span>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary px-md-4" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" id="submitEditStudent" class="btn btn-primary px-md-4">บันทึก</button>
                    </div>
                    <script>
                        const u_password = document.getElementById('u_password');
                        const u_conPassword = document.getElementById('u_conPassword');
                        const u_msgError_pass = document.getElementById('u_msgError_pass');
                        const submitEditStudent = document.getElementById('submitEditStudent');
                        u_conPassword.addEventListener('input', (e) => {
                            if (u_password.value != u_conPassword.value) {
                                u_msgError_pass.style.display = 'block';
                                submitEditStudent.setAttribute("disabled", "disabled");
                            } else {
                                u_msgError_pass.style.display = 'none';
                                submitEditStudent.removeAttribute("disabled");
                            }
                        })
                    </script>
                    </form>
                </div>
            </div>
        </div>
        <!-- ./ Modal Edit Student-->

        <!-- Modal Info Student-->
        <div class="modal fade" id="modal_infoStudent" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="infoStudentBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="infoStudentBackdropLabel">
                            <i class="fas fa-info-circle"></i>&nbsp;ข้อมูลนักเรียน
                        </h5>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="in_student_id" class="form-label">รหัสประจำตัวนักเรียน</label>
                                    <input type="text" class="form-control" id="in_student_id" name="in_student_id" autocomplete="off" readonly>
                                </div>
                                <div class="col">
                                    <label for="in_fullName" class="form-label">ชื่อ - นามสกุล</label>
                                    <input type="text" class="form-control" id="in_fullName" name="in_fullName" autocomplete="off" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">

                                <div class="col">
                                    <label for="in_gender" class="form-label">เพศ</label>
                                    <input type="text" class="form-control" id="in_gender" name="in_gender" autocomplete="off" readonly>

                                </div>
                                <div class="col">
                                    <label for="in_class" class="form-label">ชั้น</label>
                                    <input type="text" class="form-control" id="in_class" name="in_class" autocomplete="off" readonly>
                                </div>
                                <div class="col">
                                    <label for="in_no" class="form-label">เลขที่</label>
                                    <input type="text" class="form-control" id="in_no" name="in_no" placeholder="เลขที่" autocomplete="off" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">

                                <div class="col">
                                    <label for="in_pretest" class="form-label">ก่อนเรียน</label>
                                    <input type="text" class="form-control" id="in_pretest" name="in_pretest" autocomplete="off" readonly>

                                </div>
                                <div class="col">
                                    <label for="in_duringtest" class="form-label">ระหว่างเรียน</label>
                                    <input type="text" class="form-control" id="in_duringtest" name="in_duringtest" autocomplete="off" readonly>
                                </div>
                                <div class="col">
                                    <label for="in_posttest" class="form-label">หลังเรียน</label>
                                    <input type="text" class="form-control" id="in_posttest" name="in_posttest" autocomplete="off" readonly>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary px-md-4" data-dismiss="modal">ปิด</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ./ Modal Info Student-->

        <!-- Modal Score Student-->
        <div class="modal fade" id="modal_scoreStudent" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="scoreStudentBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="scoreStudentBackdropLabel">
                            <i class="fas fa-star"></i>&nbsp;ข้อมูลคะแนนนักเรียน
                        </h5>
                    </div>
                    <div class="modal-body">
                        <table id="score_table" class="table table-striped table-bordered dt-responsive nowrap table-sm " style="width: 100%;">
                            <thead>
                                <tr class="text-center">
                                    <th data-priority="1">รหัสประจำตัวนักเรียน</th>
                                    <th data-priority="2">ชื่อ - สกุล</th>
                                    <th data-priority="3">ชั้น</th>
                                    <th data-priority="4">เลขที</th>
                                    <th data-priority="5">ก่อนเรียน</th>
                                    <th data-priority="6">ระหว่างเรียน</th>
                                    <th data-priority="7">หลังเรียน</th>
                                </tr>
                            </thead>
                            <!-- data from scritp -->

                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary px-md-4" data-dismiss="modal">ปิด</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./ Modal Score Student-->

    </div><!-- /.container-fluid -->
</section>

<!-- DataTables -->
<script src="../plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables/js/dataTables.select.min.js"></script>
<script src="../plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables/js/jszip.min.js"></script>
<script src="../plugins/datatables/js/pdfmake.min.js"></script>
<script src="../plugins/datatables/js/vfs_fonts.js"></script>
<script src="../plugins/datatables/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables/js/buttons.print.min.js"></script>
<script src="../plugins/datatables/js/buttons.colVis.min.js"></script>
<script src="../plugins/datatables/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="../plugins/toastr/toastr.min.js"></script>
<script src="../plugins/axios/axios.min.js"></script>
<script src="js/getTable_students.js"></script>
<script src="js/students.js"></script>
<!-- <script src="js/addNew_case.js"></script>
<script src="js/editStatus.js" type="text/javascript"></script>
<script src="js/editCase.js" type="text/javascript"></script> -->
<script>
    function toThaiDateString() {
        let d = new Date();
        let monthNames = [
            "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน",
            "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม.",
            "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
        ];

        let year = d.getFullYear() + 543;
        let month = monthNames[d.getMonth()];
        let numOfDay = d.getDate();

        let hour = d.getHours().toString().padStart(2, "0");
        let minutes = d.getMinutes().toString().padStart(2, "0");
        // let second = d.getSeconds().toString().padStart(2, "0");

        return `${numOfDay} ${month} ${year} ` +
            ` | เวลา ${hour}:${minutes} น.`;
    }
    const dateNow = document.getElementById('dateNow');
    dateNow.innerHTML = toThaiDateString()
</script>
<!-- /.content -->