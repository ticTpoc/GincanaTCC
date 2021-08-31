CREATE DATABASE GB DEFAULT CHARACTER SET UTF8 COLLATE UTF8_GENERAL_CI;
USE GB;

/* o comando sagrado: DROP DATABASE GB; *//* o comando sagrado: DROP DATABASE GB; */


create table inimigos(
mob varchar(10) not null primary key,
mincoin int not null,
maxcoin int not null,
chance int not null,
dano int not null
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table salas(
id int(2) not null primary key auto_increment,
apelido varchar(8),
cor varchar(20) not null,
corhex char(7) not null,
corrgb char(17) not null,
nome varchar(30) not null
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table usuarios(
usuario varchar(20) not null,
rm int(5) not null primary key,
senha Varchar(70) not null,
highscore int(10),
tipo char(10) not null,
estado char(10),
coin int(5) not null,
salas_id int(2) not null,
vida int(3) not null,
nivel int(3) not null,
foreign key(salas_id) references salas(id)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table skins(
nome varchar(30) not null,
preco int(4) not null,
img varchar(30) not null,
id Int(5) not null auto_increment primary key,
jogo varchar(20),
modelo char(10),
qtd int(3),
funcao text,
valor int(3)
 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/* drop table compras; */ 
create table compras(
skins_id int(5) not null,
usuarios_rm int(6) not null,

foreign key(skins_id) references skins(id),

foreign key(usuarios_rm) references usuarios(rm)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* quiz */
create table quiz(
question text(200) not null,
R1 text (200) not null,
R2 text(200) not null,
R3 text(200) not null,
RC text(200) not null,
RN text (20),
idq int(20) not null auto_increment primary key

) ENGINE=innoDB DEFAULT CHARSET=utf8;




insert into quiz(question,R1,R2,R3,RC,RN) values
('Oque Pesa mais? 100kg de Ferro ou 100kg de Algodão? ','100kg de Algodão', '100kg de Ferro','Não Sei Não :/','Ambos Tem o Mesmo Peso','Nenhuma Das Questões Anteriores');



insert into skins(id,jogo, nome, preco, img, funcao,valor, qtd,modelo) values
(1,'dungeon','chave','100','chave.png','aumenta seu nivel na dungeon',1,0,'item'),
(2,'dungeon','armadura','50','armadura.png','aumenta sua vida na dungeon',1,0,'item');



 insert into salas(nome,apelido, corhex, cor, corrgb) values
('informática para internet','Infonet', '#00BFFF', 'azul', 'rgb(0,191,255)'),
('Mecatrônica','Meca', '#00BFFF', 'azul', 'rgb(0,191,255)'),
('Administração','Adm', '#00BFFF', 'azul', 'rgb(0,191,255)'),
('Desenvolvimento de sistemas','Ds', '#00BFFF', 'azul', 'rgb(0,191,255)');




insert into inimigos(mob, mincoin, maxcoin,dano, chance) values
('goblin', 3, 6, 1, 30),
('anao', 1, 7, 1, 20),
('dragao', 10, 30, 2, 70),
('elfo', 5, 10, 1, 40),
('marcella', 1, 2, 5, 88),
('ogro', 3, 40, 1, 50),
('orc', 30, 50, 2, 50),
('poseidon', 100, 150, 3, 90),
('unicornio',0,500,5,77);

insert into usuarios(rm,usuario,highscore,coin,senha,tipo,estado, salas_id, nivel,vida) values
('3441','William','0','9999','$2y$10$wpiB/CCICaVb8jD5yFK0oeWxN7umIxAQc8/9oPFzsGciRTOyeBuUu','admin','ativo',1,1,5);


 select * from quiz;
 select * from usuarios;
 
  show databases;

/*


select * from usuarios;
select * from skins;
select * from compras;
select * from salas;
select * from itens;

select * from inimigos;

select * from usuarios order by estado;


select produtos.cod, skins.id, skins.nome, skins.img, skins.preco  from skins join produtos where skins.id=produtos.skin_id;

select skins.img, skins.nome, skins.id, compras.skins_id from skins join compras where compras.skins_id=skins.id;
select usuarios.rm, usuarios.usuario, compras.usuarios_rm from usuarios join compras on compras.usuarios_rm=usuarios.rm where usuarios.rm=1;

select c.usuarios_rm, sk.nome, c.skins_id, sk.img from skins sk join compras c on c.skins_id=sk.id 
 join usuarios u on c.usuarios_rm=1; LIXO
 
 select skins.id, skins.nome, skins.img,compras.usuarios_rm, usuarios.rm, usuarios.usuario from skins join compras on skins.id=compras.skins_id
 join usuarios on usuarios.rm=compras.usuarios_rm where usuarios.rm=3441; LIXO

select skins.id, skins.nome, skins.img,compras.usuarios_rm, usuarios.rm, usuarios.usuario from skins join compras on skins.id=compras.skins_id
 join usuarios on usuarios.rm=compras.usuarios_rm;

select skins.img,usuarios_rm,skins_id from compras join skins where 3441=usuarios_rm; LIXO


describe usuarios;
describe skins;
describe compras;

delete from usuarios where rm=666;
*/
