
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SB Admin</title>
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/css/all.min.css') ?>" rel="stylesheet" />
    <style type="text/css">
        .bg-donker{
            background: #7db9e8; /* Old browsers */
            background: -moz-linear-gradient(top,  #7db9e8 0%, #2989d8 0%, #2989d8 33%, #207cca 44%, #1e5799 91%); /* FF3.6-15 */
            background: -webkit-linear-gradient(top,  #7db9e8 0%,#2989d8 0%,#2989d8 33%,#207cca 44%,#1e5799 91%); /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(to bottom,  #7db9e8 0%,#2989d8 0%,#2989d8 33%,#207cca 44%,#1e5799 91%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#7db9e8', endColorstr='#1e5799',GradientType=0 ); /* IE6-9 */
        }
    </style>
</head>
<body class="bg-light">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header bg-donker text-light"><h3 class="text-center font-weight-light my-4"><i class="fas fa-sign-in"></i> Login</h3></div>
                                
                                <div class="card-body">
                                    <form hx-post="<?= base_url('auth/login') ?>" hx-target="#messages" hx-refresh="true">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="inputEmail" type="email" placeholder="name@example.com" />
                                            <label for="inputEmail">Email address</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="inputPassword" type="password" placeholder="Password" />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select class="form-control" name="semester_id">
                                                <?php foreach ($semester_id as $key => $value): ?>
                                                    <?php
                                                    $tahun = substr($value['semester_id'], 0, 4);
                                                    $tahun1 = $tahun+1;
                                                    $semester = substr($value['semester_id'], 4);
                                                    ?>
                                                    <option value="<?= $value['semester_id'] ?>"><?= $tahun.'/'.$tahun1.' Semester '.$semester ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <label>Tahun Ajaran</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                            <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="#">Forgot Password?</a>
                                            <button class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div id="messages" class="container"></div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="#">Need an account? Sign up!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="<?= base_url('assets/js/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.bundle.js') ?>"></script>
    <script src="<?= base_url('assets/js/htmx.js') ?>"></script>
    <script type="text/javascript">
        let messages = $('#messages').text(); 
        $('form').submit(function(e) {
            console.log(messages);
        });
    </script>
</body>
</html>
