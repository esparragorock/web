<?php
header('Content-Type: application/json');

// Leer el archivo entries.json
$entriesFile = 'entries.json';
$entries = file_exists($entriesFile) ? json_decode(file_get_contents($entriesFile), true) : [];

// Obtener el índice de la entrada a eliminar
$input = file_get_contents('php://input');
$data = json_decode($input, true);
$index = $data['index'];

// Eliminar la entrada
if (isset($entries[$index])) {
    array_splice($entries, $index, 1);
    file_put_contents($entriesFile, json_encode($entries, JSON_PRETTY_PRINT));
    echo json_encode(['success' => true]);
} else {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Índice no válido']);
}
?>