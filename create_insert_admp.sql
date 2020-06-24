#Clinics, contact_details, and app_contents

use adminpages;

DROP TABLE IF EXISTS objects;
DROP TABLE IF EXISTS contact_details;
DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS main;
DROP TABLE IF EXISTS advices;
DROP TABLE IF EXISTS sections;
DROP TABLE IF EXISTS readmores;
DROP TABLE IF EXISTS messages;
DROP TABLE IF EXISTS qa;
DROP TABLE IF EXISTS timelines;

CREATE TABLE timelines (
timeline_id INT(11) NOT NULL AUTO_INCREMENT,
object_id INT,
section_id INT,
timeline_title VARCHAR(40),
ref VARCHAR(40),
collapsed BOOL,
PRIMARY KEY (timeline_id)
);

INSERT INTO timelines (object_id, section_id, timeline_title, ref, collapsed) VALUES 
(1, 1, "A timeline belonging to obj 1", "/app/app.php", false),
(2, 1, "The 1st timeline of obj 2", "/app/app.php", false),
(2, 2, "Another one", "/app/app.php", false),
(2, 3, "And yet another one", "/app/app.php", false),
(4, 1, NULL, NULL, false)
;

CREATE TABLE sections (
section_id INT(11) NOT NULL AUTO_INCREMENT,
object_id INT,
timeline_id INT,
advice_id INT, #which
section_title VARCHAR(40),
imageKey INT,
ref VARCHAR(40),
collapsed BOOL,
PRIMARY KEY (section_id)
);

/* 	- Which clinic does it refer to?
	- What is its id, amongst the other ones of the clinics'?
	- What advice is to be placed below it? */
INSERT INTO sections (object_id, timeline_id, advice_id, section_title, imageKey, ref, collapsed) VALUES 
(2, 2, 1, "Welcome", 30, "/app/sections.php", false),
(2, 2, 1, "Next section", 11, "/app/sections.php", false),
(2, 4, 1, "Info section", 9, "/app/sections.php", false),
(2, 3, 1, "More info", 9, "/app/sections.php", false),
(2, 3, 2, "Hell of a section", 9, "/app/sections.php", false),
(2, 4, 1, "section of sections", 9, "/app/sections.php", false),
(2, 4, 1, "What a section", 9, "/app/sections.php", false),
(2, 4, 7, "What another section", 9, "/app/sections.php", false),
(2, 4, 1, "Sectione superioramente", 9, "/app/sections.php", false),
(1, 1, 1, "Chrisis? What chrisis?", 10, "/app/sections.php", false)
;

CREATE TABLE advices (
advice_id INT(11) NOT NULL AUTO_INCREMENT,
object_id INT,
advice INT,
section_id INT,
advice_title VARCHAR(40),
content VARCHAR(80),
imageKey INT,
message_id INT,
model VARCHAR(40),
readmore_id INT,
qa_id INT,
ref VARCHAR(40),
collapsed BOOL,
PRIMARY KEY (advice_id)
);

INSERT INTO advices (object_id, advice, section_id, advice_title, content, imageKey, 
message_id, model, readmore_id, qa_id, ref, collapsed) VALUES 
(2, 1, 1, "About us", "We Are the adminpage developers", 14, 1, "tip", 1, 1, '/app/advices.php', false), 
(2, 2, 2, "About B and C", "Another content", 25, 2, "clip", 1, 1, '/app/advices.php', false),
(2, 2, 2, "About yet something else", "You don't fool me", 26, 3, "slip", 1, 1, '/app/advices.php', false),
(2, 2, 3, "Crappy advice", "It's a cind of magik", 26, 3, "slip", 1, 1, '/app/advices.php', false),
(2, 2, 3, "Advicious advice", "The World is yours.", 24, 3, "slip", 1, 1, '/app/advices.php', false),
(2, 2, 4, "Crazy advize", "What?", 26, 3, "slip", 1, 1, '/app/advices.php', false),
(2, 2, 4, "Add a vice to your section", "Va sa du?", 21, 3, "slip", 1, 1, '/app/advices.php', false),
(2, 1, 5, "Concerning Hobbits", "Let's go to Hobbiton", 122, 1, "clip", 1, 1, '/app/advices.php', false),
(2, 1, 6, "The End of th Game", "It's just a simple s-a-m-p-l-e, for ***'s sake", 132, 1, "clip", 1, 1, '/app/advices.php', false),
(2, 2, 7, "Simply Cred", "Sample it is", 122, 1, "clip", 1, 1, '/app/advices.php', false)
;

