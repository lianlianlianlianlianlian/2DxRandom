<?php
// 设置时区为上海
date_default_timezone_set('Asia/Shanghai');
// 设置缓存有效期为一天
$expires = 60 * 60 * 24; // 1 day
header('Cache-Control: max-age=' . $expires);

// 获取当前日期
$currentDate = date('Y-m-d');

// 检查是否需要更新图片
if ($lastUpdated != $currentDate) {
    // 读取 random.txt 文件中的 URL 列表
    $urls = file('output/random.txt', FILE_IGNORE_NEW_LINES);

    // 获取当前跳转的 URL
    $currentUrl = $urls[0];

    // 更新图片操作...

    // 将当前日期和URL写入url/day_last_updated.txt文件
    file_put_contents('url/day_last_updated.txt', $currentDate . ' ' . $currentUrl);

    // 跳转到当前 URL
    header('Location: ' . $currentUrl);
    exit();
} else {
    // 使用上次跳转的 URL 进行操作...
    // 读取url/day_last_updated.txt文件
    $lastUpdatedData = file_get_contents('url/day_last_updated.txt');
    // 分割日期和URL
    list($lastUpdatedDate, $lastUrl) = explode(' ', $lastUpdatedData);
    // 跳转到上次 URL
    header('Location: ' . $lastUrl);
    exit();
}
?>
