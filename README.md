## Site sur l'animé "JoJo's Bizarre Adventure"

### Installation :

Créer un fichier .env.local avec :
```shell
DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7
```

Dans le terminal :
```shell
composer install
```
```shell
php bin/console doctrine:database:create
```
```shell
php bin/console doctrine:migrations:migrate
```
Importer le fichier dans la base de donnée : public\Jojo_db2.sql


### Page d'accueil du site :

![homepage](/public/images/homepage.png)

### Détail d'une saison : 

![showSeason](/public/images/showChapter.png)
