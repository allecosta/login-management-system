<?php

if ((empty($_SERVER['HTTP_X_REQUESTED_WITH']) or strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') or empty($_POST)) {
    exit('Acesso não autorizado!');
}

require('inc/config.php');
require('inc/functions.php');

/**
 * verifica se o formulario de login foi submetido
 */
if (!empty($_POST) && $_POST['Action'] == 'login-Form') {
    $return = [
        'return' => array(),
        'error' => ''
    ];

    $email = safeInput($conn, $_POST['Email']);
    $password = safeInput($conn, $_POST['Password']);

    if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
        $return['error'] = "Por favor informe um endereço de email valido.";
    } elseif ($password === '') {
        $return['error'] = "Por favor informe a senha.";
    }

    if ($return['error'] != '') {
        output($return);
    }

    $result = mysqli_query($conn, "SELECT * FROM tbl_users WHERE email='$email' AND password='" . md5($password) . "' LIMIT 1");

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $return['result'] = $_SESSION['userData'] = array('userId' => $row['userId']);
    } else {
        $return['error'] = "Ops! Credencial de login errada!";
    }

    output($retun);
}

/**
 * verifica se o formulario de registro foi submetido
 */
if (!empty($_POST) && $_POST['Action'] == 'registration-form') {
    $return = [
        'return' => array(),
        'error' => ''
    ];

    $name = safeInput($conn, $_POST['Name']);
    $email = safeInput($conn, $_POST['Email']);
    $password = safeInput($conn, $_POST['Password']);

    if ($name === '') {
        $return['error'] = "Por favor informe o seu nome completo.";
    } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $return['error'] = "Por favor informe um endereço de email valido.";
    } elseif ($password === '') {
        $return['error'] = "Por favor informe a senha.";
    }

    if ($return['error'] != '') {
        output($return);
    }

    $result = mysqli_query($conn, "SELECT * FROM tbl_users WHERE email='$email' LIMIT 1");

    if (mysqli_num_rows($result) == 1) {
        $return['error'] = "OPS! Já existe um cadastro com este usuário.";
    } else {
        mysqli_query($conn, "INSERT INTO tbl_users (user_guid, email, password, entry_date)
                               VALUES (MD5(UUID()), '$email', '" . md5($password) . "', NOW() )");
        $userId = mysqli_insert_id($conn);
        mysqli_query($conn, "INSERT INTO tbl_user_profile (user_id, name) VALUES ('$userId', '$name')");
        $return['result'] = $_SESSION['userData'] = array('user_id' => $userId);
    }
}

output($return);
