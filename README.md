# newsletter_form
<h1>Description<h1>
Ce module custom génère un formulaire qui enregistre les données au
sein de Drupal dans le cadre d'une inscription à la newsletter.

Pour faire fonctionner ce module, vous devez disposer d'un environnement Drupal 8 minimum. 
Voici les différentes étapes pour le faire fonctionner :

<h1>Fonctionnement<h1>
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

Vous pouvez maintenant tester le module à la page nomdudomaine/inscription-newsletter. 
