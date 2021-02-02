create database VirtualCloset;

use VirtualCloset;

create table usuario(
nome  varchar (40) not null,
genero  char (1) not null,
biografia  varchar (100),
email  varchar (100) not null,
senha  varchar (10) not null,
historicoatividade  varchar (1000),
nomeusuario  varchar (40) not null,
primary key (nome),
foreign key (nomeusuario) references usuario (nome));

create table topicodediscussao(
nomeusuario  varchar (40) not null,
codigo  integer not null,
titulo  varchar (100) not null,
tema  varchar (20) not null,
conteudo  varchar (1000) not null,
respostas  varchar (1000),
datapublicacao  date not null,
autor  varchar (40) not null,
quantidadedenuncias  integer,
primary key (codigo),
foreign key (nomeusuario) references usuario (nome));

create table material(
nomeusuario  varchar (40) not null,
titulo  varchar (100) not null,
tema  varchar (20) not null,
genero  char (1) not null,
conteudo  varchar (1000) not null,
datapublicacao  date not null,
quantidadedenuncias  integer,
primary key (titulo),
foreign key (nomeusuario) references usuario (nome));

create table denúnciadenuncia(
nomeusuario  varchar (40) not null,
justificativa  varchar (1000),
datapublicacao  date not null,
horapublicacao  time not null,
foreign key (nomeusuario) references usuario (nome));

create table comentacomentario(
nomeusuario  varchar (40) not null,
conteúdo  varchar (1000),
autor  varchar (40) not null,
datapublicacao  date not null,
horapublicacao  time not null,
quantidadedenuncias  integer,
codigo  integer not null,
foreign key (nomeusuario) references usuario (nome));

	

