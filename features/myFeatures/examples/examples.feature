@ui
Feature: examples

  Background:
    Given I am on the homepage
    And I click link with href "/docs/4.5/examples/" and class "nav-link "

  @javascript
  Scenario: Sign In
    And I wait for "5" seconds
    And I click link with href "/docs/4.5/examples/sign-in/"
    And I wait for "5" seconds
    And I filled the placeholder "Email address" field with "Jolivehodehou7@gmail.com"
    And I wait for "2" seconds
    And I filled the type "password" field with "Mot de passe"
    And I wait for "2" seconds
    And I click input with value "remember-me" and type "checkbox"
    And I wait for "2" seconds
    Then I click button with class "btn btn-lg btn-primary btn-block"
    And I wait for "2" seconds

      @javascript
  Scenario: Album
    And I wait for "5" seconds
    And I click link with href "/docs/4.5/examples/album/"
    And I wait for "5" seconds
    And I click button with aria-label "Toggle navigation"
    And I click link with class "btn btn-primary my-2"

          @javascript
  Scenario: Checkout
    And I wait for "5" seconds
    And I click link with href "/docs/4.5/examples/checkout/"
    And I wait for "5" seconds
    And I filled the id "firstName" field with "Jolivé"
    And I filled the id "lastName" field with "Hodehou"
    And I filled the id "username" field with "hikari"
    And I filled the type "email" field with "jolivehodehou@gmail.com"
    And I filled the id "address" field with "calavi"
    And I click select with id "country"
    And I wait for "5" seconds
    Then I click button with type "submit" and class "btn btn-primary btn-lg btn-block"


    

    
