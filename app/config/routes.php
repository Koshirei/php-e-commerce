<?php

use App\Controller\Homepage;
use App\Controller\Mangatest;
use App\Controller\Login;
use App\Controller\MangaEdit;
use App\Controller\MangaCommonEdit;
use App\Controller\MangaVolumeEditList;
use App\Controller\MangaVolumeEdit;
use App\Controller\MangaAdd;
use App\Controller\Logoff;
use App\Controller\Register;
use App\Controller\Manga;
use App\Controller\Cart;
use App\Controller\Products;
use Framework\Routing\Route;

return [
    'routing' => [
        new Route('GET', '/', Homepage::class),
        new Route(['GET','POST'], '/test', Mangatest::class),
        new Route(['GET','POST'], '/login', Login::class),
        new Route(['GET','POST'], '/mangaEdit', MangaEdit::class),
        new Route(['GET','POST'], '/mangaCommonEdit', MangaCommonEdit::class),
        new Route(['GET','POST'], '/mangaVolumeEditList', MangaVolumeEditList::class),
        new Route(['GET','POST'], '/mangaVolumeEdit', MangaVolumeEdit::class),
        new Route(['GET','POST'], '/mangaAdd', MangaAdd::class),
        new Route(['GET','POST'], '/register', Register::class),
        new Route(['GET','POST'], '/logoff', Logoff::class),
        new Route(['GET','POST'], '/manga', Manga::class),
        new Route(['GET','POST'], '/cart', Cart::class),
        new Route(['GET','POST'], '/products', Products::class)
    ]
];
