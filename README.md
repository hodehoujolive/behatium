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

## I wait for :secondes seconds

Attendre n secondes
```
And I wait for "5" seconds

```

## I click link with href :arg1

Cliquer sur un lien grace à son href

* $arg1 est le href du lien

```
And I click link with href "https://gitlab.com/openware/automatisation-des-tests/-/edit/developer/README.md"

```

## I click link with class :arg1

Cliquer sur un lien grace à sa classe

* $arg1 est la class du lien

```
And I click link with href "btn btn-primary my-2"

```




