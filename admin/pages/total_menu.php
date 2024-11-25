<?php include "../conn.php"; ?>
<?php include "../components/sidebar.php"; ?>

<?php
$sql = "SELECT * FROM menu_items ";
$data = mysqli_query($connection, $sql);
$totaldata = mysqli_num_rows($data);
?>
<h1 class="py-3 text-center">Total Menu Item</h1>
<div class="container">
  <div class="row">
    <!-- table  -->
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Total Menu Items: <span class="text-danger mx-3"><?php echo $totaldata ?></span></h4>

          </p>
          <div class="table-responsive">
            <?php
            if (isset($_GET['error'])) {
              if ($_GET['error'] == "delete") {
                echo '<div id="derror" class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Congrats!</strong> Congrats! Your Item Has Been Deleted.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
              } elseif ($_GET['error'] == "notdelete") {
                echo '<div  id="derror" class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Congrats!</strong> Oops! Your Item Has Not Been Deleted.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
              }
            }
            ?>
            <table class="table table-dark">
              <thead>
                <tr>
                  <th> # </th>
                  <th> Item Name </th>
                  <th> Category </th>
                  <th> Price </th>
                  <th> Date </th>
                  <th> Edit </th>
                  <th> Delete </th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (mysqli_num_rows($data) > 0) {
                  while ($packets = mysqli_fetch_assoc($data)) {
                ?>
                    <tr>
                      <td> <?php echo $packets["item_id"] ?> </td>
                      <td> <?php echo $packets["item_name"] ?> </td>
                      <td> <?php echo $packets["item_category"] ?> </td>
                      <td> <?php echo $packets["item price"] ?> </td>
                      <td> <?php echo $packets["item_date"] ?></td>
                      <td>
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?php echo $packets['item_id']; ?>" data-name="<?php echo $packets['item_name']; ?>" data-category="<?php echo $packets["item_category"] ?>" data-price="<?php echo $packets["item price"] ?> " data-description="<?php echo $packets["item_desc"] ?>">
                          <i class="mdi mdi-pencil text-success fs-1"></i>
                        </button>
                      </td>
                      <td>
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?php echo $packets['item_id']; ?>">
                          <i class="mdi mdi-delete text-danger fs-1"></i>
                        </button>
                      </td>
                    </tr>
                <?php
                  }
                } else {
                  echo "Data Not Found";
                }
                ?>


              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- table  -->
  </div>
</div>


<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Your Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../logics/update.php" method="post">
        <div class="modal-body">
          <!-- form fields -->
          <input type="hidden" id="itemid" name="item_id">
          <div class="form-group">
            <label for="exampleInputName1">Menu Item Name</label>
            <input type="text" class="form-control" id="name" placeholder="Biryani etc" name="item_name">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Menu Item Description</label>
            <input type="text" class="form-control" id="desc" placeholder="Ingredients etc" name="item_description">
          </div>

          <div class="form-group">
            <label for="exampleSelectGender">Select Category</label>
            <select class="form-control" name="item_category">
              <option id="cat"></option>
              <option>Dinner</option>
              <option>Lunch</option>
              <option>Desert</option>
              <option>Breakfast</option>
              <option>Wine Card</option>
              <option>Drinks & Tea</option>
            </select>
          </div>

          <div class="form-group">
            <label for="exampleInputCity1">Price</label>
            <input type="text" class="form-control" id="price" placeholder="250 etc" name="item_price">
          </div>
          <!-- form fields -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Your Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to delete this item?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
        <a href="#" id="delete-confirm" class="btn btn-primary">Yes</a>
      </div>
    </div>
  </div>
</div>


<?php include "../components/footer.php"; ?>
<script>
  document.addEventListener('DOMContentLoaded', function() {


    const deleteButtons = document.querySelectorAll('button[data-bs-target="#exampleModal"]');

    deleteButtons.forEach(button => {
      button.addEventListener('click', function() {
        const itemId = this.getAttribute('data-id');
        const deleteConfirmLink = document.getElementById('delete-confirm');

        // Update the link to point to the correct delete URL
        deleteConfirmLink.href = `<?php echo $path; ?>admin/logics/menudelete.php?id=${itemId}`;
      });
    });

    $(document).on('show.bs.modal', '#editModal', function(event) {
      var button = $(event.relatedTarget); // Button that triggered the modal
      var id = button.data('id'); // Extract info from data-* attributes
      var name = button.data('name');
      var description = button.data('description');
      var category = button.data('category');
      var price = button.data('price');

      // Update the modal's content
      var modal = $(this);
      modal.find('#itemid').val(id);
      modal.find('#name').val(name);
      modal.find('#desc').val(description);
      modal.find('#cat').text(category);
      modal.find('#price').val(price);
      // modal.find('#edit-confirm').attr('href', '../logics/update.php?id=' + id);
    });

    

    const myTimeout = setTimeout(errorhide, 2000);

    function errorhide() {
      $("#derror").hide();
    }

  });
</script>