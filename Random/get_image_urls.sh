#!/bin/bash

output_file="output.txt"
base_url="https://gitee.com/Darklotus/2dxrandom/raw/master/random/"

# 清空输出文件
> "$output_file"

# 遍历当前文件夹中的图片文件
for file in *.webp; do
    # 构建完整的 URL
    url="${base_url}${file}"
    # 将 URL 写入输出文件
    echo "$url" >> "$output_file"
done

echo "文件名已经成功输出到 $output_file 文件中。"
