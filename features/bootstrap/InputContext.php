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
     *
     * @When I click on the bootstrap element :class
     */
    public function iClickOnTheBootstrapElement($class)
    {
        $time = 3500;
        $this->getSession()->wait($time);

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//input[@class='{'$class'}']")
        );

        if (null === $element) {
            throw new \InvalidArgumentException(sprintf('Could not evaluate XPath: "%s"', $class));
        }

        $element->click();

    }


            /**
     *
     * @When I click on the bootstrap element value :value
     */
    public function iClickOnTheBootstrapElementValue($value)
    {
        $time = 3500;
        $this->getSession()->wait($time);

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//input[@value='{'$value'}']")
        );
        
        if (null === $element) {
            throw new \InvalidArgumentException(sprintf('Could not evaluate XPath: "%s"', $value));
        }

        $element->click();

    }


               /**
     *
     * @When I click on the bootstrap element type :type
     */
    public function iClickOnTheBootstrapElementType($type)
    {
        $time = 3500;
        $this->getSession()->wait($time);

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//input[@type='{'$type'}']")
        );
        
        if (null === $element) {
            throw new \InvalidArgumentException(sprintf('Could not evaluate XPath: "%s"', $type));
        }

        $element->click();

    }


           /**
     * @When I click input on boostrap with xpath :arg1
     */
    public function iClickInputOnBootstrapWithXpath($arg1)
    {
        switch ($arg1) {
            case 'btn btn-primary':
                $session = $this->getSession();
                $element = $session->getPage()->find(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//input[@class='btn btn-primary']")
                );
                break;
            case 'btn btn-secondary':
                $session = $this->getSession();
                $element = $session->getPage()->find(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//input[@class='btn btn-secondary']")
                );
                break;
            case 'btn btn-success':
                $session = $this->getSession();
                $element = $session->getPage()->find(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//input[@class='btn btn-success']")
                );
                break;
            case 'btn btn-danger':
                $session = $this->getSession();
                $element = $session->getPage()->find(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//input[@class='btn btn-danger']")
                );
                break;
            case 'btn btn-warning':
                $session = $this->getSession();
                $element = $session->getPage()->find(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//input[@class='btn btn-warning']")
                );
                break;
            case 'btn btn-info':
                $session = $this->getSession();
                $element = $session->getPage()->find(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//input[@class='btn btn-info']")
                );
                break;
            case 'btn btn-light':
                $session = $this->getSession();
                $element = $session->getPage()->find(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//input[@class='btn btn-light']")
                );
                break;
            case 'btn btn-dark':
                $session = $this->getSession();
                $element = $session->getPage()->find(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//input[@class='btn btn-dark']")
                );
                break;
            case 'btn btn-link':
                $session = $this->getSession();
                $element = $session->getPage()->find(
                    'xpath',
                    $session->getSelectorsHandler()->selectorToXpath('xpath', "//input[@class='btn btn-link']")
                );
                break;
            default:
            throw new \InvalidArgumentException(sprintf('Could not evaluate XPath: "%s"', $xpath));
        } 

        $element->click();
    }

                            /**
    * @When I click input where type is submit
    */
   public function iClickInputWhereTypeIsSubmit()
   {
       $session = $this->getSession();
       $element = $session->getPage()->find(
           'xpath',
           $session->getSelectorsHandler()->selectorToXpath('xpath', "//input[@type='submit']")
       );
       $element->click();
   }


                               /**
    * @When I click input where type is button
    */
    public function iClickInputWhereTypeIsButton()
    {
        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//input[@type='button']")
        );
        $element->click();
    }


                                   /**
    * @When I click input where type is reset
    */
    public function iClickInputWhereTypeIsReset()
    {
        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//input[@type='reset']")
        );
        $element->click();
    }

    


}
