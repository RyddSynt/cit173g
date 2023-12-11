--Creating Table
CREATE TABLE Students(
    Student_ID int,
    First_name varchar(255) NOT NULL,
    Last_name varchar(255) Not NULL,
    Age int,
    BOD date,
    PRIMARY KEY Student_ID
);

--Read
SELECT * FROM Students;

--Update
UPDATE Students
SET (First_name = "LLOYD", Last_name = "DELA CRUZMAN", Age = 30)
WHERE Student_ID = 4;

--Deleting Data
DELETE FROM Students
WHERE First_name = "Nandos";
