@ui
Feature: My Account


           @javascript
  Scenario: should not login the user
         Given I am on "http://practice.automationtesting.in/my-account/"
         When I wait for "2" seconds
         And I fill the input of id "username" with the value "sue@yahoo.fr"
         And I fill the input of id "password" with the value "sudoroot@#_"
         And I click input with name "login"
         Then I should see "Error"

           @javascript
  Scenario: should login the user and should change account details
         Given I wait for "2" seconds
         Then I fill the input of id "username" with the value "suzanne@yahoo.fr"
         And I fill the input of id "password" with the value "sudoroot@#_"
         And I click input with name "login"
         And I wait for "5" seconds   
         And I should see "Hello suzanne" 
         And I click the link "Account Details"
         And I wait for "2" seconds
         And I fill the input of id "account_first_name" with the value "suzanne"
         And I fill the input of id "account_last_name" with the value "ipsum"
         And I click input with name "save_account_details"
         Then I wait for "5" seconds   

          @javascript
Scenario: should logout the user
         Given I click the link "Logout"
         When I wait for "10" seconds
         Then I should see "Register"  



         

         