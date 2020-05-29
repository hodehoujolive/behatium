@ui
Feature: overview

  @javascript
  Scenario: overview
    Given I am on the homepage
    And I click link with href "/docs/4.5/getting-started/introduction/"
    When I filled the placeholder "Search..." and class "form-control ds-input" field with "Dario Donou"
    And I wait for "10" seconds
    And I click link with href "/docs/4.5/components/alerts/"
    And I click link with href "/docs/4.5/components/buttons/"
    And I click button with type "button" and class "btn btn-primary"
    And I click link with href "/docs/4.5/components/forms/"
    And I wait for "5" seconds
    And I filled the aria-describedby "emailHelp" and class "form-control" field with "Je remplis"
    And I wait for "5" seconds
    And I click input with id "exampleCheck1" and type "checkbox"
    Then I wait for "10" seconds
    
