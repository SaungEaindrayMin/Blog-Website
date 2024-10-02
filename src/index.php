<?php

include("connection.php");


if(isset($_POST["Signup"])){
  $username = $_POST["Signupname"];
  $email = $_POST["Signupemail"];
  $Signuppassword = $_POST["Signuppassword"];

  $encrypted = password_hash($Signuppassword, PASSWORD_DEFAULT);

  $valemail = "SELECT UserEmail FROM Usertbl WHERE UserEmail = '$email'";
  $valquery = mysqli_query($connection,$valemail);
  $valcount = mysqli_num_rows($valquery);

  if ($valcount == 0) {
    $insert = "INSERT INTO Usertbl (UserName,UserEmail,UserPassword) VALUES ('$username','$email','$encrypted')";
    $query = mysqli_query($connection,$insert);
   }

}

  if(isset($_POST["Signin"])){
  $email =$_POST["Signinemail"];
  $password =$_POST["password"];
  $check = "SELECT UserEmail, UserPassword FROM Usertbl WHERE UserEmail = '$email'";
  $result = mysqli_query($connection,$check);
  $count = mysqli_num_rows($result);
  if($count == 1)
  {
    echo "success";
  }else{
    echo "fail";
  }
  $data = mysqli_fetch_assoc($result);
  $encryptedpassword = $data['UserPassword'];
  echo $password;
  echo $encryptedpassword;
  if(password_verify($password,$encryptedpassword))
  {
    echo "correct";
  }else{
    echo "incorrect";
  }
};

  $postSelect = "SELECT * FROM Posttbl";
  $postQuery = mysqli_query($connection,$postSelect);
  $postCount = mysqli_num_rows($postQuery);

  echo $postCount;


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
    <main  class="lg:flex transition-opacity duration-300">
      <!-- start left side bar  -->
      <nav  class="mt-14 relative w-[10%] px-[3%] hidden lg:block">
        <div class="grid justify-between h-screen gap-[20%] fixed">
          <a href=""
            ><svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="size-9"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z"
              />
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
              />
            </svg>
          </a>

          <div class="grid gap-6">
            <a href="">
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
            </a>

            <a href="">
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
                  d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"
                />
              </svg>
            </a>

            <a href="">
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
                  d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5"
                />
              </svg>
            </a>
          </div>

          <a href="">
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
                d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"
              />
            </svg>
          </a>
        </div>
      </nav>

      <nav class="block lg:hidden relative w-full">
        <div
          class="flex  px-[9%] py-[5%] justify-between items-center fixed bg-white w-full top-0 p-2"
        >
          <a href="">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="size-9"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z"
              />
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
              />
            </svg>
          </a>

          <button class="p-3 bg-[#F5F5F5] rounded-lg" id="navIcon">
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
        </div>

        <div class="block lg:hidden">
          <ul
            class="flex justify-center  items-center gap-3  w-full  fixed bg-white navClose"
            id="navBar"
          >
            <li>
              <a href="">
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
              </a>
            </li>

            <li>
              <a href="">
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
                    d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"
                  />
                </svg>
              </a>
            </li>

            <li>
              <a href="">
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
                    d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5"
                  />
                </svg>
              </a>
            </li>

            <li>
            <button
            class="p-2 bg-[#6F00FF] rounded-lg text-center text-white"
            id="openModal"
          >
            Sign Up
          </button>
            </li>

            <li>
            <button
            id="loginOpenModal"
            class="p-2 bg-[#DBD7D2] rounded-lg text-center text-[#6F00FF]"
          >
            Log In
          </button>
            </li>
          </ul>
        </div>
      </nav>

      <!-- end left side bar  -->

      <section
        class="grid gap-8 mt-14  lg:mt-0 md:border-r md:border-l w-fit lg:w-[60%]"
      >
        <!-- start first div  -->
        <div class="grid gap-3 px-[10%]  mt-6 mb-6 md:mt-14 md:mb-14">
          <h2 class="font-semibold text-xl">Explore, be curious.</h2>
          <p class="text-[#808080]">
            Discover stories, thinking, and expertise from writers on any topic.
          </p>
        </div>
        <div class="border-b"></div>

        <!-- end first div  -->

        <section class="mt-6 md:mt-14  mx-auto px-[10%]">
          <!--start first content  -->
          <div class="grid gap-8 ">
            <a
              href=""
              class="flex items-center gap-4 text-[#808080] text-sm md:text-md"
            >
              <img
                src="./BlogWebsite/cute-girl-avatar-icn-cartoon-little-woman-profile-mascot-illustration-girl-head-face-business-user-logo-free-vector.jpeg"
                class="w-8 h-auto"
                alt=""
              />
              <p>Anne Lee .</p>
              <p>in Fintech .</p>
              <p>Nov 1,2022</p>
            </a>
            <div class="grid md:flex items-center gap-5">
              <img
                src="./BlogWebsite/UX.jpeg"
                alt=""
                class="w-fit md:w-[20%] h-auto rounded-lg"
              />
              <div>
                <h2 class="font-semibold text-xl">
                  How designers estimate the impact of UX?
                </h2>
                <p class="text-[#808080] text-lg">
                  Designers wear many hats,the first one being a moderator.
                </p>
              </div>
            </div>

            <div class="border"></div>
          </div>
          <!-- end first content  -->

          <!--start copy first content  -->
         <?php 
         
         for($i = 0; $i < $postCount; $i++)
         {
          $data = mysqli_fetch_assoc($postQuery)
         
          ?>


          <div class="grid gap-8 ">
          <a
            href=""
            class="flex items-center gap-4 text-[#808080] text-sm md:text-md"
          >
            <img
            src=""
              class="w-8 h-auto"
              alt=""
            />
            <p></p>
            <p></p>
            <p></p>
          </a>
          <div class="grid md:flex items-center gap-5">
            <img
              src=""
              alt=""
              class="w-fit md:w-[20%] h-auto rounded-lg"
            />
            <div>
              <h2 class="font-semibold text-xl">
              <?php echo $data['PostTitle'] ?>
              </h2>
              <p class="text-[#808080] text-lg">
              <?php echo $data['PostDescription'] ?>
              </p>
            </div>
          </div>

          <div class="border"></div>
        </div>

         <?php } ?>

 
          <!-- end copy first content  -->

          <!-- start second content  -->
          <!-- <div class="grid gap-8 mt-6 md:mt-14">
            <a
              href=""
              class="flex items-center gap-4 text-[#808080] text-sm md:text-md"
            >
              <img
                src="./BlogWebsite/pf-2.jpeg"
                class="w-8 h-auto rounded-full"
                alt=""
              />
              <p>John Cashman .</p>
              <p>in Hardware .</p>
              <p>Nov 1,2022</p>
            </a>
            <div class="grid md:flex items-center gap-5">
              <img
                src="./BlogWebsite/Unknown.jpeg"
                alt=""
                class="w-fit md:w-[20%] h-auto rounded-lg"
              />
              <div>
                <h2 class="font-semibold text-xl">
                Growing a Distributed Product Design Team
                </h2>
                <p class="text-[#808080] text-lg">
                  
                  The pandemic presented us with a whole new challenge in growing this team.
                </p>
              </div>
            </div>

            <div class="border"></div>
          </div> -->
          <!-- end second content  -->

          <!-- start third content  -->
          <!-- <div class="grid gap-8 mt-14">
            <a
              href=""
              class="flex items-center gap-4 text-[#808080] text-sm md:text-md"
            >
              <img
                src="./BlogWebsite/pf-3.jpeg"
                class="w-8 h-auto rounded-full"
                alt=""
              />
              <p>Benjamin den Bore .</p>
              <p>in Media .</p>
              <p>Nov 1,2022</p>
            </a>
            <div class="grid md:flex items-center gap-5">
              <img
                src="./BlogWebsite/UI.jpeg"
                alt=""
                class="w-fit md:w-[20%] h-auto rounded-lg"
              />
              <div>
                <h2 class="font-semibold text-xl">
                The Art of User Interface Drop Shadows
                </h2>
                <p class="text-[#808080] text-lg">
                 Make your UI look professional.
                </p>
              </div>
            </div>

            <div class="border"></div>
          </div> -->

          <!-- end third content  -->

          <!-- start fourth content  -->
          <!-- <div class="grid gap-8 mt-14">
            <a
              href=""
              class="flex items-center gap-4 text-[#808080] text-sm md:text-md"
            >
              <img
                src="./BlogWebsite/pf-4.png"
                class="w-8 h-auto rounded-full"
                alt=""
              />
              <p>Jorn van Dijk .</p>
              <p>in Pdacast .</p>
              <p>Jul 1, 2022</p>
            </a>
            <div class="grid md:flex items-center gap-5">
              <img
                src="./BlogWebsite/Figma.webp"
                alt=""
                class="w-fit md:w-[20%] h-auto rounded-lg"
              />
              <div>
                <h2 class="font-semibold text-xl">
                Why I move on from Figma?
                </h2>
                <p class="text-[#808080] text-lg">
                 Fed up with front-loading design? This is what I do instead?
                </p>
              </div>
            </div>

            <div class="border"></div>
          </div> -->

          <!-- end fourth content  -->
        </section>
      </section>

      <!-- start right side bar  -->
      <section class="mt-14  relative hidden lg:block">
        <div class="grid gap-4 fixed px-[3%]">
          <h1 class="font-semibold text-3xl">Subscribe</h1>
          <p class="text-[#808080]">
            Sign up now to get access to the library of member-only issues.
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

          <div class="flex justify-between gap-2 mt-6">
            <a href="">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 496 512"
                class="w-6 h-6"
                fill="#808080"
              >
                <path
                  d="M248 8C111 8 0 119 0 256S111 504 248 504 496 393 496 256 385 8 248 8zM363 176.7c-3.7 39.2-19.9 134.4-28.1 178.3-3.5 18.6-10.3 24.8-16.9 25.4-14.4 1.3-25.3-9.5-39.3-18.7-21.8-14.3-34.2-23.2-55.3-37.2-24.5-16.1-8.6-25 5.3-39.5 3.7-3.8 67.1-61.5 68.3-66.7 .2-.7 .3-3.1-1.2-4.4s-3.6-.8-5.1-.5q-3.3 .7-104.6 69.1-14.8 10.2-26.9 9.9c-8.9-.2-25.9-5-38.6-9.1-15.5-5-27.9-7.7-26.8-16.3q.8-6.7 18.5-13.7 108.4-47.2 144.6-62.3c68.9-28.6 83.2-33.6 92.5-33.8 2.1 0 6.6 .5 9.6 2.9a10.5 10.5 0 0 1 3.5 6.7A43.8 43.8 0 0 1 363 176.7z"
                />
              </svg>
            </a>

            <a href="">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512"
                class="w-6 h-6"
                fill="#808080"
              >
                <path
                  d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"
                />
              </svg>
            </a>

            <a href="">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512"
                class="w-6 h-6"
                fill="#808080"
              >
                <path
                  d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"
                />
              </svg>
            </a>

            <a href="">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 640 512"
                class="w-6 h-6"
                fill="#808080"
              >
                <path
                  d="M524.5 69.8a1.5 1.5 0 0 0 -.8-.7A485.1 485.1 0 0 0 404.1 32a1.8 1.8 0 0 0 -1.9 .9 337.5 337.5 0 0 0 -14.9 30.6 447.8 447.8 0 0 0 -134.4 0 309.5 309.5 0 0 0 -15.1-30.6 1.9 1.9 0 0 0 -1.9-.9A483.7 483.7 0 0 0 116.1 69.1a1.7 1.7 0 0 0 -.8 .7C39.1 183.7 18.2 294.7 28.4 404.4a2 2 0 0 0 .8 1.4A487.7 487.7 0 0 0 176 479.9a1.9 1.9 0 0 0 2.1-.7A348.2 348.2 0 0 0 208.1 430.4a1.9 1.9 0 0 0 -1-2.6 321.2 321.2 0 0 1 -45.9-21.9 1.9 1.9 0 0 1 -.2-3.1c3.1-2.3 6.2-4.7 9.1-7.1a1.8 1.8 0 0 1 1.9-.3c96.2 43.9 200.4 43.9 295.5 0a1.8 1.8 0 0 1 1.9 .2c2.9 2.4 6 4.9 9.1 7.2a1.9 1.9 0 0 1 -.2 3.1 301.4 301.4 0 0 1 -45.9 21.8 1.9 1.9 0 0 0 -1 2.6 391.1 391.1 0 0 0 30 48.8 1.9 1.9 0 0 0 2.1 .7A486 486 0 0 0 610.7 405.7a1.9 1.9 0 0 0 .8-1.4C623.7 277.6 590.9 167.5 524.5 69.8zM222.5 337.6c-29 0-52.8-26.6-52.8-59.2S193.1 219.1 222.5 219.1c29.7 0 53.3 26.8 52.8 59.2C275.3 311 251.9 337.6 222.5 337.6zm195.4 0c-29 0-52.8-26.6-52.8-59.2S388.4 219.1 417.9 219.1c29.7 0 53.3 26.8 52.8 59.2C470.7 311 447.5 337.6 417.9 337.6z"
                />
              </svg>
            </a>
          </div>
        </div>
      </section>
      <!-- end right side bar  -->

      <!-- start Sign up  -->
      <section
        id="modal"
        class="grid items-center justify-center fixed inset-0 hidden w-full h-[50%] lg:w-[30%] lg:h-[70%] bg-white  bg-white mx-auto mt-14 shadow-lg shadow-[#DBD7D2]/80 rounded-lg"
      >
        <div class="grid gap-6 p-6">
         

          <h1 class="text-center font-semibold text-3xl text-[#6F00FF]">
            Create Your Account
          </h1>

          <form action="index.php" method="POST">
            <div class="grid gap-6">


            
              <input
                type="text"
                id="name"
                name="Signupname"
                placeholder="Enter your name"
                class="outline-none border-b-[2px] border-[#6F00FF] p-2"
              />

              <?php
              if ($valcount == 1){
                echo "<span>Email is already exist<span>";
              }
              ?>
              <input
                id="email"
                name="Signupemail"
                type="email"
                placeholder="Enter your Email"
                class="outline-none border-b-[2px] border-[#6F00FF] p-2"
              />

              
              <input
                type="password"
                id="password"
                name="Signuppassword"
                placeholder="Enter your Password"
                class="outline-none border-b-[2px] border-[#6F00FF] p-2"
              />
            </div>

            <input
           
            class="p-2 text-lg mt-8 text-center w-full font-semibold bg-[#6F00FF] rounded-lg text-white hover:bg-[#6F00FF]/60"
            type="submit"
            name="Signup"

          >
          </form>

          
           
          <button
            id="closeModal"
            class="p-2 text-lg text-center font-semibold bg-[#DBD7D2] hover:bg-[#DBD7D2]/50 rounded-lg text-[#6F00FF] shadow-lg"
          >
            Cancel
          </button>
        </div>
      </section>

      <!-- end sign up -->

      <!-- start sign in  -->
      <section
        id="loginModal"
        class="grid items-center justify-center fixed inset-0 hidden w-full h-[50%] lg:w-[30%] lg:h-[70%] bg-white  bg-white mx-auto mt-14 shadow-lg shadow-[#DBD7D2]/80 rounded-lg"
      >
        <div class="grid gap-6 p-6">
          <h1 class="text-center font-semibold text-3xl text-[#6F00FF]">
            Log In Your Account
          </h1>

          <form action="index.php" method="POST">
            <div class="grid gap-6">

            <?php
            $result = ($count == 1) ? "<span>Correct Email</span>" : "<span>Incorrect Email</span>";
            echo $result;
            ?>
              <input
                id="email"
                name="Signinemail"
                type="email"
                placeholder="Enter your Email"
                class="outline-none border-b-[2px] border-[#6F00FF] p-2"
              />

            <?php
            $result = ($count == 1) ? "<span>Correct Password</span>" : "<span>Incorrect Password</span>";
            echo $result;
            ?>
              <input
                type="password"
                id="signinpassword"
                name="password"
                placeholder="Enter your Password"
                class="outline-none border-b-[2px] border-[#6F00FF] p-2"
              />
            </div>

            <input
           
            class="p-2 text-lg text-center mt-8 w-full font-semibold bg-[#6F00FF] rounded-lg text-white hover:bg-[#6F00FF]/60"
            type="submit"
            name="Signin"

          >
          </form>

          
          <button
            id="loginCloseModal"
            class="p-2 text-lg   text-center font-semibold bg-[#DBD7D2] hover:bg-[#DBD7D2]/50 rounded-lg text-[#6F00FF] shadow-lg"
          >
            Cancel
          </button>
        </div>
      </section>

      <!-- end log in  -->
    </main>
    <script src="./script.js" type="text/javascript"></script>
  </body>
</html>
