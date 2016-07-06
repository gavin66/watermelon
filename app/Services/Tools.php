<?php
/**
 * Created by PhpStorm.
 * User: Gavin
 * Date: 16/1/31
 * Time: 21:36
 */

if ( !function_exists('file_test_connect') ) {
    /**
     * 测试网络连接
     *
     * @param $url
     *
     * @return bool
     */
    function file_test_connect( $url ) {
        $file = @fopen($url, "r");
        if ( $file ) {
            $is = true;
            fclose($file);
        } else {
            $is = false;
        }

        return $is;
    }
}

if ( !function_exists('cdn_file_test') ) {
    /**
     * 返回可用连接,$prefix 前缀 例如: 'http:','https:' $cdnLink cdn连接,$fileLink 本地文件系统连接
     *
     * @param string $prefix
     * @param string $cdnLink
     * @param string $fileLink
     *
     * @return string
     */
    function cdn_file_test( $prefix, $cdnLink, $fileLink ) {
        if ( file_test_connect($prefix . $cdnLink) ) {
            return $cdnLink;
        }

        return $fileLink;
    }
}

if ( !function_exists('getFileAllContents') ) {
    /**
     * 获取一个文件内容 $filename 文件的路径
     *
     * @param string $filename
     *
     * @return string
     */
    function getFileAllContents( $filename ) {
        $handle = fopen($filename, 'r');
        $contents = fread($handle, filesize($filename));
        fclose($handle);

        return $contents;
    }
}

if ( !function_exists('getVersion') ) {
    /**
     * 获取当前博客的版本号
     *
     * @return mixed
     */
    function getVersion() {
        return config('watermelon.version');
    }
}

if ( !function_exists('returnData') ) {
    /**
     * 返回数据
     *
     * @param string $code
     * @param array  $data
     * @param bool   $to_json
     *
     * @return array|string
     */
    function returnData( $code = true, $data = [ ], $to_json = false ) {
        if ( is_bool($code) ) {
            if ( $code ) $code = 0;
            else $code = -1;
        }

        $data = [
            'code'      => $code,
            'desc'      => config('watermelon.' . $code),
            'data'      => $data,
            'timestamp' => time(),
            'version'   => getVersion()
        ];

        if ( $to_json ) {
            return json_encode($data);
        } else {
            return $data;
        }

    }
}
if ( !function_exists('getTagClass') ) {

    /**
     * 跟进标签名获取标签样式类
     *
     * @param $name
     *
     * @return mixed|string
     */
    function getTagClass( $name ) {
        $class = RedisManager::command('hget', [ 'watermelon_tag_class', $name ]);

        if ( is_null($class) ) {
            $class = 'tag-piece-conifer';
        }

        return $class;
    }
}

if ( !function_exists('getTagCountData') ) {
    /**
     * 获取标签云数据
     * @return mixed
     */
    function getTagCountData(){

        return RedisManager::command('HGETALL',['watermelon_tag_count']);

    }
}


if ( !function_exists('getCategoryCountData') ) {
    /**
     * 获取分类数据
     * @return mixed
     */
    function getCategoryCountData(){

        return RedisManager::command('HGETALL',['watermelon_category_count']);

    }
}

if ( !function_exists('getTagCountLength') ) {
    /**
     * 获取标签长度
     * @return mixed
     */
    function getTagCountLength(){

        return RedisManager::command('HLEN',['watermelon_tag_count']);

    }
}

if ( !function_exists('getCategoryCountLength') ) {
    /**
     * 获取分类长度
     * @return mixed
     */
    function getCategoryCountLength(){

        return RedisManager::command('HLEN',['watermelon_category_count']);

    }
}

if( !function_exists('getThumbsUpCount') ) {
    /**
     * 获取点赞次数
     * @return mixed
     */
    function getThumbsUpCount(){

        return RedisManager::command('GET',['watermelon_thumbs_up_count']);

    }
}

