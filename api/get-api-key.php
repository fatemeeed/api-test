
<?php 
require '../vendor/autoload.php';


?>
<form action="" method="post">
    <input type="email" name="email"><button type="submit" value="generate key">generate key</button>
</form>

<?php

use Firebase\JWT\JWT;




if($_SERVER['REQUEST_METHOD'] != 'POST')
die();

$email=$_POST['email'];

$user_id=getUserByEmail($email);

$payload = [
    'user_id' => $user_id
];

/**
 * IMPORTANT:
 * You must specify supported algorithms for your application. See
 * https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40
 * for a list of spec-compliant algorithms.
 */

 define('JWT_KEY','example_key');
 define('JWT_ALG','HS256');
$jwt = JWT::encode($payload, JWT_KEY , JWT_ALG );

print 'jwt'. '<textarea name="" id="">'. $jwt .'</textarea>';
