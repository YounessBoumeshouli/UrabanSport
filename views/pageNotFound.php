<?php
$title = "Page Not Found";
ob_start();

?>
<section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                
               Page Not Found
            </a>
           
        </div>
      </section>
<?php
$content = ob_get_clean();
require_once("views/layout.php");