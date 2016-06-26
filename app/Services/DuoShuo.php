<?php namespace App\Services;

use GuzzleHttp\Client;

/**
 * Created by PhpStorm.
 * User: Gavin
 * Date: 16/6/21
 * Time: 09:34
 */
class DuoShuo {
    private $secret = '站点设置当中查看';
    private $short_name = '站点设置当中查看';
    private $last_log_id = '上一次同步时读到的最后一条log的ID，开发者自行维护此变量（如保存在你的数据库）。';

    /**
     * 获取热评文章
     *
     * @param array $params
     *
     * @return array
     */
    public function getHotArticles( $params = [ ], $is_json = true ) {
        $default_params = [
            'short_name' => config('watermelon.ds_short_name'), // 站点申请的多说二级域名。例如：你注册了http://apitest.duoshuo.com/时，多说二级域名为**apitest**。
            'range'      => config('watermelon.ds_range'), // 获取的范围。daily：每日热评文章； weekly：每周热评文章； monthly：每月热评文章；all：总热评文章。
            'num_items'  => config('watermelon.ds_num_items') // 获取的条数。默认为5条。
//            'channel_key' => 1, // 文章所属的频道。 用处不明
        ];

        $params = array_merge($default_params, $params);

        $client = new Client([
            'base_uri' => 'http://api.duoshuo.com',
        ]);

        $response = $client->get('/sites/listTopThreads.json', [ 'query' => $params ]);

        $data = $response->getBody();

//        return $data;

        $data = json_decode($data, 1);

        if ( $is_json ) {
            return json_encode($data['response']);
        } else {
            return $data['response'];
        }

    }

    /**
     *
     * 获取评论数据
     *
     */
    public function sync_log() {
        if ( $this->check_signature($_POST) ) {

            $limit = 20;

            $params = [
                'limit' => $limit,
                'order' => 'asc',
            ];


            $posts = [ ];

            if ( !$this->last_log_id )
                $last_log_id = 0;

            $params['since_id'] = $this->last_log_id;
            //自己找一个php的 http 库
            $http_client = new Client();
            $response = $http_client->request('GET', 'http://api.duoshuo.com/log/list.json', $params);


//            $response = new Request('get','',[],[],[]);

            if ( !isset( $response['response'] ) ) {
                //处理错误,错误消息$response['message'], $response['code']
                //...

            } else {
                //遍历返回的response，你可以根据action决定对这条评论的处理方式。
                foreach ( $response['response'] as $log ) {

                    switch ( $log['action'] ) {
                        case 'create':
                            //这条评论是刚创建的
                            break;
                        case 'approve':
                            //这条评论是通过的评论
                            break;
                        case 'spam':
                            //这条评论是标记垃圾的评论
                            break;
                        case 'delete':
                            //这条评论是删除的评论
                            break;
                        case 'delete-forever':
                            //彻底删除的评论
                            break;
                        default:
                            break;
                    }

                    //更新last_log_id，记得维护last_log_id。（如update你的数据库）
                    if ( strlen($log['log_id']) > strlen($this->last_log_id) || strcmp($log['log_id'], $this->last_log_id) > 0 ) {
                        $last_log_id = $log['log_id'];
                    }

                }


            }


        }
    }

    /**
     *
     * 检查签名
     *
     */
    function check_signature( $input ) {

        $signature = $input['signature'];
        unset( $input['signature'] );

        ksort($input);
        $baseString = http_build_query($input, null, '&');
        $expectSignature = base64_encode($this->hmacsha1($baseString, $this->secret));
        if ( $signature !== $expectSignature ) {
            return false;
        }

        return true;
    }

    // from: http://www.php.net/manual/en/function.sha1.php#39492
    // Calculate HMAC-SHA1 according to RFC2104
    // http://www.ietf.org/rfc/rfc2104.txt
    function hmacsha1( $data, $key ) {
        if ( function_exists('hash_hmac') )
            return hash_hmac('sha1', $data, $key, true);

        $blocksize = 64;
        if ( strlen($key) > $blocksize )
            $key = pack('H*', sha1($key));
        $key = str_pad($key, $blocksize, chr(0x00));
        $ipad = str_repeat(chr(0x36), $blocksize);
        $opad = str_repeat(chr(0x5c), $blocksize);
        $hmac = pack(
            'H*', sha1(
                ( $key ^ $opad ) . pack(
                    'H*', sha1(
                        ( $key ^ $ipad ) . $data
                    )
                )
            )
        );

        return $hmac;
    }


}