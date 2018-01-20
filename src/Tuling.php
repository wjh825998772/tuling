<?php
namespace Wjh\Tuling;

use Curl\Curl;


/**
 * 图灵机器人核心处理类
 * Class Handle
 * @package Wjh\Tuling
 */
class Tuling
{

    /**
     * @var Curl
     */
    protected $curl;

    /**
     * Handle constructor.
     * @param $config
     */
    public function __construct($appUrl, $appKey, Curl $curl)
    {
        $this->appUrl = $appUrl;
        $this->appKey = $appKey;
        $this->curl = $curl;
    }

    /**
     * 图灵机器人核心处理
     *
     * @param $message
     */
    public function handle($message)
    {
        $data = [
            'key' => $this->appKey,
            'info' => $message,
        ];
        $this->curl->post($this->appUrl, $data);
        if ($this->curl->response->code != 100000)
        {
            return '接口调用失败';
        }
        return $this->curl->response->text;
    }


}