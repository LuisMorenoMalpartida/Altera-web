<?php
// api/alana-chat.php
header('Content-Type: application/json');

// Cargar flujo
$flowFile = __DIR__ . '/../data/alana-flow.json';
if (!file_exists($flowFile)) {
    echo json_encode(['error' => 'Flow file not found']);
    exit;
}

$flowData = json_decode(file_get_contents($flowFile), true);
$input = json_decode(file_get_contents('php://input'), true);

// Determinar el nodo actual
$currentNodeId = $input['next_node'] ?? $flowData['start_node']; // Por defecto 'intro'

// Validar que el nodo exista
if (!isset($flowData['nodes'][$currentNodeId])) {
    $currentNodeId = $flowData['start_node'];
}

$node = $flowData['nodes'][$currentNodeId];

// Respuesta
echo json_encode([
    'text' => $node['text'],
    'options' => $node['options'] ?? []
]);

