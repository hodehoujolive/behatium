@ui
Feature: Recherche

  @javascript
  Scenario: Devrait survoler les menus et faire une recherche
         Given I am on the homepage 
         When I wait for "2" seconds
         And I hover over the link "Programme"
         And I wait for "2" seconds
         And I hover over the link "Challenge Numérique"
         And I wait for "2" seconds
         And I hover over the link "Ressources"
         And I wait for "2" seconds
         And I click link with id "offcanvas-toggler" and href "#"
         And I wait for "5" seconds
         And I fill the input of placeholder "Recherche..." with the value "Hackerlab"
         And I wait for "2" seconds
         And I click left mouse in input of placeholder "Recherche..."
         And I press enter key in input of placeholder "Recherche..."
         And I wait for "5" seconds
         Then I should see "Rechercher "


