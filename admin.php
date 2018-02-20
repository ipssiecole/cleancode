<?php

// admin.php

require 'vendor/autoload.php';

use Ipssi\User;
$user = new User();

var_dump('0010', '1000');

$user->setRole(User::MANAGER | User::VISITOR);

// Example
// Permission::check($user->getRole());

if (!($user->getRole() & User::ADMIN) ) {
    echo "Vous n'êtes pas admin, dégage de là !!!!";
    exit;
}

echo "Hello, tu es le bienvenu";