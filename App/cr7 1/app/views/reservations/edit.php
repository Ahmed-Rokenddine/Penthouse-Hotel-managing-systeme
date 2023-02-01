
<?php require APPROOT . '/views/inc/header.php'; ?>
</section>
</div>
  
  <?php if( isset($_SESSION['message'])) {?>
<div id="alertt" class=" container col-md-6 alert alert-warning alert-dismissible fade show shadow mt-5 text-center" role="alert">
  <strong><?php  echo $_SESSION['message'];      ?></strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php unset($_SESSION['message']) ; } ?>
  <div class="card card-body bg-light  container shadow-lg " style="    margin-top: 7rem;">
    <h2 class="title">Edit reservation</h2>
    <p class="text-center">Feel free to apply your changes</p>
    <form action="<?php echo URLROOT; ?>/reservations/edit/<?php echo $data['id']; ?>" class="row row-cols-1  " method="post">
    <div class="col-md-6 " >
                <div class="form-group">
                    <label for="input_from">From</label>
                    <input id="datefield"  type="date" name="arrival" class="form-control  " value="<?php echo $data['arrival']; ?>" ></input>
                </div>
    </div>
            
    <div class="col-md-6">
                <div class="form-group">
                    <label for="input_to">To</label>
                    <input  id="datefield1" type="date" name="departure" class="form-control " value="<?php echo $data['departure']; ?>" min="" ></input>
                </div>
    </div>
     
      <input type="submit" class="btn btn-success mt-4" value="Modify">
      
      
      
    </form>
    <a href="<?php echo URLROOT; ?>/reservations/search" class="btn btn-danger mt-2"> Cancel</a>
  </div>
  <script>
     
    
  </script> 
<div class="mt-5">
<?php require APPROOT . '/views/inc/footer.php'; ?>
 </div>