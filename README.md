# Game Collection

## Présentation

Game Collection est une application web qui permet de gérer sa collection de jeux vidéo.

## Fonctionnalités

- Système d'authentification
- Bibliothèque de jeux
- Classement des joueurs

## Prérequis

- PHP 7.4
- Composer
- MySQL
- Apache

## Installation

1. Cloner le projet
2. Installer les dépendances avec composer
3. Créer un fichier .env à la racine du projet et y ajouter les variables d'environnement en suivant le modèle du fichier .env.example
4. Créer la base de données
5. Importer le fichier game_collection.sql dans la base de données
6. Lancer le serveur

## Conventions

### Commits

Les messages de commit doivent suivre la convention suivante :

```bash
<type>: <description>
```

Le type doit être l'un des suivants :

- **docs** : Changements concernant la documentation
- **feat** : Ajout d'une nouvelle fonctionnalité
- **fix** : Correction d'un bug
- **perf** : Amélioration des performances
- **refactor** : Modification qui n'apporte ni nouvelle fonctionalité ni d'amélioration de performances
- **style** : Changements qui n'affectent pas le sens du code (espace manquant, point-virgule ajouté…)
- **test** : Ajout ou correction de tests

## License

Ce projet est sous licence GPL-3.0 license - voir le fichier [LICENSE](LICENSE) pour plus de détails.
