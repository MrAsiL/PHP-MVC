<?php

@session_start();  //Oturum yapısı baslatıyor
@ob_start();     // yonlendirme ve bazı header ıslemlerı ıcın


include_once(DATA . "baglanti.php");

define("ANASITE", $siteURL);


if (!empty($_GET["ID"]))
{
    $ID=$VT->filter($_GET["ID"]);


        $veri=$VT->VeriGetir("banner","WHERE ID=?",array($ID),"ORDER BY ID ASC",1);
        if ($veri!=false)
        {
            $resim=$veri[0]["resim"];
                if (file_exists("../images/banner/".$resim))
                {
                    unlink("../images/banner/".$resim);
                }
            $sil=$VT->SorguCalistir("DELETE FROM banner" ,"WHERE ID=?",array($ID),1);
            ?>
            <meta http-equiv="refresh" content="0;url=<?=SITE?>banner-liste">
            <?php
        }
        else
        {
            ?>
            <meta http-equiv="refresh" content="0;url=<?=SITE?>banner-liste">
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
