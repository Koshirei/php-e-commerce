<?php

use App\Controller\Homepage;
use App\Controller\Mangatest;
use Framework\Routing\Route;

return [
    'routing' => [
        new Route('GET', '/', Homepage::class),
        new Route('GET', '/test', Mangatest::class),
    ]
];
