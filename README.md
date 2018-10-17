# 运行步骤

1、下载代码到本地。在可运行的PHP的执行环境，如xampp的htdocs、或phpstudy的WWW、或Apache的执行目录下执行：
git clone https://github.com/lt0108/laravel-demo-blog.git

2、安装依赖：
前提是已安装composer（点击下载 Composer-Setup.exe），安装后，执行composer -V，显示版本信息表示安装成功。
进入到项目文件目录内，进行install安装，执行：
cd laravel-demo-blog
composer install

3、启动服务，访问：http://localhost/laravel-demo-blog/public

4、需要配置Apache的入口文件到：/项目/public，要不然访问地址需要带public。先这样能运行起来的。
