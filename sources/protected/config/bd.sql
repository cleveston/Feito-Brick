create table usuario(idUsuario serial primary key, nome varchar(255), cpf varchar(255), rg varchar(255), telefone varchar(255), datanasc date, 
email varchar(255), senha varchar(255), cidade varchar(255), rua varchar(255), estado varchar(255));

create table produto(idProd serial primary key, nome varchar(255), descprod text, cat varchar(255), ativo boolean, preco money, idUsuario integer, 
foreign key(idUsuario) references usuario(idUsuario));

create table foto(idFoto serial primary key, caminho varchar(255), ativo boolean, idProd integer, foreign key(idProd) references produto(idProd));