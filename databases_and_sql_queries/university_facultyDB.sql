SELECT D.degree_name FROM `degrees` D;
SELECT F.faculty_member_first_name FROM `faculty_members` F,`degrees` D WHERE F.faculty_member_id = D.faculty_id AND D.degree_name = 'Ms in Computer Science';

DELETE FROM `courses`;
DELETE FROM `degrees`;
DELETE FROM `faculty_members`;

INSERT INTO `faculty_members`(`faculty_member_first_name`,`faculty_member_last_name`,`faculty_member_position`) VALUES ('Brenna','East','Lab Instructor');

INSERT INTO `degrees` (`degree_name`,`year_earned`,`university`) VALUES ('BS in Computer Science',2016,'MIT');
INSERT INTO `degrees` (`degree_name`,`year_earned`,`university`) VALUES ('MS in Computer Science',2020,'CLU');