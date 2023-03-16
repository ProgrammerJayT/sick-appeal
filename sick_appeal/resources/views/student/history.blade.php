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
    <link rel="stylesheet" href="../assets/css/Floating-Button.css">
    <link rel="stylesheet" href="../assets/css/Soft-UI-Aside-Navbar.css">
</head>

<body>
    <section>
        <div>
            <aside id="sidenav-main" class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-left ms-3">
                <div class="sidenav-header"><i class="fa fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute right-0 top-0 d-none d-xl-none"></i><a class="navbar-brand m-0" href="" style="margin-right: -13px;padding-right: 44px;"><img class="navbar-brand-img h-100 w-15" src="../assets/img/medical-icon-png-6589.png" style="margin-right: -6px;"><span class="ms-2 font-weight-bolder" style="font-family: 'Alegreya Sans SC', sans-serif;font-size: 20px;padding-left: 0px;margin-right: 10px;padding-right: 20px;"><span style="color: rgb(203, 12, 159);">Sick Test Management</span></span></a>
                    <hr class="horizontal dark mt-0">
                    <div id="sidenav-collapse-main" class="collapse navbar-collapse w-auto">
                    </div>
                </div>
            </aside>
            <div class="container">
                <div class="row">
                    <div class="col-md-6" style="margin-right: -421px;padding-right: 420px;">
                        <div>
                            <aside id="sidenav-main-1" class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-left ms-3">
                                <div class="sidenav-header"><i class="fa fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute right-0 top-0 d-none d-xl-none"></i><a class="navbar-brand m-0" href="" style="margin-right: -13px;padding-right: 44px;"><img class="navbar-brand-img h-100 w-15" src="../assets/img/medical-icon-png-6589.png" style="margin-right: -6px;"><span class="ms-2 font-weight-bolder" style="font-family: 'Alegreya Sans SC', sans-serif;font-size: 20px;padding-left: 0px;margin-right: 10px;padding-right: 20px;"><span style="color: rgb(203, 12, 159);">Sick Test Management</span></span></a>
                                    <hr class="horizontal dark mt-0">
                                    <div id="sidenav-collapse-main-1" class="collapse navbar-collapse w-auto">
                                        <ul class="navbar-nav">
                                            <li class="nav-item"><a class="nav-link" href={{Route('Student_Dashboard')}}><i class="icon-home icon icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center"></i><span class="nav-link-text ms-1" style="font-family: 'Alegreya Sans SC', sans-serif;">Dashboard<br></span></a></li>
                                            <li class="nav-item"><a class="nav-link active" href={{Route('Student_History')}}><i class="icon-calendar text-light active icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"></i><span class="nav-link-text ms-1" style="font-family: 'Alegreya Sans SC', sans-serif;">Previous Applications</span></a></li>
                                            <li class="nav-item"><a class="nav-link" href={{Route('Student_Application')}}><i class="icon-note icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"></i><span class="nav-link-text ms-1" style="font-family: 'Alegreya Sans SC', sans-serif;">New Application</span></a></li>
                                            <li class="nav-item"><a class="nav-link" href={{Route('Student_Dashboard')}}><i class="fa fa-table icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"></i><span class="nav-link-text ms-1" style="font-family: 'Alegreya Sans SC', sans-serif;">Tables<br></span></a></li>
                                            <li class="nav-item mt-3"><span class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6" style="font-family: 'Alegreya Sans SC', sans-serif;">User Management</span></li>
                                            <li class="nav-item"><a class="nav-link" href={{Route('Student_Profile')}}><i class="icon-wrench icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"></i><span class="nav-link-text ms-1" style="font-family: 'Alegreya Sans SC', sans-serif;">Profile<br></span></a></li>
                                            <li class="nav-item"><a class="nav-link" href={{Route('Student_Signout')}}><i class="icon-power active icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"></i><span class="nav-link-text ms-1" style="font-family: 'Alegreya Sans SC', sans-serif;">Sign Out</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                    <div class="col-md-6" style="padding-right: 0px;margin-right: 0px;">
                        <div>
                            <h1 class="text-center" style="margin-top: 30px;font-family: 'Alegreya Sans SC', sans-serif;font-weight: bold;color: rgb(203,12,159);">Previous Applications</h1>
                            <hr>
                        </div>
                        <div style="padding-left: 0px;margin-top: 50px;margin-left: 0px;">
                            <div class="card shadow" style="font-family: 'Alegreya Sans SC', sans-serif;">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 fw-bold">Previous Applications</p>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 text-nowrap">
                                            <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Show&nbsp;<select class="d-inline-block form-select form-select-sm">
                                                        <option value="10" selected="">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select>&nbsp;</label></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                                        </div>
                                    </div>
                                    <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                                        <table class="table my-0" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th>Module</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Cmk210</td>
                                                    <td>Approved</td>
                                                    <td>2008/11/28</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td><strong>Module</strong></td>
                                                    <td><strong>Status</strong></td>
                                                    <td><strong>Date</strong></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 align-self-center">
                                            <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
                                        </div>
                                        <div class="col-md-6">
                                            <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                                <ul class="pagination">
                                                    <li class="page-item disabled"><a class="page-link" aria-label="Previous" href="#"><span aria-hidden="true">«</span></a></li>
                                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item"><a class="page-link" aria-label="Next" href="#"><span aria-hidden="true">»</span></a></li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
</body>

</html>
