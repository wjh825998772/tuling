<?php
namespace Wjh\Tuling;

use Curl\Curl;


/**
 * 图灵机器人核心处理类
 * Class Handle
 * @package Wjh\Tuling
 */
class Handle
{
    /**
     * Handle constructor.
     * @param $config
     */
    public function __construct($config)
    {
        $this->appUrl = $config['app_url'];
        $this->appKey = $config['app_key'];
    }

    /**
     * 图灵机器人核心处理
     *
     * @param $message
     * @return mixed
     */
    public function handle($message)
    {
        $curl = new Curl();
        $data = [
            'key' => $this->appKey,
            'info' => $message,
        ];
        $curl->post($this->appUrl, $data);
        return $curl->response->text;
    }

}