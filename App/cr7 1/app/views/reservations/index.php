<?php require APPROOT . '/views/inc/header.php'; ?>
<?php if( isset($_SESSION['message'])) {?>
<div id="alertt" class=" container col-md-6 alert alert-warning alert-dismissible fade show shadow mt-5 text-center" role="alert">
  <strong><?php  echo $_SESSION['message'];      ?></strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php unset($_SESSION['message']) ; } ?>
  <div class="row mb-3" style="   margin-left: 12px;">
    <div class="text-center mt-5 title">
      <h1>Rooms</h1>
    </div>
       
        <form action="<?php echo URLROOT; ?>/reservations" class="row row-cols-1  row-cols-md-3 g-4 align-items-center border border-warning bg-light rounded justify-content-center shadow"  method="POST">
          
          <div class="col-md-3 " >
                <div class="form-group">
                    <label for="input_from">From</label>
                    <input id="datefield"  type="date" name="arrival" class="form-control <?php if($_SERVER['REQUEST_METHOD'] == 'POST'){?> bg-secondary text-white <?php }?> " value="" required></input>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="form-group">
                    <label for="input_to">To</label>
                    <input  id="datefield1" type="date" name="departure" class="form-control <?php if($_SERVER['REQUEST_METHOD'] == 'POST'){?> bg-secondary text-white <?php }?>" value="" required></input>
                </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label >Fill all </label>
                <input type="submit" class="btn btn-dark align-items-center form-control justify-content-center " onclick='valuecatcher();look();' value="search">
              </div>
             </div>
          
            
               
             
            
           
         
      
          </form>
          <?php 
          if($_SERVER['REQUEST_METHOD'] == 'POST'){?>
          <div class="row justify-content-md-center border border-dark bg-light rounded row-cols-md-3 g-4 align-items-center shadow justify-content-md-center">
          <div class="col-3 ">
                
            
              <div class="form-group ">
                  <label for="title">Room Type</label>
                <select id= "id1" onchange="myFunction();Single();Double();Suite();look();" name="type" class="form-control " >
                  <option value="" disabled selected>Select your Room</option>
                  <option value="Single">Chambre Single</option>
                  <option value="Double" >Chambre Double</option>
                  <option value="Suite">Suite</option>
                </select>
              </div>
          </div>
          <div class="col-3 ">
          <div id="id2" class="form-group" >
          <label for="title">Suite type</label>
        <select id="id3" onchange="junior();stan();Bridal();Presi();Pent();honey();look();" name="Suitetype" class="form-control " >
            <option value="" disabled selected>Select your Suite Type</option>
            <option value="Standard">Standard suite rooms</option>
            <option value="Bridal">Bridal suites</option>
            <option value="Junior">Junior</option>
            <option value="Presidential">Presidential suite</option>
            <option value="Penthouse">Penthouse suites</option>
            <option value="Honeymoon">Honeymoon suites</option>
            
        </select>
        </div>
        </div>
      </div>
      <?php }
          
          ?>

          <div class="row row-cols-1 row-cols-md-2 g-4" id="22" >
   
   
   
   
   
   
<?php foreach($data['rooms'] as $room) : ?>
  <?php if($room->Occupied == 0) { ?>  
        
        
       
  
    <div class="roomies" id="<?php echo $room->type; ?>" name="<?php if($room->type == 'Suite'){echo $room->Suitetype;} ?>" >
    <div  >
      <div class="card border border-warning rounded shadow-lg" id="roomy">
       <div >
        <img src="<?php echo URLROOT;?>/public/img/rooms/<?php echo $room->picture; ?>" class="card-img-top" style="max-height: 225px;" alt="...">
        <div class="card-body">
          <div class="d-flex"><h5 class="p-2"><?php echo $room->title; ?></h5><h4 class=" text-warning ml-auto p-2"><?php echo $room->Price; ?>$</h4></div>
          <p class="card-text">Type: <?php echo $room->type; ?> <?php if($room->type == 'Suite'){echo $room->Suitetype;} ?></p>
          <p class="card-text"> Max : 
          <?php 
          if($room->type == 'Suite'){?>
            6  <i class="bi bi-people-fill" style="font-size: 1.6rem;  margin: 0.3rem;"></i>
            <?php }
          
          
          elseif($room->type == 'Double'){?>
            2 <i class="bi bi-people-fill" style="font-size: 1.6rem;  margin: 0.3rem;"></i>
            <?php }
         
          else{?>
            1 <i class="bi bi-person-fill" style="font-size: 1.6rem;  margin: 0.3rem;"></i>
            <?php }
          
          ?>
          
        
        
        
        
        
        
        </p>
         
          <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <div class="row "> 
          
           
          </div> 
          <?php 
          if($_SERVER['REQUEST_METHOD'] == 'POST'){?>
            <a href="<?php echo URLROOT; ?>/reservations/add/<?php echo $room->id; ?>" type="button" onclick="catchvalue()" class="btn btn-outline-dark col" >Reserve</a>
            <?php }
          
          ?>
          
        </div>
        </div>
      </div>
      </div>
    </div>
    <?php }
       ?>
  <?php endforeach; ?>
  </div>
  <div class="text-center mt-5 title" id="e6">  <h3>Sorry No Rooms are available</h3> </div>



  

 
  
  
<?php require APPROOT . '/views/inc/footer.php'; ?>
<script>
     var div = document.getElementById("alertt");          div.style.transition = "opacity 6s";          div.addEventListener("transitionend", function(event) {            if (event.propertyName === "opacity" && parseFloat(event.srcElement.style.opacity) === 0) {                div.style.display = "none";                console.log(event);            }        });          setTimeout(() => {              div.style.opacity = 0;          }, 100)</script>