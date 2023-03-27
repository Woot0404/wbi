<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../img/8520.png" alt="AdminLTELogo" height="1700" width="1900">
</div>
<!-- Content Header (Page header) -->
<div class="content-header"style="background-color: #0099CC;">
    <div class="container-fluid">
        <div class="row mb-2 justify-content-between">
            <div class="col-sm-8">
                <h1 class="m-0" style= "color:#ffffff;">ยินดีต้อนรับคุณครู</h1>
    <br><br>    
            </div><!-- /.col -->
            <div class="col-sm-4 d-flex justify-content-end">
                <h6 class="mb-0">วันที่ <span id="dateNow">NaN</span></h6>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content"style="background-color:#0099CC;">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <!-- ./col -->
            <div class="col-lg-3 col-md-3 col-sm-12">
                <!-- small box -->
                <div class="small-box text-white" style="background-color: #008800;">
                    <div class="inner">
                        <h5>นักเรียนทั้งหมด</h5>
                        <h1 class="text-center" style="font-size: 3.5em; font-weight: bolder;"><a id="studentsTotal">NaN </a>&nbsp;<a style="font-size: 0.4em; font-weight: 500; ">คน</a></h1>

                        
                    </div>
                    <!-- <div class="icon">
                        <i class="fas fa-hospital"></i>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <!-- small box -->
                <div class="small-box text-white" style="background-color: #009999;">
                    <div class="inner">
                        <h5>นักเรียนที่ลงทะเบียน</h5>
                        <h1 class="text-center" style="font-size: 3.5em; font-weight: bolder;"><a id="studentsRegister">NaN </a>&nbsp;<a style="font-size: 0.4em; font-weight: 500; ">คน</a></h1>

                        
                    </div>
                    <!-- <div class="icon">
                        <i class="fas fa-hospital"></i>
                    </div> -->
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-md-3 col-sm-12">
                <!-- small box -->
                <div class="small-box text-white" style="background-color: #008800;">
                    <div class="inner">
                        <h5>นักเรียนที่เรียนครบแล้ว</h5>
                        <h1 class="text-center" style="font-size: 3.5em; font-weight: bolder;"><a id="studentsSuccesss">NaN
                            </a>&nbsp;<a style="font-size: 0.4em; font-weight: 500; ">คน</a></h1>

                        
                    </div>
                    <!-- <div class="icon">
                        <i class="fas fa-home"></i>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <!-- small box -->
                <div class="small-box text-white" style="background-color: #00cec9;">
                    <div class="inner">
                        <h5>บทเรียนทั้งหมด</h5>
                        <h1 class="text-center" style="font-size: 3.5em; font-weight: bolder;"><a id="content">NaN
                            </a>&nbsp;<a style="font-size: 0.4em; font-weight: 500; ">เรื่อง</a></h1>

                    </div>
                    <!-- <div class="icon">
                        <i class="fas fa-home"></i>
                    </div> -->
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- /Small boxes (Stat box) -->

        <!-- Main row -->
        <!--div class="row">
            <section class="col-md-12 connectedSortable">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <!--h3 class="card-title" style="font-size: 1.3em;font-weight: 600;">นักเรียน</h3>
                    </div>
                    <div class="card-body">
                    <section class="col-md-12 connectedSortable">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <!--h3 class="card-title" style="font-size: 1.3em;font-weight: 600;">หลักสูตรที่ลงทะเบียน</h3-->
                    <!--/div-->
                    <!--div class="card-body">
                        <table id="registerContent_table" class="table table-striped table-bordered dt-responsive nowrap table-sm"
                            style="width: 100%;">
                            <thead>
                                <!--tr class="text-center"-->
                                    <!--th>ชื่อ - สกุล</th-->
                                    <!--th>ชื่อบทเรียน</th-->
                                    <!--th>คะแนนก่อนเรียน</th-->
                                    <!--th>คะแนนระหว่างเรียน</th-->
                                    <!--th>คะแนนหลังเรียน</th-->
                                <!--/tr-->
                            <!--/thead-->
                            <tbody>
                                <!-- Get Data From new_sq.js -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
                        <canvas id="myChart" style="height:50vh; width:80vw"></canvas>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<script src="../plugins/chartJS/chart.js"></script>
<!-- <script src="js/getChart_case.js"></script> -->
<script src="../plugins/axios/axios.min.js"></script>
<script src="js/getTotal_dashboard.js"></script>
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
    setInterval(function() {
        dateNow.innerHTML = toThaiDateString()
    }, 1000)
</script>
<!-- /.content -->