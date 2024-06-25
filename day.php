<?php
// 设置时区为上海
date_default_timezone_set('Asia/Shanghai');
// 设置缓存有效期为一天
$expires = 60 * 60 * 24; // 1 day
header('Cache-Control: max-age=' . $expires);
// 读取 random_last_updated.txt 文件中的数据
$data = file_get_contents('random_last_updated.txt');

if ($data) {
    // 按换行符分割数据
    $dataArray = explode("\n", $data);

    // 获取日期和图片路径
    $lastUpdated = $dataArray[0];
    $lastImgPath = $dataArray[1];
} else {
    // 如果文件为空，则设置默认值
    $lastUpdated = '';
    $lastImgPath = '';
}

// 获取当前日期
$currentDate = date('Y-m-d');

// 检查是否需要更新图片
if ($lastUpdated != $currentDate || !file_exists($lastImgPath)) {
    // 获取符合条件的图片列表
    $img_list = glob('random/*.{gif,jpg,png,webp}', GLOB_BRACE);

    if (!empty($img_list)) {
        // 随机选择一张图片
        $img_url = $img_list[array_rand($img_list)];

        // 更新图片路径
        $lastImgPath = $img_url;

        // 将当前日期和图片路径写入 last_updated.txt 文件
        $data = $currentDate . "\n" . $img_url;
        file_put_contents('output/random_last_updated.txt', $data);
    } else {
        echo 'No images found in the random folder';
        exit();
    }
}

// 跳转到图片URL
header('Location: ' . $lastImgPath);
exit;
?>
