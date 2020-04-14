# Projet blog laravel



## Installation

1. Clôner le projet

    * Ouvrir le Terminal(Unix) ou le Command Prompt (Windows).

    * Vous déplacer sur le répertoire où vous voulez placer le projet.

    ```bash
    git clone https://github.com/zaieds/blog_projet.git
    ```

2. Installer le composer, laravel et les composants nécessaires

    Dans le répertoire du projet, taper les commandes:
    ```bash
    composer install
    npm install
    ```

3. Configuration de fichier .env et la base de données

   Dans le répertoire du projet, créer le fichier .env en copiant du fichier .env.example avec la commande:

   ```bash
   cp .env.example .env
   ```

   Dans le répertoire 'database' du projet, créer un fichier nommé 'database.sqlite'

   Ouvrir le fichier .env, modifier la DB_CONNECTION et la DB_DATABASE comme suivant:
   ```txt
   DB_CONNECTION=sqlite
   DB_DATABASE=/chemin/vers/l-application/database/database.sqlite
   ```
## Lancement

   1. Sur le répertoire du projet, lancer le Seeder de la base de données:
    
   ```bash
   php artisan migrate:fresh --seed
   ```

   2. Lancer le serveur
    
   ```bash
   php artisan serve
   ```
    
   3. Si l'installation s'est bien passée, la page est accessible à l'url suivante:

   ```URL
   http://localhost:8000 
   ```
## Les parties implémentées

1. Le layout global:

    Le bar de navigation en header de la page est toujours disposible. Il contient les liens permettant d'accéder aux différentes parties du blog:

    * Home
    * Articles
    * Contacts
    * Gestion

2. La base de données:

    Les articles, utilisateurs, commentaires et contacts sont sauvegardés dans une base SQLite.

    La base de données est préremplir avec des fausses données à l'aide des Seeders de Laravel.

    La réinitialisation de la base de données et peut se faire avec la commande: 

    ```bash
    php artisan migrate:fresh --seed
    ```

    Les relations entre les tables de la base de données sont faites avec l'Eloquent de Laravel:

    * Un user peut avoir plusieur Post
    * Un post peut avoir plusieur Comment

3. L'affichage des articles

    Sur la page d'accueil [Home](http://localhost:8000/home), les trois derniers articles sont affichés.

    De la même façon, sur la page [Articles](http://localhost:8000/articles), tous les articles sont affichés.
        
    Le titre de chaque article contient le lien vers l'affichage de son titre, son contenu et son auteur.
    
4. Le formulaire de contact

    La page [Contact](http://localhost:8000/contact/create) contient un formulaire pour déposer une demande de contact.

    La validation des champs de texte et d'email sont également implémenter: le formulaire ne peut pas être déposer si les champs sont laissés vide ou le champs de l'email ne contient pas une adresse email.

    Une fois le formulaire est envoyé, les informations sont enregistrées dans la table "contact" de la base de données.

5. La gestion des commentaires:

    La table des commentaires est créée avec la migration et elle est remplie avec le Seeder.
    
    Un formulaire et une liste de commentaires sont affichés en bas de chaque articles.

    Une fois envoyé, les informations d'un commentaire  sont enregistrés et affichés en bas de l'article.

6. Le CRUD des articles et la gestion des demandes de contact:

    L'accès à la gestion des articles et les demandes de contact est fait en cliquant sur l'onglet [Gestion](http://localhost:8000/admin)  (L'accès à cet onglet exige une authentification, à voir dans la partie 7).
    
    La [gestion des articles](http://localhost:8000/admin/articles) à l'aide d'un contrôleur de type CRUD(AdminArticlesController). Ce contrôleur permet l’affichage d’une liste complète des articles ainsi que l’ajout, l’édition et la suppression d’un article qui se représentent par des buttons correspondant.

    Les informations remplies lors de l'ajout ou l'édition sont passées par la validation avant d'être enregistrées dans la base de données (les champs ne doivent pas être vide, l'user_id doit etre un nombre, etc.).

    La suppression d'un article demande un validation par un box d'alert.

    La [gestion des articles](http://localhost:8000/admin/contact) permet l'accès à la liste des demandes de contact. Un button de supprimer est disponible pour supprimer un contact.

7. Identification / Authentification qui protège l'accès à l’administration

    La partie [Gestion](http://localhost:8000/admin) est protégée par une étape de l'identification.

    Les comptes suivant sont disponible pour le test de l'authentification
    
    * Identifiant : admin@admin.com - Mot de passe: admin

    * Identifiant : user@user.com - Mot de passe: user    

## Auteur
Siwar  ZAIED

Thi Giang Thu TRAN

