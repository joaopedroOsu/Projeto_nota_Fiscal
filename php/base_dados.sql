create database db_notas;
use db_notas;

CREATE TABLE TB_USUARIO (
ID_USUARIO INT PRIMARY KEY,
NM_USUARIO VARCHAR(50),
EMAIL VArchar(60),
senha text
);
create table tb_cliente (
    nr_cnpj char(14) primary key,
    nm_razao_social varchar(30),
    nm_pais varchar(20),
    nm_email varchar(40)
);


create table tb_nota (
    cd_nota int primary key auto_increment,
    dt_emissao date,
    dt_envio date,
    vl_total decimal(6,2),
    fk_nr_cnpj char(14),

    foreign key (fk_nr_cnpj)
        references tb_cliente(nr_cnpj)
);

-- tabela de produtos
create table tb_produto (
    cd_produto int primary key auto_increment,
    nm_produto varchar(25),
    vl_unitario decimal(5,2)
);


create table tb_produto_has_tb_nota (
    cd_item int primary key auto_increment,
    fk_cd_produto int,
    fk_cd_nota int,
    qt_produto int,
    vl_total_item decimal(5,2),

    foreign key (fk_cd_produto)
        references tb_produto(cd_produto),

    foreign key (fk_cd_nota)
        references tb_nota(cd_nota)
);
