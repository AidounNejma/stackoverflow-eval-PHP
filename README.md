# Recréons le site Stackoverflow

Nous allons recréer le célèbre site Stackoverflow en PHP avec l'architecture MVC

## Pour installer composer (appuyer sur entrée à toutes les questions):
```bash
composer init
```

## Ensuite il faut modifier le namespace de base, dans cette partie du fichier .json
```bash 
"autoload": {
    "psr-4": {
        "Mehdi\\Stackoverflow\\": "src/"
    }
}
```

## Remplacer par App:
```bash 
"autoload": {
    "psr-4": {
        "App\\": "src/"
    }
}
```

## Puis:
```bash
composer install
```

## Créer un fichier config.ini et remplacer par les valeurs de votre base de données:
```bash
;$config = parse_ini_file(config.ini)
DB_HOST = 'localhost'
DB_USERNAME = 'nomutilisateur'
DB_PASSWORD = 'votremotdepasse'
DB_NAME = 'nomdevotrebasededonnees'
```
