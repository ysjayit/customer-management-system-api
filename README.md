### Customer-Management-System-API

- This REST API is for customer management system.

#### Technologies
- Laravel Framework 6.20.44
- Laravel Passport 7.5.1

#### Features
- User registration
- User Login
- Listing Customers
- Create Customer
- View Customer
- Update Customer
- Delete Customer

#### Installation
- Clone the repository
- Composer install
`composer install`
- Set environment
`cp .env.example .env`
- Set the application key
`php artisan key:generate`
- Run migration
`php artisan migrate`
- Run application
`php artisan serve`

#### Docker Setup
- It requires a machine with Docker installed.
- Update below .env parameters. `DB_HOST, DB_PORT, DB_CONNECTION` exactly as shown below and `DB_DATABASE, DB_USERNAME, DB_PASSWORD` as your choice.
`DB_HOST=db`
`DB_PORT=3306`
`DB_DATABASE=<database_name>`
`DB_USERNAME=<database_user_name>`
`DB_PASSWORD=<database_user_password>`
`DB_CONNECTION=mysql`
- Update `docker-compose/mysql/init/01-databaes.sql` file according to the changes made above.
- Run container `docker-compose up -d --build`
- Check the status `docker-compose ps` you should see three containers are running.
- Bash in to the container to install composer dependencies and run application commands `docker-compose exec app bash`
`composer install`
`php artisan key:generate`
`php artisan migrate`
- Application is accessible under http://localhost:8005

#### REST API

##### User registration
-------------
| Request | http://127.0.0.1:8000/api/register  |
| ------------ | ------------ |
| Method  | POST |
| Headers  | Accept : application/json |
| Parameters  | {<br/>&nbsp; "name" : "Demo User", <br/>&nbsp; "email" : "demo@customermanager.com", <br/>&nbsp; "password" : "12345", <br/> &nbsp; "c_password" : "12345"<br/> } |
| Response | {<br/>&nbsp; "success": true,<br/>&nbsp; "data": {<br/>&nbsp; &nbsp;&nbsp; &nbsp;  "token": "xxxxxxxxxxxxxxxxxxx",<br/>&nbsp; &nbsp;&nbsp; &nbsp;   "name": "Demo User"<br/>&nbsp; &nbsp; },<br/>&nbsp; "message": "User register successfully."<br/>} |

##### User Login
-------------
| Request | http://127.0.0.1:8000/api/login  |
| ------------ | ------------ |
| Method  | POST |
| Headers  | Accept : application/json |
| Parameters  | {<br/>&nbsp;  "email" : "demo@customermanager.com", <br/>&nbsp;  "password" : "12345"<br/> } |
| Response | {<br/>&nbsp; "success": true,<br/>&nbsp; "data": {<br/>&nbsp; &nbsp;&nbsp; &nbsp;  "token": "xxxxxxxxxxxxxxxxxxx",<br/>&nbsp; &nbsp;&nbsp; &nbsp;   "name": "Demo User"<br/>&nbsp; &nbsp; },<br/>&nbsp; "message": "User register successfully."<br/>}  |

##### Listing Customers
-------------
| Request | http://127.0.0.1:8000/api/customers  |
| ------------ | ------------ |
| Method  | GET |
| Headers  | Accept : application/json |
| Authorization  | Bearer Token (Token recieved when login) |
| Parameters  |  |
| Response | {<br/>&nbsp; "success": true,<br/>&nbsp; "data": [<br/>&nbsp; &nbsp;&nbsp;  {<br/>&nbsp; &nbsp;&nbsp; "id": 1,<br/>&nbsp; &nbsp;&nbsp; "first_name": "John",<br/>&nbsp; &nbsp;&nbsp; "last_name": "Peter",<br/>&nbsp; &nbsp;&nbsp; "age": 25,<br/>&nbsp; &nbsp;&nbsp; "dob": "1995-05-14",<br/>&nbsp; &nbsp;&nbsp; "email": "john.p@gmail.com",<br/>&nbsp; &nbsp;&nbsp; "created_at": "29/06/2022",<br/>&nbsp; &nbsp;&nbsp; "updated_at": "29/06/2022"<br/>&nbsp; &nbsp;&nbsp;  } <br/>&nbsp;&nbsp;  ],<br/>&nbsp; "message": "Customers retrieved successfully."<br/>} |

