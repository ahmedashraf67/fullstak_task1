
USE student_courses;

CREATE OR REPLACE VIEW course_student_count AS
SELECT 
    courses.id AS course_id,
    courses.name AS course_name,
    COUNT(enrollments.student_id) AS total_students
FROM 
    courses
LEFT JOIN 
    enrollments ON courses.id = enrollments.course_id

WHERE

    enrollments.student_id IS NOT NULL
    
GROUP BY 
    courses.id, courses.name;
----------------------------------------------------------------
----------------------------------------------------------------    

CREATE OR REPLACE VIEW students_without_courses AS
SELECT 
    id,
    name,
    email
FROM 
    students
WHERE 
    id NOT IN (
        SELECT student_id FROM enrollments WHERE student_id IS NOT NULL
    );
----------------------------------------------------------------
---------------------------------------------------------------- 

CREATE OR REPLACE VIEW least_active_student AS
SELECT 
    s.id,
    s.name,
    COUNT(e.course_id) AS total_courses
FROM 
    students s
LEFT JOIN 
    enrollments e ON s.id = e.student_id
GROUP BY 
    s.id, s.name
HAVING 
    total_courses = (
        SELECT 
            MIN(course_counts) 
        FROM (
            SELECT 
                COUNT(course_id) AS course_counts
            FROM 
                enrollments
            GROUP BY 
                student_id
        ) AS subquery
    );
----------------------------------------------------------------
----------------------------------------------------------------
CREATE OR REPLACE VIEW students_with_course_counts AS
SELECT 
    students.id,
    students.name,
    COUNT(enrollments.course_id) AS total_courses
FROM 
    students
INNER JOIN 
    enrollments ON students.id = enrollments.student_id
GROUP BY 
    students.id, students.name;
