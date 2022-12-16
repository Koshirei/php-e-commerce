# php-e-commerce CLAUSE Axel, MAROTTA Titouan
Projet de vente de manga sur un site e-commerce, voir PDF pour sujet plus complet  

# Créer la base de données
Ouvrir un terminal dans ./bdd_sql  
```npm i```   
Une fois terminé    
```cd src```    
Changer la configuration dans ```config.js```.    
```node index.js```  
Et prier que tout fonctionne.    

NODE DOIT ETRE EN VERSION 15.0 MINIMUM POUR QUE LES FONCTIONS ReplaceAll() S'EXECUTENT

# Lancer le projet
Ouvrir un terminal dans ./app.

```composer install```
```php -S 0.0.0.0:3000 -t public```

Si la configuration dans ```./bdd_sql/src/config.js``` à été modifiée, mettre à jour le fichier ```./app/config/database.php``` avec le même contenu que ```config.js``` du répertoire ./bdd_sql/src.   

Le projet est lancé sur localhost:3000.

# Comptes  

Les comptes définis sont au format " identifiant : motDePasse "    

Compte Administrateur du site : " admin : adminpassword "  
Compte Client du site : " user : userpassword "   
Compte Client PayPal Sandbox : " sb-pyoiw23430305@personal.example.com : Ip0hWr&( "   

# Cron

Script à lancer toutes les minutes qui supprimeras des entrées de la table "cart_history" 30 minutes après leur créations.   
Si une quantité de manga est incrémenté/décrémentée, la date de création s'actualise à maintenant.    
Si une entrée est supprimée, le stock du manga s'incrémentera de 1, autant de fois que le panier l'avait en quantité.

```cd ./app/src/cron ; php deleteOutdatedCarts.php```  

Temps de 30 minutes modifiable sur le script en changeant la variable $outdated_timer .  
Avoir une version de MySql/MariaDB qui possède la fonction TIMESTAMPDIFF (https://mariadb.com/kb/en/timestampdiff/). 
