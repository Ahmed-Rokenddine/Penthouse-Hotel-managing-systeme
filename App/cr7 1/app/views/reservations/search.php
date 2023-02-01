<?php require APPROOT . '/views/inc/header.php'; ?>
<?php if( isset($_SESSION['message'])) {?>
<div id="alertt" class=" container col-md-6 alert alert-warning alert-dismissible fade show shadow mt-5 text-center" role="alert">
  <strong><?php  echo $_SESSION['message'];      ?></strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php unset($_SESSION['message']) ; } ?>
  <div class="row mb-3 " style="margin-right: -24px;    margin-left: 1px;">
    <div class="text-center title mt-5">
      <h1>Your Bookings</h1>
    </div>
    <div class="row row-cols-1 row-cols-md-12 g-4">
    <?php foreach($data['reservations'] as $reservations) : ?>
    <div class=" col-12 mt-5 mb-5 text-center" id="<?php echo $reservations->resID; ?>">
    <div class=" card text-center shadow border border-dark" >
  <div class="card-header">
  <h4 class="p-2 title text-dark">  <?php echo $reservations->title; ?></h4>
  <button  class="btn btn-outline-dark float-right noni" onclick="printDiv('<?php echo $reservations->resID; ?>')"><i class="bi bi-printer " style="font-size: 1.6rem;  margin: 0.3rem;"></i>Print</button>
  </div>
  <div class="card-body">
    <h5 class="card-title">arrival : <?php echo $reservations->arrival ?></h5>
    <h5 class="card-title"> departure : <?php echo $reservations->departure ?></h5>
    <?php foreach($data['guests'] as $guests ) : ?>
      <?php 
          if($guests->reservationid	 == $reservations->resID){?>
            <div class="d-flex justify-content-around"><h5 class="card-title">name : <?php echo $guests->name ?></h5><h5 class="card-title">Birthday : <?php echo $guests->bday ?></h5></div>
            <?php }?>
      
    <?php endforeach; ?>
    <h5 class="card-title">Total Price : <?php echo $reservations->Total ?> £</h5>
    <a href="<?php echo URLROOT; ?>/reservations/edit/<?php echo $reservations->resID; ?>" type="button" class="btn btn-outline-success col mr-2 mt-2 noni" >Modify</a>
    <form class="col mt-2 noni" type="button" action="<?php echo URLROOT; ?>/reservations/delete/<?php echo $reservations->resID; ?>" method="post">
             <input type="submit" value="Delete" class="btn btn-outline-danger col ">
    </form>
    
    
  </div>
  <div class="card-footer text-muted">
  <?php echo $_SESSION['user_name'] ?>
  </div>
</div>
      </div>
    
  <?php endforeach; ?>
    
  




    <div class="col-md-6">
      
    </div>
  </div>
 
  
  
<div class="mt-5">
<?php require APPROOT . '/views/inc/footer.php'; ?>
 </div>
 <script> var div = document.getElementById("alertt");          div.style.transition = "opacity 6s";          div.addEventListener("transitionend", function(event) {            if (event.propertyName === "opacity" && parseFloat(event.srcElement.style.opacity) === 0) {                div.style.display = "none";                console.log(event);            }        });          setTimeout(() => {              div.style.opacity = 0;          }, 100)</script>
 