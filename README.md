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

## I filled the id :arg1 field with :arg2

Remplir le champ grace à son id

* $arg1 : id
* $arg2 : value

```
Then I filled the id "field_id" field with "jolivé hodehou"
```

## I filled the type :arg1 field with :arg2

Remplir le champ grace à son type

* $arg1 : id
* $arg2 : value

```
Then I filled the type "password" field with "MotDePasse"
```

## I filled the placeholder :field field with :value

Remplir le champ grace à son placeholder

* $arg1 : placeholder
* $arg2 : value

```
Then I filled the placeholder "username" field with "hikari"
```

##  I filled the placeholder :arg1 and class :arg2 field with :arg3

Remplir le champ grace à son placeholder et sa class

* $arg1 : placeholder
* $arg2 : class
* $arg3 : value

```
Then I filled the placeholder "username" and class "field_class" field with "hikari"
```

## I filled the aria-describedby :arg1 and class :arg2 field with :arg3

Remplir le champ grace à son aria-describedby et sa class

* $arg1 : aria-describedby
* $arg2 : class
* $arg3 : value
* 