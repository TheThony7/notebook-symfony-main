# Notebook-symfony
Projet de consolidation des apprentissages de mes étudiant(e)s sur Symfony

![Symfony](https://img.shields.io/badge/Symfony-6.*-green) ![PHP](https://img.shields.io/badge/PHP-8.*-blue) ![MySQL](https://img.shields.io/badge/MySQL-8.*-gray) ![Bootstrap](https://img.shields.io/badge/Bootstrap-5.*-purple) ![Twig](https://img.shields.io/badge/Twig-3.*-green) ![Doctrine](https://img.shields.io/badge/Doctrine-2.*-blue) ![Composer](https://img.shields.io/badge/Composer-2.*-blue)

### Étapes pour l'installation de ce projet Symfony

1. Cloner le projet dans votre répertoire de travail

Tapez dans le terminal :
```bash
    git clone https://github.com/Jensone/notebook-symfony
```
Ou directement depuis votre IDE (VSCode, PHPStorm, etc.)

2. Installer les dépendences avec la commande : 

```bash
    composer install
```

1. Installer les packages nécessaires (présent dans l’application) :

AppFixtures :

```bash
    composer require --dev doctrine/doctrine-fixtures-bundle
```
Security Bundle :

```bash
    composer require security
```
Validator :

```bash
    composer require symfony/validator
```
Mailer :

```bash
    composer require symfony/mailer
```

4. Créer la base de données (MySql ou MariaDB). Mettez à jour le fichier `.env` (le nom d’utilisateur, le mot de passe, le port d’écoute, nom de la base de données…)

Puis tapez dans le terminal :

```bash
    symfony console doctrine:database:create
```
La base de données est créée, il faut maintenant créer les tables, avant cela supprimez toutes les versions de migration actuelles dans le dossier `/migrations` et effectuez la commande suivante :

```bash
    symfony console make:migration
```
Puis :

```bash
    symfony console doctrine:migrations:migrate
```

5. Lancer le serveur et assurez-vous que tout fonctionne correctement :

```bash
    symfony serve -d
```

6. Vous devez créer un utilisateur Admin pour pouvoir accéder à l’application. Préparez un hash de mot de passe avec la commande suivante :

```bash
    symfony console security:hash-password
```
Puis, renseignez les informations demandées (email, mot de passe, rôle) dans la table `Admin` de la base de données via PhpMyAdmin ou autre :

- email : comme vous voulez
- role ["ROLE_ADMIN"]
- password : le hash de mot de passe que vous avez créé

Connectez-vous à l’application avec l’email et le mot de passe que vous avez renseigné.

![Symfony Serve](/public/assets/images/screen.png)

7. Pour charger les données de test, tapez dans le terminal :

```bash
    symfony console doctrine:fixtures:load
```

Note : Si vous avez des erreurs, vérifiez que vous avez bien installé les packages nécessaires. Pensez également à renseignez les information pour le mailer dans le fichier `.env`.

Enjoy ! :smile: