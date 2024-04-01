create table KÄUFER(
id integer primary key not null,
vorname varchar(15) not null,
nachname varchar(15) not null,
geburtsdatum date not null,
email char(15) not null,
    check(contains(email, '@')),
passwort char(15) not null, 
    check(char_length(passwort)>7), 
    check((type(passwort) = (NUMERIC)) or (type(passwort) = char)));

create table ADMIN(
sshkey varchar(20) primary key, 



);
create table ORGANIZATOR(
id integer primary key not null,
vorname varchar(15) not null,
nachname varchar(15) not null,
geburtsdatum date not null,
passwort char(15) check(char_length(passwort)>7) not null,
email char(15) not null
)
create table EVENTS(
id integer primary key not null,
name varchar(15) not null,
datum date not null,
bestell_zeit DATETIME not null check(bestell_zeit >= GETDATE()),
sprache char, default "English",
type varchar not null, default "Konzert",  
foreign KEY (add_counter) references ORGANIZATOR(id),
foreign Key(käufer_id) references KEUFER(id),
);

create table TICKET(
id integer primary key,
foreign key (eventname) references EVENTS(name),
)
create table BESTELLUNGEN(
_status boolean /**(true = "findet statt" or false = "fällt aus") **/,
id integer primary key,
bestelldatum date,
FOREIGN KEY (t_id) REFERENCES TICKET(id)
)

create table TICKET_KATEGORIE(
_name varchar(15),
preis float,
anzahl smallint,
foreign key (t_id) references TICKET(id),
);


