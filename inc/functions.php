<?php

/**
 * Função para obter os dados do usuario 
 */
function getUserData($conn, $userId)
{
    $result = mysqli_query($conn, "SELECT U.*, P.name FROM tbl_users U LEFT JOIN tbl_user_profile P ON U.id=P.id WHERE U.id='$userId' LIMIT 1 ");

    if (mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    } else {
        return false;
    }
}

function safeInput($conn, $data)
{
    return htmlspecialchars(mysqli_real_escape_string($conn, trim($data)));
}

function output($return = array())
{
    header('Access-Control-allow-Origin: *');
    header('Content-Type: application/json; charset=UTF-8');
    exit(json_encode($return));
}
