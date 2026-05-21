CREATE TABLE azienda(
   cf_azienda VARCHAR(30) NOT NULL PRIMARY KEY,
   settore VARCHAR(30) NOT NULL,
   sede_legale VARCHAR(30) NOT NULL,
   sede_operativa VARCHAR(30) NOT NULL,
   ragione_sociale VARCHAR(50) NOT NULL,
   cod_ateco INT NOT NULL,
   mail VARCHAR(30) NOT NULL,
   telefono VARCHAR(20) NOT NULL 
);

INSERT INTO azienda VALUES('sd', 'metallurgico', 'milano', 'roma', 'metallo', 1, 'metamiro@gmail.com', '333333');
INSERT INTO azienda VALUES('sh', 'idraulico', 'torino', 'verona', 'tubi', 2, 'idratove@gmail.com', '444444');
INSERT INTO azienda VALUES('ss', 'informatico', 'napoli', 'taormina', 'computer', 3, 'infonata@gmail.com', '555555');
INSERT INTO azienda VALUES('st', 'chimico', 'firenze', 'bari', 'pozioni', 4, 'chifiba@gmail.com', '676767');
INSERT INTO azienda VALUES('si', 'arredamento', 'novara', 'cuneo', 'divani', 5, 'arrnocu@gmail.com', '767676');

CREATE TABLE attivita_di_stage (
   cod_attivita INT NOT NULL PRIMARY KEY,
   num_max_studenti INT NOT NULL,
   titolo VARCHAR(30) NOT NULL,
   data_inizio DATE NOT NULL,
   ambito_insegnamento VARCHAR(40) NOT NULL,
   data_fine DATE NOT NULL,
   competenze_richieste VARCHAR(50) NOT NULL,
   attivita_tirocinanti VARCHAR(50) NOT NULL
);

INSERT INTO attivita_di_stage VALUES(1, 20, 'lavorazione metallo', '2026-12-03', 'metallurgico', '2027-12-05', 'tornio', 'insegnamento lavorazione metallo');
INSERT INTO attivita_di_stage VALUES(2, 15, 'scarichi wc', '2027-04-23', 'scarichi', '2027-10-30', 'idraulica base', 'installazione tubi di scarico');
INSERT INTO attivita_di_stage VALUES(3, 50, 'crimpaggio cavo ethernet', '2026-06-18', 'cavi', '2026-07-06', 'analista capoprogrammatore', 'crimpaggio');
INSERT INTO attivita_di_stage VALUES(4, 40, 'scioglimento solfato rameico', '2026-11-25', 'provette', '2026-12-30', 'biochimico', 'assistente laboratorio');
INSERT INTO attivita_di_stage VALUES(5, 35, 'progettazione divani', '2027-08-15', 'progettista', '2028-01-29', 'disegno', 'lavorazione pelle');

CREATE TABLE propone (
   cf_azienda VARCHAR(30) NOT NULL,
   cod_attivita INT NOT NULL,
   FOREIGN KEY (cf_azienda) REFERENCES azienda(cf_azienda),
   FOREIGN KEY (cod_attivita) REFERENCES attivita_di_stage(cod_attivita)
);

INSERT INTO propone VALUES('sd', 1);
INSERT INTO propone VALUES('sh', 2);
INSERT INTO propone VALUES('ss', 3);
INSERT INTO propone VALUES('st', 4);
INSERT INTO propone VALUES('si', 5);

CREATE TABLE tutor_aziendale (
   cf_tutor_aziendale VARCHAR(30) NOT NULL PRIMARY KEY,
   nome_tutor_aziendale VARCHAR(30) NOT NULL,
   telefono_tutor_aziendale VARCHAR(20) NOT NULL,
   cognome_tutor_aziendale VARCHAR(30) NOT NULL,
   email_tutor_aziendale VARCHAR(30) NOT NULL,
   competenze_tutor_aziendale VARCHAR(50) NOT NULL,
   inquadramento VARCHAR(40) NOT NULL,
   esperienze VARCHAR(50) NOT NULL,
   cod_attivita INT NOT NULL,
   FOREIGN KEY (cod_attivita) REFERENCES attivita_di_stage(cod_attivita)
);

