<?php
@session_start();  //Oturum yapısı baslatıyor
@ob_start();     // yonlendirme ve bazı header ıslemlerı ıcın
define("DATA","data/"); //klasorun yolunu belırtmek ıcın yaptık
define("SAYFA","include/");//dahıl olucak dosyayı belırtıorum
define("SINIF","class/");
include_once (DATA."baglanti.php");
define("SITE",$siteURL."yonetimpaneli/");
define("ANASITE",$siteURL);
if (!empty($_SESSION["ID"]) && !empty($_SESSION["adsoyad"]) && !empty($_SESSION["mail"]))
{

}
else
{
    ?>
        <meta http-equiv="refresh" content="0;url=<?=SITE?>giris-yap">
    <?php
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=$sitebaslik?></title>
    <meta http-equiv="keywords" content="<?=$siteanahtar?>">
    <meta http-equiv="description" content="<?=$siteaciklama?>">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=SITE?>plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=SITE?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=SITE?>dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=SITE?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?=SITE?>plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?=SITE?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?=SITE?>plugins/summernote/summernote-bs4.min.css">
    <!-- include libraries(jQuery, bootstrap) -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <?php
    include_once(DATA."ust.php");
    include_once(DATA."menu.php");

    if ($_GET && !empty($_GET["sayfa"]))
        {
            $sayfa =$_GET["sayfa"].".php";
            if (file_exists(SAYFA.$sayfa))
            {
                include_once (SAYFA.$sayfa);
            }
            else
            {
                include_once(SAYFA."home.php");
            }
        }
    else
    {
        include_once(SAYFA."home.php");
    }




    include_once(DATA."footer.php");

    ?>







  </div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="<?=SITE?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?=SITE?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?=SITE?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?=SITE?>dist/js/adminlte.js"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="<?=SITE?>plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="<?=SITE?>plugins/raphael/raphael.min.js"></script>
  <script src="<?=SITE?>plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="<?=SITE?>plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <!-- ChartJS -->
  <script src="<?=SITE?>plugins/chart.js/Chart.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="<?=SITE?>plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?=SITE?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <!-- Select2 -->
  <script src="<?=SITE?>plugins/select2/js/select2.full.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?=SITE?>dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?=SITE?>dist/js/pages/dashboard2.js"></script>
  <script>
      $(function () {
          $("#example1").DataTable({
              "responsive": true, "lengthChange": false, "autoWidth": false,
              "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true,
          });
      });
      //js
          $(function () {
              //Initialize Select2 Elements
              $('.select2').select2()

              //Initialize Select2 Elements
              $('.select2bs4').select2({
                  theme: 'bootstrap4'
              })
       })



  </script>
  <script src="<?=SITE?>plugins/summernote/summernote-bs4.min.js"></script>
  <script>
      $(function () {
          // Summernote
          $('#summernote').summernote()

          // CodeMirror
          CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
              mode: "htmlmixed",
              theme: "monokai"
          });
      })
      function aktifpasif(ID,tablo)
      {
          var durum=0;
          if ($(".aktifpasif"+ID).is(':checked'))
          {
              durum=1;
          }
          else
          {
              durum=2;
          }
          $.ajax({
              method:"POST",
              url:"<?=SITE?>ajax.php",
              data:{"tablo":tablo,"ID":ID,"durum":durum},
              success: function (sonuc)
              {
                  if (sonuc=="TAMAM")
                  {
                      alert("ıslem tamam");
                  }
                  else
                  {
                      alert("İşleminiz şuan geçersizdir. Lütfen daha sonra Tekrar Deneyiniz");
                  }
              }
          });

      }

  </script>


</body>
</html>
