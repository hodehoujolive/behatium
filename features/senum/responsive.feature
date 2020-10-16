@ui
Feature: Reactivité

  @javascript
  Scenario: Devrait tester la réactivité du site
         Given I am on the homepage 
         When I wait for "2" seconds
         And the size is mobile portrait
	 And I wait for "2" seconds
	 And the size is mobile landscape
	 And I wait for "2" seconds
	 And the size is desktop
         Then I wait for "2" seconds


