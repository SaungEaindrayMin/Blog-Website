<?php
include("connection.php");

if (isset($_POST["UserSubmit"])){
  $username = $_POST["UserName"];
  $useremail = $_POST["UserEmail"];
  $userpassword = $_POST["UserPassword"];

  $encryptedPassword = password_hash($userpassword,PASSWORD_DEFAULT);

  $userSQL = "SELECT AccountEmail FROM Accounttbl WHERE AccountEmail = '$useremail'";
  $userQuery = mysqli_query($connection, $userSQL);
  $userCount = mysqli_num_rows($userQuery);

  if($userCount == 0){
    $userInsert = "INSERT INTO Accounttbl (AccountName,AccountEmail,AccountRole,AccountPassword) VALUES ('$username','$useremail','user','$encryptedPassword')";
    $Query = mysqli_query($connection,$userInsert);
  }
}

if(isset($_POST["Submit"])){
  $name = $_POST["Name"];
  $email = $_POST["Email"];
  $password = $_POST["Password"];

  $loginCheck = "SELECT AccountEmail,AccountRole,AccountPassword FROM Accounttbl WHERE AccountEmail = '$email'";
  $LoginQuery = mysqli_query($connection, $loginCheck);
  
  $LoginCount = mysqli_num_rows($LoginQuery);
  if ($LoginCount == 1){
    $data = mysqli_fetch_assoc($LoginQuery);
    $encrypted = $data['AccountPassword'];
    if(password_verify($password,$encrypted)) 
    {
       $Role = $data['AccountRole'];
      
        if ($Role == 'user'){
       header('location:index.php');
  }else{
     header('location:dashboard.php');
  }

    }else{
      echo "Password incorrect";
    }
  }else{
    echo "Email doesn't exit";
  }
}

$postSQL = "SELECT * FROM Posttbl";
$postQuery = mysqli_query($connection,$postSQL);
$postCount = mysqli_num_rows($postQuery);
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
    

    <main class="grid grid-cols-1 md:grid-cols-6">
        <!-- Start Mobile Navbar  -->

        <nav class="md:hidden flex justify-between items-center px-3 py-2 border-b">
            <h1>Logo</h1>

            <button type="button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </nav>

        <!-- Start Mobile Aside  -->

        <!-- <aside  class="md:hidden fixed top-0 left-0 w-full h-screen bg-gray-100/70">
            <ul class="flex flex-col items-center gap-y-12 w-1/2 h-screen bg-gray-200 pt-12">
                <li><a href="#" class="w-full px-6 py-3e text-xl font-bold">Logo</a></li>
                <li><a href="#" class="w-full px-6 py-3  capitalize">home</a></li>
                <li><a href="#" class="w-full px-6 py-3  capitalize">about</a></li>
                <li><a href="#" class="w-full px-6 py-3  capitalize">blog</a></li>
                <li><a href="#" class="w-full px-6 py-3  capitalize">contact</a></li>
            </ul>

        </aside> -->

        <!-- End Mobile Aside  -->


      <!-- Start Left Sidebar  -->
      <aside
        class="hidden md:block col-span-1 sticky top-0 h-screen border-r p-8"
      >
        <div class="flex flex-col justify-between h-full absolute right-20">
          <h1>Logo</h1>

          <ul class="grid gap-y-4">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Mail</a></li>
          </ul>

          <div>hello</div>
        </div>
      </aside>
      <!-- End Left Sidebar  -->

      <!-- Start Main Content  -->
      <section class="w-full col-span-3">
        <!-- Start Navbar  -->
        <nav
          class="py-20 px-3 md:p-20 bg-cover bg-center bg-no-repeat border-b"
          style="background-image: url('./BlogWebsite/bgPattern.png')"
        >
          <div class="w-full md:w-3/4 mx-auto">
            <p class="font-bold">Explore, be curious.</p>
            <span>
              Discover stories, thinking, and expertise from writers on any
              topic.</span
            >
          </div>
        </nav>
        <!-- End Navbar  -->

        <!-- Start Content  -->
        <div class="px-3 lg:px-20 py-6">
          <div class="w-full md:w-3/4 mx-auto">

          <?php 
         
         for($i = 0; $i < $postCount; $i++)
         {
          $data = mysqli_fetch_assoc($postQuery);
         
          ?>
            <div class="py-12 border-b">
              <div class="flex gap-x-4 items-center">
                <img
                  src="https://images.unsplash.com/photo-1721332154373-17e78d19b4a4?q=80&w=1935&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                  alt="avatar"
                  class="w-6 h-6 rounded-full object-cover"
                />
                <p>Name</p>
                <p>in Fintech</p>
                <p>Nov 1, 2022</p>
              </div>

              <div class="grid grid-cols-2 items-center gap-x-4 mt-4">
                <img
                  src="https://images.unsplash.com/photo-1727098043574-b0c96c53e4ab?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                  class="w-40 h-32 object-cover rounded-lg"
                  alt=""
                />

                <div >
                  <h1 class="text-lg font-bold">
                    <?php echo $data['PostTitle']; ?>
                  </h1>
                  <p>
                    <?php echo $data['PostDescription'];  ?>
                  </p>
                </div>
              </div>
            </div>



           <?php } ?>
          </div>
        </div>
        <!-- End Content  -->
      </section>
      <!-- End Main Content  -->

