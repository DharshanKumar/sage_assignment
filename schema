CREATE TABLE `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `phoneno` varchar(20) NOT NULL,
  `DOB` date DEFAULT NULL,
   PRIMARY KEY (`id`)
);

CREATE TABLE `course` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `details` varchar(100) NOT NULL,
   PRIMARY KEY (`id`)
);

CREATE TABLE `studentcoursemapping` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` INT NOT NULL,
  `course_id` INT NOT NULL,
   PRIMARY KEY (`id`),
   foreign key (`student_id`) references students(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
   foreign key (`course_id`) references course(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
);