<?php
$title = "reserver an equipement";
ob_start();
?>

    <!-- end header section -->



  <!-- trainer section -->

  <section class="trainer_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Our Equipements
        </h2>
      </div>
      <div class="row">
       <?php
       while($row = $result->fetch_assoc()){
        ?>
 <div class="col-lg-4 col-md-6 mx-auto">
          <div class="box">
            <div class="name">
              <h5>
               <?=$row["Nom_Equipement"]?>
              </h5>
            </div>
            <div class="img-box">
              <img src="images/t1.jpg" alt="">
            </div>
            <div class="social_box">
              <a href="">
                <img src="images/facebook-logo.png" alt="">
              </a>
              <div class="text-black"><?=$row["Quantite"]?></div>
              <a href="index.php?action=ChooseEquipement&id=<?=$row["ID_Equipement"]?>">
                <p class="w-7">reserve</p>
              </a>
            </div>
          </div>
        </div>
<?php
       }
       ?>
      </div>
    </div>
  </section>

  <!-- end trainer section -->

  <!-- info section -->
  <section class="info_section layout_padding2">
    <div class="container">
      <div class="info_items">
        <a href="">
          <div class="item ">
            <div class="img-box box-1">
              <img src="" alt="">
            </div>
            <div class="detail-box">
              <p>
                Location
              </p>
            </div>
          </div>
        </a>
        <a href="">
          <div class="item ">
            <div class="img-box box-2">
              <img src="" alt="">
            </div>
            <div class="detail-box">
              <p>
                +02 1234567890
              </p>
            </div>
          </div>
        </a>
        <a href="">
          <div class="item ">
            <div class="img-box box-3">
              <img src="" alt="">
            </div>
            <div class="detail-box">
              <p>
                demo@gmail.com
              </p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </section>
  <?php
  $content = ob_get_clean();
  require_once("views/layoutUser.php");