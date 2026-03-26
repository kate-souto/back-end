create table tipo (
	codigo integer not null,
	nome varchar(100) not null check (nome ~ '(casal|solteiro|triplo) (standard|master|exclusive)'),
	valor real not null check (valor > 0),
	primary key (codigo)
);

create table quarto (
	codigo integer not null,
	andar integer not null check (andar > 0),
	quarto integer not null check (quarto > 0),
	camassolteiro integer not null check (camassolteiro >= 0),
	camascasal integer not null check (camascasal >= 0),
	tipo integer not null,
	check (codigo = (andar*100)+quarto),
	check (camassolteiro+camascasal > 0),
	foreign key (tipo) references tipo(codigo),
	primary key(codigo)
);

