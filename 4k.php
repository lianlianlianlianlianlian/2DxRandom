<?php
// 指定图片目录的相对路径
$img_dir = '4K/';

// 获取符合条件的图片列表
$img_list = glob($img_dir . '*.{gif,jpg,png,webp}', GLOB_BRACE);

// 如果图片列表不为空，则随机选择一张图片
if (!empty($img_list)) {
    $img_url = $img_list[array_rand($img_list)];

    // 构建完整的图片URL，包括域名和协议
    $full_img_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . $img_url;

    // 如果 URL 中有 json 参数，则返回 JSON 数据
    if (isset($_GET['json'])) {
        // 获取图片的尺寸
        $img_size = getimagesize($img_url);
        $width = $img_size[0];
        $height = $img_size[1];

        // 返回 JSON 数据
        header('Content-Type: application/json');
        echo json_encode([
            "code" => 200,
            "url" => $full_img_url,
            "width" => $width,
            "height" => $height
        ]);
    } else {
        // 执行跳转至随机选中的图片URL
        header('Location: ' . $full_img_url);
    }
    exit;
} else {
    // 如果图片列表为空，则返回错误的JSON
    if (isset($_GET['json'])) {
        header('Content-Type: application/json');
        echo json_encode([
            "code" => 404,
            "message" => 'No images found in ' . $img_dir
        ]);
    } else {
        // 如果图片列表为空，则输出错误信息
        echo 'No images found in ' . $img_dir;
    }
}
?>
