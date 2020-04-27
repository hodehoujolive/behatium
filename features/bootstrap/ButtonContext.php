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

/** global time var */
global $time;

class WebContext extends MinkContext implements SnippetAcceptingContext {

    public function __construct(array $parameters) {
        $this->parameters = $parameters;
    }

           /**
     * @When I click button on bootstrap class :arg1
     */
    public function iClickButtonOnBootstrapClass($arg1)
    {
        switch ($arg1) {
            case "btn btn-primary":
                $session = $this->getSession();
                $element = $session->getPage()->findButton(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@class='btn btn-primary']")
                );
                break;
            case "btn btn-secondary'":
                $session = $this->getSession();
                $element = $session->getPage()->findButton(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@class='btn btn-secondary']")
                );
                break;
            case "btn btn-success":
                $session = $this->getSession();
                $element = $session->getPage()->findButton(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@class='btn btn-success']")
                );
                break;
            case "btn btn-danger":
                $session = $this->getSession();
                $element = $session->getPage()->findButton(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@class='btn btn-danger']")
                );
                break;
            case "btn btn-warning":
                $session = $this->getSession();
                $element = $session->getPage()->findButton(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@class='btn btn-warning']")
                );
                break;
            case "btn btn-info":
                $session = $this->getSession();
                $element = $session->getPage()->findButton(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@class='btn btn-info']")
                );
                break;
            case "btn btn-light":
                $session = $this->getSession();
                $element = $session->getPage()->findButton(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@class='btn btn-light']")
                );
                break;
            case "btn btn-dark":
                $session = $this->getSession();
                $element = $session->getPage()->findButton(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@class='btn btn-dark']")
                );
                break;
            case "btn btn-link":
                $session = $this->getSession();
                $element = $session->getPage()->findButton(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@class='btn btn-link']")
                );
                break;
            case "btn btn-primary btn-lg":
                $session = $this->getSession();
                $element = $session->getPage()->findButton(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@class='btn btn-primary btn-lg']")
                    );
                    break;
            case "btn btn-secondary btn-lg":
                $session = $this->getSession();
                $element = $session->getPage()->findButton(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@class='btn btn-secondary btn-lg']")
                    );
                    break;
            case "btn btn-primary btn-sm":
                $session = $this->getSession();
                $element = $session->getPage()->findButton(
                'xpath',
                $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@class='btn btn-primary btn-sm']")
                );
                break;
            case "btn btn-secondary btn-sm":
                $session = $this->getSession();
                $element = $session->getPage()->findButton(
                'xpath',
                $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@class='btn btn-secondary btn-sm']")
                );
                break;
            case "btn btn-primary btn-lg btn-block":
                $session = $this->getSession();
                $element = $session->getPage()->findButton(
                'xpath',
                $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@class='btn btn-primary btn-lg btn-block']")
                );
                break;
            case "btn btn-secondary btn-lg btn-block":
                $session = $this->getSession();
                $element = $session->getPage()->findButton(
                'xpath',
                $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@class='btn btn-secondary btn-lg btn-block']")
                );
                break;
            case "btn btn-primary btn-lg active":
                $session = $this->getSession();
                $element = $session->getPage()->findButton(
                'xpath',
                $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@class='btn btn-primary btn-lg active']")
                );
                break;
            case "btn btn-secondary btn-lg active":
                $session = $this->getSession();
                $element = $session->getPage()->findButton(
                'xpath',
                $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@class='btn btn-secondary btn-lg active']")
                );
                break;

            default:
            throw new \InvalidArgumentException(sprintf('Could not evaluate class: "%s"', $arg1));
        } 

        $element->click();

    }
 
               /**
    * @When I click button where type is submit
    */
   public function iClickButtonWhereTypeIsSubmit()
   {
       $session = $this->getSession();
       $element = $session->getPage()->findButton(
           'xpath',
           $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@type='submit']")
       );
       $element->click();
   }


           /**
     * @When I click outline button on boostrap with xpath :arg1
     */
    public function iClickOutlineButtonOnBootstrapWithXpath($arg1)
    {
        switch ($arg1) {
            case "btn btn-outline-primary":
                $session = $this->getSession();
                $element = $session->getPage()->findButton(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@class='btn btn-outline-primary']")
                );
                break;
            case "btn btn-outline-secondary'":
                $session = $this->getSession();
                $element = $session->getPage()->findButton(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@class='btn btn-outline-secondary']")
                );
                break;
            case "btn btn-outline-success":
                $session = $this->getSession();
                $element = $session->getPage()->findButton(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@class='btn btn-outline-success']")
                );
                break;
            case "btn btn-outline-danger":
                $session = $this->getSession();
                $element = $session->getPage()->findButton(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@class='btn btn-outline-danger']")
                );
                break;
            case "btn btn-outline-warning":
                $session = $this->getSession();
                $element = $session->getPage()->findButton(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@class='btn btn-outline-warning']")
                );
                break;
            case "btn btn-outline-info":
                $session = $this->getSession();
                $element = $session->getPage()->findButton(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@class='btn btn-outline-info']")
                );
                break;
            case "btn btn-outline-light":
                $session = $this->getSession();
                $element = $session->getPage()->findButton(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@class='btn btn-outline-light']")
                );
                break;
            case "btn btn-outline-dark":
                $session = $this->getSession();
                $element = $session->getPage()->findButton(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@class='btn btn-outline-dark']")
                );
                break;
            case "btn btn-outline-link":
                $session = $this->getSession();
                $element = $session->getPage()->findButton(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@class='btn btn-outline-link']")
                );
                break;
            default:
            throw new \InvalidArgumentException(sprintf('Could not evaluate class: "%s"', $arg1));
        } 

        $element->click();      
    }


}
