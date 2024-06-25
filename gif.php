<?php
// 指定图片目录的相对路径
$img_dir = 'gif/';

// 获取符合条件的图片列表
$img_list = glob($img_dir . '*.{gif,jpg,png,webp}', GLOB_BRACE);

// 如果图片列表不为空，则随机选择一张图片并输出
if (!empty($img_list)) {
    $img_url = $img_list[array_rand($img_list)];

    // 获取图片类型
    $img_info = getimagesize($img_url);
    if ($img_info !== false) {
        $img_mime = $img_info['mime'];
        header('Content-Type: ' . $img_mime); // 设置输出的内容类型为图片的 MIME 类型
        readfile($img_url);
        exit;
    } else {
        echo 'Failed to determine the image type.';
    }
} else {
    // 如果图片列表为空，则输出错误信息
    echo 'No images found in ' . $img_dir;
}
?>