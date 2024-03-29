<?php
?>


<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=SITE?>" class="brand-link">
        <img src="<?=SITE?>dist/img/yonetimlogo.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=SITE?>dist/img/yonetimlogo.png" class="img-circle " alt="User Image">
            </div>
            <div class="info">
                <a href="<?=SITE?>" class="d-block"><?= $_SESSION ["adsoyad"] ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?=SITE?>modul-ekle" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Modül Ekle

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=SITE?>banner-liste" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            BANNER

                        </p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Sayfalar
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php
                            $moduller=$VT->VeriGetir("moduller","WHERE durum=?",array(1),"ORDER BY ID ASC");
                            if ($moduller!=false)
                            {
                                for ($i=0;$i<count($moduller);$i++)
                                {
                                        ?>
                                            <li class="nav-item">
                                                <a href="<?=SITE?>liste/<?=$moduller[$i]["tablo"]?>" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p><?=$moduller[$i]["baslik"]?></p>
                                                </a>
                                            </li>

                                        <?php
                                }
                            }
                            ?>
                        </ul>
                </li>
                <li class="nav-item">
                    <a href="<?=SITE?>seo-ayarlari" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                           Seo Ayarları
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=SITE?>iletisim-ayarlari" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            İletişim Ayarları
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=SITE?>cikis" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>
                            ÇIKIŞ YAP
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
