
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Seo Ayarları</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?=SITE?>">Ana Sayfa </a></li>
                                <li class="breadcrumb-item active">Seo Ayarları</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <?php
                    if ($_POST)
                    {
                        if (!empty($_POST["baslik"]) && !empty($_POST["anahtar"])&& !empty($_POST["description"]))
                        {
                            $baslik=$VT->filter($_POST["baslik"]);
                            $anahtar=$VT->filter($_POST["anahtar"]);
                            $description=$VT->filter($_POST["description"]);

                                $guncelle=$VT->SorguCalistir("UPDATE ayarlar","SET baslik=?
                                                            ,anahtar=?,aciklama=? WHERE ID=?",
                                    array($baslik,$anahtar,$description,1),1);
                            if ($guncelle!=false)
                            {
                                ?>
                                <div class="alert alert-success">İşlem başarıyla kaydedildi.</div>
                                <meta http-equiv="refresh" content="2;url=<?=SITE?>seo-ayarlari"/>
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
                                                <label>Site Başlık</label>
                                                <input type="text" class="form-control" placeholder="Site Başlık ..." name="baslik" value="<?=$sitebaslik?>">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Anahtar</label>
                                                <input type="text" class="form-control" placeholder="Anahtar ..." name="anahtar" value="<?= $siteanahtar?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <input type="text" class="form-control" placeholder="Description ..." name="description" value="<?=$siteaciklama ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-block btn-primary">GUNCELLE</button>
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
