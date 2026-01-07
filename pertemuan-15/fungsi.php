<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

function sanitize(string $v): string {
  return trim($v);
}

function flash(string $key, $val): void {
  $_SESSION[$key] = $val;
}

function take(string $key) {
  if (!empty($_SESSION[$key])) {
    $v = $_SESSION[$key];
    unset($_SESSION[$key]);
    return $v;
  }
  return null;
}

function tampilkanBiodata(array $config, array $data): string {
  if (empty($data)) return '<p>Belum ada biodata disimpan.</p>';
  $html = '<ul>';
  foreach ($config as $key => $info) {
    $label = $info['label'] ?? ucfirst($key);
    $suffix = $info['suffix'] ?? '';
    $value = htmlspecialchars($data[$key] ?? '-');
    $html .= "<li><strong>{$label}</strong> {$value}{$suffix}</li>";
  }
  $html .= '</ul>';
  return $html;
}