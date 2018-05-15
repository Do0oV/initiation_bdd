<!DOCTYPE html>
<html>
<head>
	<title>initiation bdd</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300i,400,700" rel="stylesheet"> 
	<style>
	body {
		font-family: 'Roboto Condensed', sans-serif;
	}
</style>
</head>
<?php 
//include connexion base de données
include 'conndb.php';
?>
<body>
	<header>
		<div class="navbar-fixed">
			<nav class="teal">
				<div class="nav-wrapper">
					<a href="#" class="brand-logo">Initiation BDD</a>
					<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
					<ul class="right hide-on-med-and-down">
						<li><a href="#exercice1"><i class="medium material-icons">filter_1</i></a></li>
						<li><a href="#exercice2"><i class="medium material-icons">filter_2</i></a></li>
						<li><a href="#exercice3"><i class="medium material-icons">filter_3</i></a></li>
						<li><a href="#exercice4"><i class="medium material-icons">filter_4</i></a></li>
						<li><a href="#exercice5"><i class="medium material-icons">filter_5</i></a></li>
						<li><a href="#exercice6"><i class="medium material-icons">filter_6</i></a></li>
						<li><a href="#exercice7"><i class="medium material-icons">filter_7</i></a></li>
						<li><a href="#exercice8"><i class="medium material-icons">filter_8</i></a></li>
						<li><a href="#exercice9"><i class="medium material-icons">filter_9</i></a></li>
					</ul>
				</nav>
			</div>
			<ul class="sidenav" id="mobile-demo">
				<li><a href="#exercice1" class="sidenav-close"><i class="small material-icons left">filter_1</i>Exercice 1</a></li>
				<li><a href="#exercice2" class="sidenav-close"><i class="small material-icons left">filter_2</i>Exercice 2</a></li>
				<li><a href="#exercice3" class="sidenav-close"><i class="small material-icons left">filter_3</i>Exercice 3</a></li>
				<li><a href="#exercice4" class="sidenav-close"><i class="small material-icons left">filter_4</i>Exercice 4</a></li>
				<li><a href="#exercice5" class="sidenav-close"><i class="small material-icons left">filter_5</i>Exercice 5</a></li>
				<li><a href="#exercice6" class="sidenav-close"><i class="small material-icons left">filter_6</i>Exercice 6</a></li>
				<li><a href="#exercice7" class="sidenav-close"><i class="small material-icons left">filter_7</i>Exercice 7</a></li>
				<li><a href="#exercice8" class="sidenav-close"><i class="small material-icons left">filter_8</i>Exercice 8</a></li>
				<li><a href="#exercice9" class="sidenav-close"><i class="small material-icons left">filter_9</i>Exercice 9</a></li>
				<li><a href="#" class="sidenav-close">Fermer</a></li>
			</ul>
		</header>
		<div class="container">
			<section id="exercice1">
				<h4>1.  Afficher tous les gens dont le nom est palmer </h4>
				<?php
				$reponse = $db->query('SELECT * FROM users WHERE last_name=\'palmer\'');
				echo '<table class="table striped">
				<tr>
				<th>Firstname</th>
				<th>Lastname</th> 
				</tr>
				';
				while ($donnees = $reponse->fetch())
				{
					echo '<tr>
					<td>'.$donnees['first_name'].'</td>
					<td>'.$donnees['last_name'].'</td> </tr>
					';
				}
				$reponse->closeCursor();
				echo "  
				</table>";
				?>
			</section>
			<section id="exercice2">
				<h4>2. Afficher toutes les femmes </h4>
				<?php
				$reponse = $db->query('SELECT first_name,last_name FROM users WHERE gender=\'Female\'');
				echo '<table class="table striped">
				<tr>
				<th>Firstname</th>
				<th>Lastname</th> 
				</tr>
				';
				while ($donnees = $reponse->fetch())
				{
					echo '<tr>
					<td>'.$donnees['first_name'].'</td>
					<td>'.$donnees['last_name'].'</td> </tr>
					';
				}
				$reponse->closeCursor();
				echo "  
				</table>";
				?>
			</section>
			<section id="exercice3">
				<h4>3. Tous les états dont la lettre commence par N </h4>
				<?php
				$reponse = $db->query('SELECT country_code FROM users WHERE country_code LIKE \'N%\'');
				echo '<table class="table striped">
				<tr>
				<th>Country</th> 
				</tr>
				';
				while ($donnees = $reponse->fetch())
				{
					echo '<tr>
					<td>'.$donnees['country_code'].'</td></tr>
					';
				}
				$reponse->closeCursor();
				echo "  
				</table>";
				?>
			</section>
			<section id="exercice4">
				<h4>4. Tous les emails qui contiennent google </h4>
				<?php
				$reponse = $db->query('SELECT email FROM users WHERE email LIKE \'%google%\'');
				echo '<table class="table striped">
				<tr>
				<th>Email</th> 
				</tr>
				';
				while ($donnees = $reponse->fetch())
				{
					echo '<tr>
					<td>'.$donnees['email'].'</td></tr>
					';
				}
				$reponse->closeCursor();
				echo "  
				</table>";
				?>
			</section>
			<section id="exercice5">
				<h4>5.Répartition par Etat et le nombre d’enregistrement par état  </h4>
				<?php
				$reponse = $db->query('SELECT country_code, COUNT(country_code) FROM users GROUP BY country_code ORDER BY COUNT(country_code) DESC');
				echo '<table class="table striped">
				<tr>
				<th>Country</th> 
				<th>Nb Users</th>
				</tr>
				';
				while ($donnees = $reponse->fetch())
				{
					echo '<tr>
					<td>'.$donnees['country_code'].'</td>
					<td>'.$donnees['COUNT(country_code)'].'</td></tr>
					';
				}
				$reponse->closeCursor();
				echo "  
				</table><br>";
				?>
			</section>
			<section id="exercice6">
				<h4>6. Insérer un utilisateur, lui mettre à jour son adresse mail puis supprimer l’utilisateur. </h4>
				<h5>Insertion</h5>
				<?php
				$reponse = "INSERT INTO users 
				VALUES (NULL, 'Dorothee', 'Vader', 'test@google.com', 'Female', NULL, '11/06/1888', '39000', 'http://unknown.void',NULL, 'FR')";
				$db->exec($reponse);
				echo "New record created successfully<br>";
				?>
				<h6 style="display: inline;">SQL: </h6>
				<code>INSERT INTO users 
				VALUES (NULL, 'Dorothee', 'Vader', 'test@google.com', 'Female', NULL, '11/06/1888', '39000', 'http://unknown.void',NULL, 'FR');</code>
				<h5>Mise à jour</h5>
				<?php
				$reponse = "UPDATE users  SET email='changed@email.com' WHERE last_name='Vader'";
				$db->exec($reponse);
				echo "Email successfully changed<br>";
				?>
				<h6 style="display: inline;">SQL: </h6>
				<code>UPDATE users
					SET email = 'new@mail.com'
				WHERE last_name='Vader'</code>
				<h5>Delete</h5>
				<?php
				$reponse = "DELETE FROM users WHERE last_name='Vader'";
				$db->exec($reponse);
				echo "user successfully deleted<br>";
				?>
				<h6 style="display: inline;">SQL: </h6>
				<code>DELETE FROM users WHERE last_name='Vader';</code>
			</section>
			<section id="exercice7">
				<h4>7.Nombre de femme et d’homme  </h4>
				<?php
				$reponse = $db->query('SELECT gender, COUNT(gender) FROM users GROUP BY gender ORDER BY COUNT(gender) ASC');
				echo '<table class="table striped">
				<tr>
				<th>Gender</th> 
				<th>Nb Users</th>
				</tr>
				';
				while ($donnees = $reponse->fetch())
				{
					echo '<tr>
					<td>'.$donnees['gender'].'</td>
					<td>'.$donnees['COUNT(gender)'].'</td></tr>
					';
				}
				$reponse->closeCursor();
				echo "  
				</table>";
				?>
			</section>
			<section id="exercice8">
				<h4>8. Afficher Age de chaque personne, puis la moyenne d’âge des femmes et des hommes  </h4>
				<h5>Afficher âge</h5>
				<?php
				$reponse = $db->query('SELECT last_name, birth_date, CURDATE(),
					TIMESTAMPDIFF(YEAR,birth_date,CURDATE()) AS age 
					FROM users WHERE birth_date is not NULL ;');
				echo '<table  class="table striped">
				<tr>
				<th>Users</th> 
				<th>Age</th>
				</tr>
				';
				while ($donnees = $reponse->fetch())
				{
					echo '<tr>
					<td>'.$donnees['last_name'].'</td>
					<td>'.$donnees['age'].' ans</td></tr>
					';
				}
				$reponse->closeCursor();
				echo "  
				</table>";
				?>
				<h5>Moyenne âge des hommes et des femmes</h5>
				<?php
				$reponse = $db->query('SELECT gender, birth_date, CURDATE(),
					AVG(TIMESTAMPDIFF(YEAR,birth_date,CURDATE())) AS moy_age 
					FROM users WHERE birth_date is not NULL GROUP BY gender');
				echo '<table class="table striped">
				<tr>
				<th>Gender</th> 
				<th>Moyenne âge</th>
				</tr>
				';
				while ($donnees = $reponse->fetch())
				{
					echo '<tr>
					<td>'.$donnees['gender'].'</td>
					<td>'.ROUND($donnees['moy_age']).'</td></tr>
					';
				}
				$reponse->closeCursor();
				echo "  
				</table>";
				?>
			</section>
			<section id="exercice9">
				<h4>9. Créer deux nouvelles tables, une qui contient l’ensemble des membres de l’ACS, l’autre qui contient les département avec numéros et nom écrit.</h4>
				<h5>Afficher le nom de chaque apprenant avec son département de résidence.</h5>
				<?php
				$reponse = $db->query('SELECT * FROM apprenants INNER JOIN departement WHERE apprenants.id_departement = departement.departement_code');

				echo '<table class="table striped">
				<tr>
				<th>Apprenant</th> 
				<th>Département</th>
				</tr>
				';
				while ($donnees = $reponse->fetch())
				{
					echo '<tr>
					<td>'.$donnees['nom'].'  '.$donnees['prenom'].'</td>
					<td>'.$donnees['departement_code'].'  '.$donnees['departement_nom'].'</td></tr>
					';
				}
				$reponse->closeCursor();
				echo "  
				</table>";
				?>
			</section>
		</div>
		<script
		src="https://code.jquery.com/jquery-3.3.1.js"
		integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
		crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
		<script>
			$(document).ready(function(){
				$('.sidenav').sidenav();
			});
		</script>
	</body>
	</html>