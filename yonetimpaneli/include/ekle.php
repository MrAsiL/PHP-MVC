<?php
if (!empty($_GET["tablo"]))
{
    $tablo=$VT->filter($_GET["tablo"]);
    $kontrol=$VT->VeriGetir("moduller","WHERE tablo=? AND durum=?",array($tablo,1),"ORDER BY ID ASC",1);
    if ($kontrol!=false)
    {
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $kontrol[0] ["baslik"]?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?=SITE?>">Ana Sayfa </a></li>
                                <li class="breadcrumb-item active"><?= $kontrol[0] ["baslik"]?></li>
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
                            <a href="<?=SITE?>ekle/<?=$kontrol[0]["tablo"]?>" class="btn btn-success" style="float: right;margin: 10px;"><i class="fa fa-plus"></i> YENİ EKLE</a>
                            <a href="<?=SITE?>liste/<?=$kontrol[0]["tablo"]?>" class="btn btn-info" style="float: right;margin: 10px; margin-left: 10px;"><i class="fas fa-bars"></i>LİSTE</a>
                        </div>
                    </div>
                        <?php
                           if ($_POST)
                               {
                                   if (!empty($_POST["kategori"]) && !empty($_POST["baslik"]) && !empty($_POST["anahtar"])&& !empty($_POST["description"])
                                       && !empty($_POST["sirano"]))
                                       {
                                           $kategori=$VT->filter($_POST["kategori"]);
                                           $baslik=$VT->filter($_POST["baslik"]);
                                           $anahtar=$VT->filter($_POST["anahtar"]);
                                           $seflink=$VT->seflink($baslik);
                                           $description=$VT->filter($_POST["description"]);
                                           $sirano=$VT->filter($_POST["sirano"]);
                                           $metin=$VT->filter($_POST["metin"],true);
                                           if (!empty($_FILES["resim"]["name"]))
                                               {
                                                   $yukle=$VT->upload("resim","../images/");
                                                   if ($yukle!=false)
                                                       {
                                                            $ekle=$VT->SorguCalistir("INSERT INTO ".$kontrol[0]["tablo"],"SET baslik=?
                                                            ,seflink=?,kategori=?,metin=?,resim=?,anahtar=?,description=?,durum=?,sirano=?,tarih=?",
                                                            array($baslik,$seflink,$kategori,$metin,$yukle,$anahtar,$description,1,$sirano,date("Y-m-d")));
                                                       }
                                                   else
                                                       {
                                                           ?>
                                                           <div class="alert alert-info">Resim yükleme işleminiz başarısız.</div>
                                                           <?php
                                                       }
                                               }
                                           else
                                               {
                                                   $ekle=$VT->SorguCalistir("INSERT INTO ".$kontrol[0]["tablo"],"SET baslik=?
                                                            ,seflink=?,kategori=?,metin=?,anahtar=?,description=?,durum=?,sirano=?,tarih=?",
                                                       array($baslik,$seflink,$kategori,$metin,$anahtar,$description,1,$sirano,date("Y-m-d")));
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
                                        <label>Kategori Seç</label>
                                        <select class="form-control select2" style="width: 100%;" name="kategori">
                                                <?php
                                                    $sonuc=$VT->kategoriGetir($kontrol[0] ["tablo"],"",-1);
                                                    if ($sonuc!=false)
                                                        {
                                                            echo $sonuc;
                                                        }
                                                    else
                                                        {
                                                            $VT->tekKategori($kontrol[0] ["tablo"]);
                                                        }
                                                ?>
                                        </select>
                                    </div>
                                 </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Başlık</label>
                                        <input type="text" class="form-control" placeholder="Başlık ..." name="baslik">
                            </div>
                        </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Açıklama</label>
                                        <textarea id="summernote" name="metin">
                                                Açıklama alanıdır.
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Anahtar</label>
                                        <input type="text" class="form-control" placeholder="Anahtar ..." name="anahtar">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" class="form-control" placeholder="Description ..." name="description">
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
                                        <?php 
                                          $valueal = $VT->VeriGetir("bloglar",'','',"ORDER BY sirano desc,1");
                                         ?>
                                        <input type="number" class="form-control" placeholder="Sıra No ..." name="sirano" style="width: 100px;" value="<?php echo $valueal[0]['sirano']+1 ?>">
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
        ?>
        <meta http-equiv="refresh" content="0;url=<?=SITE?>">
        <?php
    }
}
else
{
    ?>
    <meta http-equiv="refresh" content="0;url=<?=SITE?>">
    <?php
}

?>
