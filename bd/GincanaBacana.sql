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

create table jogos(
idj int not null primary key auto_increment,
nome varchar(15) not null,
livro varchar(30),
tipo bool default 0,
manutencao bool default 0

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table itens(
id Int not null auto_increment primary key,
nome varchar(30) not null,
img varchar(30) not null,
preco int(4) not null,
funcao text,
tipo char(5) not null,
jogos_idj int not null,
valor int(3),
 foreign key(jogos_idj) references jogos(idj)
 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/* drop table compras; */ 
create table compras(
itens_id int(5) not null,
usuarios_rm int(6) not null,
dia date not null,

foreign key(itens_id) references itens(id),
foreign key(usuarios_rm) references usuarios(rm)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;



create table rankings(
idr int primary key not null auto_increment,
usuarios_rm int(6) not null,
jogos_idj int not null,
highscore int (3),
foreign key(jogos_idj) references jogos(idj),
foreign key(usuarios_rm) references usuarios(rm)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* quiz */
create table quiz(
idq int(4) not null auto_increment primary key,
question text not null,
R1 text not null,
R2 text not null,
R3 text not null,
RC text not null,
situacao bool not null default 0, 
aprovacao boolean not null,
pontos int(3) not null default 10,
erros int default 0,
acertos int default 0,
jogadas int as (COALESCE(acertos, 0) + COALESCE(erros, 0))

) ENGINE=innoDB DEFAULT CHARSET=utf8;

/*
ALTER TABLE quiz ADD COLUMN jogadas int AS (COALESCE(acertos, 0) + COALESCE(erros, 0));
select * from quiz;
*/



insert into jogos(nome,manutencao,tipo,livro) values
('quiz',0,1,'quizlivro'),
('dungeon',1,1,'dungeonlivro'),
('memoria',0,1,'memorialivro'),
('pong',0,1,'ponglivro'),
('insanidade',0,1,'insanidadelivro'),
('cassino',0,1,'cassinolivro'),
('campominado',0,1,'campominadolivro'),
('velha',0,1,'velhalivro');


insert into itens(nome,img,preco,jogos_idj,tipo,valor,funcao) values
('Adaga','adaga.png','20',2,'item','1','perfeita para degolar goblins'),
('Escudo de madeira','escudo1.png','50',2,'item','2','feito de madeira, eu acho'),
('Escudo ingl??s','escudo2.png','100',2,'item','3','utilizado por James o VI e I  da Inglaterra e esc??cia na batalha de Vivivuland'),
('Espada','espada.png','60',2,'item','2',' tudo que um her??i necessita'),
('Escuro','escuro.png','100',1,'skin','0',' tudo um pouco mais escuro'),
('Chave Fast-Ball','chave.png', '30', '4', 'item', '0', 'Dizem que libera uma velocidade al??m para a bola'),
('Chave Fast-Game','chave.png', '30', '4', 'item', '0', 'Dizem que libera um jogo veloz'),
('Chave Dupla','chavedupla.png', '100', '4', 'item', '0', 'Uma chave... ou seriam duas? Dizem que libera caos dobrado'),
('Rel??gio do caos', 'relogio.png', '300', '4', 'item', '0', 'Parece ter a foto de pai e filho... mas exala uma energia');


insert into quiz(question,R1,R2,R3,RC,aprovacao) values
('Quantas casas decimais tem o n??mero pi?',
'duas', 'centenas','nenhuma','infinitas', false),
(' Qual o n??mero minnimo de jogadores em uma partida de futebol?  ',
' 9 ', ' 11 ',' 5 ',' 7 ',false),
(' Em que per??odo pr??-hist??rico o fogo foi descoberto? ',
' neol??tico ', ' idade dos metais ',' era do fogo ',' paleol??tico ',false),
(' Quem ?? o autor de "O pr??ncipe"? ',
' Antoine de Saint-Exup??ry ', ' Montesquieu ',' Principe Charles ',' Maquiavel ',false),
(' Qual o maior osso humano? ',
' cora????o ', ' coluna ',' pele ',' f??mur ',false),
(' O que ?? Na na tabela peri??dica? ',
' l??tio ', ' chumbo ',' sal ',' s??dio ',false),
(' Qual a capital da Australia? ',
' Navarra ', ' Camberra ',' Sidney ',' Canberra ',false),
(' Qual o livro mais vendido no mundo? ',
' Senhor dos an??is ', ' Harry Potter ',' O enigma ',' Dom quixote ',false),
(' Qual dessas entidades geogr??ficas possui um maior territ??rio f??sico? ',
' R??ssia ', ' Estados Unidos ',' Europa ',' Am??rica do Sul ',false),
('Oque Pesa mais? 100kg de Ferro ou 100kg de Algod??o? ',
'100kg de Algod??o', '100kg de Ferro','N??o Sei N??o :/','Ambos Tem o Mesmo Peso',false);






 insert into salas(nome,apelido, corhex, cor, corrgb) values
('inform??tica para internet','Infonet', '#00BFFF', 'azul', 'rgb(0,191,255)'),
('Mecatr??nica','Meca', '#00BFFF', 'azul', 'rgb(0,191,255)'),
('Administra????o','Adm', '#00BFFF', 'azul', 'rgb(0,191,255)'),
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

insert into usuarios(rm,usuario,coin,senha,tipo,estado, salas_id, nivel,vida) values
('3441','William','9999','$2y$10$wpiB/CCICaVb8jD5yFK0oeWxN7umIxAQc8/9oPFzsGciRTOyeBuUu','admin','ativo',1,1,5),
('1','teste','9999','$2y$10$wpiB/CCICaVb8jD5yFK0oeWxN7umIxAQc8/9oPFzsGciRTOyeBuUu','admin','ativo',1,1,5),
('2','teste','9999','$2y$10$wpiB/CCICaVb8jD5yFK0oeWxN7umIxAQc8/9oPFzsGciRTOyeBuUu','admin','ativo',1,1,5),
('34246', 'Mr. Mpedia', '9999', '$2y$10$wpiB/CCICaVb8jD5yFK0oeWxN7umIxAQc8/9oPFzsGciRTOyeBuUu', 'admin', 'ativo',1,1,200);



/*
select * from jogos;
select * from rankings;
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

select * from rankings where usuarios_rm=3441;

// update baseado num if 
UPDATE quiz  SET  aprovacao = IF(jogadas>=10, 1, aprovacao);

insert into rankings(usuarios_rm,jogos_idj, highscore) values 
        (3441,1,30);

update apostas
  set confirmacao=true
  where ida=1;


// selecionar duas foreign key com uma s?? chave prim??ria

SELECT b.ida,a.usuario,c.usuario,b.valor from apostas b JOIN usuarios a ON b.usuario1=a.rm JOIN usuarios c ON b.usuario2=c.rm;


//selecionar para o ranking

select usuarios.rm, usuarios.usuario as usuario,salas.apelido, jogos.nome as jogo, rankings.highscore as highscore from usuarios join rankings on usuarios.rm=usuarios_rm
join jogos on jogos.idj=jogos_idj join salas on usuarios.sala_id=salas.id order by rankings.highscore desc;

// selecionar itens do usuario

select usuarios.usuario, itens.id from compras join usuarios on usuarios_rm=usuarios.rm
join itens on itens_id=itens.id where usuarios.rm='3441'

// select para ranking
select usuarios.rm , usuarios.usuario like '%%', jogos.nome '%q%', rankings.highscore from usuarios join rankings on usuarios.rm=usuarios_rm
join jogos on jogos.idj=jogos_idj where jogos_idj=1 order by rankings.highscore desc;

select rankings.idr as identificador, usuarios.rm, usuarios.usuario, jogos.nome, rankings.highscore as highscore from usuarios join rankings on usuarios.rm=usuarios_rm
join jogos on jogos.idj=jogos_idj where usuarios.rm=3441 and jogos.idj=1 order by rankings.highscore desc;

*/