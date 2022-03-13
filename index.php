<?php

require('inc/config.php');
require('inc/functions.php');

/**
 * Verifica a autenticação, caso contrario o usuario será redirecionado para o main.
 */
if (!isset($_SESSION['UserData'])) {
    exit(header('location:main.php'));
}

require('include/header.php');

?>

<div class="container">
    <p>Parabéns! Você fez login na página protegida por senha.<a href="logout.php">Clique Aqui</a> Para Logar!</p>

    <?php

    echo '<pre>';
    print_r(getUserData($conn, $_SESSION['UserData']['userId']));
    echo '</pre>';

    ?>

</div>

<?php require('include/footer.php'); ?>