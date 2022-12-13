<?php

use App\Controller\Homepage;
use App\Controller\Mangatest;
use App\Controller\Login;
use App\Controller\MangaEdit;
use App\Controller\MangaCommonEdit;
use App\Controller\Logoff;
use App\Controller\Register;
use App\Controller\Manga;
use App\Controller\Cart;
use App\Controller\Products;
use App\Controller\History;
use Framework\Routing\Route;

return [
    'routing' => [
        new Route('GET', '/', Homepage::class),
        new Route(['GET','POST'], '/test', Mangatest::class),
        new Route(['GET','POST'], '/login', Login::class),
        new Route(['GET','POST'], '/mangaEdit', MangaEdit::class),
        new Route(['GET','POST'], '/mangaCommonEdit', MangaCommonEdit::class),
        new Route(['GET','POST'], '/register', Register::class),
        new Route(['GET','POST'], '/logoff', Logoff::class),
        new Route(['GET','POST'], '/manga', Manga::class),
        new Route(['GET','POST'], '/cart', Cart::class),
        new Route(['GET','POST'], '/products', Products::class),
        new Route(['GET','POST'], '/history', History::class)
    ]
];
