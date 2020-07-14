@ui
Feature: Newsletter

  @javascript
  Scenario: should sign up for the newsletter but something be wrong with validation
         Given I am on the homepage 
         When I wait for "2" seconds
         And I scroll to the bottom
         And I fill the input of placeholder "Your email address" with the value "test@test.com"
         And I click input with type "submit" 
         Then I wait for "2" seconds