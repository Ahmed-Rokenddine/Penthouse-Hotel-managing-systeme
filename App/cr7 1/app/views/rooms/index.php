<?php require APPROOT . '/views/inc/header.php'; ?>
</section>
</div>

<div class="text-center mt-5 title">
      <h1 class="mt-5 text-white">---------</h1>
      <?php if( isset($_SESSION['message'])) {?>
<div id="alertt" class=" container col-md-6 alert alert-warning alert-dismissible fade show shadow mt-5 text-center" role="alert">
  <strong><?php  echo $_SESSION['message'];      ?></strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php unset($_SESSION['message']) ; } ?>
      <h1 class="mt-5">DASHBOARD</h1>
    </div>
  <ul class="nav nav-tabs justify-content-center mt-5">
    <li class="nav-item mt-5">
      <a class="nav-link active" data-toggle="tab" href="#tab1">ROOMS</a>
    </li>
    <li class="nav-item mt-5">
      <a class="nav-link" data-toggle="tab" href="#tab2">RESERVATIONS</a>
    </li>
   
  </ul>
  <div class="tab-content bg-light">
    <div id="tab1" class="tab-pane active">
    <div class="container ">
    <div class="row mb-3">
    <div class="col-md-12 text-center mt-5 title">
      
      <h1>Rooms</h1>
    </div>
    <div class=" float-right text-center mt-5">
      <a href="<?php echo URLROOT; ?>/rooms/add" class="btn btn-primary float-right">
         Add a Room <i class="fa fa-plus"></i>
      </a>
    </div>
  </div>
  <div class="row row-cols-1 row-cols-md-2 g-4">
  <?php foreach($data['rooms'] as $room) : ?>
    <div class="col">
      <div class="card border border-warning rounded shadow">
        <img src="<?php echo URLROOT;?>/public/img/rooms/<?php echo $room->picture; ?>" class="card-img-top"  style="max-height: 225px;"alt="...">
        <div class="card-body">
          <div class="d-flex"><h5 class="p-2"><?php echo $room->title; ?></h5><h4 class=" text-warning ml-auto p-2"><?php echo $room->Price; ?>$</h4></div>
          <p class="card-text">Type: <?php echo $room->type; ?> <?php if($room->type == 'Suite'){echo $room->Suitetype;} ?></p>
          <p class="card-text"> Under-Maintenance <i class="bi bi-bandaid-fill"></i>: <?php if($room->Occupied == 0){echo 'No';} else {echo 'Yes';} ;?></p>
          <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <div class="row "> 
          <a href="<?php echo URLROOT; ?>/rooms/edit/<?php echo $room->id; ?>" type="button" class="btn btn-outline-success col mr-2" >Modify</a>
          <form class="col" type="button" action="<?php echo URLROOT; ?>/rooms/delete/<?php echo $room->id; ?>" method="post">
             <input type="submit" value="Delete" class="btn btn-outline-danger col ">
          </form>
           
          </div> 
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  </div>
    </div>
    </div>
    <div id="tab2" class="tab-pane bg-light">
    <div class="container">
    <div class="col-md-12 text-center pt-5 title">
      <h1>Reservations</h1>
    </div>
  <?php foreach($data['reservations'] as $reservations) : ?>
    <div class="col mt-5 mb-5 text-center">
      <div class="card border border-dark shadow-lg">
        
        <div class="card-body">
          <h5 class="p-2"> Room : <?php echo $reservations->title; ?></h5>
          <h4 class=" text-warning ml-auto p-2"> User :<?php echo $reservations->name; ?></h4> 
          <p class="card-text"> arrival : <?php echo $reservations->arrival ?></p>
          <p class="card-text"> departure : <?php echo $reservations->departure ?></p>
          <p class="card-text"> Total Price : <?php echo $reservations->Total ?> $$</p>
          <div class="row "> 
          <?php foreach($data['guests'] as $guests ) : ?>
            
      <?php 
          if($guests->reservationid	 == $reservations->resID){?>
          
            <div class="d-flex justify-content-around"><h5 class="p-2"> Guest :</h5><h5 class="card-title">name : <?php echo $guests->name ?></h5><h5 class="card-title">age : <?php echo $guests->bday ?></h5></div>
            <?php }?>
      
    <?php endforeach; ?>
          </div> 
        </div>
      </div>
    </div>
  <?php endforeach; ?>
    </div>
   
  </div>
</div>




 
 
  
<div class="mt-4">
  <?php require APPROOT . '/views/inc/footer.php'; ?>
</div>
<script> var div = document.getElementById("alertt");          div.style.transition = "opacity 6s";          div.addEventListener("transitionend", function(event) {            if (event.propertyName === "opacity" && parseFloat(event.srcElement.style.opacity) === 0) {                div.style.display = "none";                console.log(event);            }        });          setTimeout(() => {              div.style.opacity = 0;          }, 100)</script>