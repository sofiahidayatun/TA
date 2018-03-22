create database db_arsip
use db_arsip

create table mst_dosen(
	id_dosen char(10) not null,
	nama_dosen varchar(50) not null,
	gelar_dosen varchar(50) not null,
	jenis_kelamin varchar(10) not null,
	agama varchar(10) not null,
	telepon int (13) not null,
	email varchar(50) not null,
	alamat varchar(100) not null,
	kodepos varchar(7),
	foto varchar(100),
	password varchar(10) not null,
	primary key (id_dosen)
); 

