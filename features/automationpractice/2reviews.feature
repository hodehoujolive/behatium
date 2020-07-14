@ui
Feature: Reviews

           @javascript
  Scenario: should hover over description and enter review
         Given I am on "http://practice.automationtesting.in/product/selenium-ruby/"
         When I wait for "5" seconds
         And I scroll to x "0" y "248" coordinates of page
         And I hover over the link "Description"
         And I click link with href "#tab-reviews"
         Then I scroll to x "0" y "415" coordinates of page


          @javascript
  Scenario: should fill in the fields and validate
         Given I fill the textarea of id "comment" with the value "this is text in a text area"
         When I click link with class "star-4"
         And I fill the input of id "author" with the value "my name is required"
         And I fill the input of id "email" with the value "test@test.test"
         And I scroll to x "0" y "1382" coordinates of page
         And I click input with id "submit" and type "submit"
         And I wait for "2" seconds
