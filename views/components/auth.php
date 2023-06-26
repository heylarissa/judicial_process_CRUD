<?php
session_start();
if(!isset($_SESSION ['login'])){                      // Se ainda não houve login
    unset($_SESSION ['nao_autenticado']);
    unset($_SESSION ['mensagem_header'] ); 
    unset($_SESSION ['mensagem'] ); 
    header('location: /index.html');  // Desvia para a página 
    exit();                                           // inicial.
}

?>