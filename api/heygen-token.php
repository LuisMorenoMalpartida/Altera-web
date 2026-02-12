<?php
// api/heygen-token.php
// Este archivo debe estar en tu servidor y NO debe ser público el código fuente.
// Aquí generas el Access Token usando tu API Key de HeyGen.

header('Content-Type: application/json');

// Reemplaza esto con tu API Key real de HeyGen
$apiKey = 'TU_HEYGEN_API_KEY'; 

if ($apiKey === 'TU_HEYGEN_API_KEY') {
    http_response_code(500);
    echo json_encode(['error' => 'API Key no configurada en api/heygen-token.php']);
    exit;
}

// URL de la API de HeyGen para obtener token
$url = 'https://api.heygen.com/v1/streaming.create_token';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'x-api-key: ' . $apiKey,
    'Content-Type: application/json'
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode !== 200) {
    http_response_code(500);
    echo json_encode(['error' => 'Error al obtener token de HeyGen', 'details' => $response]);
    exit;
}

echo $response;
