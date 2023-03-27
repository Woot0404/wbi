<link rel="stylesheet" href="../plugins/datatables/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables/css/select.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
<link rel="stylesheet" href="../plugins/sweetalert2/css/sweetalert2.min.css">

<style>
label {
    font-weight: 500 !important;
}
</style>
<!-- Content Header (Page header) -->
<div class="content-header"style="background-color:#0099CC;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-8">
                <h1 class="m-0">ข้อมูลแบบทดสอบ</h1>
            </div><!-- /.col -->
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
                        <h3 class="card-title" style="font-size: 1.3em;font-weight: 600;">ข้อมูลแบบทดสอบก่อน - หลังเรียน
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="quizs_table" class="table table-striped table-bordered dt-responsive nowrap table-sm"
                            style="width: 100%;">
                            <thead>
                                <tr class="text-center">
                                    <th>ชื่อแบบทดสอบ</th>
                                    <th>บทเรียน</th>
                                    <th>ประเภท</th>
                                    <th>จำนวนข้อ</th>
                                    <th>ตัวเลือก</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Get Data From staff.js -->
                            </tbody>
                        </table>
                        <div class="mt-3">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modal_addQuiz">
                                <i class="fas fa-plus-square"></i>&nbsp; เพิ่มแบบทดสอบ
                            </button>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>
            <!-- /.Left col -->
        </div>
        <!-- Modal addQuiz-->
        <div class="modal fade" id="modal_addQuiz" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="addQuizLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addQuizLabel">เพิ่มแบบทดสอบ</h5>
                    </div>
                    <div class="modal-body">
                        <form id="addQuizForm"  method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="quiz_name">ชื่อแบบทดสอบ</label>
                                    <input type="text" class="form-control" id="quiz_name" name="quiz_name" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="course">บทเรียน</label>
                                    <select id="course" name="course" class="form-control" required>
                                        <option selected disabled>เลือก...</option>
                                        <?php 
                                        require_once('api/condb.php');
                                            $sql = "SELECT cou_id, cou_name FROM course";
                                            $result = $conn -> query($sql);
                                            if($result -> num_rows > 0 ){
                                                while($row = $result -> fetch_assoc()){
                                        ?>
                                        <option value="<?php echo($row['cou_id']) ?>"><?php echo($row['cou_name']) ?>
                                        </option>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="type">ประเภท</label>
                                    <select id="type" name="type" class="form-control" required>
                                        <option selected disabled>เลือก...</option>
                                        <option value="1">ก่อนเรียน</option>
                                        <option value="2">ระหว่างเรียน</option>
                                        <option value="3">หลังเรียน</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="my-3">

                            <div id="quizs">

                                <!-- <div id="quiz1" class="card card-body bordered bordered-rounded">
                                    <div class="form-row">
                                        <div class="form-group col-md-11">
                                            <label for="inputAddress">โจทย์คำถาม</label>
                                            <input type="text" class="form-control" id="inputAddress">
                                        </div>
                                        <div class="form-group col-md-1 d-flex align-items-end justify-content-end">
                                            <button type="button" id="1" class="btn btn-danger btn-block btn_remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">ตัวเลือกที่ 1</label>
                                            <input type="email" class="form-control" id="inputEmail4">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">ตัวเลือกที่ 2</label>
                                            <input type="email" class="form-control" id="inputEmail4">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">ตัวเลือกที่ 3</label>
                                            <input type="email" class="form-control" id="inputEmail4">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">ตัวเลือกที่ 4</label>
                                            <input type="email" class="form-control" id="inputEmail4">
                                        </div>
                                    </div>
                                </div> -->

                            </div>
                            <div class="form-group d-flex justify-content-end">
                                <button type="button" class="btn btn-primary" id="btn_addQuiz">เพิ่มข้อคำถาม</button>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal editQuiz-->
        <div class="modal fade" id="modal_editQuiz" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="editQuizLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editQuizLabel">แก้ไขแบบทดสอบ</h5>
                    </div>
                    <div class="modal-body">
                        <form id="editQuizForm"  method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="u_quiz_name">ชื่อแบบทดสอบ</label>
                                    <input type="text" class="form-control" id="u_quiz_name" name="u_quiz_name" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="u_course">บทเรียน</label>
                                    <select id="u_course" name="u_course" class="form-control" required>
                                        <option selected disabled>เลือก...</option>
                                        <?php 
                                        require_once('api/condb.php');
                                            $sql = "SELECT cou_id, cou_name FROM course";
                                            $result = $conn -> query($sql);
                                            if($result -> num_rows > 0 ){
                                                while($row = $result -> fetch_assoc()){
                                        ?>
                                        <option value="<?php echo($row['cou_id']) ?>"><?php echo($row['cou_name']) ?>
                                        </option>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="u_type">ประเภท</label>
                                    <select id="u_type" name="u_type" class="form-control" required>
                                        <option selected disabled>เลือก...</option>
                                        <option value="1">ก่อนเรียน</option>
                                        <option value="2">ระหว่างเรียน</option>
                                        <option value="3">หลังเรียน</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="my-3">

                            <div id="u_quizs">

                                <!-- <div id="quiz1" class="card card-body bordered bordered-rounded">
                                    <div class="form-row">
                                        <div class="form-group col-md-11">
                                            <label for="inputAddress">โจทย์คำถาม</label>
                                            <input type="text" class="form-control" id="inputAddress">
                                        </div>
                                        <div class="form-group col-md-1 d-flex align-items-end justify-content-end">
                                            <button type="button" id="1" class="btn btn-danger btn-block btn_remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">ตัวเลือกที่ 1</label>
                                            <input type="email" class="form-control" id="inputEmail4">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">ตัวเลือกที่ 2</label>
                                            <input type="email" class="form-control" id="inputEmail4">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">ตัวเลือกที่ 3</label>
                                            <input type="email" class="form-control" id="inputEmail4">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">ตัวเลือกที่ 4</label>
                                            <input type="email" class="form-control" id="inputEmail4">
                                        </div>
                                    </div>
                                </div> -->

                            </div>
                            <!-- <div class="form-group d-flex justify-content-end">
                                <button type="button" class="btn btn-primary" id="btn_addQuiz">เพิ่มข้อคำถาม</button>
                            </div> -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div><!-- /.container-fluid -->
</section>
<!-- DataTables -->
<!-- <script src="../plugins/jquery/jquery.min.js"></script> -->
<script src="../plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables/js/dataTables.select.min.js"></script>
<script src="../plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<!-- <script src="../plugins/datatables/js/jszip.min.js"></script>
<script src="../plugins/datatables/js/pdfmake.min.js"></script> -->
<script src="../plugins/datatables/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/toastr/toastr.min.js"></script>
<script src="../plugins/sweetalert2/js/sweetalert2.min.js"></script>
<script src="../plugins/axios/axios.min.js"></script>
<script src="js/getTable_quizs.js"></script>
<script src="js/quizs.js"></script>

<!-- /.content -->