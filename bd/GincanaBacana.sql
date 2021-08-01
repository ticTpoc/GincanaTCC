CREATE DATABASE GB DEFAULT CHARACTER SET UTF8 COLLATE UTF8_GENERAL_CI;
USE GB;

/* o comando sagrado: DROP DATABASE GB; *//* o comando sagrado: DROP DATABASE GB; */

create table usuarios(
usuario varchar(20) not null,
rm Int(5) not null primary key,
senha Varchar(70) not null,
highscore int(10),
tipo char(10) not null,
coin int(5)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

Create table skins(
nome varchar(30) not null,
preco int(4) not null,
img varchar(30) not null,
id Int(5) not null auto_increment primary key
 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table produtos(
cod int(10) not null primary key auto_increment,
skin_id int(5) not null,
foreign key(skin_id) references skins(id) 

) ENGINE=InnoDB DEFAULT CHARSET=utf8;


create table compras(
produtos_cod int(10) not null,
usuarios_rm int(6) not null,
foreign key(produtos_cod) references produtos(cod),
foreign key(usuarios_rm) references usuarios(rm)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into usuarios(rm,usuario,highscore,coin,senha,tipo) values
('3441','William','0','99','$2y$10$wpiB/CCICaVb8jD5yFK0oeWxN7umIxAQc8/9oPFzsGciRTOyeBuUu','admin');



/*

select * from usuarios;
select * from skins;
select * from produtos;

select produtos.cod, skins.id, skins.nome, skins.img, skins.preco  from skins join produtos where skins.id=produtos.skin_id;

describe usuarios;

delete from usuarios where rm=666;
*/
