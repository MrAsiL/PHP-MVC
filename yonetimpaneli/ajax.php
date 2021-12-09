<?php
@session_start();  //Oturum yapısı baslatıyor
@ob_start();     // yonlendirme ve bazı header ıslemlerı ıcın
define("DATA","data/"); //klasorun yolunu belırtmek ıcın yaptık
define("SAYFA","include/");//dahıl olucak dosyayı belırtıorum
define("SINIF","class/");
include_once (DATA."baglanti.php");
define("SITE",$siteURL);

if ($_POST)
{           /*     $_POST["ID"] */
    if (!empty($_POST["tablo"]) &&  !empty($_POST["ID"]) && !empty($_POST["durum"]))
    {
            $tablo=$VT->filter($_POST["tablo"]);
            $ID=$VT->filter($_POST["ID"]);
            $durum=$VT->filter($_POST["durum"]);
            $guncelle=$VT->SorguCalistir("UPDATE ".$tablo,"SET durum=? WHERE ID=?",array($durum,$ID),1);
            if ($guncelle!=false)
            {
                echo "TAMAM";
            }
            else
            {
                echo "HATA";
            }
    }
    else
    {
        echo "BOS";
    }
}


?>

