<?php

namespace Services\mysql_PDO;

use PDO;
use Services\mysql_PDO\getMangaCommon;
use Database\Database;

class MangaVolumeAddService{

    public function MangaVolumeAddService(){
        $db = Database::getInstance($_POST);
        
        $title = htmlspecialchars($_GET['title']);

        // echo(var_dump($title));

        // $MangaCommon = new getMangaCommon;
        // $mangaCommon = $MangaCommon->getMangaCommon($title);

        // echo('<br><br><br>');
        // echo(var_dump($mangaCommon));

        // echo('<br><br><br>');
        // $mangaCommonId = $mangaCommon['common_id'];
        // echo(var_dump($mangaCommonId));


        // // die;

        // $volume_number = htmlspecialchars($_POST['volume_number']);
        // $cover_url = htmlspecialchars($_POST['cover_url']);
        // $stock = htmlspecialchars($_POST['stock']);
        // $price = htmlspecialchars($_POST['price']);

        // $common_id = htmlspecialchars($_POST['common_id']);

        // $addedVolumeManga = $db->prepare (" INSERT INTO manga_volume (common_id, volume_number, cover_url, stock, price)
        //                                     VALUES (:common_id, :volume_number, :cover_url, :stock, :price)
        //                                     WHERE manga_common.title = :title
        //                                     AND manga_common.common_id = :common_id
        //                                 ");
        
        // $addedVolumeManga->bindParam("title", $title);
        // $addedVolumeManga->bindParam("common_id", $mangaCommonId);
        // $addedVolumeManga->bindParam("volume_number", $volume_number);
        // $addedVolumeManga->bindParam("cover_url", $cover_url);
        // $addedVolumeManga->bindParam("stock", $stock);
        // $addedVolumeManga->bindParam("price", $price);
        // $addedVolumeManga->execute();

        // $addedVolumeManga = $addedVolumeManga->fetch();

        return $addedVolumeManga;
    }

}