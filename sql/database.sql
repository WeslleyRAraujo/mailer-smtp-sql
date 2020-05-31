-- Comando para a criação da tabela

create table mailer;

use mailer;

create table email(
	id_email int not null auto_increment,
	remetente varchar(50) not null,
	destinatario varchar(50) not null,
	assunto varchar(50) not null,
	mensagem varchar(600) not null,
	PRIMARY KEY (id_email)
);
