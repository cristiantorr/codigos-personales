* Carpeta block con los bloques json
// Prueba para bloques acf con vista preview
$block_json = json_decode(file_get_contents(get_template_directory() . '/blocks/grid-galleries-lightbox/block.json'),
true);

acf_register_block_type(array_merge(
$block_json,
[
'render_template' => get_template_directory() . '/blocks/grid-galleries-lightbox/grid-galleries-lightbox.php',
'example' => [
'attributes' => [
'mode' => 'preview',
'data' => [
'preview_image' => get_template_directory_uri() . '/blocks/preview-images/grid-galleries-lightbox.png'
]
]
]
]
));






function marca_register_acf_blocks_with_preview() {
$blocks = [
'carpeta-block-one',
'carpeta-block-two',
'carpeta-block-three',
'carpeta-block-four',
'carpeta-block-five'
// Añade aquí los nombres de las carpetas de tus bloques ACF
];

foreach ($blocks as $block_name) {
$block_dir = get_template_directory() . "/blocks/{$block_name}";
$block_json_path = "{$block_dir}/block.json";
$template_path = "{$block_dir}/{$block_name}.php";
$preview_image_path = get_template_directory_uri() . "/blocks/preview-images/{$block_name}.png";

if (file_exists($block_json_path) && file_exists($template_path)) {
$block_json = json_decode(file_get_contents($block_json_path), true);

acf_register_block_type(array_merge(
$block_json,
[
'render_template' => $template_path,
'example' => [
'attributes' => [
'mode' => 'preview',
'data' => [
'preview_image' => $preview_image_path
]
]
]
]
));
}
}
}
add_action('acf/init', 'marca_register_acf_blocks_with_preview');


// Agregar en el redner php

if (isset($block['data']['preview_image'])) {
echo '<img src="' . esc_url($block['data']['preview_image']) . '" style="width:100%; height:auto;">';
return;
}