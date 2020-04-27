<?php

use Behat\MinkExtension\Context\MinkContext;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Mink\Driver\Selenium2Driver;
use Behat\Behat\Hook\Scope\AfterStepScope;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Testwork\Hook\Scope\BeforeSuiteScope;
use Behat\Testwork\Hook\Scope\AfterSuiteScope;
use Behat\Behat\Event\ScenarioEvent;
use Behat\Mink\Element\NodeElement;


class WebContext extends MinkContext implements SnippetAcceptingContext {

    public function __construct(array $parameters) {
        $this->parameters = $parameters;
    }
    public function __construct(array $parameters) {
        $this->parameters = $parameters;
    }


    /**
     * @When I wait for :secondes seconds
     */
    public function iWaitForSeconds($secondes){
        $this->getSession()->wait($secondes * 1000);
    }


    /**
     * @When I click on class :arg1
     */
    public function iClickOnClass($arg1)
    {
        $this->
        getSession()->
        getPage()->
        find('css', '.' . $arg1)->
        click();

    }

       /**
     * @When I click Button on class with xpath :arg1
     */
    public function iClickButtonOnClassWithXpath($arg1)
    {
        $session = $this->getSession();
        $element = $session->getPage()->findButton(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath',$arg1)
        );
        $element->click();
    }

}
