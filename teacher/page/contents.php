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
                <h1 class="m-0">ข้อมูลเนื้อหาบทเรียน</h1>
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
                        <h3 class="card-title" style="font-size: 1.3em;font-weight: 600;">ข้อมูลบทเรียน</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="contents_table" class="table table-striped table-bordered dt-responsive nowrap table-sm" style="width: 100%;">
                            <thead>
                                <tr class="text-center">
                                    <th>ชื่อบทเรียน</th>
                                    <th>ชั้นปี</th>
                                    <th>ตัวเลือก</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Get Data From new_sq.js -->
                            </tbody>
                        </table>
                        <div class="mt-3">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_addContent">
                                <i class="fas fa-plus-square"></i>&nbsp; เพิ่มบทเรียน
                            </button>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>
            <!-- /.Left col -->
        </div>

        <!-- Modal addContent-->
        <div class="modal fade" id="modal_addContent" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addContentLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addContentLabel">เพิ่มเนื้อหาบทเรียน</h5>
                    </div>
                    <div class="modal-body">
                        <form name="addContentForm" id="addContentForm" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="contentName">ชื่อบทเรียน</label>
                                    <input type="text" class="form-control" id="contentName" name="contentName">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="contentClass">ชั้นปี</label>
                                    <select id="contentClass" name="contentClass" class="form-control" required>
                                        <option selected disabled>เลือก...</option>

                                        <option value="S1">ชั้นมัธยมศึกษาปีที่ 1</option>
                                        <option value="S2">ชั้นมัธยมศึกษาปีที่ 2</option>
                                        <option value="S3">ชั้นมัธยมศึกษาปีที่ 3</option>
                                        <option value="S4">ชั้นมัธยมศึกษาปีที่ 4</option>
                                        <option value="S5">ชั้นมัธยมศึกษาปีที่ 5</option>
                                        <option value="S6">ชั้นมัธยมศึกษาปีที่ 6</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="contentFile">เพิ่มไฟล์เนื้อหา</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="contentFile" name="contentFile" accept="video/mp4,video/x-m4v,video/*">
                                    <label class="custom-file-label" for="contentFile" data-browse="เพิ่มไฟล์">เลือกไฟล์...</label>
                                </div>
                            </div>
                            <!-- accept="video/mp4,video/x-m4v,video/*" -->

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal editContent-->
        <div class="modal fade" id="modal_editContent" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editContentLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editContentLabel">แก้ไข้ข้อมูลเนื้อหาบทเรียน</h5>
                    </div>
                    <div class="modal-body">
                        <form name="editContentForm" id="editContentForm">
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="u_contentName">ชื่อบทเรียน</label>
                                    <input type="text" class="form-control" id="u_contentId" name="u_contentId" hidden>
                                    <input type="text" class="form-control" id="u_contentName" name="u_contentName">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="u_contentClass">ชั้นปี</label>
                                    <select id="u_contentClass" name="u_contentClass" class="form-control" required>
                                        <option selected disabled>เลือก...</option>
                                        <option value="ชั้นประถมศึกษาปีที่ 1">ชั้นประถมศึกษาปีที่ 1</option>
                                        <option value="ชั้นประถมศึกษาปีที่ 2">ชั้นประถมศึกษาปีที่ 2</option>
                                        <option value="ชั้นประถมศึกษาปีที่ 3">ชั้นประถมศึกษาปีที่ 3</option>
                                        <option value="ชั้นประถมศึกษาปีที่ 4">ชั้นประถมศึกษาปีที่ 4</option>
                                        <option value="ชั้นประถมศึกษาปีที่ 5">ชั้นประถมศึกษาปีที่ 5</option>
                                        <option value="ชั้นประถมศึกษาปีที่ 6">ชั้นประถมศึกษาปีที่ 6</option>
                                        <option value="ชั้นมัธยมศึกษาปีที่ 1">ชั้นมัธยมศึกษาปีที่ 1</option>
                                        <option value="ชั้นมัธยมศึกษาปีที่ 2">ชั้นมัธยมศึกษาปีที่ 2</option>
                                        <option value="ชั้นมัธยมศึกษาปีที่ 3">ชั้นมัธยมศึกษาปีที่ 3</option>
                                        <option value="ชั้นมัธยมศึกษาปีที่ 4">ชั้นมัธยมศึกษาปีที่ 4</option>
                                        <option value="ชั้นมัธยมศึกษาปีที่ 5">ชั้นมัธยมศึกษาปีที่ 5</option>
                                        <option value="ชั้นมัธยมศึกษาปีที่ 6">ชั้นมัธยมศึกษาปีที่ 6</option>
                                        <!-- <option value="ปวช.1">ปวช.1</option>
                                        <option value="ปวช.2">ปวช.2</option>
                                        <option value="ปวช.3">ปวช.3</option> -->
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label for="inputAddress">เพิ่มไฟล์เนื้อหา</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="contentFile" name="contentFile"
                                        accept="video/mp4,video/x-m4v,video/*">
                                    <label class="custom-file-label" for="contentFile"
                                        data-browse="เพิ่มไฟล์">เลือกไฟล์...</label>
                                </div>
                            </div> -->
                            <!-- accept="video/mp4,video/x-m4v,video/*" -->

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables/js/dataTables.select.min.js"></script>
<script src="../plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<!-- <script src="../plugins/datatables/js/jszip.min.js"></script>
<script src="../plugins/datatables/js/pdfmake.min.js"></script>
<script src="../plugins/datatables/js/buttons.bootstrap4.min.js"></script> -->
<script src="../plugins/toastr/toastr.min.js"></script>
<script src="../plugins/sweetalert2/js/sweetalert2.min.js"></script>
<script src="../plugins/axios/axios.min.js"></script>
<script src="js/getTable_contents.js"></script>
<script src="js/contents.js"></script>
<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>
<!-- /.content -->