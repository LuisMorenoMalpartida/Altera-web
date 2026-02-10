<?php

declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');

$itemsPath = __DIR__ . '/../data/items.json';

if (!is_file($itemsPath)) {
  http_response_code(500);
  echo json_encode(['error' => 'No existe data/items.json'], JSON_UNESCAPED_UNICODE);
  exit;
}

$json = file_get_contents($itemsPath);
if ($json === false) {
  http_response_code(500);
  echo json_encode(['error' => 'No se pudo leer data/items.json'], JSON_UNESCAPED_UNICODE);
  exit;
}

$data = json_decode($json, true);
if (!is_array($data)) {
  http_response_code(500);
  echo json_encode(['error' => 'JSON inválido en data/items.json'], JSON_UNESCAPED_UNICODE);
  exit;
}

echo json_encode($data, JSON_UNESCAPED_UNICODE);
