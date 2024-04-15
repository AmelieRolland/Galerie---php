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
* Possibilité de trier le résultat selon la technique grâce à des boutons. (on avait fait le select en cours, j'avais déjà fait l'expérience des checkbox dans la page admin, alors je voulais tester une nouvelle forme de selection)
* Connexion/authentification à une page Admin
* Dans la page d'accueil côté client, espace "contact" avec formulaire.

#### Page Admin :

* Tout message envoyé via le formulaire de contact apparaîtra de façon résumée dans la page "messagerie", puis plus en détail si besoin en cliquant sur "tout voir".
* Inscription nouveau user pour partie admin
* Possibilité d'ajouter une oeuvre via un formulaire, avec un upload pour l'image, et des checkbox pour cocher le ou les matériaux/techniques utilisés.
* Possibilité d'ajouter un matériau/technique qui s'ajoutera aussi dans le formulaire précédent.
* Possibilité de supprimer une oeuvre.
* Possibilité d'éditer quelques champs d'une oeuvre (manquent l'upload, et le choix des techniques, par manque de temps)

##### Sécurité

* Hashage de mot de passe en BCRYPT à la création de compte
* Filtrage de caractères spéciaux dans la messagerie contact (dans cet exemple, du texte entouré de balises script), par ces fonctions que j'ai trouvé dans mes recherches :

```php
$_POST['message'] = htmlspecialchars(strip_tags($_POST['message']));
```
![alt text](<Capture d’écran 2024-04-14 184620.jpg>)

Not today, Johnny!


## FUNCTIONS

Les fonctions que j'ai créé servent essentiellement à **récupérer** des choses précises dans ma base de données, surtout par des requêtes préparées. Ayant une relation many to many dans ma bdd, mes requêtes pouvaient vite être encombrantes. 

> Par exemple, si l'admin rempli le formulaire pour ajouter une oeuvre à sa galerie, il fallait dans ma page rebond que je récupère le dernier id inséré instantanément dans la table artwork, ainsi que les id correspondant aux matériaux sélectionnés, pour les injecter ensuite dans ma table de jointure, afin que le tout puisse s'afficher correctement dans la page galerie.

## CLASSES

J'ai commencé à créer des classes qui avaient des méthodes de constructions et d'insertion. Puis naturellement, j'ai réalisé que toutes ces classes que je planifiais d'avoir avaient une utilisation et un pattern similaire : la construction et l'insertion.

J'ai donc créé une abstract class [NewElmt](classes/NewElmt.php) puis ses enfants.
J'ai dû retirer Artwork au dernier moment et l'isoler, car je rencontrai des difficulté à l'associer avec ses propriétés complémentaires ($file). J'ai essayé de mettre le $file en null dans le constructeur parent, en plus de null dans le constructeur artwork (car il doit être null dans la class Artwork), mais je rencontrai des problèmes avec le $this->file. Je n'ai pas eu le temps de résoudre ça, et j'ai préféré rendre ce travail fonctionnel.


Je crois que ça me sera très utile aussi si je décide de créer une page e-commerce.


J'ai voulu utiliser une abstract class également pour les erreurs. Je n'ai pas eu le temps de traiter tous les messages d'erreur, car j'ai mis un peu de temps à comprendre et prendre en main cette méthode qui me semblait très interessante. Il a quand même fallu que je la teste, alors j'ai créé [ErrorResponse](classes/ErrorResponses/ErrorResponse.php) qui est la classe parente, et [InvalidEmail](classes/ErrorResponses/InvalidEmail.php) et [RequiredFields](classes/ErrorResponses/RequiredFields.php) qui sont des classes enfants.
**MAIS, en charchant, j'ai redécouvert qu'il était possible d'extend la classe Exception; je me suis dit que c'était encore mieux, car Exception a déjà un argument "message", et implemente 'throwable' : je pourrai donc plus tard throw mes messages déjà écrits. Je suis donc partie là dessus, ça fonctionne, mais je n'ai toujours pas supprimé ErrorResponse.**

 L'idée est ensuite de gérer mes message d'erreur avec de nouvelles classes enfant. J'ai utilisé la $_SESSION pour enregistrer et détecter un message d'erreur -- [dans le sign-in_process, ici](admin/sign-in_process.php) :

```php
if (empty($email) || filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $invalid = new InvalidEmail();
    $_SESSION['error_message'] = $invalid->getErrorMessage();
    redirect('sign-in.php');
}
```
> [!NOTE]
> J'aurai pu écrire un message directement au lieu d'instancier une classe et d'appeler sa méthode. Cependant, je trouve que c'est plus approprié sur le long terme, pour pouvoir réutiliser ce message sans fautes ou erreurs de frappe, et si jamais il devait être modifié, je le retrouverai à un seul endroit.

## Dossier DATA

Dans ce dossier, on retrouve toutes les query simples necessaires, pour que je n'ai plus qu'à les require dans mes pages quand j'en ai besoin.

## Dossier ASSETS

J'y ai regroupé mes visuels et ma galerie d'images. 

## DIFFICULTES RENCONTREES

1. Organisation

Je ne suis pas très fière de l'état de ce dossier; je me suis pas mal éparpillée, et même si en pratiquant j'apprend que ok, la prochaine fois je créérai un dossier à part pour ça, et un dossier à part pour ça, eh bien pour ce projet précisémment malheureusement le mal est fait. Je n'ai plus de temps, et j'aurai bien trop peur de casser mon code au dernier moment.

Aussi, toujours en pratiquant, je réalise que je me construis une façon de nommer mes fichiers; du coup ils n'ont pas toujours tous les même syntaxe ici, mais je l'appliquerai pour la suite.

C'est la première fois que je créé un projet de  cette ampleur (je ne m'en serai pas **du tout** sentie capable il y a encore trois semaine!). Je l'ai réalisé sur mon temps libre, pendant que nous continuions d'apprendre de nouveaux chapitres toujours plus interessants.

