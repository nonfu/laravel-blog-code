<?php

return [
    'name' => "Laravel 学院",
    'title' => "Laravel 学院",
    'subtitle' => 'http://laravelacademy.org',
    'description' => 'Laravel学院致力于提供优质Laravel中文学习资源',
    'author' => '学院君',
    'page_image' => 'home-bg.jpg',
    'posts_per_page' => 5,
    'rss_size' => 25,
    'uploads' => [
        'storage' => 'public',
        'webpath' => '/storage/uploads',
    ],
    'contact_email' => env('MAIL_FROM_ADDRESS')
];