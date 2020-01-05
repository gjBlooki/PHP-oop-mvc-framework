<?php 

return [
    '#^$#' => [\MyProject\Controllers\MainController::class, 'main'],
    //'#^about-me$#' => [\MyProject\Controllers\MainController::class, 'main'],
    '#^hello/(.*)$#' => [\MyProject\Controllers\MainController::class, 'sayHello'],
    '#^bye/(.*)$#' => [\MyProject\Controllers\MainController::class, 'bye'],
    '#^articles/(\d+)$#' => [\MyProject\Controllers\ArticlesController::class, 'view']
];