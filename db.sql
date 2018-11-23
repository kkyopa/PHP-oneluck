#データベース作成のコマンド
CREATE DATABASE SAMPLE CHARACTER SET UTF-8;


#デーブル作成時のコマンド
CREATE TABLE lucks(
    id int(11)  AUTO_INCREMENT,
    content varchar(255),
    PRIMARY KEY (id)
);
