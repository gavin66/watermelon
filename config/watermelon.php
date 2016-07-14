<?php

return [

    // 任务调度
    // * * * * * php /var/www/github/watermelon/artisan schedule:run 1>> /dev/null 2>&1

    // 数据库备份 修改PHP文件
    // /var/www/github/watermelon/vendor/backup-manager/laravel/src/Laravel51Compatibility.php
    // /var/www/github/watermelon/vendor/backup-manager/laravel/src/AutoComplete.php


    'title' => 'My Blog',
    'posts_per_page' => 5,

    'uploads' => [
        'storage' => 'local',
        'webpath' => '/uploads',
    ],

    'upload' => [
        'image' => public_path('upload/image'),
        'video' => public_path('upload/video'),
        'audio' => public_path('upload/audio')
    ],



    /*
    |--------------------------------------------------------------------------
    | 当前博客的版本号
    |--------------------------------------------------------------------------
    */
    'version'                => '1.0.0',


    /*
    |--------------------------------------------------------------------------
    | 命令名
    |--------------------------------------------------------------------------
    */
    'console_count_tag_category' => 'watermelon:count-tag-category', // 统计博客标签和分类数量


    /*
    |--------------------------------------------------------------------------
    | 日志
    |--------------------------------------------------------------------------
    */
    'schedule_log' => '/var/www/github/logs', // 更新标签云 日志位置


    /*
    |--------------------------------------------------------------------------
    | 后台项的链接URL
    |--------------------------------------------------------------------------
    */
    'backend_article'        => '/backend/article', // 文章列表
    'backend_article_create' => '/backend/article/create', // 新增文章
    'backend_category'       => '/backend/category', // 分类
    'backend_tag'            => '/backend/tag', // 标签


    /*
    |--------------------------------------------------------------------------
    | 多说
    |--------------------------------------------------------------------------
    */
    'ds_secret'              => '2c4b0204f13941e02891f304f505ebbf', // 密钥
    'ds_short_name'          => 'watermelon-api',
    'ds_range'               => 'monthly', //
    'ds_num_items'           => 5,

    /*
    |--------------------------------------------------------------------------
    | 数据请求返回码
    |--------------------------------------------------------------------------
    */
    '0'                      => '',
    '-1'                     => '系统错误,请稍后重试 !',
    '30001'                  => '测试码',

];
