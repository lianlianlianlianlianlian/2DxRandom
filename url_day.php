<?php
// 读取 last_updated.txt 文件中的数据
$data = file_get_contents('last_updated.txt');

if ($data) {
    // 按换行符分割数据
    $dataArray = explode("\n", $data);

    // 获取日期和 URL
    $lastUpdated = $dataArray[0];
    $lastUrl = $dataArray[1];
} else {
    // 如果文件为空，则设置默认值
    $lastUpdated = '';
    $lastUrl = '';
}

// 获取当前日期
$currentDate = date('Y-m-d');

// 检查是否需要更新图片
if ($lastUpdated != $currentDate) {
    // 读取 random.txt 文件中的 URL 列表
    $urls = file('output/random.txt', FILE_IGNORE_NEW_LINES);

    // 获取当前跳转的 URL
    $currentUrl = $urls[0];

    // 更新图片操作...

    // 将当前日期和跳转的 URL 写入 last_updated.txt 文件
    $data = $currentDate . "\n" . $currentUrl;
    file_put_contents('last_updated.txt', $data);

    // 跳转到当前 URL
    header('Location: ' . $currentUrl);
    exit();
} else {
    // 使用上次跳转的 URL 进行操作...
    // 跳转到上次 URL
    header('Location: ' . $lastUrl);
    exit();
}
?>
