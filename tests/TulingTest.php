<?php
namespace Wjh\Tuling\Tests;

use PHPUnit_Framework_TestCase;

class TulingTest extends PHPunit_Framework_TestCase
{



    public function testStub()
    {
        $stub = $this->getMockBuilder(Stub::class)
            ->setMethods(['show'])
            ->getMock();
        $stub->method('show')
            ->willReturn('show some');

        $obj = new Stub();
        $res = $obj->show('some');
        $this->assertEquals($res, $stub->show('some'));
    }
    

    public function testHandle()
    {
        $message = '你好';

        $this->assertEquals(1, 1);
    }

}

class Stub
{
    public function show($str)
    {
        return 'show '. $str;
    }

}