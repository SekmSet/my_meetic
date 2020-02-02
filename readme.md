# My_meetic 

### PHP version 

```bash
    7.1 minimum
```

### installer composer sur mac

```bash
brew install composer
```

### installer composer sur linux

```bash
php composer-setup.php --install-dir=bin --filename=composer
mv composer /usr/local/bin/composer
```

## Installer le projet

```bash
composer install
```

## importer la base de donnée

```bash
       cf sql -> requette_sql.sql
```

### Lancer le serveur

```bash
php -S localhost:8080 -t public
```

### Quitter le serveur

```bash
CTRL C
```

# Pour la base de donnée

## Table utilisateur

````bash
    if ('sexe' === 'f') -> l'utilisateur est une femme
    if ('sexe' === 'h') -> l'utilisateur est un homme
    if ('sexe' === 'o') -> Autre sexe
````
### Savoir si l'utilisateur à supprimer son compte

```bash
    if ('actif' === 0) -> Compte de l'utilisateur supprimer
    if ('actif' === 1) -> Compte de l'utilisateur pas supprimer
```
### Savoir si le loisir est actif

```bash
    if ('actif' === 0) -> Compte de loisir pas actif
    if ('actif' === 1) -> Compte de loisir actif
```