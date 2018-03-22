create database db_arsip
use db_arsip

create table mst_dosen(
	nidn char(10) not null,
	nama_dosen varchar(50) not null,
	gelar_dosen varchar(50) not null,
	jenis_kelamin varchar(10) not null,
	tempat_lahir varchar(50) not null,
	tgl_lahir date not null,
	agama varchar(10) not null,
	telepon int (13) not null,
	email varchar(50) not null,
	alamat varchar(100) not null,
	foto varchar(100),
	password varchar(10) not null,
	primary key (nidn)
); 

create table mst_admin(
	nip char(10) not null,
	nama_admin varchar(50) not null,
	jabatan varchar(50) not null,
	alamat varchar(200) not null,
	telepon int(13) not null,
	email varchar(50) not null,
	password varchar(10) not null,
	foto varchar(100),
	primary key (nip)
);

create table tb_kelas(
	kode_kelas char(10) not null,
	kelas varchar(50) not null,
	primary key (kode_kelas)
);

create table tb_jurusan(
	kode_jurusan char(10) not null,
	jurusan varchar(50) not null,
	primary key (kode_jurusan)
);

create table mst_fakultas(
	kode_fakultas char(10) not null,
	fakultas varchar(50) not null,
	nidn char(10) not null,
	primary key (kode_fakultas),
	constraint fk_fak foreign key (nidn) references mst_dosen (nidn)
);

create table mst_prodi(
	kode_prodi char(10) not null,
	prodi varchar(50) not null,
	kode_jurusan char(10) not null,
	kode_fakultas char(10) not null,
	nidn char(10) not null,
	primary key (kode_prodi),
	constraint fk_pro foreign key (kode_jurusan) references tb_jurusan (kode_jurusan),
	constraint fk_prod foreign key (kode_fakultas) references mst_fakultas (kode_fakultas),
	constraint fk_prodi foreign key (nidn) references mst_dosen (nidn)
);

create table mst_matakuliah(
	kode_matakuliah char(10) not null,
	matakuliah varchar(50) not null,
	sks int not null,
	semester int not null,
	kode_prodi char(10) not null,
	kode_fakultas char(10) not null,
	nidn char(10) not null,
	primary key (kode_matakuliah),
	constraint fk_matkul foreign key (kode_prodi) references mst_prodi (kode_prodi),
	constraint fk_matkuli foreign key (kode_fakultas) references mst_fakultas (kode_fakultas),
	constraint fk_matkulia foreign key (nidn) references mst_dosen (nidn)
);

create table tb_semester(
	kode_semester char(5) not null,
	semester varchar(10) not null,
	primary key (kode_semester)
);

create table tb_kurikulum(
	kode_kurikulum char(10) not null,
	kurikulum varchar(100) not null,
	tgl_mulai_efektif date not null,
	tgl_akhir_efektif date not null,
	kode_semester char(5) not null,
	primary key (kode_kurikulum),
	constraint fk_kuri foreign key (kode_semester) references tb_semester (kode_semester)
);

create table tb_jenis_ujian(
	kode_jenis_ujian char(10) not null,
	jenis_ujian varchar(50) not null,
	primary key (kode_jenis_ujian)
);

create table tb_soal(
	kode_soal char(10) not null,
	soal varchar(100) not null,
	kode_jenis_ujian char(10) not null,
	kode_matakuliah char(10) not null,
	kode_prodi char(10) not null,
	kode_fakultas char(10) not null,
	nidn char(10) not null,
	kode_semester char(5) not null,
	kode_kurikulum char(10) not null,
	primary key (kode_soal),
	constraint fk_s foreign key (kode_jenis_ujian) references tb_jenis_ujian (kode_jenis_ujian),
	constraint fk_so foreign key (kode_matakuliah) references mst_matakuliah (kode_matakuliah),
	constraint fk_soa foreign key (kode_prodi) references mst_prodi (kode_prodi),
	constraint fk_soal foreign key (kode_fakultas) references mst_fakultas (kode_fakultas),
	constraint fk_soall foreign key (nidn) references mst_dosen (nidn),
	constraint fk_soalll foreign key (kode_semester) references tb_semester (kode_semester),
	constraint fk_soallll foreign key (kode_kurikulum) references tb_kurikulum (kode_kurikulum)
);

create table tb_nilai(
	kode_nilai char(10) not null,
	nilai varchar(100) not null,
	kode_jenis_ujian char(10) not null,
	kode_matakuliah char(10) not null,
	kode_prodi char(10) not null,
	kode_fakultas char(10) not null,
	nidn char(10) not null,
	kode_semester char(5) not null,
	kode_kurikulum char(10) not null,
	primary key (kode_nilai),
	constraint fk_n foreign key (kode_jenis_ujian) references tb_jenis_ujian (kode_jenis_ujian),
	constraint fk_ni foreign key (kode_matakuliah) references mst_matakuliah (kode_matakuliah),
	constraint fk_nil foreign key (kode_prodi) references mst_prodi (kode_prodi),
	constraint fk_nila foreign key (kode_fakultas) references mst_fakultas (kode_fakultas),
	constraint fk_nilai foreign key (nidn) references mst_dosen (nidn),
	constraint fk_nilaii foreign key (kode_semester) references tb_semester (kode_semester),
	constraint fk_nilaiii foreign key (kode_kurikulum) references tb_kurikulum (kode_kurikulum)
);

create table tb_perguruan_tinggi(
	kode_perguruan_tinggi char(10) not null,
	perguruan_tinggi varchar(50) not null,
	kota varchar(50) not null,
	primary key (kode_perguruan_tinggi)
);

create table tb_riwayat_pendidikan(
	kode_riwayat_pendidikan char(10) not null,
	nidn char(10) not null,
	kode_perguruan_tinggi char(10) not null,
	kode_prodi char(10) not null,
	gelar varchar(50) not null,
	tgl_ijazah date not null,
	ipk_akhir double,
	primary key (kode_riwayat_pendidikan),
	constraint fk_ripen foreign key (kode_perguruan_tinggi) references tb_perguruan_tinggi (kode_perguruan_tinggi),
	constraint fk_ripend foreign key (kode_prodi) references mst_prodi (kode_prodi)
);
 