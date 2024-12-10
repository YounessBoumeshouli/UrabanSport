<?php
$title  = "add user";
ob_start();

?>
<div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
  <div class="container max-w-screen-lg mx-auto">
    <div>
  

      <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
          <div class="text-gray-600">
            <p class="font-medium text-lg">Personal Details</p>
            <p>Please fill out all the fields.</p>
          </div>

          <div class="lg:col-span-2">
            
          <form action="index.php?action=SignIn" method="post" class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
              <div class="md:col-span-5">
                <label for="full">Full Name</label>
                <input type="text" name="full_name" id="first_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"  />
              </div>
              

              <div class="md:col-span-5">
                <label for="email">Email Address</label>
                <input type="text" name="email" id="email" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="email@domain.com" />
              </div>

              <div class="md:col-span-3">
                <label for="NumeroTelephone">Numero de Telephone</label>
                <input type="text" name="NumeroTelephone" id="NumeroTelephone" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"   />
              </div>

              <div class="md:col-span-2">
                <label for="password">Password</label>
                <input type="text" name="password" id="password" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"  />
              </div>
              <div class="md:col-span-5 text-right">
                <div class="inline-flex items-end">
                  <input type="submit" value="submit"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                </div>
                <div class="ml-3 text-sm">
                              <label for="terms" class="font-light text-gray-500 dark:text-gray-300">I already have an account<a class="font-medium text-primary-600 hover:underline dark:text-primary-500" href="index.php?action=viewFormUser">   login</a></label>
                            </div>
              </div>

           
          
          </form>
      </div>
    </div>

    
  </div>
</div>

<?php
$content = ob_get_clean();
require_once("views/layout.php");