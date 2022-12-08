<?php

use App\Controller\Homepage;
use App\Controller\Mangatest;
use App\Controller\Login;
use App\Controller\MangaEdit;
use App\Controller\MangaCommonDelete;
use Framework\Routing\Route;

return [
    'routing' => [
        new Route('GET', '/', Homepage::class),
        new Route(['GET','POST'], '/test', Mangatest::class),
        new Route(['GET','POST'], '/login', Login::class),
        new Route(['GET','POST'], '/mangaEdit', MangaEdit::class),
        new Route(['GET','POST'], '/mangaCommonDelete', MangaCommonDelete::class),
    ]
];
