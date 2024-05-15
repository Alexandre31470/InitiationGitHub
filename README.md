
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

# Mettre à jour version locale d'un dépôt à partir d'un dépôt distant
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

# Creer un pull request
Modifier le texte du fichier sur un IDE
Depuis le Terminal exexuter la commande git add .
git commit -m "message"
git push 
Aller sur Github sur l'onglet pull request
Puis new pull request
Vérifier ou apporter une modification
Cliquer sur le bouton Create pull request
La pull request est prête à être mergée par une pesronne habilité.

# Résoudre un conflit :
git status  (pour afficher le conflit)

# 1 pour récupérer la version distante et écraser la version locale :
git checkout --theirs README.md
git add README.md
git commit -m "nom commit"
git push
git status pour constater que le conflit est bien résolu

# 2 pour récupérer la version locale et écraser la version distante :
git checkout --ours README.md
git add README.md
git commit -m "nom commit"
git push
git status pour constater que le conflit est bien résolu

# 3 pour créer manuellement une nouvelle version du fichier README.md :
Ouvrir le fichier dans un éditeur de texte 
Apporter les modifications au conflit dans l'éditeur et sauvegarder le fichier
Depuis le terminal :
git add REAME.md
git commit -m "nom commit"
git push
git status pour constater que le conflit est bien résolu

# Résoudre un bug sans impacter nôtre tache en cours 
On modifie le fichier dans l'éditeur de texte puis on sauvegarde
git add README.md 
git stash
git status

# Utilisation de git bisect :
git bisect start 
git bisect bad HEAD
git log pour récupérer le SHA1 du commit à récupérer 
Copier son ID
git bisect good puis coller ID valide
Lire le contenu de fichier avec la commande suivante :
cat README.md
Si le contenu du fichier est bon faire git bisect good SINON git bisect bad 

Une fois le bug trouvé 
git bisect bad 
git bisect reset puis coller SHA1 du commit concerné par ce bug
git revert puis coller l'ID du commit concerné par ce bug pour annuler son effet
git stash pop pour récupérer le travail mis de côté



