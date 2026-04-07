create table professor (
    cpf varchar(11) unique not null,
    nome varchar(100) not null,
    primary key (cpf)
    )

create table materias (
    codigo int unique not null auto_increment,
    cpfprofessor varchar(11) not null,
    nomemateria varchar(50) not null,
    foreign key (cpfprofessor) references professor(cpf)
    )
    
