<?php
$title = "One Activiter reserve page";
ob_start();
while($row = $result->fetch_assoc()){
?>

<div class="antialiased text-gray-900 ">
  <div class="bg-gray-200 min-h-screen p-8 flex items-center justify-center">
    <div class="bg-white rounded-lg overflow-hidden shadow-2xl xl:w-1/5 lg:w-1/4 md:w-1/3 sm:w-1/2">
      <!--E11-->
      <!-- <div class="h-48 bg-cover bg-center" style="background-image:url('https://images.unsplash.com/photo-1570797197190-8e003a00c846?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=968&q=80')"></div>-->
      <img class="h-48 w-full object-cover object-end" src="https://images.unsplash.com/photo-1570797197190-8e003a00c846?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=968&q=80" alt="Home in Countryside" />
      <div class="p-6">
        <div class="flex items-baseline">
          <span class="inline-block bg-teal-200 text-teal-800 py-1 px-4 text-xs rounded-full uppercase font-semibold tracking-wide"><?=$row["activite_name"]?></span>
          <div class="ml-2 text-gray-600 text-xs uppercase font-semibold tracking-wide">
         from  :<?=$row["date_debut"]?> &bull;to : <?=$row["date_fin"]?>
          </div>
        </div>
        <h4 class="mt-2 font-semibold text-lg leading-tight truncate"><?=$row["Description"]?></h4>

        <div class="mt-1">
          <span>$1,900.00</span>
          <span class="text-gray-600 text-sm">/ wk</span>
        </div>
        <div class="mt-2 flex items-center">
          <span class="text-teal-600 font-semibold">
            <span>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
              <span>
              </span>
              <span class="ml-2 text-gray-600 text-sm"><?=$row["Capacité"]?> place available</span>
        </div>
        <a href="index.php?action=Activityreserved&idClient=<?=$_SESSION["user_id"]?>&idActivity=<?=$row["id_activite"]?>" class="bg-green-500">Reserve Now</a>
      </div>
    </div>
  </div>

</div>

<?php
}
$content= ob_get_clean();
require_once("views/layoutUser.php");