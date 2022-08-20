<?php require('stripe/init.php');

$publishableKey="pk_test_51JQu86SAqwIwgmCpsqxFlKBmouRKQ6eMuxdjXGcs1iJcoYffs2Bug6Q97dK7I0l4JLZGLjw2igAuKfpgIhf2BwKr00dZeNTlOf";

$secretKey="sk_test_51JQu86SAqwIwgmCpFq5wTixHO2qOxO8fbi6sAGxwfFR7YefcsPEfh3eRb5RxcL60eUbKkm1nKg64gUBEqEst0COj0035Od7swQ";

\Stripe\Stripe::setApiKey($secretKey);
?>