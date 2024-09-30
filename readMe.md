# Dn'D - Test technique Magento 2 - Romain Genin

J'ai développé ce test technique sous Magento 2 avec une mise en place de docker (déjà présent dans le repo)

Il suffit d'exécuter la commande `docker-compose up -d --build`
Le build prends quelques minutes à s'exécuter la première fois

Ensuite, il faut importer la BDD présente à la racine du projet dans le container mysql

PHP: ` docker exec -it magento_web bash`

MySQL: ` docker exec -it magento_bd bash`

## Identifiants

```bash
Identifiants BO:
  User: magento
  Mdp: magento
```

```bash
Identifiants BO:

  User: admin
  Mdp: admin123
```