<!-- Start Right Sidebar  -->
<aside
  class="hidden md:block col-span-2 sticky top-0 h-screen border-l p-8"
>
  <div class="w-[55%] flex flex-col justify-between h-full">
    <div class="grid gap-y-4">
      <h1 class="font-bold">Your Profile</h1>
      <img
        class="w-full h-40 bg-cover bg-center object-cover rounded-lg"
        src="https://images.unsplash.com/photo-1622562112230-c629f2152a4d?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
        alt=""
      />

      <div>
        <span class="badge bg-green-500 text-white">Active</span>
        <p class="font-semibold mb-4">Saung Eaindray Min</p>
        <p>saung@gmail.com</p>
        <p>+959951180654</p>
      </div>
    </div>
    <div class="grid gap-y-4">
      <h1 class="font-bold">Subscribe to Mono</h1>
      <p class="text-xs">
        Sign up now to get access to the library of members-only issues.
      </p>

      <button
      class="p-2 bg-[#6F00FF] rounded-lg text-center text-white"
      id="openModal"
    >
      Sign Up
    </button>
    <button
      id="loginOpenModal"
      class="p-2 bg-[#DBD7D2] rounded-lg text-center text-[#6F00FF]"
    >
      Log In
    </button>
    </div>
  </div>
</aside>
<!-- End Right Sidebar  -->

 <!-- start Sign up  -->
<section
  id="modal"
  class="grid items-center justify-center fixed inset-0 hidden  w-full h-auto lg:w-[30%] lg:h-[70%] bg-white  bg-white mx-auto mt-14 shadow-lg shadow-[#DBD7D2]/80 rounded-lg"
>
       <div >
        <span
          class="flex items-center text-lg font-semibold text-slate-300"
          ><div class="h-px w-3 me-1 "></div>
          Add New User</span
        >
        <form
          action="index.php"
          method="POST"
          class="grid gap-y-2 mt-2  p-4 rounded-lg border border-slate-800"
        >
          <label
            class="cursor-pointer  text-xl text-center font-semibold border-dotted border-2 border-slate-600 p-12 rounded-md mb-1"
          >
            Upload Image
            <input type="file" class="hidden" name="UserImage" />
          </label>

          <label for="">Name</label>
          <input
            type="text"
            name="UserName"
            class="py-1 focus:outline-none bg-transparent border-b mb-1 border-slate-300"
          />

          <label for="">Email</label>
          <input
            type="email"
            name="UserEmail"
            class="py-1 focus:outline-none bg-transparent border-b mb-1 border-slate-300"
          />

          

          <label for="">Password</label>
          <input
            type="password"
            name="UserPassword"
            class="py-1 focus:outline-none bg-transparent border-b mb-1 border-slate-300"
          />

          <div class="flex justify-between">
          <input
            type="submit"
            name="UserSubmit"
            class="btn btn-sm w-fit ms-auto block mt-2 focus:outline-none"
          />

          <button
            id="closeModal"
            class="btn btn-sm w-fit ms-auto block mt-2 focus:outline-none"
              >
             Cancel
          </button>
          </div>
        </form>
      </div>
</section>

<!-- end sign up -->

     <!-- start sign in  -->
     <section
  id="loginModal"
  class="grid items-center justify-center fixed inset-0 hidden w-full h-auto lg:w-[30%] lg:h-[70%] bg-white  bg-white mx-auto mt-14 shadow-lg shadow-[#DBD7D2]/80 rounded-lg"
>
<div  >
        <span
          class="flex items-center text-lg font-semibold "
          ><div class="h-px w-3 me-1 "></div>
          Log In to your Account</span
        >
        <form
          action="index.php"
          method="POST"
          class="grid gap-y-2 mt-2  p-4 rounded-lg border  border-slate-800"
        >

          <label for="">Name</label>
          <input
            type="text"
            name="Name"
            class="py-1 focus:outline-none bg-transparent border-b mb-1 border-slate-300"
          />

          <label for="">Email</label>
          <input
            type="email"
            name="Email"
            class="py-1 focus:outline-none bg-transparent border-b mb-1 border-slate-300"
          />

          

          <label for="">Password</label>
          <input
            type="password"
            name="Password"
            class="py-1 focus:outline-none bg-transparent border-b mb-1 border-slate-300"
          />

          <div class="flex justify-between">
          <input
            type="submit"
            name="Submit"
            class="btn btn-sm w-fit ms-auto block mt-2 focus:outline-none"
          />

          <button
            id="closeModal"
            class="btn btn-sm w-fit ms-auto block mt-2 focus:outline-none"
              >
             Cancel
          </button>
          </div>
        </form>
      </div>
</section>

<!-- end log in  -->
    </main>
    <script src="./script.js" type="text/javascript"></script>
  </body>
</html>
