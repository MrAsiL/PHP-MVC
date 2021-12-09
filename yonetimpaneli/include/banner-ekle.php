
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Banner Ekle</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?=SITE?>">Ana Sayfa </a></li>
                                <li class="breadcrumb-item active">Banner Ekle</li>
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
                        if ( !empty($_POST["baslik"])  && !empty($_POST["sirano"]) && !empty($_FILES["resim"]["name"]))
                        {

                            $baslik=$VT->filter($_POST["baslik"]);
                            $aciklama=$VT->filter($_POST["aciklama"]);
                            $url=$VT->filter($_POST["url"]);
                            $sirano=$VT->filter($_POST["sirano"]);

                                $yukle=$VT->upload("resim","../images/banner/");
                                if ($yukle!=false)
                                {
                                    $ekle=$VT->SorguCalistir("INSERT INTO banner","SET baslik=? 
                                                            ,aciklama=?,url=?,resim=?,durum=?,sirano=?,tarih=?",
                                        array($baslik,$aciklama,$url,$yukle,1,$sirano,date("Y-m-d")));
                                }
                                else
                                {
                                    $ekle=false;
                                    ?>
                                    <div class="alert alert-info">Resim yükleme işleminiz başarısız.</div>
                                    <?php
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
                                                <input type="text" class="form-control" placeholder="Başlık ..." name="baslik">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Açıklama</label>
                                                <input type="text" class="form-control" placeholder="Açıklama ..." name="aciklama">
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
                                                <input type="number" class="form-control" placeholder="Sıra No ..." name="sirano" style="width: 100px;">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Url</label>
                                                <input type="text" class="form-control" placeholder="Url Adresi ..." name="url" >
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
