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
     * @When I click link on bootstrap class :arg1
     */
    public function iClickLinkOnBootstrapClass($arg1)
    {
        switch ($arg1) {
            case 'btn btn-primary':
                $session = $this->getSession();
                $element = $session->getPage()->find(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//a[@class='btn btn-primary']")
                );
                break;
            case 'btn btn-secondary':
                $session = $this->getSession();
                $element = $session->getPage()->find(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//a[@class='btn btn-secondary']")
                );
                break;
            case 'btn btn-success':
                $session = $this->getSession();
                $element = $session->getPage()->find(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//a[@class='btn btn-success']")
                );
                break;
            case 'btn btn-danger':
                $session = $this->getSession();
                $element = $session->getPage()->find(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//a[@class='btn btn-danger']")
                );
                break;
            case 'btn btn-warning':
                $session = $this->getSession();
                $element = $session->getPage()->find(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//a[@class='btn btn-warning']")
                );
                break;
            case 'btn btn-info':
                $session = $this->getSession();
                $element = $session->getPage()->find(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//a[@class='btn btn-info']")
                );
                break;
            case 'btn btn-light':
                $session = $this->getSession();
                $element = $session->getPage()->find(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//a[@class='btn btn-light']")
                );
                break;
            case 'btn btn-dark':
                $session = $this->getSession();
                $element = $session->getPage()->find(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//a[@class='btn btn-dark']")
                );
                break;
            case 'btn btn-link':
                $session = $this->getSession();
                $element = $session->getPage()->find(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//a[@class='btn btn-link']")
                );
                break;
            default:
            throw new \InvalidArgumentException(sprintf('Could not evaluate XPath: "%s"', $xpath));
        } 

        $element->click();
    }

    


}
