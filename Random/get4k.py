import os
from PIL import Image
import shutil

def is_4k_or_higher(image_path):
    try:
        with Image.open(image_path) as img:
            width, height = img.size
            # 4K resolution is 3840x2160
            return width >= 3840 and height >= 2160
    except Exception as e:
        print(f"Error processing file {image_path}: {e}")
        return False

def find_and_copy_4k_images(directory='.'):
    image_extensions = {'.png', '.jpg', '.jpeg', '.tiff', '.bmp', '.gif', '.webp'}
    output_dir = os.path.join(directory, '4k')

    # 创建4k文件夹，如果它还不存在
    if not os.path.exists(output_dir):
        os.makedirs(output_dir)

    for filename in os.listdir(directory):
        if os.path.isfile(os.path.join(directory, filename)):
            file_ext = os.path.splitext(filename)[1].lower()
            if file_ext in image_extensions:
                file_path = os.path.join(directory, filename)
                if is_4k_or_higher(file_path):
                    # 复制文件到4k文件夹
                    shutil.copy(file_path, output_dir)
                    print(f"Copied: {filename} to {output_dir}")

if __name__ == '__main__':
    directory = '.'  # 可以修改为你想要检查的目录路径
    find_and_copy_4k_images(directory)
    print("Operation completed.")
