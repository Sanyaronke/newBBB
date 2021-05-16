<?php

use PHPUnit\Framework\TestCase;
use Route\Route;

class RouteTest extends TestCase
{
    public function testMatchingUrl()
    {
        $url = new Route('localhost/post/10',null);
        $this->assertEquals($url->matches('localhost/post/10'), true);
    }
}