CREATE TABLE readmores (
id INT(11) NOT NULL AUTO_INCREMENT,
object_id INT,
advice_id INT,
position INT,
title VARCHAR(40),
content VARCHAR(40),
imageKey INT,
PRIMARY KEY (id)
);

INSERT INTO readmores (object_id, advice_id, position, title, content, imageKey) VALUES 
(2, 1, 1, "About this", "This is all you need.", 33),
(2, 2, 1, "What way is my way?", "The way is the highway.", 15)
;


CREATE TABLE messages (
message_id INT(11) NOT NULL AUTO_INCREMENT,
object_id INT,
advice_id INT,
first_date INT,
second_date INT,
message VARCHAR(60),
PRIMARY KEY (message_id)
);

INSERT INTO messages (object_id, advice_id, first_date, second_date, message) VALUES 
(1, 1, 200101, 210202, "Remember A."),
(2, 2, 220303, 230404, "Don't forget B."),
(2, 3, 240505, 250606, "Oh, just one more thing..."),
(2, 2, 260707, 270808, "Columbo, L.A. police department, homicide")
;

CREATE TABLE objects (
id INT(11) NOT NULL AUTO_INCREMENT,
primary key(id),
object_id INT,
object_name VARCHAR(20),
contact_name VARCHAR(20),
phone_nr INT,
website_url VARCHAR(40),
facebook_url VARCHAR(40),
linkedin_url VARCHAR(40),
insta_url VARCHAR(40)
);

-- SET @c = '{}';
-- SET @contents = (select JSON_SET(@c, '$[0]', "Välkommen till Vårda. Här kan du vara den du är.", '$[1]', 
-- '["Vårda. Varför inte?", "Därför."]'));
-- SET @i = '{}';
-- SET @imgs = (select JSON_SET(@i, '$."2"', 'varfor.jpg'));
-- SET @t = '{}';
-- SET @treatments1 = (SELECT JSON_SET(@t, '$[0]', '["RLE", 1000000, "A deluxe treatment."]', '$[1]', 
-- '["NoCut", 100, "A minor treatment."]'));
-- SET @t = '{}';
-- SET @treatments2 = (SELECT JSON_SET(@t, '$[0]', '["Ett yogapass", 1000, "Sug in naveln."]'));

INSERT INTO objects (object_id, object_name, contact_name, phone_nr, website_url, 
facebook_url, linkedin_url, insta_url) VALUES 
(1,"Chris' crisis","Chris",0703333333, "www1", "fb1", "ln1", "inst1"),
(2,"The coke is dead","Freddie",0702222222, "www2", "fb2", "ln2", "inst2"),
(3,"Wah wah wah","Ray",0701111111, "www3", "fb3", "ln3", "inst3"),
(4,"An object","Valentino",0704444444, "www4", "fb4", "ln4", "inst4")
;



CREATE TABLE products (
product_id INT(11) NOT NULL AUTO_INCREMENT,
object_id INT,
product_name VARCHAR(40),
advice_id INT,
price_sek INT(11),
note TEXT CHARSET utf8,
PRIMARY KEY (product_id)
);

INSERT INTO products (object_id, product_name, advice_id, price_sek, note) VALUES 
(2, "Coke", 6, 1000000, "<p>A deluxe drink. No counterpart whatsoever.</p>"),
(2, "Sprite", 6, 100, "<p>A minor spirit. No business like show business.</p>"),
(3, "Ett yogapass", 6, 1000, "<p>Sug in naveln.</p><br><p>What's the matt*r? What's navel in English?</p>")
;

-- DROP TABLE IF EXISTS welcome_contents;
-- CREATE TABLE welcome_contents (
-- id INT(11) NOT NULL AUTO_INCREMENT,
-- primary key(id),
-- clinic_id INT,
-- content VARCHAR(150));

-- INSERT into welcome_contents (clinic_id, content) VALUES
-- (2, "Välkommen till Vårda. Här kan du vara den du är.");


#select JSON_ARRAYAGG(JSON_OBJECT('treatment', treatment_name, 'price', price_sek, 'info', note)) 
#from app_contents;

#select * from app_contents;

#select JSON_OBJECTAGG(treatment_name, price_sek) from app_contents;

-- select treatment_id, JSON_OBJECTAGG('treatment', treatment_name) as obj from app_contents group by treatment_id;
#select @imgs;
#select treatments, advices, images from main;
#select * from sections where clinic_id = 2 and timeline_id = 1;
#select * from advices where clinic_id = 2 and section_id = 2;
#select JSON_ARRAYAGG(treatment_name) from app_contents;

#select @a;





