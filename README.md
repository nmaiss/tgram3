# Le code du site-annuaire [Tgram](https://tgram.fr)

Ce site est un annuaire qui permet aux utilisateurs de lister et de trouver des canaux Telegram de qualité.
## Installation
### Lancement local

Vous devez au préalable avoir installé [Laravel](https://www.google.com/search?q=laravel+github&oq=laravel+github&aqs=chrome..69i57j69i60.1944j0j9&sourceid=chrome&ie=UTF-8).

1. Clonez ce dépôt : ```https://github.com/nmaiss/tgram3.git```
2. Installez les dépendances : ```composer install```
3. Créez le fichier ```.env``` et configurez-y la base de données : ```mv .env.example .env```
4. Générez une clé : ```php artisan key:generate```
6. Migrez la base de données : ```php artisan migrate```
7. Créez un lien symbolique pour les images : ```php artisan storage:link```
8. Connectez votre compte Telegram (pour l'ajout des canaux) : ```php artisan madeline-proto:login```
9. Lancez : ```php artisan serve```

Et ça devra être bon ! N'hésitez pas à forker et soumettre des pull requests. Merci!

## Contributions
Les pull requests sont les bienvenus. Pour les changements majeurs, veuillez d'abord ouvrir une issue pour discuter de ce que vous aimeriez changer.

## License
MIT — peut donc être utilisé à toute fin. Ce serait sympa si vous pouviez mentionner les développeurs d'origine. Merci!
