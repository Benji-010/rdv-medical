# Gestion des rendez-vous médicaux

Projet de Programmation Web 2 (L2, UCC) : application web PHP/MySQL de gestion des rendez-vous d'une clinique.

## Installation

1. Installer et démarrer **Apache** et **MySQL** depuis XAMPP.
2. Cloner le projet dans le dossier `htdocs` de XAMPP :

        git clone https://github.com/TON_PSEUDO/rdv-medical.git

3. Copier `config/database.example.php` en `config/database.php` et y mettre ses identifiants MySQL.
4. Créer la base et importer les données :

        mysql -u root
        source database/schema.sql
        source database/seed.sql

5. Ouvrir http://localhost/rdv-medical/public/

## Structure

- `config/` : configuration de la base de données
- `database/` : scripts SQL (`schema.sql`, `seed.sql`) et scripts de test (`tests/`)
- `public/` : pages du site et `assets/` (css, js, img)
- `src/` : logique PHP (connexion PDO, authentification, validation, services) et fichiers communs (header, footer, navbar)

## Répartition du travail

| Module | Responsable | Branche |
|---|---|---|
| Base de données | | `feature/database` |
| Patients | | `feature/patients` |
| Médecins et disponibilités | | `feature/medecins` |
| Salles et disponibilités | | `feature/salles` |
| Rendez-vous et contraintes | | `feature/rendez-vous` |
| Authentification et sécurité | | `feature/auth` |
| Statistiques | | `feature/statistiques` |
| Rapport et tests | | `feature/rapport` |

## Règles de travail

- Chacun travaille uniquement dans ses fichiers, sur sa branche.
- Ne jamais pousser directement sur `main` : seul le chef de groupe fusionne.
- Avant de commencer : `git pull origin main`.
- Ne jamais envoyer `config/database.php` (il est ignoré par Git).