##### Create Customer
-------------
| Request | http://127.0.0.1:8000/api/customers  |
| ------------ | ------------ |
| Method  | POST |
| Headers  | Accept : application/json |
| Authorization  | Bearer Token (Token recieved when login) |
| Parameters  | {<br/>&nbsp; "first_name" : "John",<br/>&nbsp; "last_name" : "Peter",<br/>&nbsp; "age" : "25",<br/>&nbsp; "dob" : "1995/05/14",<br/>&nbsp; "email" : "john.p@gmail.com"<br/>} |
| Response | {<br/>&nbsp; "success": true,<br/>&nbsp; "data": {<br/>&nbsp; &nbsp;&nbsp; &nbsp;  "id": 1,<br/>&nbsp; &nbsp;&nbsp; &nbsp;  "first_name": "John",<br/>&nbsp; &nbsp;&nbsp; &nbsp;  "last_name": "Peter",<br/>&nbsp; &nbsp;&nbsp; &nbsp;  "age": "25",<br/>&nbsp; &nbsp;&nbsp; &nbsp;  "dob": "1995/05/14",<br/>&nbsp; &nbsp;&nbsp; &nbsp;  "email": "john.p@gmail.com",<br/>&nbsp; &nbsp;&nbsp; &nbsp;  "created_at": "29/06/2022",<br/>&nbsp; &nbsp;&nbsp; &nbsp;  "updated_at": "29/06/2022"<br/>&nbsp;&nbsp;&nbsp; },<br/>&nbsp; "message": "Customer created successfully."<br/>} |

##### View Customer
-------------
| Request | http://127.0.0.1:8000/api/customers/{customer_id}  |
| ------------ | ------------ |
| Method  | GET |
| Headers  | Accept : application/json |
| Authorization  | Bearer Token (Token recieved when login) |
| Parameters  |  |
| Response | {<br/>&nbsp; "success": true,<br/>&nbsp; "data": {<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "id": 1,<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "first_name": "John",<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "last_name": "Peter",<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "age": 25,<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "dob": "1995-05-14",<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "email": "john.p@gmail.com",<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "created_at": "29/06/2022",<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "updated_at": "29/06/2022"<br/>&nbsp;&nbsp; },<br/>&nbsp; "message": "Customer retrieved successfully."<br/>} |

##### Update Customer
-------------
| Request | http://127.0.0.1:8000/api/customers/{customer_id}  |
| ------------ | ------------ |
| Method  | PUT |
| Headers  | Accept : application/json |
| Authorization  | Bearer Token (Token recieved when login) |
| Parameters  | {<br/>&nbsp; "first_name" : "John",<br/>&nbsp; "last_name" : "Peter",<br/>&nbsp; "age" : "25",<br/>&nbsp; "dob" : "1995/05/14",<br/>&nbsp; "email" : "john.peter@gmail.com"<br/>} |
| Response | {<br/>&nbsp; "success": true,<br/>&nbsp; "data": {<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "id": 1,<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "first_name": "John",<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "last_name": "Peter",<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "age": "25",<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "dob": "1995/05/14",<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "email": "john.peter@gmail.com",<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "created_at": "29/06/2022",<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "updated_at": "29/06/2022"<br/>&nbsp;&nbsp; },<br/>&nbsp; "message": "Customer updated successfully."<br/>} |

##### Delete Customer
-------------
| Request | http://127.0.0.1:8000/api/customers/{customer_id}  |
| ------------ | ------------ |
| Method  | DELETE |
| Headers  | Accept : application/json |
| Authorization  | Bearer Token (Token recieved when login) |
| Parameters  | |
| Response | {<br/>&nbsp; "success": true,<br/>&nbsp; "data": [],<br/>&nbsp; "message": "Customer deleted successfully."<br/>} |

