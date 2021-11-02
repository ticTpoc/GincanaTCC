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

create table apostas(
ida int(5) not null primary key auto_increment,
valor int(5) not null,
usuario1 int(5) not null,
usuario2 int(5) not null,
impopar char(5) not null,
dia date not null,
confirmacao bool,
ativa bool,
vencedor int(5),
foreign key(usuario1) references usuarios(rm),
foreign key(usuario2) references usuarios(rm)

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table notificacoes(
idn int(8) not null primary key auto_increment,
texto text,
assunto varchar(30) not null,
usuarios_rm int(5) not null,
foreign key(usuarios_rm) references usuarios(rm)

)ENGINE=InnoDB DEFAULT CHARSET=utf8;


create table itens(
id Int not null auto_increment primary key,
nome varchar(30) not null,
img varchar(30) not null,
preco int(4) not null,
funcao text,
tipo char(5) not null,
jogo varchar(20) not null,
valor int(3)
 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/* drop table compras; */ 
create table compras(
itens_id int(5) not null,
usuarios_rm int(6) not null,

foreign key(itens_id) references itens(id),

foreign key(usuarios_rm) references usuarios(rm)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* quiz */
create table quiz(

question text not null,
R1 text not null,
R2 text not null,
R3 text not null,
RC text not null,
RN text,
idq int(4) not null auto_increment primary key


) ENGINE=innoDB DEFAULT CHARSET=utf8;

insert into itens(nome,img,preco,jogo,tipo,valor,funcao) values
('corzinha1','azul.jpg','420','memoria','skin','1','muda a cor?'),
('monstro?','armadura.png','69','dungeon','item','2',' é um monstro?'),
('espadinha1','camisa.png','666','dungeon','item','3','nate nos bicho?'),
('espadinha2','armadura.png','666','dungeon','item','3','nate nos bicho?'),
('espadinha3','chave.png','666','dungeon','item','3','nate nos bicho?'),
('espadinha4','cartola.png','666','dungeon','item','3','nate nos bicho?'),
('espadinha5','João_Paulo.jpg','666','dungeon','item','3','nate nos bicho?'),
('espadinha6','azul.jpg','666','dungeon','item','3','nate nos bicho?'),
('escudinho7','cartola.png','66','dungeon','item','1','defende ?'),
('bolinha','armadura.png','4','pong','skin','1','é bola'),
('fundo dahora','João_Paulo.jpg','1','pong','skin','60','muda a corzinha do fundo?'),
('Pergunta nem tem como','camisa.png','60','quiz','item','1',' a porra de uma pergunta? nem da pra fazer isso mano kakaka'),
('cor do botão wtf','coina.png','930','quiz','skin','1','change the button color?'),
('kakaka','azul.jpg','314','memoria','item','4','não?'),
('lacoste','cartola.png','430','cassino','skin','1','crocodilo jacaré maneiro na parada?'),
('espadinha0','chave.png','300','pong','skin','6','espadinha? no pong?');


insert into quiz(question,R1,R2,R3,RC,RN) values
('Oque Pesa mais? 100kg de Ferro ou 100kg de Algodão? ','100kg de Algodão', '100kg de Ferro','Não Sei Não :/','Ambos Tem o Mesmo Peso','Nenhuma Das Questões Anteriores');






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
('3441','William','0','9999','$2y$10$wpiB/CCICaVb8jD5yFK0oeWxN7umIxAQc8/9oPFzsGciRTOyeBuUu','admin','ativo',1,1,5),
('1','teste','0','9999','$2y$10$wpiB/CCICaVb8jD5yFK0oeWxN7umIxAQc8/9oPFzsGciRTOyeBuUu','admin','ativo',1,1,5),
('2','teste','0','9999','$2y$10$wpiB/CCICaVb8jD5yFK0oeWxN7umIxAQc8/9oPFzsGciRTOyeBuUu','admin','ativo',1,1,5);
/*

)
*/




/*

select * from quiz;
select * from usuarios;
select * from itens;
select * from compras;
select * from salas;
select * from itens;
select * from inimigos;
select * from apostas;
select * from notificacoes;
select * from usuarios order by estado;

update apostas
  set confirmacao=true
  where ida=1;

select produtos.cod, skins.id, skins.nome, skins.img, skins.preco  from skins join produtos where skins.id=produtos.skin_id;

// selecionar duas foreign key com uma só chave primária

SELECT b.ida,a.usuario,c.usuario,b.valor from apostas b JOIN usuarios a ON b.usuario1=a.rm JOIN usuarios c ON b.usuario2=c.rm;


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
