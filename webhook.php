<?php

// Salva logs para conferir funcionamento
file_put_contents("log.txt", json_encode($_POST) . "\n\n", FILE_APPEND);

$event = $_POST["event"] ?? "";
$status = $_POST["payment"]["status"] ?? "";
$ref = $_POST["payment"]["externalReference"] ?? "";

if ($event === "PAYMENT_CONFIRMED" && $status === "CONFIRMED") {

    // Libera o download criando um arquivo de autorização
    file_put_contents("liberados/$ref.txt", "OK");

}

?>
