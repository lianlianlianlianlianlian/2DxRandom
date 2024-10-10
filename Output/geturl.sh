#!/bin/bash

base_url="https://gitee.com/Darklotus/img/raw/master/Avatar/"  # 网址前缀
directory="/www/wwwroot/gitee/img/Avatar"  # random 路径
output_file="/www/wwwroot/gitee/img/Avatar.txt"  # 输出文件名

# 遍历目录下的文件
for file in "$directory"/*; do
    if [ -f "$file" ]; then  # 只处理文件，不处理目录
        filename=$(basename "$file")  # 获取文件名
        url="$base_url$filename"  # 构建完整的 URL
        echo "$url" >> "$output_file"  # 输出 URL到文件
    fi
done