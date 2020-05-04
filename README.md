#behat-starter-kit
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

##Installation 

Lancez donc `composer install` dans votre terminal à la racine du projet.

Remarque, toutes les méthodes prennent des sélecteurs CSS et XPATH pour récupérer des éléments.
Pour les liens, boutons, champs, vous pouvez utiliser les name / value / id  / aria-label / href / type / class /   des éléments.
Pour les champs de formulaire, vous pouvez utiliser le nom ou aria-describedby / type / placeholder / id.


Placer vous dans le repertoire server 

## Status

* Maintainer: **jolive.hodehou**
* Stability: **stable**
* Contact: jolive.hodehou@openware.online
* relies on [Mink](http://mink.behat.org)


