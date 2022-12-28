<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="row mb-3">
    <div class="col-md-6">
      <h1>Rooms</h1>
    </div>
    <div class="col-md-6">
      <a href="<?php echo URLROOT; ?>/rooms/add" class="btn btn-primary pull-right">
        <i class="fa fa-pencil"></i> Add a Room
      </a>
    </div>
  </div>
  <div class="row row-cols-1 row-cols-md-3 g-4">
  <?php foreach($data['rooms'] as $room) : ?>
    <div class="col">
      <div class="card">
        <img src="<?php echo URLROOT;?>/public/img/<?php echo $room->picture; ?>" class="card-img-top" alt="...">
        <div class="card-body">
          <div class="d-flex"><h5 class="p-2"><?php echo $room->title; ?></h5><h4 class=" text-warning ml-auto p-2"><?php echo $room->Price; ?>$</h4></div>
          <p class="card-text">Type: <?php echo $room->type; ?> <?php if($room->type == 'Suite'){echo $room->Suitetype;} ?></p>
          <p class="card-text"> statuts (Occupied) : <?php if($room->Occupied == 0){echo 'No';} else {echo 'Yes';} ;?></p>
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
  
  
<?php require APPROOT . '/views/inc/footer.php'; ?>