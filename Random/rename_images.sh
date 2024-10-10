#!/bin/bash

# 初始化计数器
counter=1

# 创建一个临时目录存放重命名的文件
mkdir -p temp_rename_dir

# 查找当前目录下的所有图片文件，并按数字顺序排序
find . -maxdepth 1 -type f \( -iname "*.jpg" -o -iname "*.png" -o -iname "*.webp" \) | sort -V | while read file; do
  # 获取文件的扩展名
  extension="${file##*.}"
  
  # 构建新的文件名，格式为数字序号加原始扩展名
  newname="temp_rename_dir/${counter}.${extension}"
  
  # 打印将要执行的操作
  echo "Moving '$file' to '$newname'"
  
  # 重命名文件
  mv -- "$file" "$newname"
  
  # 计数器增加
  ((counter++))
done

# 将重命名后的文件移回原目录
mv temp_rename_dir/* .
rmdir temp_rename_dir

echo "重命名完成。"
