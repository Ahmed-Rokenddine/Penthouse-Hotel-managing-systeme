<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>/reservations" class="btn btn-light  mt-5"><i class="fa fa-backward"></i> Back</a>
<div class="row mb-3" style="margin-right: -24px;    margin-left: 1px;">
 
    <div class="text-center title"  >
      <h1>Reservation :</h1>
    </div>
       
    </div>
  </div>
  <form action="<?php echo URLROOT; ?>/reservations/add/<?php echo $data['id']; ?>" method="post">
  <div class="col-md-3 " >
                
            </div>
            
            <div class="col-md-3">
               
            </div>
  <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
  <div ><h2 class="text-warning title"><?php echo $data['title']; ?></h2></div>
  <div class=" d-flex col-md-12 justify-content-center "><div class="form-group">
                    <label for="input_from">From</label>
                    <input  readOnly id="datefield2" type="date" name="arrival" class="form-control " value="" ></input>
                </div><i class="bi bi-arrow-right-circle-fill" style="font-size: 2rem; color: gold ; margin:1.1rem;"></i>  <div class="form-group">
                    <label for="input_to">To</label>
                    <input  readOnly id="datefield3" type="date" name="departure" class="form-control " value="" ></input>
                </div>
        </div>
  <img src="<?php echo URLROOT;?>/public/img/rooms/<?php echo $data['picture']; ?>" class="card-img-top" style="max-width: 881px;" alt="...">
  
  <div class="d-flex col-md-12 justify-content-around "><h3 class="card-text fw-bold"> <?php echo $data['type']; ?> <?php if($data['type'] == 'Suite'){ echo $data['Suitetype']; } ?></h3><div class="d-flex h4"><div  id="box"> <?php echo $data['Price']; ?></div><div class=" h5 text-secondary">\night</div></div></div>
  <div class="d-flex col-md-12 justify-content-center "></div>
  
  <div class="d-flex col-md-12 justify-content-center "><p class="card-text"> Max : 
          <?php 
          if($data['type'] == 'Suite'){?>
            6  <i class="bi bi-people-fill" style="font-size: 1.6rem;  margin: 0.3rem;"></i>
            <?php }
          
          
          elseif($data['type'] == 'Double'){?>
            2 <i class="bi bi-people-fill" style="font-size: 1.6rem;  margin: 0.3rem;"></i>
            <?php }
         
          else{?>
            1 <i class="bi bi-person-fill" style="font-size: 1.6rem;  margin: 0.3rem;"></i>
            <?php }
          
          ?>
          
        
        
        
        
        
        
        </p>
        </div>
  <div class="d-flex col-md-12 justify-content-center "><p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p></div>
  <div class="d-flex col-md-12 justify-content-center "><div class="d-flex justify-content-center"><h4 class="text-secondary"> Total Price :<h4><div id="data" class="h4  font-italic ml-3" ></div> <h4 class="text-secondary"> £<h4> </div> <div class="ml-5 border border-dark shadow rounded-circle text-center d-flex"><p class="card-text mt-2 ml-2 mr-1 fw-bolder" >  - <p class=" h5 fw-bold title mt-2 " id="discount"> <?php if($data['discount'] < '10') { echo $data['discount'];}?><?php if($data['discount'] >= '10') { echo '10';}?><p class="mt-2 mr-2 ml-1fw-bolder"> %</p> </div><?php if($data['discount'] != ''){?><img src="<?php echo URLROOT;?>/public/img/discount.png" style="width: 3.6rem; margin-top: -10px;" alt=""> <?php }?></div>
  <input  readOnly id="totalito" name="total"  value="" style="visibility: hidden;" >
  
  </div>

        <?php if($data['type'] == 'Suite'|| $data['type'] == 'Double') { ?>  
    <div class="row align-items-center justify-content-center mt-5 -mb-5">
      <legend class="col-form-label col-sm-3 pt-0 text-center">Will Someone Join You ?</legend>
      <div class="col-sm-2 d-flex align-items-center justify-content-center ">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="showInput" id="Yes" onclick="hideI();" >
          <label class="form-check-label" for="gridRadios1"> Yes </label>
        </div>
        <div class="form-check ml-4">
          <input class="form-check-input" type="radio" name="showInput" id="No" onclick="showI();" checked>
          <label class="form-check-label" for="gridRadios2"> No </label>
        </div>
        
      </div>
    
  


  <div id="confirm">
  
  <h5 class="text-center mt-3">How many ?</h5>
  <div class="container">
      <select class="form-select mt-3 mb-5 text-center" name="guestnum" id ="guetsss" aria-label="Default select example" onchange="addRows()">
      
        
        <option selected value="1">One</option>
        <?php if($data['type'] == 'Suite') { ?>  
        <option value="2">Two</option>
        <option value="3">Three</option>
        <option value="4">Four</option>
        <option value="5">Five</option>
        
        <?php }
       ?>
       </select>
       
        <table class="table table-striped table-dark mt-5 mb-5 " id="table22">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col " style="    text-align: center;"> Name</th>
        <th scope="col " style="    text-align: center;">Birth Date</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td><input type="text" name="gname[]" class="form-control"></td>
        <td><input type="date" name="g-age[]" class="form-control " style="    text-align: center;"></td>
      </tr> 
    </tbody>
  </table>
  </div>
  </div>
  <?php }
    ?>
        <div class="row align-items-center justify-content-center mt-5 -mb-5">
        <input type="submit" class=" col-8 btn btn-success align-items-center justify-content-center " value="Confirm Reservation">
        <a href="<?php echo URLROOT; ?>/reservations" class=" col-6 btn btn-danger align-items-center justify-content- mt-2 " > Cancel</a>
        </div>
      
      
      
      
    

 
  
      
 
    </form>
    </div>
  
<div class="mt-5">
<?php require APPROOT . '/views/inc/footer.php'; ?>
</div>
<script>
  
</script>