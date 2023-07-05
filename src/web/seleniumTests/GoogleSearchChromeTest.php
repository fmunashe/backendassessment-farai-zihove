<?php
namespace SeleniumTests;
 
use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
 
class GoogleSearchChromeTest extends TestCase
{
    protected $webDriver;
  
    public function build_chrome_capabilities()
    {
        $capabilities = DesiredCapabilities::chrome();
        return $capabilities;
    }
  
    public function setUp(): void
    {
        $capabilities = $this->build_chrome_capabilities();
        $this->webDriver = RemoteWebDriver::create('http://browser_tester:4444/wd/hub', $capabilities);
    }
 
    public function tearDown(): void
    {
        $now = new \DateTime('now');
        $screenshotFileName = 'seleniumTests/screenshots/' . $now->format('Y-m-d H:i:s') . ' test ' . $this->getName() . '.png';
        $this->webDriver->takeScreenshot($screenshotFileName);
        $this->webDriver->quit();
    }

    public function test_searchTextOnGoogle()
    {
        $this->webDriver->get("https://www.google.com");
        $this->webDriver->manage()->window()->maximize();
    
        sleep(2);
    
        $element = $this->webDriver->findElement(WebDriverBy::name("q"));
        if ($element) {
            $element->sendKeys("What should I eat for dinner");
            $element->submit();
        }
        $this->assertEquals('What should I eat for dinner - Google Search', $this->webDriver->getTitle());
    }
}
