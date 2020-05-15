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
     * @When I wait for :secondes seconds
     */
    public function iWaitForSeconds($secondes){
        $this->getSession()->wait($secondes * 1000);
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
     * @When I click link with href :arg1
     */
    public function iClickLinkWithHref($arg1)
    {

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//a[@href='{$arg1}']")
        );
        $element->click();
    }

                /**
     * @When I click link with class :arg1
     */
    public function iClickLinkWithClass($arg1)
    {

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//a[@class='{$arg1}']")
        );
        $element->click();
    }

                /**
     * @When I click link with href :href and class :class
     */
    public function iClickLinkWithHrefAndClass($arg1,$arg2)
    {

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//a[@href='{$arg1}'][@class='{$arg2}']")
        );
        $element->click();
        
    }

                    /**
     * @When I click link with href :href and role :role
     */
    public function iClickLinkWithHrefAndRole($arg1,$arg2)
    {

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//a[@href='{$arg1}'][@role='{$arg2}']")
        );
        $element->click();
        
    }


            /**
     * @When I click link with value :value
     */
    public function iClickLinkWithValue($arg1)
    {

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//a[@value='{$arg1}']")
        );
        $element->click();
    }

                /**
     * @When I click select with class :class
     */
    public function iClickSelectWithClass($arg1)
    {

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//select[@class='{$arg1}']")
        );
        $element->click();
    }

                    /**
     * @When I click select with id :id
     */
    public function iClickSelectWithId($arg1)
    {

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//select[@id='{$arg1}']")
        );
        $element->click();
    }

                    /**
     * @When I click select with class :class and id:id
     */
    public function iClickSelectWithClassAndId($arg1,$arg2)
    {

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//select[@class='{$arg1}'][@id='{$arg2}']")
        );
        $element->click();
    }

                    /**
     * @When I click link with value :value and class :class
     */
    public function iClickLinkWithValueAndClass($arg1,$arg2)
    {

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//a[@value='{$arg1}'][@class='{$arg2}']")
        );
        $element->click();
        
    }

                        /**
     * @When I click link with id :id and href :href
     */
    public function iClickLinkWithIdAndHref($arg1,$arg2)
    {

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//a[@id='{$arg1}'][@href='{$arg2}']")
        );
        $element->click();
        
    }

        /**
     * @Given I click link with arial-label :arg1
     */
    public function iClickLinkWithArialLabel2($arg1)
    {
        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//a[@aria-label='{$arg1}']")
        );
        $element->click();
    }


        /**
     * @When I filled the class :field field with :value
     */
    public function IfilledTheClassFieldWithValue($field, $value)
    {
        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//input[@class='{$field}']")
        );
        $element->setValue($value);
    }

            /**
     * @When I filled the id :field field with :value
     */
    public function IfilledTheIdFieldWithValue($field, $value)
    {
        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//input[@id='{$field}']")
        );
        $element->setValue($value);
    }

            /**
     * @When I filled the type :field field with :value
     */
    public function IfilledTheTypeFieldWithValue($field, $value)
    {
        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//input[@type='{$field}']")
        );
        $element->setValue($value);
    }

            /**
     * @When I filled the placeholder :field field with :value
     */
    public function IfilledThePlaceholderFieldWithValue($field, $value)
    {
        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//input[@placeholder='{$field}']")
        );
        $element->setValue($value);
    }


    /**
     * @When I filled the placeholder :field and class :class field with :value
     */
    public function IfilledThePlaceholderFieldAndClassFieldWithValue($field , $field2 , $value)
    {
        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//input[@placeholder='{$field}'][@class='{$field2}']")
        );
        $element->setValue($value);
    }

        /**
     * @When I filled the aria-describedby :field and class :class field with :value
     */
    public function IfilledTheAriaDescribedbyFieldAndClassFieldWithValue($field , $field2 , $value)
    {
        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//input[@aria-describedby='{$field}'][@class='{$field2}']")
        );
        $element->setValue($value);
    }

                /**
     * @When I filled the arial-label :field field with :value
     */
    public function IfilledTheAriallabelFieldWithValue($field, $value)
    {
        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//input[@arial-label='{$field}']")
        );
        $element->setValue($value);
    }

        /**
     * @When I filled the arial-label :field and class :class field with :value
     */
    public function IfilledTheArialLabelFieldAndClassFieldWithValue($field , $field2 , $value)
    {
        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//input[@arial-label='{$field}'][@class='{$field2}']")
        );
        $element->setValue($value);
    }

            /**
     * @When I filled the arial-label :field and placeholder :placeholder field with :value
     */
    public function IfilledTheArialLabelFieldAndPlaceholderFieldWithValue($field , $field2 , $value)
    {
        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//input[@arial-label='{$field}'][@placeholder='{$field2}']")
        );
        $element->setValue($value);
    }

                /**
     * @When I click button with class :arg1
     */
    public function iClickButtonWithClass($arg1)
    {

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@class='{$arg1}']")
        );
        $element->click();
    }

                    /**
     * @When I click button with aria-label :arg1
     */
    public function iClickButtonWithAriaLabel($arg1)
    {

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@aria-label='{$arg1}']")
        );
        $element->click();
    }

                    /**
     * @When I click button with href :arg1
     */
    public function iClickButtonWithHref($arg1)
    {

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@href='{$arg1}']")
        );
        $element->click();
    }

                        /**
     * @When I click button with data-toggle :arg1
     */
    public function iClickButtonWithDataToggle($arg1)
    {

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@data-toggle='{$arg1}']")
        );
        $element->click();
    }

                        /**
     * @When I click button with value :value and class :class
     */
    public function iClickButtonWithValueAndClass($arg1,$arg2)
    {

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@value='{$arg1}'][@class='{$arg2}']")
        );
        $element->click();
        
    }

                            /**
     * @When I click button with href :href and class :class
     */
    public function iClickButtonWithHrefAndClass($arg1,$arg2)
    {

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@href='{$arg1}'][@class='{$arg2}']")
        );
        $element->click();
        
    }

                               /**
     * @When I click button with href :href and value :value
     */
    public function iClickButtonWithHrefAndValue($arg1,$arg2)
    {

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@href='{$arg1}'][@value='{$arg2}']")
        );
        $element->click();
        
    }

                               /**
     * @When I click button with href :href and type :type
     */
    public function iClickButtonWithHrefAndType($arg1,$arg2)
    {

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@href='{$arg1}'][@type='{$arg2}']")
        );
        $element->click();
        
    }

                            /**
     * @When I click button with type :type and class :class
     */
    public function iClickButtonWithTypeAndClass($arg1,$arg2)
    {

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@type='{$arg1}'][@class='{$arg2}']")
        );
        $element->click();
        
    }

                            /**
     * @When I click button with class :class and value :value and type :type
     */
    public function iClickButtonWithClassAndValueAndType($arg1,$arg2,$arg3)
    {

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//button[@class='{$arg1}'][@value='{$arg2}'][@type='{$arg3}']")
        );
        $element->click();
        
    }

                        /**
     * @When I click label with href :arg1
     */
    public function iClickLabelWithHref($arg1)
    {

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//label[@href='{$arg1}']")
        );
        $element->click();
    }

                        /**
     * @When I click label with class :arg1
     */
    public function iClickLabelWithClass($arg1)
    {

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//label[@class='{$arg1}']")
        );
        $element->click();
    }

                                /**
     * @When I click input with type :type and name :name and id :id
     */
    public function iClickInputWithTypeAndNameAndId($arg1,$arg2,$arg3)
    {

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//input[@type='{$arg1}'][@name='{$arg2}'][@id='{$arg3}']")
        );
        $element->click();
        
    }

                                    /**
     * @When I click input with class :class and type :type and id :id
     */
    public function iClickInputWithClassAndTypeAndId($arg1,$arg2,$arg3)
    {

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//input[@class='{$arg1}'][@type='{$arg2}'][@id='{$arg3}']")
        );
        $element->click();
        
    }

                                        /**
     * @When I click input with id :id and type :type
     */
    public function iClickInputWithIdAndType($arg1,$arg2)
    {

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//input[@id='{$arg1}'][@type='{$arg2}']")
        );
        $element->click();
        
    }

                                    /**
     * @When I click input with name :name
     */
    public function iClickInputWithName($arg1)
    {

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//input[@name='{$arg1}']")
        );
        $element->click();
        
    }

                                       /**
     * @When I click input with value :value
     */
    public function iClickInputWithValue($arg1)
    {

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//input[@value='{$arg1}']")
        );
        $element->click();
        
    }

                                       /**
     * @When I click input with type :type
     */
    public function iClickInputWithType($arg1)
    {

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//input[@type='{$arg1}']")
        );
        $element->click();
        
    }

                                           /**
     * @When I click input with value :value and type :type
     */
    public function iClickInputWithValueAndType($arg1,$arg2)
    {

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//input[@value='{$arg1}'][@type='{$arg2}']")
        );
        $element->click();
        
    }

                            /**
     * @When I click span with class :arg1
     */
    public function iClickSpanWithClass($arg1)
    {

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//span[@class='{$arg1}']")
        );
        $element->click();
    }


                            /**
     * @When I click li with data-target :arg1
     */
    public function iClickLiWithDataTarget($arg1)
    {

        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//li[@data-target='{$arg1}']")
        );
        $element->click();
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
     * @When I filled the class,textarea :field field with :value
     */
    public function IfilledTheClassTextAreaFieldWithValue($field, $value)
    {
        $session = $this->getSession();
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('xpath', "//textarea[@class='{$field}']")
        );
        $element->setValue($value);
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

}
