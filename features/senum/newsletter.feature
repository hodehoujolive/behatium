@ui
Feature: Newsletter

  @javascript
  Scenario: Devrait inscrire à la newsletter
         Given I am on the homepage 
         When I wait for "2" seconds
         And I scroll to the bottom
         And I fill the input of class "inputbox" with the value "jolivehodehou7@gmail.com"
         And I click input with type "submit" and name "Submit"
         And I wait for "2" seconds
         Then I should see "Vous êtes déjà inscrit(e)."
         

