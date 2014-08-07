<?php

require_once "../GestPayCrypt.inc.php";

if (empty($_GET["a"])) {
    throw new Exception("Parametro mancante: 'a'\n");
}

if (empty($_GET["b"])) {
    throw new Exception("Parametro mancante: 'b'\n");
}

$crypt = new GestPayCrypt();

$crypt->SetShopLogin($_GET["a"]);
$crypt->SetEncryptedString($_GET["b"]);

if (!$crypt->Decrypt()) {
    throw new Exception("Error: " . $crypt->GetErrorCode() . ": " . $crypt->GetErrorDescription() . "\n");
}

switch ($crypt->GetTransactionResult()) {
    case "XX":
        echo("Esito transazione sospeso (pagamento tramite bonifico)\n");
        break;

    case "KO":
        echo("Esito transazione negativo\n");
        break;

    case "OK":
        echo("Esito transazione positivo\n");
        break;

    default:
        echo("Esito transazione indefinito\n");
}
