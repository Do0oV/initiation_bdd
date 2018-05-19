<?php include 'conndb.php'; 

$req = $db->prepare("SELECT * FROM users");
$req->execute(array());
echo '<table>
<tr>
	<th>Firstname</th>
	<th>Lastname</th>
	<th>Email</th>
	<th>Gender</th>
	<th>IP Address</th>
	<th>Birthdate</th>
	<th>Zip Code</th>
	<th>Avatar URL</th>
	<th>State Code</th>
	<th>Country Code</th>
	</tr>';
while ($donnees = $req->fetch()){
	echo '<tr>
	<td>'.$donnees['first_name'].'</td>
	<td>'.$donnees['last_name'].'</td>
	<td>'.$donnees['email'].'</td>
	<td>'.$donnees['gender'].'</td>
	<td>'.$donnees['ip_address'].'</td>
	<td>'.$donnees['birth_date'].'</td>
	<td>'.$donnees['zip_code'].'</td>
	<td>'.$donnees['avatar_url'].'</td>
	<td>'.$donnees['state_code'].'</td>
	<td>'.$donnees['country_code'].'</td>
	</tr>';
}
echo '</table>'
?>