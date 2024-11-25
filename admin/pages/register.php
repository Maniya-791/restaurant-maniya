<!DOCTYPE html>
<html lang="en">
<?php include("../conn.php"); ?>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Corona Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo $path?>admin/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo $path?>admin/assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo $path?>admin/assets/css/styles.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo $path?>admin/assets/images/favicon.png?v=2" />
  <style>
    .error {
      color: red;
      margin: 6px 0px;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="row w-100 m-0">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              <div id="error"></div>
              <h3 class="card-title text-left mb-3">Register</h3>
              <form id="signupform" action="<?php echo $path?>admin/logics/authentication.php" method="post">
                <div class="form-group">
                  <label for="fullname">Username</label>
                  <input type="text" name="fullname" id="fullname" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="useremail">Email</label>
                  <input type="email" name="useremail" id="useremail" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="userpassword">Password</label>
                  <input type="password" name="userpassword" id="userpassword" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="userconfirmpassword">Confirm Password</label>
                  <input type="password" name="userconfirmpassword" id="userconfirmpassword" class="form-control" required>
                </div>

                <div class="text-center">
                  <button type="submit" name="signupbtn" class="btn btn-primary btn-block enter-btn">Signup</button>
                </div>

                <p class="sign-up text-center">Already have an Account?<a href="../../index.php">login</a></p>

              </form>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../assets/js/off-canvas.js"></script>
  <script src="../../assets/js/hoverable-collapse.js"></script>
  <script src="../../assets/js/misc.js"></script>
  <script src="../../assets/js/settings.js"></script>
  <script src="../../assets/js/todolist.js"></script>
  <!-- endinject -->

  <!-- validation and AJAX js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>
  <script>
    $(document).ready(function () {
      $("#signupform").validate({
        rules: {
          fullname: "required",
          useremail: {
            required: true,
            email: true
          },
          userpassword: {
            required: true,
            minlength: 6
          },
          userconfirmpassword: {
            required: true,
            minlength: 6,
            equalTo: "#userpassword"
          }
        },
        messages: {
          fullname: "Please enter your username",
          useremail: "Please enter a valid email address",
          userpassword: {
            required: "Please provide a password",
            minlength: "Your password must be at least 6 characters long"
          },
          userconfirmpassword: {
            required: "Please confirm your password",
            minlength: "Your password must be at least 6 characters long",
            equalTo: "Passwords do not match"
          }
        },
        submitHandler: function (form) {
          $.ajax({
            url: $(form).attr('action'),
            type: $(form).attr('method'),
            data: $(form).serialize(),
            dataType: 'json',
            success: function (response) {
              if (response.status === 'success') {
                if (response.message=="Signup") {
                   location.replace("http://localhost/cooking/admin/index.php")  
                }
                $("#error").html(`<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Congrats!</strong> ${response.message}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>`);
                // Optionally redirect or take another action
                // window.location.href = "http://localhost/cooking/admin/";
              } else {
                $("#error").html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Oops!</strong> ${response.message}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>`);
              }
            },
            error: function (xhr, status, error) {
              console.error("Form submission failed: " + error);
              $("#error").html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Oops!</strong> There was an error with your signup. Please try again.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>`);
            }
          });
        }
      });
    });
  </script>
  <!-- end validation and AJAX js -->
</body>

</html>
