<?php
function sanitize($data) {
    return htmlspecialchars(trim($data));
}

function tampilkanBiodata($fieldConfig, $biodata) {
    if (empty($biodata)) {
        return "<p>Belum ada biodata tersimpan.</p>";
    }
    $output = "<ul>";
    foreach ($fieldConfig as $key => $config) {
        $value = $biodata[$key] ?? '';
        $output .= "<li><strong>{$config['label']}</strong> {$value}{$config['suffix']}</li>";
    }
    $output .= "</ul>";
    return $output;
}
?>