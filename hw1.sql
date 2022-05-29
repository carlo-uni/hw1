-- quarta tabella
CREATE TABLE mipiace (
  id_utente varchar(30),
  id_post int,
  primary key(id_utente,id_post),
  index i1(id_utente),
  index i2(id_post),
  foreign key (id_utente) references utente(id) on delete cascade on update cascade,
  foreign key (id_post) references post(id_post) on delete cascade on update cascade);

-- terza tabella
CREATE TABLE post(
  id_post int auto_increment,
  data_pubblicazione datetime,
  descrizione varchar(255),
  contenuto_multimediale varchar(255),
  id_utente varchar(30),
  numero_like int,
  
  primary key(id_post,id_utente),
  index i1(id_utente),
  index i2(id_post),
  foreign key (id_utente) references utente(id) on delete cascade on update cascade
);
 


-- seconda tabella
CREATE TABLE segue (
  seguito varchar(30),
  seguace varchar(30),
  index i1(seguito),
  index i2(seguace),
  foreign key (seguito) references utente(id) on delete cascade on update cascade,
  foreign key (seguace) references utente(id) on delete cascade on update cascade
);

-- prima tabella
CREATE TABLE utente (
  id varchar(30) primary key,
  nome varchar(20),
  cognome varchar(20),
  email varchar(255),
  password varchar(16),
  avatar varchar(255),
  sesso varchar(1),
  n_telefono char(10),
  data_nascita date,
  paese varchar(20)
);