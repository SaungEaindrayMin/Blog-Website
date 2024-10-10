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

if(isset($_POST["AdminSubmit"])){
  $adminname= $_POST["AdminName"];
  $adminemail = $_POST["AdminEmail"];
  $adminrole = $_POST["AdminRole"];
  $adminpassword = $_POST["AdminPassword"];

  $encryptedPassword = password_hash($adminpassword,PASSWORD_DEFAULT);

  $valAdmin= "SELECT AccountEmail FROM Accounttbl WHERE AccountEmail = '$adminemail'";
  $valQuery = mysqli_query($connection,$valAdmin);
  $valCount = mysqli_num_rows($valQuery);

  if($valCount == 0){
    $adminInsert = "INSERT INTO Accounttbl (AccountName,AccountEmail,AccountRole,AccountPassword) VALUES('$adminname','$adminemail','admin','$encryptedPassword')";
    $adminQuery = mysqli_query($connection,$adminInsert);
  }
}

$AccountSelect = "SELECT * FROM Accounttbl";
$AccountQuery = mysqli_query($connection,$AccountSelect);
$AccountCount = mysqli_num_rows($AccountQuery);



?>


<!DOCTYPE html>
<html lang="en" data-theme="light">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./output.css" />
  </head>
  <body class="relative bg-[#021124]/80 text-white">
    <main>
      <!-- Start Background  -->
      <img
        src="./BlogWebsite/blobblur.png"
        alt="blob1"
        class="fixed z-0 w-40 h-52 top-0 left-0"
      />

      <img
        src="./BlogWebsite/blob1.png"
        alt="blobblur"
        class="fixed z-0 top-6 left-56 w-auto md:w-[450px]"
      />

      <img
        src="./BlogWebsite/blob1.png"
        alt="blobblur"
        class="fixed z-0 top-24 right-0 w-auto md:w-[56rem]"
      />
      <!-- End Background  -->

      <!-- Start Sidebar  -->
      <aside
        class="hidden fixed md:flex flex-col justify-between h-screen bg-[#021124]/80 backdrop-blur-3xl supports-backdrop-blur:bg-[#021124]/95 w-fit"
      >
        <div>
          <h1 class="font-bold text-xl text-center py-2">Blog</h1>

          <ul class="mt-10">
            <li>
              <a
                href="#"
                class="flex items-center gap-x-2 py-3 px-3 hover:bg-[#021124]/30 transition-all duration-100 border-none text-white outline-none w-full"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="2.5"
                  stroke="currentColor"
                  class="size-4"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 0 1-1.125-1.125v-3.75ZM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-8.25ZM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-2.25Z"
                  />
                </svg>
                Dashboard</a
              >
            </li>
            <li>
              <a
                href="#"
                class="flex items-center gap-x-2 py-3 px-3 hover:bg-[#021124]/30 transition-all duration-100 border-none text-white outline-none w-full"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="2.5"
                  stroke="currentColor"
                  class="size-4"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 0 1-.923 1.785A5.969 5.969 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Z"
                  />
                </svg>
                Blog</a
              >
            </li>
            <li>
              <a
                href="#"
                class="flex items-center gap-x-2 py-3 px-3 hover:bg-[#021124]/30 transition-all duration-100 border-none text-white outline-none w-full"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="2.5"
                  stroke="currentColor"
                  class="size-4"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"
                  />
                </svg>
                Admin</a
              >
            </li>
          </ul>
        </div>

        <div>
          <a href="/">
            <button
              class="btn bg-[#8B0000] hover:bg-[#8B0000]/90 border-none outline-none rounded-none text-white w-full"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2.5"
                stroke="currentColor"
                class="size-4"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9"
                />
              </svg>

              Logout
            </button>
          </a>
        </div>
      </aside>
      <!-- End Sidebar  -->

      <!-- ! Start Main Content  -->
      <div
        class="relative md:ms-[125px] rounded-tl-2xl bg-[#020b1a]/90 backdrop-blur-3xl supports-backdrop-blur:bg-[#021124]/95 min-h-screen rounded-xl"
      >
        <!-- Start Navbar  -->
        <nav
          class="sticky flex justify-between items-center border-b border-slate-800 bg-[#021124]/60 backdrop-blur-3xl top-0 left-[133px] right-0 z-50 px-4 py-2"
        >
          <div class="flex items-center gap-2">
            <button
              class="cursor-pointer bg-transparent border-none focus:outline-none"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="white"
                class="size-7"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                />
              </svg>
            </button>

            <h1 class="text-xl font-bold">Dashboard</h1>
          </div>
          <div class="flex gap-x-4">
            <img
              src="https://images.unsplash.com/photo-1726809448984-2e7f60cc6e97?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
              alt="avatar"
              class="w-12 h-12 rounded-full object-cover"
            />
            <div>
              <p class="font-semibold">Username</p>
              <span>Admin</span>
            </div>
          </div>
        </nav>
        <!-- End Navbar  -->

        <div class="grid gap-y-6 p-6">
          <div class="w-full mb-6">
            <span class="text-lg font-semibold text-slate-300"
              >Good Morning,</span
            >
            <h1 class="text-4xl font-bold font-serif mt-2">
              Saung Eaindray Min
            </h1>
          </div>

          <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
            <div
              class="relative p-4 bg-[#021124]/80 backdrop-blur-3xl rounded-lg border border-slate-800"
            >
              <span class="text-lg font-semibold text-slate-300"
                >Total Blog</span
              >
              <h1 class="text-5xl font-bold my-4 text-slate-200">12</h1>
              <div
                class="w-full h-2 bg-gradient-to-r from-red-500 via-yellow-500 to-cyan-500 absolute left-0 bottom-0 rounded-b-lg"
              ></div>
            </div>

            <div
              class="relative p-4 bg-[#021124]/80 backdrop-blur-3xl rounded-lg border border-slate-800"
            >
              <span class="text-lg font-semibold text-slate-300"
                >Total User</span
              >
              <h1 class="text-5xl font-bold my-4 text-slate-200">24</h1>
              <div
                class="w-full h-2 bg-gradient-to-r from-red-500 via-yellow-500 to-cyan-500 absolute left-0 bottom-0 rounded-b-lg"
              ></div>
            </div>

            <div
              class="relative p-4 bg-[#021124]/80 backdrop-blur-3xl rounded-lg border border-slate-800"
            >
              <span class="text-lg font-semibold text-slate-300"
                >Total Admin</span
              >
              <h1 class="text-5xl font-bold my-4 text-slate-200">8</h1>
              <div
                class="w-full h-2 bg-gradient-to-r from-red-500 via-yellow-500 to-cyan-500 absolute left-0 bottom-0 rounded-b-lg"
              ></div>
            </div>
          </div>

          <div class="grid grid-cols-1  gap-6">
            <div class="w-full">
              <div class="flex justify-between items-center">
                <span
                  class="flex items-center text-lg font-semibold text-slate-300"
                  ><div class="h-px w-3 me-1 bg-slate-300"></div>
                  Users</span
                >
                <a href="">
                  <button
                    class="px-2 py-1 text-sm rounded-lg bg-[#020c17] text-white border-none hover:bg-[#192f47] transition-all duration-300 focus:outline-none"
                  >
                    Add User
                  </button>
                </a>
              </div>
              <div
                class="overflow-x-auto w-full mt-2 border border-slate-800 rounded-lg"
              >
                <table class="min-w-full bg-[#021124] table-auto">
                  <thead class="bg-[#020c17]">
                    <tr>
                      <th class="py-2 px-4 text-left font-medium">id</th>
                      <th class="py-2 px-4 text-left font-medium">Name</th>
                      <th class="py-2 px-4 text-left font-medium">Email</th>
                      <th class="py-2 px-4 text-left font-medium">Role</th>
                      <th class="py-2 px-4 text-left font-medium">Action</th>
                    </tr>
                  </thead>

   

                  <tbody>
                  <?php

                    for ($i = 0; $i < $AccountCount; $i++)
                    {
                    $Accountdata = mysqli_fetch_assoc($AccountQuery);

                  ?>
                  
                    <tr class="border-t border-slate-800">
                      <td class="py-2 px-4"><?php echo $Accountdata['AccountID'];?></td>
                      <td class="py-2 px-4"><?php echo $Accountdata['AccountName'];?></td>
                      <td class="py-2 px-4"><?php echo $Accountdata['AccountEmail'];?></td>
                      <td class="py-2 px-4"><?php echo $Accountdata['AccountRole'];?></td>
                      <td class="py-2 px-4 flex gap-4">
                        <a href="AccountControl.php?AccountID=<?php echo $Accountdata['AccountID'];?>" class="p-1 px-3 text-white bg-[#FE0000] rounded-lg">Edit</a>
                        <a href="dashboard.php?Account_ID_to_delete=<?php echo $Accountdata['AccountID'];?>" class="p-1 px-3 text-white bg-[#008000] rounded-lg">Delete</a>
                      </td>
                    </tr>
                    <?php } ?>
                   
                  </tbody>
                </table>
              </div>
            </div>



            <!-- <div class="w-full">
              <div class="flex justify-between items-center">
                <span
                  class="flex items-center text-lg font-semibold text-slate-300"
                  ><div class="h-px w-3 me-1 bg-slate-300"></div>
                  Admins</span
                >
                <a href="">
                  <button
                    class="px-2 py-1 text-sm rounded-lg bg-[#020c17] text-white border-none hover:bg-[#192f47] transition-all duration-300 focus:outline-none"
                  >
                    Add Admin
                  </button>
                </a>
              </div>
              <div
                class="overflow-x-auto w-full mt-2 border border-slate-800 rounded-lg"
              >
                <table class="min-w-full bg-[#021124] table-auto">
                  <thead class="bg-[#020c17]">
                    <tr>
                      <th class="py-2 px-4 text-left font-medium">id</th>
                      <th class="py-2 px-4 text-left font-medium">Name</th>
                      <th class="py-2 px-4 text-left font-medium">Email</th>
                      <th class="py-2 px-4 text-left font-medium">Role</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="border-t border-slate-800">
                      <td class="py-2 px-4">1</td>
                      <td class="py-2 px-4">John Doe</td>
                      <td class="py-2 px-4">johndoe@example.com</td>
                      <td class="py-2 px-4">Admin</td>
                    </tr>
                    <tr class="border-t border-slate-800">
                      <td class="py-2 px-4">2</td>
                      <td class="py-2 px-4">Jane Smith</td>
                      <td class="py-2 px-4">janesmith@example.com</td>
                      <td class="py-2 px-4">User</td>
                    </tr>
                    <tr class="border-t border-slate-800">
                      <td class="py-2 px-4">3</td>
                      <td class="py-2 px-4">Michael Brown</td>
                      <td class="py-2 px-4">michaelbrown@example.com</td>
                      <td class="py-2 px-4">Editor</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div> -->

          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div>
              <span
                class="flex items-center text-lg font-semibold text-slate-300"
                ><div class="h-px w-3 me-1 bg-slate-300"></div>
                Avaliable Admins</span
              >

              <div class="bg-[#021124] rounded-lg border border-slate-800 mt-2">
                <div class="flex justify-between items-center px-4 py-2">
                  <div class="flex items-center gap-x-2">
                    <img
                      src="https://images.unsplash.com/photo-1550935114-99de2f488f47?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                      alt=""
                      class="w-10 h-10 rounded-full object-cover object-center"
                    />
                    <div>
                      <p>username</p>
                      <p>email</p>
                    </div>
                  </div>

                  <p
                    class="badge bg-green-600 text-white uppercase border-none font-semibold"
                  >
                    Avaliable
                  </p>
                </div>

                <div class="flex justify-between items-center px-4 py-2">
                  <div class="flex items-center gap-x-2">
                    <img
                      src="https://images.unsplash.com/photo-1550935114-99de2f488f47?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                      alt=""
                      class="w-10 h-10 rounded-full object-cover object-center"
                    />
                    <div>
                      <p>username</p>
                      <p>email</p>
                    </div>
                  </div>

                  <p
                    class="badge bg-red-600 text-white uppercase border-none font-semibold"
                  >
                    unavaliable
                  </p>
                </div>

                <div
                  class="flex justify-between items-center bg-[#021124] px-4 py-2"
                >
                  <div class="flex items-center gap-x-2">
                    <img
                      src="https://images.unsplash.com/photo-1550935114-99de2f488f47?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                      alt=""
                      class="w-10 h-10 rounded-full object-cover object-center"
                    />
                    <div>
                      <p>username</p>
                      <p>email</p>
                    </div>
                  </div>

                  <p
                    class="badge bg-green-600 text-white uppercase border-none font-semibold"
                  >
                    Avaliable
                  </p>
                </div>
              </div>
            </div>

            <div>
              <span
                class="flex items-center text-lg font-semibold text-slate-300"
                ><div class="h-px w-3 me-1 bg-slate-300"></div>
                Add New User</span
              >
              <form
                action="dashboard.php"
                method="POST"
                class="grid gap-y-2 mt-2 bg-[#021124] p-4 rounded-lg border border-slate-800"
              >
                <label
                  class="cursor-pointer bg-[#0e1c2e] text-xl text-center font-semibold border-dotted border-2 border-slate-600 p-12 rounded-md mb-1"
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

                <input
                  type="submit"
                  name="UserSubmit"
                  class="btn btn-sm w-fit ms-auto block mt-2 focus:outline-none"
                />
              </form>
            </div>

            <div>
              <span
                class="flex items-center text-lg font-semibold text-slate-300"
                ><div class="h-px w-3 me-1 bg-slate-300"></div>
                Add New Admin</span
              >
              <form
                action="dashboard.php"
                method ="POST"
                class="grid gap-y-2 mt-2 bg-[#021124] p-4 rounded-lg border border-slate-800"
              >
                <label
                  class="cursor-pointer bg-[#0e1c2e] text-xl text-center font-semibold border-dotted border-2 border-slate-600 p-12 rounded-md mb-1"
                >
                  Upload Image
                  <input type="file" class="hidden" name="AdminImage"/>
                </label>

                <label for="">Name</label>
                <input
                  type="text"
                  name="AdminName"
                  class="py-1 focus:outline-none bg-transparent border-b mb-1 border-slate-300"
                />

                <label for="">Email</label>
                <input
                  type="email"
                  name="AdminEmail"
                  class="py-1 focus:outline-none bg-transparent border-b mb-1 border-slate-300"
                />

                

                <label for="">Password</label>
                <input
                  type="password"
                  name="AdminPassword"
                  class="py-1 focus:outline-none bg-transparent border-b mb-1 border-slate-300"
                />

                <input
                  type="submit"
                  name="AdminSubmit"
                  class="btn btn-sm w-fit ms-auto block mt-2 focus:outline-none"
                  placeholder="Submit"
                />
              </form>
            </div>
          </div>

          <!-- Delete section -->

          <?php 
                    
                    if (isset($_GET['Account_ID_to_delete'])) {
                      $delete = $_GET['Account_ID_to_delete'];
                  
                      $deleteData = "DELETE FROM Accounttbl WHERE AccountID = $delete";
                      $deleteQuery = mysqli_query($connection, $deleteData);
                      if (mysqli_num_rows ($editDataQuery) == 1){
                        foreach ($deleteQuery as $row){
                          $deleteID = $row['AccountID'];
                          $deleteUsername = $row['AccountName'];
                          $deleteEmail = $row['AccountEmail'];
                          $deleteRole = $row['AccountRole'];
                          header('location:dashboard.php');
                          
                        }
                      } 
                      
                } 
                ?>

                <!-- Delete section  -->




          <footer class="mt-12">
            <div class="flex items-center justify-between">
              <p>© 2024 Saung Eaindray Min</p>

              <div class="flex items-center gap-x-6">
                <a href="/">Home</a>
                <a href="/">Contact</a>
              </div>
            </div>
          </footer>
        </div>
      </div>
      <!-- ! End Main Content  -->
    </main>
  </body>
</html>