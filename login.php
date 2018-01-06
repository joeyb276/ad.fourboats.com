<html>
<head>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
if (isset($_POST[usernames])) {

$ldaphost = 'ldap://dc01.ad.fourboats.com';
$ldapport = 389;
$domain = "@ad.fourboats.com";
$user = $_POST['usernames'];
$passw = $_POST['passwort'];
$ds = ldap_connect($ldaphost, $ldapport)
or die("Could not connect to $ldaphost");
    ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);
//ldap_set_option($ds, LDAP_OPT_DEBUG_LEVEL, 7);
if ($ds)
{
    $username = "$user$domain";
    $upasswd = "$passw";

    $ldapbind = ldap_bind($ds, $username, $upasswd);


    if ($ldapbind)

        {
header("Location: dashboard/public/dashboard.html");
  exit;
//print "Congratulations! $username is authenticated.";
}
    else
        {print "Access Denied!";}
}
print "$user.$passw";
}else{
print "<div class='container'>
	<section id='content'>
		<form form method='POST'>
			<h1>Login Form</h1>
			<div>
			<input type='text' name='usernames' placeholder='Username' /><br />
			</div>
			<div>
			<input type='password' name='passwort' placeholder='Password' /><br />
			</div>
			<div>
				<input type='submit' value='Log in' />
			</div>
		</form>
		<div class='button'>
		</div>
	</section>
</div>";
print "$user.$passw";
}

?>
 <script  src="js/index.js"></script>
</body>
</html>
