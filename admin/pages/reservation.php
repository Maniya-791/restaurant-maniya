<?php include "../conn.php"; ?>
<?php include "../components/sidebar.php"; ?>

<?php
$sql = "SELECT * FROM reservations";
$data = mysqli_query($connection, $sql);
$totaldata = mysqli_num_rows($data);
?>
<h1 class="py-3 text-center">RESERVATIONS</h1>
<div class="container">
    <div class="row">
        <!-- table  -->
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Total Reserved Tables: <span class="text-danger mx-3"><?php echo $totaldata ?></span></h4>

                    <div class="table-responsive">
                        <?php
                        if (isset($_GET['error'])) {
                            if ($_GET['error'] == "delete") {
                                echo '<div id="derror" class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> The reservation has been deleted.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
                            } elseif ($_GET['error'] == "notdelete") {
                                echo '<div id="derror" class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> The reservation could not be deleted.
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
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact Number</th>
                                    <th>Check-in Date</th>
                                    <th>Check-in Time</th>
                                    <th>Guests</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($totaldata > 0) {
                                    while ($reservation = mysqli_fetch_assoc($data)) {
                                ?>
                                        <tr>
                                            <td> <?php echo $reservation["reservation_id"] ?> </td>
                                            <td> <?php echo $reservation["name"] ?> </td>
                                            <td> <?php echo $reservation["email"] ?> </td>
                                            <td> <?php echo $reservation["contact_number"] ?> </td>
                                            <td> <?php echo $reservation["check_in_date"] ?> </td>
                                            <td> <?php echo $reservation["check_in_time"] ?> </td>
                                            <td> <?php echo $reservation["number_of_guests"] ?> </td>
                                            <td>
                                                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?php echo $reservation['reservation_id']; ?>" data-name="<?php echo $reservation['name']; ?>" data-email="<?php echo $reservation["email"] ?>" data-contact="<?php echo $reservation["contact_number"] ?>" data-date="<?php echo $reservation["check_in_date"] ?>" data-time="<?php echo $reservation["check_in_time"] ?>" data-guests="<?php echo $reservation["number_of_guests"] ?>">
                                                    <i class="mdi mdi-pencil text-success fs-1"></i>
                                                </button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?php echo $reservation['reservation_id']; ?>">
                                                    <i class="mdi mdi-delete text-danger fs-1"></i>
                                                </button>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='9'>No Reservations Found</td></tr>";
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
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Reservation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../logics/update_reservation.php" method="post">
                <div class="modal-body">
                    <!-- form fields -->
                    <input type="hidden" id="reservation_id" name="reservation_id">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact Number</label>
                        <input type="text" class="form-control" id="contact" name="contact_number">
                    </div>
                    <div class="form-group">
                        <label for="date">Check-in Date</label>
                        <input type="text" class="form-control" id="date" name="check_in_date">
                    </div>
                    <div class="form-group">
                        <label for="time">Check-in Time</label>
                        <input type="text" class="form-control" id="time" name="check_in_time">
                    </div>
                    <div class="form-group">
                        <label for="guests">Number of Guests</label>
                        <input type="number" class="form-control" id="guests" name="number_of_guests">
                    </div>
                    <!-- form fields -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="editresbtn" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Reservation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this reservation?
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
        const deleteButtons = document.querySelectorAll('button[data-bs-target="#deleteModal"]');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const reservationId = this.getAttribute('data-id');
                const deleteConfirmLink = document.getElementById('delete-confirm');
                deleteConfirmLink.href = `../logics/delete_res.php?id=${reservationId}`;
            });
        });

        $('#editModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); 
            var id = button.data('id');
            var name = button.data('name');
            var email = button.data('email');
            var contact = button.data('contact');
            var date = button.data('date');
            var time = button.data('time');
            var guests = button.data('guests');

            var modal = $(this);
            modal.find('#reservation_id').val(id);
            modal.find('#name').val(name);
            modal.find('#email').val(email);
            modal.find('#contact').val(contact);
            modal.find('#date').val(date);
            modal.find('#time').val(time);
            modal.find('#guests').val(guests);
        });

        setTimeout(function() {
            $("#derror").hide();
        }, 2000);
    });
</script>
