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
    if ('sexe' === 1) -> l'utilisateur est une femme
    if ('sexe' === 2) -> l'utilisateur est un homme
    if ('sexe' === 0) -> Autre sexe
````
### Savoir si l'utilisateur à supprimer son compte
```bash
    if ('statut' === 0) -> Compte de l'utilisateur supprimer
    if ('statut' === 1) -> Compte de l'utilisateur pas supprimer
```