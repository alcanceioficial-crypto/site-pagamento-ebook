<?php
header('Content-Type: application/json');

$apiKey = "aact_prod_000MzkwODA2MWY2OGM3MWRlMDU2NWM3MzJlNzZmNGZhZGY6OjUwMjcxYTNhLWFkYmUtNDIzMC1iZDBjLTEyY2FiZjY2ZWY1ZTo6JGFhY2hfNjU0OTJhODEtY2FlOC00ZTMzLTkwZDMtOWI2YjJmYzViNWJj";

$payload = [
    "billingType" => "PIX",
    "name" => "Ebook R$ 2,00",
    "value" => 2.00,
    "dueDate" => date("Y-m-d", strtotime("+1 day")),
    "externalReference" => uniqid(),
    "notificationUrl" => "https://SEUSITE/webhook.php"
];

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://www.asaas.com/api/v3/payments",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => http_build_query($payload),
    CURLOPT_HTTPHEADER => [
        "access_token: $apiKey",
        "Content-Type: application/x-www-form-urlencoded"
    ]
]);

$response = curl_exec($curl);
curl_close($curl);

$data = json_decode($response, true);

// Exibir QR Code (imagem) e copia e cola
echo "<h2>Pagamento via Pix</h2>";
echo "<p>Escaneie o QR Code abaixo:</p>";
echo "<img src='" . $data['pixQrCodeImage'] . "' width='250'>";

echo "<p>Código copia e cola:</p>";
echo "<textarea style='width:100%;height:100px;'>" . $data['pixQrCode'] . "</textarea>";

echo "<p>Após pagamento, o download será liberado automaticamente.</p>";
?>
