# Directory Lister~

### 下载安装：

下载后，解压并上传到已经搭建好 PHP环境 的服务器中，然后就可以上传文件和创建文件夹了！

- Github打包：https://github.com/HeroSixo4/DirectoryLister/master.zip
- git clone https://github.com/HeroSixo4/DirectoryLister.git
#### 文件结构
`/home/wwwroot/xxx.xx`
``` bash
/home/wwwroot/xxx.xx/
├─ resources/
│   ├ themes/
│   │ └ bootstrap/
│   │    ├ css/
│   │    ├ fonts/
│   │    ├ img/
│   │    ├ js/
│   │    ├ default_footer.php # 底部公共文件 #
│   │    ├ default_header.php # 顶部公共文件 #
│   │    └ index.php # 网页主文件，其中可修改顶部公告栏内容 #
│   │
│   ├ DirectoryLister.php
│   ├ config.php
│   └ fileTypes.php
│
├ README.html # 该文件夹页面内的 说明简介文件 #
├ index.php
│
├─ 其他文件夹/
│   ├ 其他文件.txt
│   └ README.html # 该文件夹页面内的 说明简介文件 #
│
└ 其他文件.txt
```

#### 不显示文件和目录

如果安装 lnmp一键包上传Directory Lister后，Directory Lister不显示文件和目录，那么可能是 PHP函数` scandir `被禁用了，取消禁用即可。
``` bash
sed -i 's/,scandir//g' /usr/local/php/etc/php.ini
# 取消scandir函数禁用
/etc/init.d/php-fpm restart
# 重启 PHP生效
```
#### 程序放在网站子目录不显示 README.html

假设你将程序放在了子目录 `zimulu` 中（也就是 `http://xxx.xx/zimulu` 才能访问到程序网页）。

首先打开该文件： `/resources/themes/bootstrap/index.php`  

找到第5行的： `$suffix_array = explode('.', $_SERVER['HTTP_HOST']);`  

将其修改为： `$suffix_array = explode('.', $_SERVER['HTTP_HOST']."/zimulu");`

#### 简介功能说明

可以在每个文件夹下面放一个 `README.html` 文件，这个文件里写着 简介说明内容即可，格式参考自带的示例文件。

为了避免中文乱码，把 `README.html` 文件用 UTF-8无BOM编码 保存！

#### 文件修改说明

修改头部导航标题，搜索 `Pocket` 替换。  
`/resources/DirectoryLister.php `

修改网站标签栏的标题， 将`<title>` 标签中的` Pocket `替换。  
`/resources/themes/bootstrap/index.php `

修改网站顶部公告栏内容，搜索 `Top bulletin board`替换。  
`/resources/themes/bootstrap/index.php `

网站头部公共文件：  
`/resources/themes/bootstrap/default_header.php `

网站底部公共文件：  
`/resources/themes/bootstrap/default_footer.php `

如果想要插入流量统计代码，那只需要把代码写到 `default_header.php` 文件内即可。


基于 Directory Lister 原版：http://www.directorylister.com/
