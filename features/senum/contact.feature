@ui
Feature: Contact

  @javascript
  Scenario: Devrait contacter mais retourne une erreur de recaptcha
         Given I am on the homepage 
         When I wait for "2" seconds
         And I hover over the link "Ressources"
         And I wait for "2" seconds
         And I click link with href "/ressources/contact"
         And I should see "Ecrivez-nous"
         And I wait for "3" seconds
         And I fill the input of placeholder "Name" with the value "Arima Kosei"
         And I fill the input of placeholder "Email" with the value "behatselenium@gmail.com"
         And I fill the input of placeholder "Phone" with the value "001 123456789"
         And I fill the input of placeholder "Subject" with the value "Lorem ipsum..."
         And I fill the textarea of placeholder "Message" with the value "Bla bla bla bla bla bla bla"
         And I wait for "2" seconds
	       And I scroll to x "1012" y "473" coordinates of page
         And I click button with id "btn-1484924351" and type "submit"
         And I wait for "2" seconds
         Then I should see "Ecrivez-nous"


