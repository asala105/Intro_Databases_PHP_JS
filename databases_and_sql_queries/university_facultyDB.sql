SELECT F.faculty_member_first_name, F.faculty_member_last_name, D.degree_name FROM `degrees` D, `faculty_members` F WHERE F.faculty_member_id = D.faculty_id;
SELECT F.faculty_member_first_name FROM `faculty_members` F,`degrees` D WHERE F.faculty_member_id = D.faculty_id AND D.degree_name = 'Ms in Computer Science';

DELETE FROM `degrees`;
DELETE FROM `faculty_members`;

INSERT INTO `faculty_members`(`faculty_member_first_name`,`faculty_member_last_name`) VALUES ('Brenna','East');