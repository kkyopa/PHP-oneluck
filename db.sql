#データベース作成のコマンド
CREATE DATABASE one_luck DEFAULT CHARACTER SET UTF8;

use one_luck;
#デーブル作成時のコマンド
CREATE TABLE lucks(
    id int(11)  AUTO_INCREMENT,
    content varchar(255),
    attach_filename varchar(255),
    PRIMARY KEY (id)
);
