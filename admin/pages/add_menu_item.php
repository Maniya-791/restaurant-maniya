<?php include "../conn.php";?>
<?php include "../components/sidebar.php"; ?>
  
    <h1 class="py-3 text-center">Add Menu Item</h1>
    <div class="container">
      
      <div class="row">
      <div class="col-12 grid-margin stretch-card">
        
                <div class="card">
                  <div class="card-body">
                  <?php
    if (isset($_GET['status'])) {
      if ($_GET['status']=="sub") {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Congrats!</strong> Congrats! Your Item Has Been Added.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
      }elseif ($_GET['status']=="notsub") {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Congrats!</strong> Oops! Your Item Has Not Been Added.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      }
    }
    ?>
                    <h4 class="card-title">Create A Menu</h4>
                    <form class="forms-sample" action="<?php echo $path ?>/admin/logics/menu.php" method="post" id="add_menu_item">
                      <div class="form-group">
                        <label for="exampleInputName1">Menu Item Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Biryani etc" name="item_name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Menu Item Description</label>
                        <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Ingredients etc" name="item_description">
                      </div>
                
                      <div class="form-group">
                        <label for="exampleSelectGender">Select Category</label>
                        <select class="form-control" id="exampleSelectGender" name="item_category">
                          <option>Breakfast</option>
                          <option>Dinner</option>
                          <option>Lunch</option>
                          <option>Desert</option>
                          <option>Wine Card</option>
                          <option>Drinks & Tea</option>
                        </select>
                      </div>
        
                      <div class="form-group">
                        <label for="exampleInputCity1">Price</label>
                        <input type="text" class="form-control" id="exampleInputCity1" placeholder="250 etc" name="item_price">
                      </div>
                      <!-- <div class="form-group">
                        <label for="exampleTextarea1">Textarea</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                      </div> -->
                      <button type="submit" name="add_menu_btn" class="btn btn-primary mr-2">Submit</button>
                      <button type="reset" class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
      </div>
    </div>
          
    <?php include "../components/footer.php"; ?>      
    <script>
      // Wait for the DOM to be ready
$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("#add_menu_item").validate({
    // Specify validation rules
    rules: {
      
      item_name: {
        required: true,
        minlength:5,
        maxlength: 50
      },
      item_description: {
        required: true,
        minlength: 8
      },
      item_price:{
        required: true,
        min: 2,
      }
    },
    messages: {
      item_name: {
        required: "This Filed is Empty",
        minlength:5,
        maxlength: 50
      },
    },
    // Specify validation error messages
 
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});
     </script>