<?php

include("connection.php");

if(isset($_POST["submit"])){

  $title = $_POST["title"];
  $description = $_POST["description"];
  $body = $_POST["body"];


  $valcreate="SELECT PostTitle FROM Posttbl WHERE PostTitle = '$title'";
  $valquery= mysqli_query($connection,$valcreate);
  $count = mysqli_num_rows($valquery);
  if($count == 0)
  {
    $create = "INSERT INTO Posttbl (PostImage,PostTitle,PostDescription,PostBody) VALUES ('','$title','$description','$body')";
    $createQuery=mysqli_query($connection,$create);
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
    <main class=" grid">
      <!-- start top bar section  -->

      <section class="relative bg-[#F7F7F7]">
      <div
        class="flex fixed z-10 w-full  justify-between items-center p-4 bg-white top-0 shadow-md shadow-[#808080]/20"
      >

      <button class="p-3 bg-[#F5F5F5] lg:hidden block rounded-lg" id="navIcon">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="size-6"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M3.75 9h16.5m-16.5 6.75h16.5"
              />
            </svg>
          </button>

        <h1 class="text-2xl font-semibold text-[#6F00FF]">Blog Website</h1>

        

        <div class="flex items-center gap-3">
          <button class="bg-[#808080]/10 rounded-full p-2">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="size-8"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5"
              />
            </svg>
          </button>

          <button>
            <img
              src="./BlogWebsite/cute-girl-avatar-icn-cartoon-little-woman-profile-mascot-illustration-girl-head-face-business-user-logo-free-vector.jpeg"
              alt=""
              class="w-14 h-14 rounded-full"
            />
          </button>
        </div>
      </div>
    </section>
      <!-- end top bar section  -->

      <!-- start side bar section  -->
       <div class="flex   relative  bg-[#F7F7F7]/20">
      <section
        class="bg-[#F7F7F7]/20 mt-[6.4%] fixed hidden lg:block  justify-between items-center  "
      >
        <div
          class="shadow-md text-black  p-4  h-screen rounded-r-lg"
        >
          <div class="grid gap-2 justify-center items-center">
            <a href="" class="flex gap-2 p-2 rounded-lg hover:bg-[#E5E4E2]/40">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="size-6"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"
                />
              </svg>

              Dashboard
            </a>

            <a href="" class="flex gap-2 p-2 rounded-lg hover:bg-[#E5E4E2]/40">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="size-6"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"
                />
              </svg>

              Post
            </a>

            <a href="" class="flex gap-2 p-2 rounded-lg hover:bg-[#E5E4E2]/40">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="size-6"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                />
              </svg>
              Admin
            </a>
          </div>
        </div>
      </section>
      <!-- end side bar section  -->

      <!-- start create post div  -->

      <section class=" mt-20 w-[90%]  md:w-[60%]  mx-auto ">
        <div
          class="grid gap-5 mt-3 lg:mt-8 bg-white  rounded-lg "
        >
          <div class="grid gap-5">
            <h2 class="font-semibold text-lg">Images</h2>
            <div
              class="grid justify-center border border-dotted border-[#6F00FF] rounded-lg p-10 bg-[#6F00FF]/10 text-[#6F00FF]"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="currentColor"
                class="size-12 mx-auto"
              >
                <path
                  fill-rule="evenodd"
                  d="M10.5 3.75a6 6 0 0 0-5.98 6.496A5.25 5.25 0 0 0 6.75 20.25H18a4.5 4.5 0 0 0 2.206-8.423 3.75 3.75 0 0 0-4.133-4.303A6.001 6.001 0 0 0 10.5 3.75Zm2.03 5.47a.75.75 0 0 0-1.06 0l-3 3a.75.75 0 1 0 1.06 1.06l1.72-1.72v4.94a.75.75 0 0 0 1.5 0v-4.94l1.72 1.72a.75.75 0 1 0 1.06-1.06l-3-3Z"
                  clip-rule="evenodd"
                />
              </svg>
              <p class="text-center md:font-semibold text-xl mt-6">
                Drag and Drop or
              </p>
              <p class="text-center md:font-semibold text-xl">
                Click Here to Uplode Video
              </p>
            </div>
          </div>

          <form action="dashboard.php" method="POST">

          <div class="grid gap-5 lg:gap-8">
            <div class="grid gap-5 w-full">
            <?php
              if ($count == 1){
                echo "<span>Title is already exist<span>";
              }
              ?> <br>
              <h2 class="font-semibold text-lg">Title</h2>
              <input
                id="title"
                name="title"
                type="text"
                class="input input-md w-full bg-[#5E5E5E]/10"
              />
            </div>

            <div class="grid gap-5 w-full">
                <h2 class="font-semibold text-lg">description</h2>
                <input
                  id="description"
                  name="description"
                  type="text"
                  class="input input-md w-full bg-[#5E5E5E]/10"
                />
              </div>
  
          </div>

          <div class="grid gap-5">
            <h2 class="font-semibold text-lg">Body</h2>
            <textarea
              id="body"
              name="body"
              class="textarea w-full bg-[#5E5E5E]/10"
              rows="4"
            ></textarea>
          </div>
        

          <div class="grid lg:gap-3">
            

            <div class="w-full h-full grid items-end justify-end">
            <input
           
           class="p-2 text-lg text-center mt-8 w-full font-semibold bg-[#6F00FF] rounded-lg text-white hover:bg-[#6F00FF]/60"
           type="submit"
           name="submit"

         ></div>

          </form>
        </div>
      </section>

    </div>

      <!-- end create post div  -->
    </main>
  </body>
</html>
