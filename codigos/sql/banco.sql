drop database if exists redesocial;

create database redesocial;

use redesocial;

create table usuarios (
    id int primary key auto_increment,
    email varchar(255),
    senha varchar(255),
    nome varchar(255),
	ultimoAcesso datetime,
    datcad datetime,
    datalt datetime
);

insert into usuarios(id, email, senha, nome, datcad)
	values (1, 'douglasjam@gmail.com','123456', 'Douglas José', curdate()),
		    (2, 'stevejobs@apple.com','jobs', 'Steve Jobs', curdate()),
		    (3, 'larrypage@google.com','lpgoogle', 'Master Larry Page', curdate()),
		    (4, 'bill@microsoft.com','windowssux', 'Will G.', curdate());
		    

create table mensagens (
    id int primary key auto_increment,
    usuario_id_rem int references usuarios(id),
    usuario_id_dest int references usuarios(id),
    mensagem text,
    datcad datetime
);

insert into mensagens(usuario_id_rem, usuario_id_dest, mensagem)
values (1,2,'Fiquei sabendo que vão lançar o Iphone 5 agora é verdade?'),
	    (2,1,'Ainda não, vai ficar mais para o fim do ano.'),
	    (3,1,'Quero te contratar, pode passar no meu escritório amanhã?'),
	    (4,2,'Seu sistema é um $*&!$@'),
	    (2,4,'Que bom...');

/* Se der fazer

create table album (
    id int primary key auto_increment,
	 usuario_id int references usuario(id),
	 foto_capa int references fotos(id),
	 datcad datetime,
	 datalt datetime
)

create table fotos (
    id int primary key auto_increment,
    album_id int references album(id),
    foto_path varchar(255),
    datcad datetime,
    datalt datetime
)
*/