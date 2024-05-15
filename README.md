
# Ajouter un référentiel distant à votre projet Git local :
git remote add origin avec le lien du repo . Pour lier ton projet à ton repository github

# Tracker les fichiers à envoyer

git add avec le nom du ou des fichiers à tracker ou un . pour tracker tous les fichiers.

git add .  rajoute tous les fichiers créer ou modifier

git add -u rajoute tous les fichiers supprimer ou modifier

git add -A rajoute tous les fichiers créer, supprimer, ou modifier

# Enregistre les modifications du projet
git commit -m "message" pour lier un message à ton fichier. Vois ça comme l'objet d'un email

# Envoyer le projet sur Github
git push pour envoyer ton projet à ton repository en ligne

# Initialisation de Git
git init pour initialiser ton projet. Tu le fais qu'a la création de ton repository sur github, après c'est plus nécessaire.
git config --global user.email "you@example.com"
git config --global user.name "Your Name"
git config --global --list

# Remonter sur version précédente
git checkout numéro SHA1

# Afficher le statut d'un dépôt
git status pour afficher l'état actuel de nôtre dépôt 

# Afficher les journaux de validation
git log

# Préciser la branche de dépôt su github (Cela pousse votre branche locale "master" vers la branche "master" du référentiel distant "origin" et établit un lien entre les deux.)
git push --set-upstream origin master

# Mettre à jour version locale d'un dépôt
git pull 

# Forker un repository 
Pour cela il faut se rendre sur le site github puis sur le repository sélectionné 
Cliquer sur le bouton Fork
Dans la fenêtre Create a new Fork le owner et repository name seront automatiquement remplis
Cliquer sur Create Fork
Le projet est Forké sur mon espace Github

# Cloner un projet
Sélectionner le projet souhaité
Cliquer sur le bouton Code pour copier l'URL du projet 
Depuis un Terminal Taper la commande git clone suivi de l'URL du projet

