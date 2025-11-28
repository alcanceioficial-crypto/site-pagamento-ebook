<?php
$ref = $_GET["ref"] ?? "";

if (file_exists("liberados/$ref.txt")) {
    header("Location: ebooks/meu-ebook.pdf");
    exit;
}

echo "Pagamento ainda não confirmado. Atualize em alguns minutos.";
?>
