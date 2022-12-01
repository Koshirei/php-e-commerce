<?php

use App\Controller\Homepage;
use App\Controller\Mangatest;
use App\Controller\Login;
use Framework\Routing\Route;

return [
    'routing' => [
        new Route('GET', '/', Homepage::class),
        new Route(['GET','POST'], '/test', Mangatest::class),
        new Route(['GET','POST'], '/login', Login::class),
    ]
];
