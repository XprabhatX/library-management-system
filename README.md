# library-management-system

I created this easy to use college/school library management website in which you can store data about books, issues, faculties staff and students.
 
 ## UI/UX
 
 ![image](https://user-images.githubusercontent.com/83898334/215242442-6a4366e9-624f-4567-b964-7fb86bf9cbb3.png)

After the login section the user has entered the username and password which he goes to maintain the process of librarian activities.


![image](https://user-images.githubusercontent.com/83898334/215242480-db702bbe-92fd-4586-993a-9a4735dd831e.png)

After the login section, the user has entered the main page where he can go to maintain the process of librarian activities. Here he can define the details like add books, view the issues, details of books and also logout his account for security reasons.


![image](https://user-images.githubusercontent.com/83898334/215242492-c19c809d-4c25-4b0e-aa4d-c04682dea1d6.png)

User have ‘Add Book’ section which uses these mandatory fields as ISBN, title, publication year, copies and price details with login purpose.


![image](https://user-images.githubusercontent.com/83898334/215242528-facf7a7d-ebcb-40db-b287-9e19d91c1f0b.png)

Issues Section handle user details like a description of student_id,instance,borrower_id,when he borrowed and to whom. Details of staff_id and class_id should be accessed in a secure manner.


![image](https://user-images.githubusercontent.com/83898334/215242545-0f618ddf-9a1b-4e39-a00a-1ff9bcb8e220.png)

Admin can view his full existing details of his library activities after adding his details in the issue section.


## How to run on your system
1. Install [xampp](https://www.apachefriends.org/download.html)

2. Refer this ER Diagram and it's Normalized view to understand the schemas:

![image](https://user-images.githubusercontent.com/83898334/215250258-b7dc625b-cbad-4389-b126-23a0a78b1104.png)

![image](https://user-images.githubusercontent.com/83898334/215250268-a246ab9e-afab-48e7-ba2d-742f4ca2be41.png)

Now relate the normalized view with the php code of GUI table and form

3. Start Apache and MySQL server

4. Create a new database called 'library_test'

5. Create tables according to the given relational database

6. Fill in the initial data like faculty, students, books, etc

7. Now you are ready to use my library management website!

### important: some hyperlinks in the code maybe given as a 'localhost:8080/...' replace it with the appropriate link if it isn't working...

## Potential
If you are a beginner planning to create a react app for this  Use 'rafce's and [routing](https://reactrouter.com/en/main/start/tutorial) to make it smooth.