INSERT INTO tutor_aziendale VALUES('ca', 'mario', '123456', 'rossi', 'mariorossi@gmail.com', 'lavorazione metallo', 'metalmeccanica', 'aziende milanesi', 1);
INSERT INTO tutor_aziendale VALUES('cb', 'andrea', '654321', 'bianchi', 'andreabianchi@gmail.com', 'idraulica', 'operaio', 'sostituzione wc', 2);
INSERT INTO tutor_aziendale VALUES('cc', 'christian', '78910', 'verdi', 'christianverdi@gmial.com', 'informatiche', 'dipendente', 'crimpaggio cavi', 3);
INSERT INTO tutor_aziendale VALUES('cd', 'luca', '10987', 'ferrari', 'lucaferrari@gmail.com', 'chimiche', 'dipendente', 'tecnico laboratoriale', 4);
INSERT INTO tutor_aziendale VALUES('ce', 'sara', '2976255', 'toscana', 'saratoscana@gmial.com', 'progettazione', 'progettista', 'disegno divani', 5);

CREATE TABLE tutor_scolastico (
   cf_tutor_scolastico VARCHAR(30) NOT NULL PRIMARY KEY,
   nome_tutor_scolastico VARCHAR(30) NOT NULL,
   cognome_tutor_scolastico VARCHAR(30) NOT NULL,
   email_tutor_scolastico VARCHAR(30) NOT NULL,
   telefono_tutor_scolastico VARCHAR(20) NOT NULL,
   materia VARCHAR(30) NOT NULL
);

INSERT INTO tutor_scolastico VALUES('aa', 'fabio', 'zanzibar', 'fabiozanzibar@gmail.com', '111111', 'sistemi');
INSERT INTO tutor_scolastico VALUES('ab', 'silvia', 'pezzi', 'silviapezzi@gmail.com', '2222222', 'gpoi');
INSERT INTO tutor_scolastico VALUES('ac', 'gianfrancesco', 'consorzio', 'gianfrancescoconsorzio@gmail.com', '64382436', 'italiano');
INSERT INTO tutor_scolastico VALUES('ad', 'luciano', 'ollera', 'lucianoollera@gmail.com', '896977632', 'informatica');
INSERT INTO tutor_scolastico VALUES('ae', 'sergio', 'marco', 'sergiomarco@gmail.com', '849736428', 'tps');

CREATE TABLE studente (
   cf_studente VARCHAR(30) NOT NULL PRIMARY KEY,
   data_nascita DATE NOT NULL,
   nome_studente VARCHAR(30) NOT NULL,
   cognome_studente VARCHAR(30) NOT NULL,
   telefono_studente VARCHAR(20) NOT NULL,
   competenze_studente VARCHAR(40) NOT NULL,
   mail_studente VARCHAR(30) NOT NULL,
   classe INT NOT NULL,
   indirizzo_studi VARCHAR(30) NOT NULL,
   cf_tutor_scolastico VARCHAR(30) NOT NULL,
   FOREIGN KEY (cf_tutor_scolastico) REFERENCES tutor_scolastico(cf_tutor_scolastico)
);

INSERT INTO studente VALUES('za', '2009-08-25', 'federico', 'russo', '9845678', 'sistemi', 'federicorusso@gmail.com', 5, 'informatica', 'aa');
INSERT INTO studente VALUES('zb', '2007-03-23', 'sofia', 'ruggeri', '256609', 'gpoi', 'sofiaruggeri@gmail.com', 4, 'informatica', 'ab');
INSERT INTO studente VALUES('zc', '2011-09-08', 'filippo', 'orlandi', '9467321', 'italiano', 'filippoorlandi@gmail.com', 2, 'chimica', 'ac');
INSERT INTO studente VALUES('zd', '2014-03-05', 'thomas', 'grasso', '540970', 'informatica', 'thomasgrasso@gmail.com', 1, 'grafica', 'ad');
INSERT INTO studente VALUES('ze', '2008-05-20', 'luisa', 'delneri', '4632852', 'tps', 'luisadelneri@gmail.com', 3, 'informatica', 'ae');

CREATE TABLE si_candida (
   cod_attivita INT NOT NULL,
   cf_studente VARCHAR(30) NOT NULL,
   PRIMARY KEY (cod_attivita, cf_studente),
   FOREIGN KEY (cod_attivita) REFERENCES attivita_di_stage(cod_attivita),
   FOREIGN KEY (cf_studente) REFERENCES studente(cf_studente)
);

INSERT INTO si_candida VALUES(1, 'za');
INSERT INTO si_candida VALUES(2, 'zb');
INSERT INTO si_candida VALUES(3, 'zc');
INSERT INTO si_candida VALUES(4, 'zd');
INSERT INTO si_candida VALUES(5, 'ze');
