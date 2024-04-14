# EXAM PHP - AMELIE ROLLAND

## Site - galerie

#### BDD :

Contient 5 tables :
* User
* contact_form (pour la messagerie)
* material (materiaux/techniques)
* artwork
* artwork_material (table de jointure)


### **Fonctionnalités du site** :

* Affiche de façon dynamique toutes les oeuvres (images) de la table Artwork grâce à une boucle et une connection à la base de donnée.
* Au clic sur chaque image, affiche une page ('oeuvre.php') détaillée avec son image, sa description complète.
* Possibilité de trier le résultat selon la technique grâce à des boutons.
* Connexion/authentification à une page Admin
* Dans la page d'accueil côté client, espace "contact" avec formulaire.

#### Page Admin :

* Tout message envoyé via le formulaire de contact apparaîtra de façon résumée dans la page "messagerie", puis plus en détail si besoin en cliquant sur "tout voir".
* Inscription nouveau user pour partie admin
* Possibilité d'ajouter une oeuvre via un formulaire, avec un upload pour l'image, et des checkbox pour cocher le ou les matériaux/techniques utilisés.
* Possibilité d'ajouter un matériau/technique qui s'ajoutera aussi dans le formulaire précédent.
* Possibilité de supprimer une oeuvre.
* Possibilité d'éditer quelques champs d'une oeuvre (manquent l'upload, et le choix des techniques, par manque de temps)

## FUNCTIONS

Les fonctions que j'ai créé servent essentiellement à **récupérer** des choses précises dans ma base de données. Ayant une relation many to many dans ma bdd, mes requêtes pouvaient vite être encombrantes. 

> Par exemple, si l'admin rempli le formulaire pour ajouter une oeuvre à sa galerie, il fallait dans ma page rebond que je récupère le dernier id inséré instantanément dans la table artwork, ainsi que les id correspondant aux matériaux sélectionnés, pour les injecter ensuite dans ma table de jointure, afin que le tout puisse s'afficher correctement dans la page galerie.

## CLASSES

J'ai commencé à créer des classes qui avaient des méthodes de constructions et d'insertion. Puis naturellement, j'ai réalisé que toutes ces classes que je planifiais d'avoir avaient une utilisation et un pattern similaire : la construction et l'insertion.

J'ai donc créé une abstract class [NewElmt](classes/NewElmt.php) puis ses enfants.
J'ai dû retirer Artwork au dernier moment et l'isoler, car je rencontrai des difficulté à l'associer avec ses paramètres supplémentaires ($file). J'ai essayé de mettre le $file en null dans le constructeur parent, en plus de null dans le constructeur artwork, mais je rencontrai des problèmes avec le $this->file. Je n'ai pas eu le temps de résoudre ça, et j'ai préféré rendre ce travail fonctionnel.

J'ai utilisé une abstract class également pour les erreurs. Je n'ai pas eu le temps de traiter tous les messages d'erreur, car j'ai mis un peu de temps à comprendre et prendre en main cette méthode qui me semblait très interessante. Il a quand même fallu que je la teste, alors j'ai créé [ErrorResponse](classes/ErrorResponses/ErrorResponse.php) qui est la classe parente, et [InvalidEmail](classes/ErrorResponses/InvalidEmail.php) et [RequiredFields](classes/ErrorResponses/RequiredFields.php) qui sont des classes enfants. L'idée est ensuite de gérer mes message d'erreur avec ces ces classes. J'ai utilisé la $_SESSION pour enregistrer et détecter un message d'erreur :

```php
if (empty($email) || filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $invalid = new InvalidEmail();
    $_SESSION['error_message'] = $invalid->getErrorMessage();
    redirect('sign-in.php');
}
```

J'aurai pu écrire un message directement au lieu d'instancier une classe et d'appeler sa méthode. Cependant, je trouve que c'est plus commode sur le long terme, pour pouvoir réutiliser ce message sans fautes ou erreurs, et si jamais il devait être modifié, je le retrouverai à un seul endroit.

