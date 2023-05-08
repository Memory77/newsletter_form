# newsletter_form
<h1>Description</h1>
Ce module custom génère un formulaire qui enregistre les données au
sein de Drupal dans le cadre d'une inscription à la newsletter.

Pour faire fonctionner ce module, vous devez disposer d'un environnement Drupal 8 minimum. 
Voici les différentes étapes pour le faire fonctionner :

<h1>Fonctionnement</h1>
1. Installer le module newsletter_form dans modules/custom.<br>
2. Créer un type de contenu. Dans le back-office Drupal, dans Structure/Type de contenu/Ajouter un type de contenu ou /admin/structure/types/add
Vous pouvez le nommer Inscription newsletter. Description "Type de contenu pour voir les personnes inscrites à la newsletter"<br><br>

3. Dans gérer les champs, nous allons créer 3 champs. <br>
	- Label : Nom emetteur		 nom machine : field_in_name		Type de champ : Texte(brut) <br>
	- Label : Email emetteur	 nom machine : field_in_mail		Type de champ: Texte(brut) <br>
	- Label : Civilité emetteur	nom machine : field_in_gender		Type de champ: Liste(texte)  <br> <br>

Ne pas oublier de mettre tous les champs en requis. Le "in" du nom machine pour inscription newsletter.  <br>
Pour la liste je vous conseille de mettre ceci en valeurs autorisées :   <br>
0|Monsieur   <br>
1|Madame     <br> <br>

Vous pouvez maintenant tester le module à la page nomdudomaine/inscription-newsletter.  <br><br>
4. View module (optionnel)<br>
Grace à ce module du core drupal, vous pouvez créer une vue associé au type de contenu inscription newsletter afin de mieux gérer la liste de vos inscrits.<br><br>

/admin/structure/views, puis Ajouter une vue <br>
Nom de la vue : Liste des inscrits à la newsletter<br>
Changez le nom machine en "member_in_list" par exemple. Ajoutez une description si vous le souhaitez. <br><br>

Paramètres de la vue : Afficher : Contenu   <br>
de type: Inscription Newsletter <br>
trié par Newest first. (Les plus inscrits les plus récents s'afficheront en premier)<br><br>

Vous pouvez mettre cette vue dans un bloc ou dans une page. <br>
Pour le bloc, il vous faudra l'activer dans Structure/mis en page des blocs une fois la vue créé. <br>
Changez le chemin si vous voulez une page et mettez /member_newsletter par exemple<br>
Choisissez le format. Je vous conseille de mettre Table dans notre cas afin de bien visualiser nos champs. <br>
Ajoutez les différents champs : Civilité emetteur, Email emetteur, Nom emetteur<br><br>

Vous pouvez ajouter les liens d'actions pour pouvoir effectuer des opérations<br>
View bulk operations notamment si vous voulez les effectuer en masse, vous pouvez cocher les différentes opérations que vous souhaitez.<br>
Vous pouvez cocher "Delete selected entities / translations" par exemple, afin de pouvoir supprimer massivement. Supplanter l'étiquette "Supprimer"<br>
Réordonnez de la manière suivante: <br>
View bulk operation, nom emetteur, email emetteur, civilité emetteur, liens d'actions<br><br>

Ajoutez des critères de filtrage si vous le souhaitez. <br>
Vous pouvez mettre Nom emetteur et cocher "exposer ce filtre aux visiteurs", ainsi que l'opérateur "Contient"
