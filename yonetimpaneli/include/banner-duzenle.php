<?php
if (!empty($_GET["ID"]))
{

$ID=$VT->filter($_GET["ID"]);

    $veri=$VT->VeriGetir("banner","WHERE ID=?",array($ID),"ORDER BY ID ASC",1);
    if ($veri!=false)
    {

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Banner Düzenle</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?=SITE?>">Ana Sayfa </a></li>
                        <li class="breadcrumb-item active">Banner Düzenle</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="<?=SITE?>banner-ekle" class="btn btn-success" style="float: right;margin: 10px;"><i class="fa fa-plus"></i> YENİ EKLE</a>
                    <a href="<?=SITE?>banner-liste" class="btn btn-info" style="float: right;margin: 10px; margin-left: 10px;"><i class="fas fa-bars"></i>LİSTE</a>
                </div>
            </div>
            <?php
            if ($_POST)
            {
                if ( !empty($_POST["baslik"])  && !empty($_POST["sirano"]))
                {

                    $baslik=$VT->filter($_POST["baslik"]);
                    $aciklama=$VT->filter($_POST["aciklama"]);
                    $url=$VT->filter($_POST["url"]);
                    $sirano=$VT->filter($_POST["sirano"]);
                    if (!empty($_FILES["resim"]["name"]))
                        {
                            $yukle=$VT->upload("resim","../images/banner/");
                            if ($yukle!=false)
                            {
                                $ekle=$VT->SorguCalistir("UPDATE banner","SET baslik=? 
                                                            ,aciklama=?,url=?,resim=?,durum=?,sirano=?,tarih=? WHERE ID=?",
                                    array($baslik,$aciklama,$url,$yukle,1,$sirano,date("Y-m-d"),$veri[0]["ID"]),1);
                            }
                            else
                            {
                                $ekle=false;
                                ?>
                                <div class="alert alert-info">Resim yükleme işleminiz başarısız.</div>
                                <?php
                            }
                        }
                    else
                        {
                            $ekle=$VT->SorguCalistir("UPDATE banner","SET baslik=? 
                                                            ,aciklama=?,url=?,durum=?,sirano=?,tarih=? WHERE ID=?",
                                array($baslik,$aciklama,$url,1,$sirano,date("Y-m-d"),$veri[0]["ID"]),1);
                        }

                }

                if ($ekle!=false)
                {
                    ?>
                    <div class="alert alert-success">İşlem başarıyla kaydedildi.</div>
                    <?php

                }
                else
                {
                    ?>
                    <div class="alert alert-danger">İşlem sırasında Sorunla karşılaşıldı.</div>
                    <?php
                }

            }
            else
            {
                ?>
                <div class="alert alert-danger">Boş bıraktığınız alanları doldurunuz.</div>
                <?php


            }
            ?>

            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">

                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="col-md-8">
                        <!-- /.card-header -->
                        <div class="card-body card card-primary">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Başlık</label>
                                        <input type="text" class="form-control" placeholder="Başlık ..." name="baslik"value="<?=$veri[0]["baslik"]?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Açıklama</label>
                                        <input type="text" class="form-control" placeholder="Açıklama ..." name="aciklama"value="<?=$veri[0]["aciklama"]?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Resim</label>
                                        <input type="file" class="form-control" placeholder="Resim seçiniz ..." name="resim">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Sıra no</label>
                                        <input type="number" class="form-control" placeholder="Sıra No ..." name="sirano"value="<?=$veri[0]["sirano"]?>" style="width: 100px;">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Url</label>
                                        <input type="text" class="form-control" placeholder="Url Adresi ..." name="url"value="<?=$veri[0]["url"]?>" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block btn-primary">KAYDET</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /.card -->
            </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
    }
        else
        {
         echo "Hatalı bilgi gönderildi.";
        }
    }
        else
        {
            ?>
            <div class="alert alert-danger" style="width: auto;"> <?php echo "Bu Sayfaya Erişim izniniz bulunmamaktadır."?></div>
            <?php
        }

?>