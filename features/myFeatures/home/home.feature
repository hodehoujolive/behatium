@ui
Feature: Bootstrap

  @javascript
  Scenario: Homepage
    Given I am on the homepage
    And I click link with href "/docs/4.5/getting-started/introduction/"
    And I click link with href "/docs/4.5/examples/" and class "nav-link "
    And I click link with href "https://icons.getbootstrap.com/"
    And I click link with arial-label "Bootstrap"
    And I click link with arial-label "GitHub"
    And I click link with arial-label "Twitter"
    And I click link with arial-label "Slack"
    And I click link with arial-label "Open Collective"
    And I click link with id "bd-versions" and href "#"
    And I wait for "5" seconds
    And I click link with href "/docs/versions/" and class "dropdown-item"
    And I wait for "10" seconds
    And I click link with arial-label "Bootstrap"
    And I wait for "5" seconds
    And I click link with href "/docs/4.5/layout/overview/" and class "btn btn-lg btn-outline-primary mb-3"
    And I wait for "5" seconds
    Then I move backward one page

