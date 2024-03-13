<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="#"><img class="logo-img"
                        src="{{asset('assets/images/logo.png')}}" alt="logo"></a><span class="splash-description">Please
                    enter your user information.</span></div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" type="text" placeholder="Username"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" type="password"
                            placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span
                                class="custom-control-label">Remember Me</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="" data-toggle="modal" data-target="#exampleModal">
                        Create User
                    </a>
                </div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <form  id="basicform" >
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </a>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputUserName">User Name</label>
                            <input id="inputUserName" type="text" name="name" data-parsley-trigger="change" required=""
                                placeholder="Enter user name" autocomplete="off" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Email address</label>
                            <input id="inputEmail" type="email" name="email" data-parsley-trigger="change" required=""
                                placeholder="Enter email" autocomplete="off" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="input-select">Register As</label>
                            <select class="form-control" name="roles" id="input-select">
                                <option>Select</option>
                                <option value="1">Employee</option>
                                <option value="2">Captain</option>
                                <option value="3">Manager</option>
                                <option value="4">Client</option>
                                <option value="5">Owner</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                <label class="be-checkbox custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input"><span
                                        class="custom-control-label">Remember me</span>
                                </label>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                        <button class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"
    integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        
$(document).ready(function () {
    $("#basicform").validate({
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true,
            },
            roles:{
                required: true,
            }
        },
        messages: {
            name: {
                required: "Please enter your name",
                minlength: "Name must be at least 2 characters long"
            },
            email: {
                required: "Please enter your name",
                email: "Enter valid email-address"
            },
            roles:{
                required: "please select",
            }

        }
    });
    $('#basicform').on('submit', function (e) {
        
    
        if($('#basicform').valid())
      {
        e.preventDefault();
        $.ajax({
            url: "https://thewall.host4india.in/bughunter/public/api/user/store",
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                $('#basicform').trigger('reset');
                Swal.fire({
                    title: "User Successfully registered",
                    width: 600,
                    padding: "3em",
                    color: "#716add",
                    background: "#fff url(/images/trees.png)",
                    backdrop: `
                                rgba(0,0,123,0.4)
                                url("/images/nyan-cat.gif")
                                left top
                                no-repeat
                            `
                });
                if (response.success) {
                    // Close the modal
                    $('#exampleModal').modal('hide');
                }
            },
            error: function (xhr, status, error) {
                var errorMessage = xhr.status + ': ' + xhr.statusText;
                //alert( xhr.responseText);
                var data=xhr.responseText;
                var jsonResponse = JSON.parse(data);
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: `Name: ${jsonResponse.name}\nEmail: ${jsonResponse.email}\nPassword: ${jsonResponse.password}\nPassword Confirmation: ${jsonResponse.password_confirmation}`,
                });
                
            }
        });
        }
    });
 
});

    </script>
</body>

</html>