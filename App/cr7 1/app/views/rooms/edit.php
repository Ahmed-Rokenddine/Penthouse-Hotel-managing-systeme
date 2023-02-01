
<?php require APPROOT . '/views/inc/header.php'; ?>
  <a href="<?php echo URLROOT; ?>/rooms" class="btn btn-light mt-5"><i class="fa fa-backward"></i> Back</a>
  <div class="card card-body bg-light mt-5">
    <h2 class="title text-center">ROOM EDIT</h2>
    
    <form action="<?php echo URLROOT; ?>/rooms/edit/<?php echo $data['id']; ?>" method="post">
      <div class="form-group">
        <label for="title">Title: <sup>*</sup></label>
        <input type="text" name="title" class="form-control form-control-lg text-center <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
        <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
      </div>
      <div class="form-group">
      <label for="Price">Price: <sup>*</sup></label>
        <input type="text" name="Price" class="form-control form-control-lg text-center<?php echo (!empty($data['Price_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['Price']; ?>">
        <span class="invalid-feedback"><?php echo $data['Price_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="title">Type is : <sup>*</sup></label>
        <select id= "id1" onchange="myFunction()"   name="type" class="form-control form-control-lg text-center" value="<?php echo $data['type']; ?>">
          <option value="Single" <?php if($data['type'] == 'Single'){echo 'selected';} ?>>Single</option>
          <option value="Double" <?php if($data['type'] == 'Double'){echo 'selected';} ?>>Double</option>
          <option value="Suite"  <?php if($data['type'] == 'Suite'){echo 'selected';} ?>>Suite</option>
        <select>
      </div>
      <div class="form-group">
        <label for="title"> Statut: <sup>*</sup></label>
        <select   name="Statut" class="form-control form-control-lg text-center" value="<?php echo $data['Statut']; ?>">
          <option value="0" <?php if($data['Occupied'] == '0'){echo 'selected';} ?>>No</option>
          <option value="1"<?php if($data['Occupied'] == '1'){echo 'selected';} ?>>Yes</option>
        <select>
      </div>
      <?php 
          if($data['type'] == 'Suite'){?>
            <div   class="form-group" >
          <label for="title">Suite type</label>
        <select  name="Suitetype" class="form-control form-control-lg" value="<?php echo $data['Suitetype']; ?>">
            <option value="Standard" <?php if($data['Suitetype'] == 'Standard'){echo 'selected';} ?>>Standard suite rooms</option>
            <option value="Bridal" <?php if($data['Suitetype'] == 'Bridal'){echo 'selected';} ?>>Bridal suites</option>
            <option value="Junior" <?php if($data['Suitetype'] == 'Junior'){echo 'selected';} ?>>Junior</option>
            <option value="Presidential" <?php if($data['Suitetype'] == 'Presidential'){echo 'selected';} ?>>Presidential suite</option>
            <option value="Penthouse" <?php if($data['Suitetype'] == 'Penthouse'){echo 'selected';} ?>>Penthouse suites</option>
            <option value="Honeymoon" <?php if($data['Suitetype'] == 'Honeymoon'){echo 'selected';} ?>>Honeymoon suites</option>
        </select>
      </div>
            <?php }
          
          ?>
      
      <div class="picture ">
                    <label for="picture">Room picture:</label>
                    <input type="file" class="form-control form-control-lg text-center" name="picture" id="name" value="" >

       </div>       
                    
       </div>
       <div class="row align-items-center justify-content-center mt-5 -mb-5">
      <input type="submit" class="col-8 btn btn-success align-items-center justify-content-center mt-2" value="EDIT ROOM">
      <a href="<?php echo URLROOT; ?>/rooms" class="col-6 btn btn-danger mt-3 text-white align-items-center justify-content-center mt-2" > cancel</a>
      </div>
    </form>
  
    <div class="mt-4">
  <?php require APPROOT . '/views/inc/footer.php'; ?>
  </div>