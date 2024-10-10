import os
import random
import string

def generate_random_name(length=3):
    # 生成指定长度的随机字符串，由数字和字母组成
    chars = string.ascii_letters + string.digits  # 包含大小写字母和数字
    return ''.join(random.choice(chars) for _ in range(length))

def rename_files_in_directory(directory='.'):
    for filename in os.listdir(directory):
        # 获取文件的完整路径
        file_path = os.path.join(directory, filename)
        
        # 如果是文件而不是文件夹
        if os.path.isfile(file_path):
            # 获取文件扩展名
            file_ext = os.path.splitext(filename)[1]
            
            # 生成新的文件名
            new_name = generate_random_name() + file_ext
            
            # 确保新名字在当前目录中是唯一的
            while os.path.exists(os.path.join(directory, new_name)):
                new_name = generate_random_name() + file_ext
            
            # 生成新的文件路径
            new_file_path = os.path.join(directory, new_name)
            
            # 重命名文件
            os.rename(file_path, new_file_path)
            print(f'Renamed: {filename} -> {new_name}')

if __name__ == '__main__':
    rename_files_in_directory()
