<?php
namespace Wjh\Tuling\Tests;

use PHPUnit_Framework_TestCase;
use Wjh\Tuling\Tuling;

class TulingTest extends PHPunit_Framework_TestCase
{

    /**
     * 测试处理消息成功
     */
    public function testTulingCanHandleMessage()
    {
        $mockCurl = $this->getMockBuilder('Curl\Curl')
            ->setMethods(['post'])
            ->getMock();

        $mockCurl->method('post')
            ->will($this->returnCallback(function () use ($mockCurl){
                return $mockCurl->response = (object)['code'=>100000, 'text'=>'success'];
            }));

        $tuling = new Tuling('http://www.testurl.com', 'testkey', $mockCurl);
        $message = $tuling->handle('你好');
        $this->assertEquals('success', $message);
    }

    /**
     * 测试处理消息不成功，抛出异常
     * @expectedException \Exception
     */
    public function testTulingCanNotHandleMessage()
    {
        $mockCurl = $this->getMockBuilder('Curl\Curl')
            ->setMethods(['post'])
            ->getMock();

        $mockCurl->method('post')
            ->will($this->returnCallback(function () use ($mockCurl){
                return $mockCurl->response = (object)['code'=>100001, 'text'=>'error'];
            }));

        $tuling = new Tuling('http://www.testurl.com', 'testkey', $mockCurl);
        $tuling->handle('你好');
    }


}
