<?php
namespace Wjh\Tuling\Tests;

use PHPUnit_Framework_TestCase;
use Wjh\Tuling\Tuling;
use Mockery as m;

class TulingTest extends PHPunit_Framework_TestCase
{

    /**
     * @var \MockeryTest_Interface
     */
    protected $mockCurl;

    public function setUp()
    {
        $this->mockCurl = m::mock('overload:Curl\Curl')->makePartial();
    }

    public function tearDown()
    {
        m::close();
    }

    /**
     * 测试处理消息成功
     */
    public function testTulingCanHandleMessage()
    {
        $appUrl = 'http://www.testurl.com';
        $appKey = 'testkey';
        $message = '你好';
        $requestData = [
            'key' => $appKey,
            'info' => $message,
        ];

        $this->mockCurl->shouldReceive('post')
            ->once()
            ->with($appUrl, $requestData)
            ->set('response', (object)['code'=>100000, 'text'=>'good']);
        $tuling = new Tuling($appUrl, $appKey, $this->mockCurl);
        $message = $tuling->handle($message);
        $this->assertEquals('good', $message);
    }

    /**
     * 测试处理消息失败
     */
    public function testTulingCanNotHandleMessage()
    {
        $appUrl = 'http://www.testurl.com';
        $appKey = 'testkey';
        $message = '你好';
        $requestData = [
            'key' => $appKey,
            'info' => $message,
        ];

        $this->mockCurl->shouldReceive('post')
            ->once()
            ->with($appUrl, $requestData)
            ->set('response', (object)['code'=>0, 'text'=>'good']);

        $tuling = new Tuling($appUrl, $appKey, $this->mockCurl);
        $result = $tuling->handle($message);
        $this->assertEquals('接口调用失败', $result);
    }


}
