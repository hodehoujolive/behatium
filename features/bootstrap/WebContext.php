<?php

use Behat\MinkExtension\Context\MinkContext;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Mink\Driver\Selenium2Driver;
use Behat\Behat\Hook\Scope\AfterStepScope;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Testwork\Hook\Scope\BeforeSuiteScope;
use Behat\Testwork\Hook\Scope\AfterSuiteScope;
use Behat\Behat\Event\ScenarioEvent;

/** global time var */
global $time;

class WebContext extends MinkContext implements SnippetAcceptingContext {

    public function __construct(array $parameters) {
        $this->parameters = $parameters;
    }

    /**
   * @BeforeSuite
   * save in time the date for the begin of tests
   */
    public static function setup(BeforeSuiteScope $scope) {
        $GLOBALS['time'] = new DateTime(date("Y-m-d H:i:s"));
    }

    /**
   * @AfterSuite
   * find the duration of all the test
   */
    public static function teardown(AfterSuiteScope $scope) {
        $endTime = new DateTime(date("Y-m-d H:i:s"));
        $var = $GLOBALS['time']->diff($endTime);
        print_r("Duration of the test: ".$var->format("%H:%I:%S"));
    }

    /**
   * @AfterStep
   */
    public function takeScreenShotAfterFailedStep(afterStepScope $scope) {
        $path_failed = $this->parameters['path_failed']."/".date('Y')."/".date('m')."/".date('d')."/";
        $path_successed = $this->parameters['path_successed']."/".date('Y')."/".date('m')."/".date('d')."/";
        if (99 === $scope->getTestResult()->getResultCode()) {
            $driver = $this->getSession()->getDriver();
            if (!($driver instanceof Selenium2Driver)) {
                return;
            }
            if (!is_dir($path_failed)) {
                // dir doesn't exist, make it
                mkdir($path_failed, 0755, true);
            }
            $currentTime = time();
            file_put_contents($path_failed.date('H',$currentTime).'h'.date('i',$currentTime).'m'.date('s',$currentTime).'s'.'.png',$this->getSession()->getDriver()->getScreenshot());
        } else {
            if (!is_dir($path_successed)) {
                // dir doesn't exist, make it (and third parameter will create any missing directory structure )
                mkdir($path_successed, 0755, true);
            }
            $currentTime = time();
            file_put_contents($path_successed.date('H',$currentTime).'h'.date('i',$currentTime).'m'.date('s',$currentTime).'s'.'.png',$this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @When I wait for :secondes seconds
     */
    public function iWaitForSeconds($secondes){
        $this->getSession()->wait($secondes * 1000);
    }

}