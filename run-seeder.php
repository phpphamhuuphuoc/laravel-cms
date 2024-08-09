<?php

use PHPCorp\LaravelCms\Models\CategoryType;
use PHPCorp\LaravelCms\Models\Template;


// Include Composer's autoloader
require __DIR__ . '/vendor/autoload.php';

// Bootstrap Laravel framework
$app = require_once __DIR__ . '/bootstrap/app.php';

// Ensure we use the Laravel ORM (Eloquent)
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

// Your data to seed
$dataCategoryType = [
    [
        'id' => 1,
        'title' => 'Collections',
        'desc' => 'Bao gồm Trang , Landing , Bài viết , Sản phẩm, ...',
        'type' => 'collection',
        'is_many' => true,
        'is_list' => true,
    ],
    [
        'id' => 2,
        'title' => 'Assets',
        'desc' => 'Bao gồm các nội dung: Hình ảnh, Tài liệu, ...',
        'type' => 'asset',
    ],
    [
        'id' => 3,
        'title' => 'Forms',
        'desc' => 'Bao gồm các thực thể tiếp nhận dữ liệu từ người dùng cuối : Form Contact, Form Register Member, ...',
        'type' => 'form',
        'is_many' => true,
        'is_list' => true,
    ],
    [
        'id' => 4,
        'title' => 'Navigations',
        'desc' => 'Bao gồm các thực thể chuyển hướng : Menu, Nav ...',
        'type' => 'navigation',
        'is_many' => true,
    ],
    [
        'id' => 5,
        'title' => 'Classifications',
        'desc' => 'Bao gồm các thực thể phân loại : Tags, ...',
        'type' => 'classification',
        'is_many' => true,
        'is_list' => true,
    ],
    [
        'id' => 6,
        'title' => 'Globals',
        'desc' => 'Bao gồm các thông tin liên quan và được sử dụng rộng rãi : Info Company, Info Representative, ...',
        'type' => 'global',
        'is_many' => true,
    ],
    // Uncomment and add more items if necessary
    // [
    //     'id' => 8,
    //     'title' => 'Others',
    //     'desc' => 'Các thực thể khác : List User, List Role ...',
    //     'type' => 'other',
    //     'is_many' => true,
    //     'is_list' => true,
    // ],
];

$dataTemplate = [
    [
        'id' => 1,
        'title' => 'default',
        'desc' => 'Trang mặc định',
    ],
    [
        'id' => 2,
        'title' => 'empty',
        'desc' => 'Trang rỗng',
    ],
    [
        'id' => 3,
        'title' => 'home',
        'desc' => 'Trang chủ',
    ],
    [
        'id' => 4,
        'title' => 'landing',
        'desc' => 'Trang landing',
    ],
    [
        'id' => 5,
        'title' => 'form',
        'desc' => 'Trang liên hệ',
    ],
    [
        'id' => 6,
        'title' => 'news/index',
        'desc' => 'Trang danh sách một thực thể như : Bài viết , Sản phẩm , ...',
    ],
    [
        'id' => 7,
        'title' => 'news/detail',
        'desc' => 'Trang chi tiết một thực thể như : Bài viết , Sản phẩm , ...',
    ],
    [
        'id' => 8,
        'title' => 'search',
        'desc' => 'Trang kết quả tìm kiếm',
    ],

];

// Seed the data into the database
collect($dataCategoryType)->each(function ($item) {
    CategoryType::create($item);
});
collect($dataTemplate)->each(function ($template) { Template::create($template); });