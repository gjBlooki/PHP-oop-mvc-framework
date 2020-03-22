<?php 

return [
    '#^$#' => [\MyProject\Controllers\MainController::class, 'main'],
    '#^about-me$#' => [\MyProject\Controllers\MainController::class, 'about'],
    '#^hello/(.*)$#' => [\MyProject\Controllers\MainController::class, 'sayHello'],
    '#^bye/(.*)$#' => [\MyProject\Controllers\MainController::class, 'bye'],
    '#^articles/(\d+)$#' => [\MyProject\Controllers\ArticlesController::class, 'view'],
    '#^articles/(\d+)/edit$#' => [\MyProject\Controllers\ArticlesController::class, 'edit'],
    '#^articles/add$#' => [\MyProject\Controllers\ArticlesController::class, 'add'],
    '#^articles/(\d+)/delete$#' => [\MyProject\Controllers\ArticlesController::class, 'delete'],
    '#^articles/(\d+)/add-comment$#' => [\MyProject\Controllers\CommentsController::class, 'add'],
    '#^articles/(\d+)/comment-(\d+)$#' => [\MyProject\Controllers\CommentsController::class, 'view'],
    '#^articles/(\d+)/comment-(\d+)-edit$#' => [\MyProject\Controllers\CommentsController::class, 'edit'],
    '#^articles/(\d+)/comment-(\d+)-delete$#' => [\MyProject\Controllers\CommentsController::class, 'delete'],
    '#^user/register$#' => [\MyProject\Controllers\UsersController::class, 'signUp'],
    '#^user/login$#' => [\MyProject\Controllers\UsersController::class, 'login'],
    '#^user/logout$#' => [\MyProject\Controllers\UsersController::class, 'logout'],
    '#^admin/view$#' => [\MyProject\Controllers\AdminController::class, 'view'],
    '#^admin/articles$#' => [\MyProject\Controllers\AdminController::class, 'showArticles'],
    '#^admin/comments$#' => [\MyProject\Controllers\AdminController::class, 'showComments'],
];