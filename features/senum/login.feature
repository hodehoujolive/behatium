@ui
Feature: Connexion

  Background:
    Given I am on the homepage
    And I click link with href "/docs/4.5/examples/" and class "nav-link "

  @javascript
  Scenario: Ne Devrait pas être en mesure de se connecter
    Given I wait for "5" seconds
    When I click link with href "/docs/4.5/examples/sign-in/"
    And I wait for "5" seconds
    And I fill the input of placeholder "Email address" with the value "Jolivehodehou7@gmail.com"
    And I wait for "2" seconds
    And I fill the input of type "password" with the value "Mot de passe"
    And I wait for "2" seconds
    And I click input with value "remember-me"
    And I wait for "2" seconds
    And I click button with class "btn btn-lg btn-primary btn-block"
    Then I wait for "2" seconds

    

    
