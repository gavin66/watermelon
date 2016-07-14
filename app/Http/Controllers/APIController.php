<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use RedisManager;

class APIController extends Controller {
    //
    public function thumbsUp() {
        $count = RedisManager::command('incr', [ 'watermelon_thumbs_up_count' ]);

        return [ 'count' => $count ];
    }

    public function getTags() {

        return RedisManager::command('GET', [ 'watermelon_tags' ]);

    }

    public function getCategories() {

        return RedisManager::command('GET', [ 'watermelon_categories' ]);

    }

    public function upload( Request $request ) {
        $error = [
            'success' => 0,
            'message' => '上传失败'
        ];
        //判断请求中是否包含name=file的上传文件
        if ( !$request->hasFile('editormd-image-file') ) {
            exit( '上传文件为空！' );
        }
        $file = $request->file('editormd-image-file');
        //判断文件上传过程中是否出错
        if ( !$file->isValid() ) {
            return json_encode($error);
        }
        $destPath = realpath(public_path('upload'));
        if ( !file_exists($destPath) ) {
            mkdir($destPath, 0755, true);
        }

        $filename = $file->getClientOriginalName();
        $upFile = $file->move($destPath, $filename);
        if ( !$upFile ) {

            return json_encode($error);
        }


        $success = [
            'success' => 1,
            'message' => '上传成功',
            'url'     => DIRECTORY_SEPARATOR.'upload'.DIRECTORY_SEPARATOR.$filename
            // $upFile->getRealPath()
        ];

        \Log::info('图片上传日志', [
            '$destPath' => $destPath,
            '$filename' => $filename,
            'realFile'  => $upFile->getRealPath(),
            'publicPath' => DIRECTORY_SEPARATOR.'upload'.DIRECTORY_SEPARATOR.$filename
        ]);

        return json_encode($success);
    }


}