De mon côté, j'étais tellement excitée à l'idée de mettre en pratiques des choses que j'imaginais, de me 'buter' dessus jusqu'à ce que ça fonctionne, que je n'ai fait qu'empiler de nouveaux fichiers sans mieux les organiser. A cause de ça, il est fort problable de rencontrer quelques doublons de code, un nettoyage est prévu.

2. Manque de traitement d'erreurs

Pour cette même raison évoquée juste au dessus, j'ai manqué des choses essentielles dans la création de mon code, à savoir la gestion d'erreur. Je m'étais dit que j'ajouterai tout ça à la fin, en organisant mieux mon code, mais c'était une erreur. Je réalise l'importance de traiter ça de façon systematique dès que c'est nécessaire. Il me manque le cas d'erreur où l'utilisateur rentre ce qu'il veut dans l'url par exemple, et des mauvaises utilisations de formrulaires. Bien que j'aie pu pu illustrer la façon dont je voulais le mettre en place avec [les classes](#classes) évoquées plus haut, le manque de temps ne m'a pas permis de l'appliquer pour tout.

3. Accès et utilisation de la table de jointure dans la bdd

C'était un peu prise de tête au début, jusqu'à ce que j'arrête de paniquer et que je mette à plat mes besoins, et que je réalise qu'il me fallait juste des étapes supplémentaires, mais rien de si compliqué finalement.
J'ai détaillé ces besoins et j'en ai fait des fonctions pour pouvoir les réutiliser dans des cas similaires. Et puis, ça me tenait très à coeur car je ne voulais pas y renoncer par facilité.

> [!WARNING]
> Même si j'ai commencé à toucher au css au début, pour la page accueil notamment, j'ai vite arrêté pour me consacrer à php. Justement parceque ça n'était pas le sujet, je m'étais dit que c'était l'occasion de tester Tailwind sans pression, et apprendre à le prendre en main doucement. Je compte bien le retravailler ensuite!

## CONCLUSION

J'ai adoré travailler sur ce projet, j'ai très envie de le continuer et corriger les erreurs mentionnées plus haut. J'ai une petite frustration de ne pas rendre un projet fini, mais je suis quand même contente d'avoir pu réaliser tout ça en autonomie, quitte à m'acharner sur des erreurs (plusieurs jours parfois). Mais, ça me permet de garder en mémoire ces cas d'erreur justement (enfin, j'espère vraiment!) et de pouvoir les désamorçer plus rapidement si ça devait se reproduire.

