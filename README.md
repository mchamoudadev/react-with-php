# react-with-php

<p>This project i have tried to connect my react app with php and mysql backend which has alot of comminuty.</p>
<p>There is some challenges with this stack for example the Cors  Policy is quite challenging so i have googled and i come up with a solution</p>
<p>if you watched my videos on php apis or enrolled my php for professionals course we have a nice api's that we can communicate smoothly, 
  in react the we have two reigions</p>
  
  1. Backend 
  2. Frontend
  
  ## backend 
    uses localhost:80
  ## frontend 
    uses localhost:3000
    
   so we have to accept from our backend to process this requests comes from another region.
   
   ## The solution
   
   So i have created new file and called **header.php** basicaly this files has some rules that we can accept the other region so the code is here :
   
   ```php
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Methods: PUT, POST, OPTIONS");
      header("Content-Type: application/json; charset=utf8mb4");
      header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

      header("Content-Type: application/json");
      <!--This line converts the inputs or the body that we sent into $_POST global varibale for php for accepting post values-->
      $_POST = json_decode(file_get_contents("php://input"), true);

   ```
   To use this project you need to php server i'm using xampp which gives me mysql out of the box , when you have php and mysql the create new 
   database and call you favorite name and the create a table with flour feilds id as an autoincrement, title , description and timestamp.
   
   _**happy coding**_🔥.
   
