CREATE TABLE respondent (
  respondent_id int(11) NOT NULL AUTO_INCREMENT,
  email varchar(500) NOT NULL,
  gender varchar(1) NOT NULL,
  age int(2) NOT NULL,
  educational_attainment varchar(300) NOT NULL,
  occupation varchar(300) NOT NULL,
  web_hours int(3) NOT NULL,
  gov_informed varchar(1) NOT NULL,
  ngo_id varchar(1) NOT NULL,
  PRIMARY KEY (respondent_id)
);

CREATE TABLE survey (
  survey_id int(11) NOT NULL AUTO_INCREMENT,
  respondent_id int(11) NOT NULL,
  set_code varchar(1) NOT NULL,
  PRIMARY KEY (survey_id)
);

CREATE TABLE site_answer (
  survey_id int(11) NOT NULL,
  site_name varchar(50) NOT NULL,
  site_mod varchar(1) NOT NULL,
  orig_rating int(1) NOT NULL,
  orig_comments text NULL,
  mod_rating int(1) NOT NULL,
  mod_comments text NULL,
  believable varchar(1) NOT NULL,

  PRIMARY KEY (survey_id, site_name)
);

CREATE TABLE site (
  short_name varchar(50) NOT NULL,
  name varchar(300) NOT NULL,
  link varchar(500) NOT NULL,
  dr_bracket varchar(1) NOT NULL,
  PRIMARY KEY (short_name)
);

CREATE TABLE survey_set (
  set_code varchar(1) NOT NULL,
  site_1 varchar(10) NOT NULL,
  site_2 varchar(10) NOT NULL,
  PRIMARY KEY (set_code)
);