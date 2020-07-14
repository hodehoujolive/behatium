@ui
Feature: Cart

  @javascript
  Scenario: should add product to cart and access the basket
         Given I am on "http://practice.automationtesting.in/product-category/html/"
         When I wait for "2" seconds
         And I scroll to x "0" y "100" coordinates of page
         And I click link with href "/product-category/html/?add-to-cart=181"
         And I wait for "2" seconds
         And I click the link "View Basket"
         And I wait for "2" seconds
         Then I should see "Basket Totals"

  @javascript
  Scenario: Should remove product from cart
         Given I click the link "×"
         When I wait for "15" seconds
         Then I should see "RETURN TO SHOP"

           @javascript
  Scenario: should check if the basket is currently empty.
         Then I should see "Your basket is currently empty."

           @javascript
  Scenario: should add product to cart and access the basket
         Given I am on "http://practice.automationtesting.in/product-category/html/"
         When I wait for "2" seconds
         And I scroll to x "0" y "100" coordinates of page
         And I click link with href "/product-category/html/?add-to-cart=181"
         And I wait for "2" seconds
         And I click the link "View Basket"
         And I wait for "2" seconds
         Then I should see "Basket Totals"

            @javascript
  Scenario: should insert a nonexistent coupon code and return an error
         Given I should see "HTML5 Forms"
         When I fill the input of id "coupon_code" with the value "123456"
         Then I wait for "2" seconds

            @javascript
  Scenario: should increase the amount of product and update
         Given I wait for "2" seconds
         When I fill the input of type "number" with the value "3"
         Then I wait for "2" seconds

                     @javascript
  Scenario: had to checkout
         Given I wait for "2" seconds
         When I click link with href "http://practice.automationtesting.in/checkout/"
         Then I wait for "5" seconds


         

         