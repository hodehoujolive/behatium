@ui
Feature: Inscription

  @javascript
  Scenario: Devrait inscrire mais retourne une erreur de recaptcha
         Given I am on the homepage 
         When I wait for "2" seconds
         And I click link with id "btn-1501569977601" and href "/s-inscrire"
         And I wait for "2" seconds
         And I fill the input of placeholder "Votre nom" with the value "Hodehou"
         And I fill the input of placeholder "Votre prénom" with the value "Jolivé"
         And I fill the input of type "email" with the value "jolivehodehou7@gmail.com"
         And I fill the input of id "fox-m131-textfield1" with the value "229 99 99 99 99"
         And I fill the input of placeholder "Quelle est votre profession ?" with the value "QA & Test Automation Engineer"
         And I fill the input of id "fox-m131-textfield3" with the value "IFRI"
         And I wait for "2" seconds
         And I click input with id "fox-m131-checkbox1" and type "checkbox"
         And I click input with id "fox-m131-checkbox2" and type "checkbox"
         And I click input with id "fox-m131-checkbox3" and type "checkbox"
         And I wait for "2" seconds
	       And I scroll to x "1313" y "638" coordinates of page
         And I click button with type "submit"
         And I wait for "5" seconds
         Then I should see "Champ invalide : reCAPTCHA"


