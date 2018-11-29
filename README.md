# PHP-oneluck

このソフトはrubyで作成したone_luckをPHPで実装する為に勉強用として作成します。
# バージョン
PHP7

# 前提
- vagrant
- virtualbox

# Setup
```
vagrant up
vagrant ssh

sudo apt-get update
sudo apt-get install nginx php-fpm
sudo apt-get install mysql-server mysql-client
sudo apt-get install php-mysql php-mbstring
```

# DB準備
- config.php.default を config.php にコピーして、パスワードは手元のmysqlの物に書き換える
```
cp config.php.default config.php
```



# Authors
川田京助。
