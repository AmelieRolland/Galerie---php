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

