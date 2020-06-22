<?php
require_once 'Classes/User.php';
                            $user = new User();
$user = new User();
$data=$user->getUserInfoById('ADMIN@MAIL.COM');
print_r($data);
