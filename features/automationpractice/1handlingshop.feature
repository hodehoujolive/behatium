@ui
Feature: Handling of products

  @javascript
  Scenario: should navigate the product categories
         Given I am on the homepage 
         When I wait for "2" seconds
         And I click the link "Android"
         And I click the link "HTML"
         And I click the link "JavaScript"
         And I click link with href "http://practice.automationtesting.in/product-category/selenium/"
         Then I wait for "2" seconds    

  @javascript
  Scenario: should browse the read more
         Given I scroll to x "0" y "309" coordinates of page
         When I wait for "2" seconds
         And I click the link "Read more"
         Then I wait for "2" seconds      
