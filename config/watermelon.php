<?php

return [

    // 任务调度
    // * * * * * php /var/www/github/watermelon/artisan schedule:run 1>> /dev/null 2>&1

    // 数据库备份 修改PHP文件
    // /var/www/github/watermelon/vendor/backup-manager/laravel/src/Laravel51Compatibility.php
    // /var/www/github/watermelon/vendor/backup-manager/laravel/src/AutoComplete.php


    'title'          => env('TITLE','My Blog'),


    /*
    |--------------------------------------------------------------------------
    | 当前博客的版本号
    |--------------------------------------------------------------------------
    */
    'version'                    => '1.0.0',


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
    'schedule_log'               => storage_path('logs/schedule.log'), // 更新标签云 日志位置


    /*
    |--------------------------------------------------------------------------
    | 后台项的链接URL
    |--------------------------------------------------------------------------
    */
    'backend_article'            => '/backend/article', // 文章列表
    'backend_article_create'     => '/backend/article/create', // 新增文章
    'backend_category'           => '/backend/category', // 分类
    'backend_tag'                => '/backend/tag', // 标签
    'backend_media'              => '/backend/media', // 多媒体
    'backend_media_create'       => '/backend/media/create', // 新增多媒体


    /*
    |--------------------------------------------------------------------------
    | 多说
    |--------------------------------------------------------------------------
    */
    'ds_secret'                  => env('DS_SECRET',''), // 密钥
    'ds_short_name'              => env('DS_SHORT_NAME',''), // 多说二级域名
    'ds_range'                   => env('DS_RANGE',''),
    'ds_num_items'               => env('DS_NUM_ITEMS',''),

    /*
    |--------------------------------------------------------------------------
    | 数据请求返回码
    |--------------------------------------------------------------------------
    */
    '0'                          => '',
    '-1'                         => '系统错误,请稍后重试 !',
    '30001'                      => '测试码',

];
