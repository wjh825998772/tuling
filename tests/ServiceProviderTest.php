<?php
namespace Wjh\Tuling\Tests;

use Curl\Curl;
use PHPUnit_Framework_TestCase;
use Wjh\Tuling\ServiceProvider;
use Wjh\Tuling\Tuling;

class ServiceProviderTest extends PHPUnit_Framework_TestCase
{


    /**
     *
     */
    public function testRegister()
    {
        $mockApp = $this->getMockBuilder('\Illuminate\Contracts\Foundation\Application')
            ->disableOriginalConstructor()
//            ->setMethods(['singleton'])
            ->getMock();

        $this->assertInstanceOf('\Illuminate\Contracts\Foundation\Application', $mockApp);

        $mockApp->method('singleton')
            ->will($this->returnValue(true));

        $service = new ServiceProvider($mockApp);
        $service->register();
    }

    /**
     * 断言没有config_path()方法，出现异常
     * @expectedException \Error
     */
    public function testBoot()
    {
        $mockApp = $this->getMockBuilder('\Illuminate\Contracts\Foundation\Application')
            ->getMock();
        $service = new ServiceProvider($mockApp);
        $service->boot();
    }

}