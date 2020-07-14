# behat-starter-kit
**Pour des références supplémentaires, veuillez consulter [source](https://gitlab.com/openware/automatisation-des-tests/-/edit/developer/features/bootstrap/WebContext.php)**

Utilise Mink pour lancer et manipuler Selenium Server.

<div class="alert alert-info">
Pour utiliser ce module avec Composer, vous avez besoin des packages :

```
"require": {
        "behat/behat":"*",
        "behat/mink-extension": "*",
        "behat/mink-goutte-driver": "*",
        "behat/mink-selenium2-driver": "*",
        "dmore/chrome-mink-driver": "^2.0@dev",
        "behat/mink": "^1.7@dev",
        "twig/twig": "~1.0",
        "elkan/behatformatter": "v1.0.*",
        "psr/container": "^1.0"
    }
```
</div>

## Installation 

Lancez donc `composer install` dans votre terminal à la racine du projet.

Remarque, toutes les méthodes prennent des sélecteurs CSS et XPATH pour récupérer des éléments.
Pour les liens, boutons, champs, vous pouvez utiliser les name / value / id  / aria-label / href / type / class /   des éléments.
Pour les champs de formulaire, vous pouvez utiliser le nom ou aria-describedby / type / placeholder / id.


Placer vous dans le repertoire server et taper `./run.sh`
Ensuite à la racine `vendor/bin/behat`

## Status

* Maintainer: **jolive.hodehou**
* Stability: **stable**
* Contact: jolive.hodehou@openware.online
* relies on [Mink](http://mink.behat.org)

## Configuration

* url *required* - start url for your app
* browser *required* - browser that would be launched
* host  - Selenium server host (localhost by default)
* port - Selenium server port (4444 by default)
* delay - set delay between actions in milliseconds (1/1000 of second) if they run too fast

### Example (`behat.yml`)

```
default:
  autoload:
    - '%paths.base%/features/bootstrap/'
  suites:
    ui:
      paths:
        features: features/myFeatures/
      contexts:
        - 'FeatureContext':
        - 'WebContext':
            parameters:
              path_failed: '%paths.base%/reports/Screen/Failed/'
              path_successed: '%paths.base%/reports/Screen/Success/'
      filters: { tags: '@ui' }

  formatters:
        pretty:
          output_path: null
        html:
          output_path: '%paths.base%/reports'
  extensions:
      Behat\MinkExtension:
        base_url: https://getbootstrap.com/
        browser_name: firefox
        default_session: goutte
        show_cmd: 'open %s'
        javascript_session: selenium2
        goutte: ~
        selenium2:
          wd_host: http://localhost:4444/wd/hub
          browser: firefox
          capabilities: {'browser':'firefox', 'marionette':true}
      elkan\BehatFormatter\BehatFormatterExtension:
        projectName: Automated Test
        projectDescription: test
        projectImage: features/logo.png
        name: html
        renderer: Twig
        file_name: Index
        print_args: true
        print_outp: true
        loop_break: true
        show_tags: true


```
             
## Public Properties

* session - contains Mink Session

## Actions

## I wait for :arg1 seconds

Attendre n secondes

* $arg1 : secondes

```
And I wait for "5" seconds
```

## I click link with href :arg1

Cliquer sur un lien grace à son href

* $arg1 : href

```
And I click link with href "#link_href"
```

## I click link with class :arg1

Cliquer sur un lien grace à sa classe

* $arg1 : class

```
And I click link with href "link_class"
```

## I click link with href :arg1 and class :arg2

Cliquer sur le lien grace à son href et sa class

* $arg1 : href
* $arg2 : class

```
And I click link with href "#link_href" and class "link_class"
```

## I click link with href :arg1 and role :arg2

Cliquer sur le lien grace à son href et son role

* $arg1 : href
* $arg2 : role

```
And I click link with href "#link_href" and role "link_role"
```

## I click link with value :arg1

Cliquer sur le lien grace à sa valeur

* $arg1 : value

```
And I click link with value "link_value"
```

## I click link with value :arg1 and class :arg2

Cliquer sur le lien grace à sa valeur et sa class

* $arg1 : value
* $arg2 : class

```
And I click link with value "link_value" and class "link_class"
```

## I click link with id :arg1 and href :arg2

Cliquer sur le lien grace à son id et son href

* $arg1 : id
* $arg2 : href

```
And I click link with id "link_id" and href "#link_href"
```

## I click link with arial-label :arg1

Cliquer sur un lien grace à son aria-label

* $arg1 : aria-label

```
I click link with arial-label "link_arial_label"
```

## I click select with class :arg1

Cliquer sur un select grace à sa class

* $arg1 : class

```
And I click select with class "select_class"
```

## I click select with id :arg1

Cliquer sur un select grace à son id

* $arg1 : id

```
And I click select with id "select_id"
```

## I click select with class :arg1 and id :arg2

Cliquer sur un select grace à sa class et son id

* $arg1 : class
* $arg2 : id

```
And I click select with class "select_class" and id "select_id"
```

## I fill the input of id arg1 with the value arg2

Remplir le champ grace à son id

* $arg1 : id
* $arg2 : value

```
And I fill the input of id "id" with the value "valueis"
```

## I fill the input of type :arg1 with the value :arg

Remplir le champ grace à son type

* $arg1 : type
* $arg2 : value

```
And I fill the input of type "password" with the value :"motdepasse"
```

## I fill the input of placeholder :arg1 with the value :value

Remplir le champ grace à son placeholder

* $arg1 : placeholder
* $arg2 : value

```
Then I fill the input of placeholder "hikaro" with the value "hikari"
```

##  I fill the input of placeholder :arg1 and class :arg2 with the value :arg3

Remplir le champ grace à son placeholder et sa class

* $arg1 : placeholder
* $arg2 : class
* $arg3 : value

```
Then I fill the input of placeholder "hikario" and class "hikariclass" with the value "hikari
```

## I fill the input of aria-describedby :arg1 and class :arg2 with the value :arg3

Remplir le champ grace à son aria-describedby et sa class

* $arg1 : aria-describedby
* $arg2 : class
* $arg3 : value

```
Then I fill the input of aria-describedby "blabla" and class "blabla" with the value "blablabla"
```

## I fill the input of aria-label :arg1 with the value :arg2

Remplir le champ grace à son aria-label

* $arg1 : aria-label
* $arg2 : value

```
Then I fill the input of aria-label "valueari" with the value "value_value"
```

## I fill the input of name :arg1 with the value :arg2

Remplir le champ grace à son aria-label

* $arg1 : name
* $arg2 : value

```
Then I fill the input of name "value" with the value "value"
```

## I fill the input of aria-label :arg1 and class :arg2 with the value :arg3

Remplir le champ grace à son aria-label et sa class

* $arg1 : aria-label
* $arg2 : class
* $arg3 : value

```
I fill the input of aria-label "valuearia" and class "valueclass" with the value "value_value"
```

## I fill the input of aria-label :arg1 and placeholder :arg2 with the value :arg3

Remplir un champ grace à son aria-label et son placeholder

* $arg1 : aria-label
* $arg2 : placeholder
* $arg3 : value

```
Then I fill the input of aria-label "bla" and placeholder "blabla" with the value "value"
```


## I fill the textarea of id :arg1 with the value :arg2

Remplir le champ grace à son aria-label

* $arg1 : id
* $arg2 : value

```
Then I fill the textarea of id "value" with the value "value"
```

## I click button with class :arg1

Cliquer sur un button grace à sa class

* $arg1 : class

```
And I click button with class "button_class"
```

## I click button with aria-label :arg1

Cliquer sur un button grace à son aria-label

* $arg1 : aria-label

```
And I click button with aria-label "Slack"
```

## I click button with href :arg1

Cliquer sur un button grace à son href

* $arg1 : href

```
And I click button with href "#slack"
```

## I click button with type :arg1

Cliquer sur un button grace à son type

* $arg1 : type

```
And I click button with type "#slack"
```

## I c3lick button with data-toggle :arg1

Cliquer sur button grace à son data-toggle

* $arg1 : data-toggle

```
And I click button with data-toggle "collapse"
```

## I click button with value :arg1 and class :arg2

Cliquer sur un button grace à sa value et sa class

* $arg1 : value
* $arg2 : class

```
And I click button with value "Envoyer" and class "button_class"
```

## I click button with href :arg1 and class :arg2

Cliquer sur le button grace à son href et sa class

* $arg1 : href
* $arg2 : class

```
And I click button with href "/send/message" and class "button_class"
```

## I click button with href :arg1 and value :arg2

Cliquer sur un button grace à son href et sa value

* $arg1 : href
* $arg2 :  value

```
And I click button with href "/send/message" and value "Envoyer"
```

## I click button with href :arg1 and type :arg2

Cliquer sur un button grace à son href et sa value

* $arg1 : href
* $arg2 : type

```
And I click button with href "/send/message" and type "submit"
```

## I click button with type :arg1 and class :arg2

Cliquer sur un button grace à son type et sa class

* $arg1 : type
* $arg1 : class

```
And I click button with type "submit" and class "button_class"
```

## I click button with class :arg1 and value :arg2 and type :arg3

Cliquer sur un button grace à sa class , sa value et son type

* $arg1 : class
* $arg2 : value
* $arg3 : type

```
And I click button with class "button_class" and value "Envoyer" and type "submit"
```

## I click label with href :arg1

Cliquer sur un label à grace à son href

* $arg1 : href

```
And I click label with href "/message/send"
```

## I click label with class :arg1

Cliquer sur un label grace à sa class

* $arg1 : class

```
And I click label with class "label_class"
```

## I click input with type :arg1 and name :arg2 and id :arg3

Cliquer sur un input grace à son type , son name et son id

* $arg1 : type
* $arg2 : name
* $arg3 : id

```
And I click input with type "button" and name "commit changes" and id "input_id"
```

## I click input with class :arg1 and type :type and id :arg2

Cliquer sur un input grace à sa class, son type et son id

* $arg1 : class
* $arg2 : type
* $arg3 : id

```
And I click input with class "input_id" and type "button" and id "input_id"
```

## I click input with id :arg1 and type :arg2

Cliquer sur un input grace à son id et son type

* $arg1 : id
* $arg2 : type

```
And I click input with id "input_id" and type "button"
```

## I click input with name :arg1

Cliquer sur un button grace à son name

* $arg1 : name

```
And I click input with name "Envoyer"
```

## I click input with value :arg1

Cliquer sur un input grace à sa value

* $arg1 : value

```
And I click input with value "Envoyer"
```

## I click input with type :arg1

Cliquer sur un input grace à son type

* $arg1 : type

```
I click input with type "button"
```

## I click input with value :arg1 and type :arg2

Cliquer sur un input grace à sa value et son type

* $arg1 : value
* $arg2 : type

```
And I click input with value "Envoyer" and type "button"
```

## I click span with class :arg1

Cliquer sur un span grace à sa class

* $arg1 : class

```
And I click span with class "span_class"
```

## I click li with data-target :arg1

Cliquer sur un li grace à son data-target

* $arg1 : data-target

```
And I click li with data-target "attributes"
```


## I check the :arg1 radio button

Cocher un button radio

* $arg1 : label_text

```
And I check the "radio" radio button
```

## I check the :arg1 radio button with :arg2 value

Cocher un button radio

* $arg1 : element
* $arg2 : value

```
I check the "element" radio button with "value" value
```

## the :arg1 element text equals :arg2

Checks, that element content is equal to specific value

* $arg1 : selector
* $arg2 : string

```
Then the "#test" element text equals "string".
```


## I scroll to the bottom

## I scroll to the top


## I scroll to x :arg1 y :arg2 coordinates of page

Y would be the way to up and down the page. A good default for X is 0

* $arg1 : dimension
* $arg2 : dimension

```
Then I scroll to x "0" y "520" coordinates of page
```


## I hover over the link :arg1

Y would be the way to up and down the page. A good default for X is 0

* $arg1 : link text

```
And I hover over the link "click here"
```
## I click the link :arg1

cliquer sur un lien grace à son text

* $arg1 : link text

```
And I click the link "click here"
```

## the page is secure

Check if the port is 443(https) or 80(http) / secure or not.

```
Then the page is secure
```

## the size is mobile portrait

Setting screen size to 320x900 (mobile portrait).

```
Given the size is mobile portrait
```
## the size is mobile landscape

Setting screen size to 640x900 (mobile landscape)

```
Given the size is mobile landscape
```

## the custom size is :arg1 by :arg2

Setting custom size of the screen using width and height parameters

* $arg1 : dimension
* $arg1 : dimension

```
And he custom size is "1204" by "800"
```

## the size is desktop

Setting screen size to 1400x900 (desktop)

```
Given the size is desktop
```

## the size is tablet landscape

Setting screen size to 1024x900 (tablet landscape)

```
Given the size is tablet landscape
```

## the size is tablet portrait

Setting screen size to 768x900 (tablet portrait)

```
Given the size is tablet portrait
```

## I confirm the popup

## I cancel the popup

## I should see :arg1 in popup

* $arg1 : string

```
And I should see "alert" in popup
```

## I fill :arg1 in popup

* $arg1 : string

```
When I fill "prompt" in popup
```
