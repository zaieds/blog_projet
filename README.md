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

3. Configurer le fichier .env et la base de données

   Dans le répertoire du projet, créer le fichier .env en copiant du fichier .env.example avec la commande:

   ```bash
   cp .env.example .env
   ```

   Dans le répertoire "database" du projet, créer un fichier nommé "database.sqlite".

   Ouvrir le fichier .env, modifier la DB_CONNECTION et la DB_DATABASE comme suivant:
   ```txt
   DB_CONNECTION=sqlite
   DB_DATABASE=/chemin/vers/l-application/database/database.sqlite
   ```

   Générer le key du projet

    ```bash
   php artisan key:generate
   ```
## Lancement

   1. Sur le répertoire du projet, lancer la migration et le Seeder de la base de données:

    ```bash
   php artisan migrate
   php artisan db:seed
   ```
    ou 

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

    Le bar de navigation disponible en header de la page contient les liens permettant d'accéder aux différentes parties du blog:

    La partie gauche du bar de navigation contient les liens vers:
    * Home
    * Articles
    * Contact
    * Gestion

    La partie droite du bar de navigation contient les liens vers:
    * Le formulaire pour se connecter
    * Le formulaire pour s'inscrire
    
2. La base de données:

    Les articles, utilisateurs, commentaires et contacts sont sauvegardés dans une base SQLite.

    La base de données est préremplie avec des fausses données à l'aide des Seeders de Laravel.

    La réinitialisation de la base de données et peut se faire avec la commande: 

    ```bash
    php artisan migrate:fresh --seed
    ```

    Les relations entre les tables de la base de données sont faites avec l'Eloquent de Laravel:

    * Un user peut avoir plusieurs Post
    * Un post peut avoir plusieurs Comment

3. L'affichage des articles

    Sur la page d'accueil [Home](http://localhost:8000/home), les trois derniers articles sont affichés.

    De la même façon, sur la page [Articles](http://localhost:8000/articles), tous les articles sont affichés.
        
    Le titre de chaque article contient le lien vers l'affichage de son titre, son contenu et son auteur.
    
4. Le formulaire de contact

    La page [Contact](http://localhost:8000/contact/create) contient un formulaire pour déposer une demande de contact.

    La validation des champs de texte et d'email est également implémentée: le formulaire ne peut pas être déposé si les champs sont laissés vide ou le champs de l'email ne contient pas une adresse email.

    Une fois le formulaire est envoyé, les informations sont enregistrées dans la table "contact" de la base de données.

5. La gestion des commentaires:

    La table des commentaires est créée avec la migration et elle est remplie avec le Seeder.
    
    Un formulaire et une liste de commentaires sont affichés en bas de chaque articles.
    
    La validation des champs de texte et d'email est implémentée: le formulaire ne peut pas être déposé si les champs sont laissés vide ou le champs de l'email ne contient pas une adresse email.

    Une fois envoyées, les informations d'un commentaire sont enregistrées et affichées en bas de l'article.

6. Identification / Authentification avec les différents rôles qui protège l'accès à l’administration

    La partie [Gestion](http://localhost:8000/admin) est protégée par une étape de l'identification.

    Les comptes suivant sont disponible pour le test de l'authentification
    
    * Identifiant : admin@admin.com - Mot de passe: admin

    * Identifiant : user@user.com - Mot de passe: user    

    Il y a deux groupes d'utilisateur: les admins et les utilisateurs.
    
    * Un admin peut gérer tous les articles, les contacts et les utilisateurs.
    * Un utilisateur peut voir la liste de ses articles, ajouter, modifier ou supprimer un de ses articles ainsi que gérer les commentaires de ses articles.

    Pour plus de détail, veuiller voir la partie 7 qui suit.

7. Le CRUD des articles, des utilisateurs et la gestion des demandes de contact:

    L'accès à la gestion exige une authentification (à voir dans la partie 7).est fait en cliquant sur l'onglet [Gestion](http://localhost:8000/admin)  (L'accès à cet onglet 
    
    La [gestion des articles](http://localhost:8000/admin/articles) est faite à l'aide d'un contrôleur de type CRUD(AdminArticlesController). Ce contrôleur permet
    * l’affichage d’une liste complète des articles 
    * l’ajout, l’édition et la suppression d’un article qui se représentent par des buttons correspondant.

    Les informations remplies lors de l'ajout ou l'édition sont passées par la validation avant d'être enregistrées dans la base de données (les champs ne doivent pas être vide, l'user_id doit etre un nombre, etc.).

    La suppression d'un article demande un validation par un box d'alert.

    La [gestion des utilisateurs](http://localhost:8000/admin/articles) est faite à l'aide d'un contrôleur de type CRUD(UserController). Ce contrôleur permet 
    * l’affichage d’une liste complète des utilisateurs 
    * l’ajout et la suppression d’un utilisateur qui se représentent par des buttons correspondant.
    * Pourtant, malgré des efforts de notre group, l'édition d'un utilisateur n'est pas encore être implémentée.

    La [gestion des contact](http://localhost:8000/admin/contact) permet l'accès à la liste des demandes de contact. Un button de supprimer est disponible pour supprimer un contact de la base de données.


## Auteur
Siwar  ZAIED

Thi Giang Thu TRAN

