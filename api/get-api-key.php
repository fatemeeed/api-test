
<?php 
include_once '../vendor/autoload.php';
?>
<form action="" method="post">
    <input type="email" name="email"><input type="submit" value="generate key">
</form>

<?php

use Firebase\JWT\JWT;


if($_SERVER['REQUEST_METHOD'] != 'post')
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
$jwt = JWT::encode($payload, JWT_KEY , JWT_ALG );

return 'jwt'. '<textarea name="" id="">'. $jwt .'</textarea>';
