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
                <h1 class="m-0">ข้อมูลส่วนตัว</h1>
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
            <section class="col-lg-12 col-md-12 connectedSortable">
                <div id="card_add" class="card card-primary card-outline col-sm-12">
                    <div class="card-header">
                        <h2 class="card-title" style="font-size: 1.3em;font-weight: 600;"><i
                                class="fas fa-user-edit"></i>&nbsp;แก้ไขข้อมูลส่วนตัว</h2>
                    </div>
                    <div class="card-body">
                        <form id="formInfo">
                            <div class="form-row">
                                <div class="form-group col-md-4" required>
                                    <label for="idCard">เลขบัตรประชาชน</label>
                                    <input type="text" class="form-control-plaintext" name="idCard" id="idCard"
                                        value="<?php echo($teacher_id) ?>" required readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="fName">ชื่อ</label>
                                    <input type="text" class="form-control" name="fName" id="fName" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="lName">นามสกุล</label>
                                    <input type="text" class="form-control" name="lName" id="lName" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4" required>
                                    <label for="oldPass">รหัสผ่านเดิม</label>
                                    <input type="password" class="form-control" name="oldPass" id="oldPass" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="newPass">รหัสผ่านใหม่</label>
                                    <input type="password" class="form-control" name="newPass" id="newPass" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="conNewPass">ยืนยันรหัสผ่านใหม่</label>
                                    <input type="password" class="form-control" name="conNewPass" id="conNewPass"
                                        required>
                                    <span class="text-danger" id="msgError_pass" style="display: none;">**
                                        รหัสผ่านไม่ตรงกัน **</span>
                                </div>
                            </div>
                            <div class="form-row">
                                <button type="submit" id="submitInfo" class="btn btn-primary btn-block">
                                    <i class="fas fa-save"></i>&nbsp;บันทึกข้อมูล
                                </button>
                            </div>
                            <script type="text/javascript">
                            const newPass = document.getElementById('newPass');
                            const conNewPass = document.getElementById('conNewPass');
                            const msgError_pass = document.getElementById('msgError_pass');
                            const submitInfo = document.getElementById('submitInfo');
                            conNewPass.addEventListener('input', (e) => {
                                if (newPass.value != conNewPass.value) {
                                    msgError_pass.style.display = 'block';
                                    submitInfo.setAttribute("disabled", "disabled");
                                } else {
                                    msgError_pass.style.display = 'none';
                                    submitInfo.removeAttribute("disabled");
                                }
                            })
                            </script>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </section>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<script src="../plugins/toastr/toastr.min.js"></script>
<script src="../plugins/axios/axios.min.js"></script>
<script src="js/teacher.js"></script>
<!-- <script src="js/new_case.js"></script>
<script src="js/addNew_case.js"></script>
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