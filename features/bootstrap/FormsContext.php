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
     * @When I fill in the search box with :term
     */
    public function iFillInTheSearchBoxWith($term)
    {
        $searchBox = $this->assertSession()
            ->elementExists('css', 'input[name="search"]');
        $searchBox->setValue($term);
    }

    /**
    * @When In the text type field whose id is :id i type on the keyboard :text
    */
    public function inTheTextTypeFieldWhoseIdIsITypeOnTheKeyboard($id, $text)
    {
     $session = $this->getSession();
     $type = $this->assertSession()->elementExists('css', 'input[type="text"]');
     $time = 3500;
     $this->getSession()->wait($time);
        if($type=="text")
        {
         $session->getPage()
         ->fillField($id , $text);
        }
        else {
         throw new \InvalidArgumentException(sprintf('The field is not email'));
        }
    }


    /**
    * @When In the email type field whose id is :id i type on the keyboard :email
    */
   public function inTheEmailTypeFieldWhoseIdIsITypeOnTheKeyboard($id, $email)
   {
    $session = $this->getSession();
    $type = $this->assertSession()->elementExists('css', 'input[type="email"]');
    $time = 3500;
    $this->getSession()->wait($time);
       if($type=="email")
       {
        $session->getPage()
        ->fillField($id , $email);
       }
       else {
        throw new \InvalidArgumentException(sprintf('The field is not email'));
       }
   }

      /**
    * @When In the password type field whose id is :id i type on the keyboard :password
    */
    public function inThePasswordTypeFieldWhoseIdIsITypeOnTheKeyboard($id, $password)
    {
     $session = $this->getSession();
     $type = $this->assertSession()->elementExists('css', 'input[type="password"]');
     $time = 3500;
     $this->getSession()->wait($time);
        if($type=="password")
        {
         $session->getPage()
         ->fillField($id , $password);
        }
        else {
         throw new \InvalidArgumentException(sprintf('The field is not email'));
        }
    }

            /**
     * Checks checkbox with specified id|name|label|value
     * Example: When I check radio "Pearl Necklace"
     * Example: And I check "Pearl Necklace"
     *
     * @When /^(?:|I )check "(?P<option>(?:[^"]|\\")*)"$/
     */
    public function checkOption($option)
    {
        $option = $this->fixStepArgument($option);
        $this->getSession()->getPage()->checkField($option);
    }
}
