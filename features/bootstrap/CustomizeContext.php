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
     *
     * @When I click on the element with xpath :xpath
     * Click on the element with the provided xpath query
     */
    public function iClickOnTheElementWithXPath($xpath)
    {
        $time = 3500;
        $this->getSession()->wait($time);

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', $xpath)
        );

        if (null === $element) {
            throw new \InvalidArgumentException(sprintf('Could not evaluate XPath: "%s"', $xpath));
        }

        $element->click();

    }

    /**
     * @When I click on value :arg1
     */
    public function iClickOnValue($arg1)
    {
        $time = 4000;
        $this->getSession()->wait($time);
        $this->getSession()->getPage()->find('value', '.' . $arg1)->click();
    }


        /**
     * @When I click on class :class with :arg2 child
     */
    public function iClickOnClassWithChild($class, $arg2)
    {
        $time = 4000;
        $this->getSession()->wait($time);
        $elements = $this->getSession()->getPage()->find('css', '.' . $class);
        if (is_int($arg2)) {
            $childElement = $arg2 - 1;
        } else if ($arg2 === 'first') {
            $childElement = 0;
        } else {
            $childElement = (count($elements) - 1);
        }


        $elements[$childElement]->click();

    }

        /**
     * @Then I should see the element with xpath :arg1
     */
    public function iShouldSeeTheElementWithXpath2($arg1)
    {
         $time = 3500;
        $this->getSession()->wait($time);
    
        $session = $this->getSession();
        $element = $session->getPage()->find(
        'xpath',
        $session->getSelectorsHandler()->selectorToXpath('xpath', $arg1) ); 
        if (null === $element) {
            throw new PendingException();
        }
    }

        /**
     * @Then I should not see the elment with xpath :arg1
     */
    public function iShouldNotSeeTheElmentWithXpath($arg1)
    
     {
         $time = 3500;
        $this->getSession()->wait($time);
    
        $session = $this->getSession();
        $element = $session->getPage()->find(
        'xpath',
        $session->getSelectorsHandler()->selectorToXpath('xpath', $arg1) ); 
        if (!null === $element) {
            throw new Exception("i still can find xpath ");
            }
    }

        /**
     * @When I click on id :arg1
     */
    public function iClickOnId($arg1)
    {
        $time = 4000;
        $this->getSession()->wait($time);
        $this->getSession()->getPage()->find('named', ['id', $arg1])->click();
    }


        /**
     *
     * @When I mouse over the element with xpath :xpath
     * Click on the element with the provided xpath query
     */
    public function iMouseOverTheElementWithXPath($xpath)
    {
        $time = 3500;
        $this->getSession()->wait($time);

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', $xpath)
        );
        if (null === $element) {
            throw new \InvalidArgumentException(sprintf('Could not evaluate XPath: "%s"', $xpath));
        }
        $element->MouseOver();
    }



        /**
     * @When I click on the :cssSelector element
     * Click on the element with the css selector
     */
    public function iClickOnTheElement($cssSelector)
    {
        $time = 3500; // time should be in milliseconds
        $this->getSession()->wait($time);

        $session = $this->getSession(); // get the mink session
        $element = $session->getPage()->find(
            'css',
            $cssSelector
        ); // runs the actual query and returns the element

        // errors must not pass silently
        if (null === $element) {
            throw new \InvalidArgumentException(sprintf('Could not evaluate css selector: "%s"', $cssSelector));
        }

        // ok, let's click on it
        $element->click();
    }


        /**
     * Checks, that element content is equal to specific value
     * Example: Then the "#test" element text equals "string".
     *
     * @Then /^the "(?P<selector>[^"]*)" element text equals "(?P<value>(?:[^"]|\\")*)"$/
     */
    public function assertElementEquals($selector, $value)
    {
        $assert = $this->assertSession();
        $element = $assert->elementExists('css', $selector);
        if (($actual = trim($element->getText())) !== $value) {
            $message = "'{$value}' is not equal to '{$actual}'";
            throw new ElementTextException($message, $this->getSession()->getDriver(), $element);
        }
    }



    /**
     * @When I check the :arg1 radio button
     */
    public function iCheckTheRadioButton($labelText) {
        $page = $this->getMainContext()->getSession()->getPage();
        foreach ($page->findAll('css', 'label') as $label) {
            if ( $labelText === $label->getText() ) {
                $radioButton = $page->find('css', '#'.$label->getAttribute('for'));
                $radioButton->click();
                return;
            }
        }
        throw new \Exception("Radio button with label {$labelText} not found");
    }


        /**
     * @When /^I check the "([^"]*)" radio button in "([^"]*)" button group$/
     */
    public function iCheckButtonInGroup($labelText, $groupSelector){
        $page = $this->getMainContext()->getSession()->getPage();
        $group = $page->find('css',$groupSelector);
        foreach ($group->findAll('css', 'label') as $label) {
            if ( $labelText === $label->getText() ) {
                $radioButton = $page->find('css', '#'.$label->getAttribute('for'));
                $radioButton->click();
                return;
            }
        }
        throw new \Exception("Radio button with label {$labelText} not found in group {$groupSelector}");
    }


        /**
     * @Given /^I check the "([^"]*)" radio button with "([^"]*)" value$/
     */
    public function iCheckTheRadioButtonWithValue($element, $value)
    {
      foreach ($this->getMainContext()->getSession()->getPage()->findAll('css', 'input[type="radio"][name="'. $element .'"]') as $radio) {
        if ($radio->getAttribute('value') == $value) {
          $radio->check();
          return true;
        }
      }
      return false;
    }







        /**
     * @When I fill in the search box with :term
     */
    public function iFillInTheSearchBoxWith($term)
    {
        $searchBox = $this->assertSession()
            ->elementExists('css', 'input[name="searchTerm"]');

        $searchBox->setValue($term);
    }

    /**
     * @When I press the search button
     */
    public function iPressTheSearchButton()
    {
        $button = $this->assertSession()
            ->elementExists('css', '#search_submit');

        $button->press();
    }


    /**
 * @Then I wait and should see :text
 */
public function IWaitAndIShouldSeeOutput($text)
{
    $this->spins(function () use ($text) {
        $this->assertSession()->pageTextContains($text);
    });
}


/**
 * @When I click on News button
 */
public function iClickOnNewsButton()
{
    $page = $this->getSession()->getPage();
    $button=$page->find('css', "body > div > div > div.links > a:nth-child(3)");
    if ($button) {
        $button->click();
    } else {
        throw new Exception("ERROR: Button Not found");
    }
}






}
