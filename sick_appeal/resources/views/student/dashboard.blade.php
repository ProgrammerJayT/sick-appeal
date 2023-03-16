<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>SickTest Application</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Adamina&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC&amp;display=swap">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="../assets/css/animate.min.css">
    <link rel="stylesheet" href="../assets/css/Floating-Button.css">
    <link rel="stylesheet" href="../assets/css/Soft-UI-Aside-Navbar.css">
</head>

<body>
    <section>
        <div>
            {{--
            <aside id="sidenav-main" class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-left ms-3">
                <div class="sidenav-header"><i class="fa fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute right-0 top-0 d-none d-xl-none"></i><a class="navbar-brand m-0" href="" style="margin-right: -13px;padding-right: 44px;"><img class="navbar-brand-img h-100 w-15" src="../assets/img/medical-icon-png-6589.png" style="margin-right: -6px;"><span class="ms-2 font-weight-bolder" style="font-family: 'Alegreya Sans SC', sans-serif;font-size: 20px;padding-left: 0px;margin-right: 10px;padding-right: 20px;"><span style="color: rgb(203, 12, 159);">Sick Test Management</span></span></a>
                    <hr class="horizontal dark mt-0">
                    <div id="sidenav-collapse-main" class="collapse navbar-collapse w-auto">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link active" href=""><i class="fas fa-home active icon icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center"></i><span class="nav-link-text ms-1" style="font-family: 'Alegreya Sans SC', sans-serif;">Dashboard<br></span></a></li>
                            <li class="nav-item"><a class="nav-link" href=""><i class="icon-calendar icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"></i><span class="nav-link-text ms-1" style="font-family: 'Alegreya Sans SC', sans-serif;">Previous Applications</span></a></li>
                            <li class="nav-item"><a class="nav-link" href=""><i class="icon-note icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"></i><span class="nav-link-text ms-1" style="font-family: 'Alegreya Sans SC', sans-serif;">New Application</span></a></li>
                            <li class="nav-item"><a class="nav-link" href=""><i class="fa fa-table icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"></i><span class="nav-link-text ms-1" style="font-family: 'Alegreya Sans SC', sans-serif;">Tables<br></span></a></li>
                            <li class="nav-item mt-3"><span class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6" style="font-family: 'Alegreya Sans SC', sans-serif;">User Management</span></li>
                            <li class="nav-item"><a class="nav-link" href=""><i class="icon-wrench icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"></i><span class="nav-link-text ms-1" style="font-family: 'Alegreya Sans SC', sans-serif;">Profile<br></span></a></li>
                            <li class="nav-item"><a class="nav-link" href=""><i class="icon-power icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"></i><span class="nav-link-text ms-1" style="font-family: 'Alegreya Sans SC', sans-serif;">Sign Out</span></a></li>
                        </ul>
                    </div>
                </div>
            </aside>
            --}}
            <div class="container">
                <div class="row">
                    <div class="col-md-6" style="margin-right: -421px;padding-right: 420px;">
                        <div>
                            <aside id="sidenav-main-1" class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-left ms-3">
                                <div class="sidenav-header"><i class="fa fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute right-0 top-0 d-none d-xl-none"></i><a class="navbar-brand m-0" href="" style="margin-right: -13px;padding-right: 44px;"><img class="navbar-brand-img h-100 w-15" src="../assets/img/medical-icon-png-6589.png" style="margin-right: -6px;"><span class="ms-2 font-weight-bolder" style="font-family: 'Alegreya Sans SC', sans-serif;font-size: 20px;padding-left: 0px;margin-right: 10px;padding-right: 20px;"><span style="color: rgb(203, 12, 159);">Sick Test Management</span></span></a>
                                    <hr class="horizontal dark mt-0">
                                    <div id="sidenav-collapse-main-1" class="collapse navbar-collapse w-auto">
                                        <ul class="navbar-nav">
                                            <li class="nav-item"><a class="nav-link active" href={{Route('Student_Dashboard')}}><i class="fas fa-home active icon icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center"></i><span class="nav-link-text ms-1" style="font-family: 'Alegreya Sans SC', sans-serif;">Dashboard<br></span></a></li>
                                            <li class="nav-item"><a class="nav-link" href={{Route('Student_History')}}><i class="icon-calendar icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"></i><span class="nav-link-text ms-1" style="font-family: 'Alegreya Sans SC', sans-serif;">Previous Applications</span></a></li>
                                            <li class="nav-item"><a class="nav-link" href={{Route('Student_Application')}}><i class="icon-note icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"></i><span class="nav-link-text ms-1" style="font-family: 'Alegreya Sans SC', sans-serif;">New Application</span></a></li>
                                            <li class="nav-item"><a class="nav-link" href={{Route('Student_Dashboard')}}><i class="fa fa-table icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"></i><span class="nav-link-text ms-1" style="font-family: 'Alegreya Sans SC', sans-serif;">Tables<br></span></a></li>
                                            <li class="nav-item mt-3"><span class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6" style="font-family: 'Alegreya Sans SC', sans-serif;">User Management</span></li>
                                            <li class="nav-item"><a class="nav-link" href={{Route('Student_Profile')}}><i class="icon-wrench icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"></i><span class="nav-link-text ms-1" style="font-family: 'Alegreya Sans SC', sans-serif;">Profile<br></span></a></li>
                                            <li class="nav-item"><a class="nav-link" href={{Route('Student_Signout')}}><i class="icon-power icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"></i><span class="nav-link-text ms-1" style="font-family: 'Alegreya Sans SC', sans-serif;">Sign Out</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                    <div class="col-md-6" style="padding-right: 0px;margin-right: 0px;">
                        <div>
                            <h1 class="text-center" style="margin-top: 30px;font-family: 'Alegreya Sans SC', sans-serif;font-weight: bold;color: rgb(203,12,159);">Dashboard</h1>
                            <hr>
                        </div>

