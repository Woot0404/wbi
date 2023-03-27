<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web Based Instruction</title>
    <link rel="icon" type="image/svg+xml" href="../img/987.png">

    <?php
  require('check_session.php');
  //  <!-- Link CSS -->
  require_once('component/linkCSS.php');

  // <!-- Link Script -->
  require_once('component/linkScript.php');
  ?>

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-footer-fixed">
    <div class="wrapper">



        <?php
    // <!-- navbar -->
    require_once('component/navbar.php');

    // <!-- sidebar -->
    require_once('component/sidebar.php');

    ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper"style="background-color:#0099CC;">

            <?php
      //  <!-- Content -->
      if (isset($_GET['page'])) {
        $pageId = $_GET['page'];
        if ($pageId == 'dashboard') {
          include_once('page/dashboard.php');
        } elseif ($pageId == 'info') {
          include_once('page/info.php');
        }elseif($pageId == 'students'){
          include_once('page/students.php');
        }elseif ($pageId == 'contents') {
          include_once('page/contents.php');
        }elseif($pageId == 'quizs')
          include_once('page/quizs.php');
      } else {
        include_once('page/dashboard.php');
      };


      ?>

        </div>
        <!-- /.content-wrapper -->

        <!-- Footer -->
        <?php
    require_once('component/footer.php');
    ?>
    </div>
    <!-- ./wrapper -->

</body>

</html>