# 2DXRANDOM

## 介绍

这是一个由PHP构建的随机图框架。
网上看到很多大佬都有属于自己的每日一图，随机图API，但是他们没有开源，我在GIthub上也没有找到令我满意的开源项目，所以自己利用GPT4，一起写了一个，现已在Github和Gitee开源。

项目已完成：

1. 调用本地目录的图片
2. 调用外部URL的图片

## 展示图

<img width="1870" alt="image" src="https://github.com/lianlianlianlianlianlian/2DxRandom/assets/36120596/8f6385f7-9846-445a-9340-0085970805c1">


## 架构

1. HTML 
2. PHP

## 使用说明

1. 
2.  
3.  
4.  
5.  
6. 

## Nginx伪静态

这样设置可以让URL后面不用带“.php” 即可调用。

```
location /random {
    rewrite ^/random/$ /random.php last;
    rewrite ^/random$ /random.php last;
}

location /day {
    rewrite ^/day/$ /day.php last;
    rewrite ^/day$ /day.php last;
}

location /url_day {
    rewrite ^/url_day/$ /url_day.php last;
    rewrite ^/url_day$ /url_day.php last;
}

location /url_random {
    rewrite ^/url_random/$ /url_random.php last;
    rewrite ^/url_random$ /url_random.php last;
}

location /gif {
    rewrite ^/gif/$ /gif.php last;
    rewrite ^/gif$ /gif.php last;
}

location /mobile {
    rewrite ^/mobile/$ /mobile.php last;
    rewrite ^/mobile$ /mobile.php last;
}

location /4k {
    rewrite ^/4k/$ /4k.php last;
    rewrite ^/4k$ /4k.php last;
}
```

