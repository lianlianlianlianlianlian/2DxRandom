<?php
// 读取 random.txt 文件中的 URL
$url_file = 'Output/avatar.txt';
$urls = file($url_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// 如果 URL 数组不为空，则随机选择一个 URL 进行跳转
if (!empty($urls)) {
    $random_url = $urls[array_rand($urls)];
    header('Location: ' . $random_url);
    exit;
} else {
    // 如果 URL 数组为空，则输出错误信息
    echo 'No URLs found in ' . $url_file;
}
?>
