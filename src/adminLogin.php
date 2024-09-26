<?php

include("connection.php");


if ($connection->connect_error) {
  print("fail");
} else {
  print("hello"); 
}

if(isset($_POST["adminLogin"])){
  $email = $_POST["adminEmail"];
  $password = $_POST ["adminPassword"];

  $check = "SELECT AdminEmail, AdminPassword FROM Admintbl WHERE AdminEmail = '$email'";
  $result = mysqli_query($connection,$check);
  $countemail = mysqli_num_rows($result);
  if($countemail == 1)
  {
  echo "success";
  }else{
  echo "fail";
  }

  $data = mysqli_fetch_assoc($result);
  $encryptedpassword = $data['AdminPassword'];
  if(password_verify($password,$encryptedpassword))
  {
    echo "success";
  }else{
    echo "fail";
  }



}
?>





<!DOCTYPE html>
<html lang="en" data-theme="light">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./output.css" />
  </head>
  <body>
    <!-- start admin login section  -->
    <section class="mt-14 bg-white shadow-md shadow-[#808080] w-[60%] mx-auto rounded-lg">
      <div class="flex  items-center justify-center gap-[10%] p-8 ">
        <div class="grid hidden lg:block gap-3 bg-[#0000FF]/10 p-8 rounded-lg">
            <h1 class="text-5xl font-semibold ">Welcome Back!</h1>
            <h2 class="text-2xl text-[#808080]">Log in to your account</h2>
            <img src="./BlogWebsite/cubes-woman-logging-into-account-2.png" alt="" >
        </div>

        <div class="grid justify-between items-center gap-4 ">
          <h1 class="text-2xl  md:text-5xl text-[#6F00FF] font-semibold text-center">Admin Log In</h1>

          <form action="adminLogin.php" method="POST" class="grid gap-3">
          <?php
            $result = ($countemail == 1) ? "<span>Correct Email</span>" : "<span>Incorrect Email</span>";
            echo $result;
            ?>
            <input
              type="email"
              id="adminEmail"
              name="adminEmail"
              placeholder="Enter your Email"
              class="outline-none border-b-[2px] border-[#6F00FF] p-2"
            />

            <?php
            $result = ($countemail == 1) ? "<span>Correct Password</span>" : "<span>Incorrect Password</span>";
            echo $result;
            ?>
            <input
              type="password"
              id="adminPassword"
              name="adminPassword"
              placeholder="Enter your password"
              class="outline-none border-b-[2px] border-[#6F00FF] p-2"
            />

            <input
              type="submit"
              name="adminLogin"
              class="p-2 text-lg mt-8 text-center w-full font-semibold bg-[#6F00FF] rounded-lg text-white hover:bg-[#6F00FF]/60"
            />
          </form>
        </div>
      </div>
    </section>
    <!-- end admin login section    -->
  </body>
</html>
