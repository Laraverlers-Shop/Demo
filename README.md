# 🚀 Gestion Commerciale - Démo Laravel 12

Bienvenue sur le projet de démonstration **Laravel 12** réalisé pour le cours de Développement Web PHP. 

Cette application simple de gestion de clients et de commandes sert de support pratique pour illustrer les concepts clés du framework Laravel (Routes, Contrôleurs, Vues Blade, Migrations, Eloquent, Formulaires et Authentification).

---

## 📋 Prérequis

Avant de commencer, assurez-vous d'avoir installé sur votre machine :
- **PHP** (v8.2 ou supérieur)
- **Composer**
- **Git**

---

## 🛠️ Installation & Configuration

Suivez ces étapes simples pour installer et lancer le projet en local :

### 1. Cloner le projet
Ouvrez votre terminal et exécutez :
```bash
git clone [https://github.com/Laraverlers-Shop/Demo.git](https://github.com/Laraverlers-Shop/Demo.git)
cd Demo
```
### Installer les dépendances

```bash
composer install
```

### 3. Configurer le fichier d'environnement

1 - Créez le fichier .env à partir du fichier d'exemple :

- Sur Linux / Mac :
```bash
    cp .env.example .env
```

- Sur Windows (PowerShell) :
```bash
Copy-Item .env.example .env
```

2 - Générez la clé d'application Laravel :

```bash
php artisan key:generate
```

### 4. Configurer la base de données (SQLite)
Pour garder une installation ultra-simple sans configurer MySQL, nous utilisons SQLite :

- Ouvrez le fichier .env et vérifiez que ces deux lignes sont bien configurées :

```bash
DB_CONNECTION=sqlite
```

- Créez le fichier de base de données SQLite :

-   Sur Windows (PowerShell) :
```bash
New-Item -ItemType File database/database.sqlite
```
- Sur Linux / Mac :
```bash
touch database/database.sqlite
```

### 5. Exécuter les migrations et remplir la base de données
Exécutez cette commande pour créer les tables et ajouter des données de test (clients, commandes, compte admin) :

```bash
php artisan migrate:fresh --seed
```

### Lancer l'application

Démarrez le serveur de développement local :

```bash
php artisan serve
```
Ouvrez votre navigateur et rendez-vous sur : http://127.0.0.1:8000

### Identifiants de connexion (Demo)
Pour tester la connexion et l'accès protégé aux routes :

E-mail : admin@est.ma

Mot de passe : password

