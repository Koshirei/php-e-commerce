<?php

use App\Controller\Homepage;
use App\Controller\Mangatest;
use App\Controller\Login;
use App\Controller\Logoff;
use App\Controller\Register;
use Framework\Routing\Route;

return [
    'routing' => [
        new Route('GET', '/', Homepage::class),
        new Route(['GET','POST'], '/test', Mangatest::class),
        new Route(['GET','POST'], '/login', Login::class),
        new Route(['GET','POST'], '/register', Register::class),
        new Route(['GET','POST'], '/logoff', Logoff::class),
    ]
];
