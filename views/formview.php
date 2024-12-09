<?php
$title  = "add user";
ob_start();

?>
<div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
  <div class="container max-w-screen-lg mx-auto">
    <div>
      <h2 class="font-semibold text-xl text-gray-600">Responsive Form</h2>
      <p class="text-gray-500 mb-6">Form is mobile responsive. Give it a try.</p>

      <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
          <div class="text-gray-600">
            <p class="font-medium text-lg">Personal Details</p>
            <p>Please fill out all the fields.</p>
          </div>

          <div class="lg:col-span-2">
            
          <form action="" method="post" class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
              <div class="md:col-span-5">
                <label for="first_name">first Name</label>
                <input type="text" name="first_name" id="first_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"  />
              </div>
              <div class="md:col-span-5">
                <label for="last_name">last Name</label>
                <input type="text" name="last_name" id="last_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"  />
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
                <label for="city">City</label>
                <input type="text" name="city" id="city" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"  />
              </div>
              <div class="md:col-span-5 text-right">
                <div class="inline-flex items-end">
                  <input type="submit" value="submit"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                </div>
              </div>

           
          
          </form>
      </div>
    </div>

    <a href="https://www.buymeacoffee.com/dgauderman" target="_blank" class="md:absolute bottom-0 right-0 p-4 float-right">
      <img src="https://www.buymeacoffee.com/assets/img/guidelines/logo-mark-3.svg" alt="Buy Me A Coffee" class="transition-all rounded-full w-14 -rotate-45 hover:shadow-sm shadow-lg ring hover:ring-4 ring-white">
    </a>
  </div>
</div>

<?php
$content = ob_get_clean();
require_once("views/layout.php");