<?php
header('Content-Type: application/json');

// Leer el archivo entries.json
$entriesFile = 'entries.json';
$entries = file_exists($entriesFile) ? json_decode(file_get_contents($entriesFile), true) : [];

// Obtener la nueva entrada desde la solicitud
$input = file_get_contents('php://input');
$newEntry = json_decode($input, true);

// Añadir la nueva entrada al inicio del array
array_unshift($entries, $newEntry);

// Guardar las entradas actualizadas en entries.json
file_put_contents($entriesFile, json_encode($entries, JSON_PRETTY_PRINT));

echo json_encode(['success' => true]);
?>