{{--  if there are no applications



                        <div style="padding-left: 0px;margin-top: 50px;margin-left: 0px;">
                            <h1 class="text-center" style="font-family: 'Alegreya Sans SC', sans-serif;">You Currently <br>Have No Applications Yet<br><br><br><button class="btn btn-outline-secondary border-secondary shadow justify-content-center align-items-center align-content-center" type="button" style="margin-left: -1px;">Apply For Sick Test</button></h1>
                        </div>

--}}




{{--
                        <div style="padding-left: 0px;margin-top: 50px;margin-left: 0px;">
                            <div class="row">
                                <div class="col" style="margin-top: 112px;margin-right: 0px;padding-right: 0px;padding-left: 0px;margin-left: -19px;">
                                    <div>
                                        <lottie-player src="../assets/js/77622-remote-work-management.json" mode="normal" loop="" autoplay=""></lottie-player>
                                    </div>
                                </div>





                                 <div class="col" style="margin-left: 25px;">
                                    <h1 class="text-start" style="text-align: left;font-family: 'Alegreya Sans SC', sans-serif;">Hey, Username<br><button class="btn btn-outline-primary border rounded-pill shadow" type="button">View Application History</button></h1>
                                    <hr>
                                    <div class="row" style="margin-bottom: 20px;">
                                        <div class="col">
                                            <div class="card shadow border-start-primary py-2" data-bss-hover-animate="pulse">
                                                <div class="card-body">
                                                    <div class="row align-items-center no-gutters">
                                                        <div class="col me-2">
                                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span class="text-dark" style="font-family: 'Alegreya Sans SC', sans-serif;color: rgb(33, 37, 41);font-size: 15px;">Number Of Applications</span></div>
                                                            <div class="text-dark fw-bold h5 mb-0"><span style="font-family: 'Alegreya Sans SC', sans-serif;">10</span></div>
                                                        </div>
                                                        <div class="col-auto"><i class="icon-pie-chart fs-4 fa-2x text-gray-300"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 20px;">
                                        <div class="col">
                                            <div class="card shadow border-start-primary py-2" data-bss-hover-animate="pulse">
                                                <div class="card-body">
                                                    <div class="row align-items-center no-gutters">
                                                        <div class="col me-2">
                                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span style="font-family: 'Alegreya Sans SC', sans-serif;color: rgb(33, 37, 41);font-size: 15px;">Successfull Applications</span></div>
                                                            <div class="text-dark fw-bold h5 mb-0"><span style="font-family: 'Alegreya Sans SC', sans-serif;">9</span></div>
                                                        </div>
                                                        <div class="col-auto"><i class="icon-like fs-4 fa-2x text-gray-300"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 20px;">
                                        <div class="col">
                                            <div class="card shadow border-start-primary py-2" data-bss-hover-animate="pulse">
                                                <div class="card-body">
                                                    <div class="row align-items-center no-gutters">
                                                        <div class="col me-2">
                                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span style="font-family: 'Alegreya Sans SC', sans-serif;color: rgb(33, 37, 41);font-size: 15px;">Unsuccessful Applications</span></div>
                                                            <div class="text-dark fw-bold h5 mb-0"><span style="font-family: 'Alegreya Sans SC', sans-serif;">1</span></div>
                                                        </div>
                                                        <div class="col-auto"><i class="icon-dislike fs-4 fa-2x text-gray-300"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row" style="margin-bottom: 20px;">
                                        <div class="col">
                                            <div class="card shadow border-start-primary py-2" data-bss-hover-animate="pulse">
                                                <div class="card-body">
                                                    <div class="row align-items-center no-gutters">
                                                        <div class="col me-2">
                                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span style="font-family: 'Alegreya Sans SC', sans-serif;color: rgb(33, 37, 41);font-size: 15px;">Pending Applications</span></div>
                                                            <div class="text-dark fw-bold h5 mb-0"><span style="font-family: 'Alegreya Sans SC', sans-serif;">0</span></div>
                                                        </div>
                                                        <div class="col-auto"><i class="icon-exclamation fs-4 fa-2x text-gray-300"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

 --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/lottie-player.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
</body>

</html>
