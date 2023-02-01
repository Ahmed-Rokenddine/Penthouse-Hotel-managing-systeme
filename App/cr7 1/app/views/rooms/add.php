<?php require APPROOT . '/views/inc/header.php'; ?>
  <a href="<?php echo URLROOT; ?>/rooms" class="btn btn-secondary mt-5"><i class="fa fa-backward"></i> Back</a>
  <div class="card card-body bg-light mt-5">
    <h2 class="title text-center">ROOM ADD</h2>
    
    <form action="<?php echo URLROOT; ?>/rooms/add" method="post">
      <div class="form-group">
        <label for="title">Title: <sup>*</sup></label>
        <input type="text" name="title" class="form-control form-control-lg text-center <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
        <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="title">Price: <sup>*</sup></label>
        <input type="text" name="Price" class="form-control form-control-lg text-center<?php echo (!empty($data['Price_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['Price']; ?>">
        <span class="invalid-feedback"><?php echo $data['Price_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="title">Type is : <sup>*</sup></label>
        <select id= "id1" onchange="myFunction()"   name="type" class="form-control form-control-lg text-center" value="<?php echo $data['type']; ?>">
          <option value="Single">Single</option>
          <option value="Double">Double</option>
          <option value="Suite"  >Suite</option>
        <select>
      </div>
      <div class="form-group">
        <label for="title"> Statut: <sup>*</sup></label>
        <select   name="Statut" class="form-control form-control-lg text-center" value="<?php echo $data['Statut']; ?>">
          <option value="0" selected>No</option>
          <option value="1">Yes</option>
        <select>
      </div>
      <div id="id2" class="form-group" >
          <label for="title">Suite type</label>
        <select  name="Suitetype" class="form-control form-control-lg text-center" value="<?php echo $data['Suitetype']; ?>">
            <option value="Standard">Standard suite rooms</option>
            <option value="Bridal">Bridal suites</option>
            <option value="Junior">Junior</option>
            <option value="Presidential">Presidential suite</option>
            <option value="Penthouse">Penthouse suites</option>
            <option value="Honeymoon">Honeymoon suites</option>
            
        </select>
      </div>
       <!-- Add club picture -->
       <div class="picture">
                    <label for="picture">Room picture</label>
                    <input type="file" class="form-control form-control-lg"name="picture" id="name" value="<?php echo $data['picture']; ?>" >
                    <!-- error message if product input or not found -->
                    <span style='color:red; padding: .5rem; border-radius: 3px;'><?php echo $data['picture_err'] ?></span>
       </div>
      
       </div>
       <div class="row align-items-center justify-content-center mt-5 -mb-5">
      <input type="submit" class="col-8 btn btn-success align-items-center justify-content-center mt-2" value="ADD ROOM">
      <a href="<?php echo URLROOT; ?>/rooms" class="col-6 btn btn-danger mt-3 text-white align-items-center justify-content-center mt-2" > cancel</a>
      </div>
    </form>
  
    <div class="mt-4">
  <?php require APPROOT . '/views/inc/footer.php'; ?>
  </div>