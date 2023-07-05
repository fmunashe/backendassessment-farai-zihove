<?php
namespace SeleniumTests;

use PHPUnit\Extensions\Selenium2TestCase;

class GoogleSearchSeleniumChromeTest extends Selenium2TestCase
{
    public function setUp(): void
    {
        $this->setHost('browser_tester');
        $this->setPort(4444);
        $this->setBrowserUrl('https://webserver');
        $this->setBrowser('chrome');
    }

    public function testTitle()
    {
        $this->url('https://webserver/');
        $this->assertEquals('PHP 7.4.13 - phpinfo()', $this->title());
    }
}
