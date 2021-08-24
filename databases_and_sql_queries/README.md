# Databases and SQL Queries
In this assignment I was given a table that represents the faculty database in a university, and I had to rev ise this database and fix its design.

## Given Database:
|Faculty|
|--------|
|facFirstName|
|facLastName|
|degree1|
|degree2|
|degree3|

## Step 1:

As a first step I started by checking the errors and mistakes in this table.

### Error #1: Name Convention

The names of the columns in the table does not follow a certain pattern; some of the names have capital letters (facFirstName, facLastName) while some others don't(degree1, degree2,degree3).

### Error #2: No Primary Key

Basically there no column in the table that makes every row unique. Say for example I want to search for the information about the degree earned by the faculty member "John Doe" and my query shows too members with the same name; there will be no way I could differentiate the two members without knowing what degrees each professor earned.

### Error #3: Putting Comma Separated Data in One Column

In the given of this assignment they told us that "The data in each degree field looked like: MS in Computer Science, 2018, AUB." This is one of the mistakes that weakens this database design.

### Error #4: Possibility of Having alot of Nullables 

In the given they also tell us that every faculy member can have up to 3 degrees. So some faculty members could have 1 degree while some others could have 2 or 3 degrees. This means that for some members the columns for degree2 and degree3 might be null. With a large number of members this means that I might have a large number of nullables.

## Step 2:

The second step was to start by solving the above problems one by one.

As for the name convention, I will change the names of all the columns to lowercase, and the pattern for these names will be like: tablename_attribute and if the attribute is made up more than one word, I will separate these words with (_) an example could be: faculty_first_name.

For the primary key, I will assign for every table a primary key of type int that is auto-incremeted.

Now to solve the last two problems, I divided the columns in the table into two separate tables: One for faculty members(faculty_members) and one for the degrees(degrees), knowing that the relationship between the tables is such that "Every faculty member could have earned one or more degrees".(one to many relationship)

As for the attributes of these tables, I kept the attributes "first name" and "last name" as they are in the "faculty_members" table but changed how they are named: "faculty_member_first_name" and "faculty_member_last_name". For the "degrees table", I separated the comma separated data into three main columns "degree_name","year_earned", "university".

## Final Touches:

As a final touch, I added some attributes to the faculty members, and this required the addition of some extra tables to handle this information. Some of the information I added included the department that the faculty members belong to, the courses they teach and of the faculty that the department belongs to.
