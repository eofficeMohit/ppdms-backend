<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    {{-- <x-navbars.sidebar activePage='dashboard'></x-navbars.sidebar> --}}
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Dashboard"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            {{-- <div class="row">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">weekend</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Today's Money</p>
                                <h4 class="mb-0">$53k</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than
                                lask week</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">person</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Today's Users</p>
                                <h4 class="mb-0">2,300</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than
                                lask month</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">person</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">New Clients</p>
                                <h4 class="mb-0">3,462</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than
                                yesterday</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">weekend</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Sales</p>
                                <h4 class="mb-0">$103,430</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than
                                yesterday</p>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="row mt-4">
                <div class="col-lg-4 col-md-6 mt-4 mb-4">
                    <div class="card z-index-2 ">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                <div class="chart">
                                    <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="mb-0 ">Website Views</h6>
                            <p class="text-sm ">Last Campaign Performance</p>
                            <hr class="dark horizontal">
                            <div class="d-flex ">
                                <i class="material-icons text-sm my-auto me-1">schedule</i>
                                <p class="mb-0 text-sm"> campaign sent 2 days ago </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-4 mb-4">
                    <div class="card z-index-2  ">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                            <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                                <div class="chart">
                                    <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="mb-0 "> Daily Sales </h6>
                            <p class="text-sm "> (<span class="font-weight-bolder">+15%</span>) increase in today
                                sales. </p>
                            <hr class="dark horizontal">
                            <div class="d-flex ">
                                <i class="material-icons text-sm my-auto me-1">schedule</i>
                                <p class="mb-0 text-sm"> updated 4 min ago </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 mb-3">
                    <div class="card z-index-2 ">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                            <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                                <div class="chart">
                                    <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="mb-0 ">Completed Tasks</h6>
                            <p class="text-sm ">Last Campaign Performance</p>
                            <hr class="dark horizontal">
                            <div class="d-flex ">
                                <i class="material-icons text-sm my-auto me-1">schedule</i>
                                <p class="mb-0 text-sm">just updated</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
<p class="badge bg-danger">Under Progress....</p>
            </div>
            <div class="row mb-4">
                <div class="col-lg-6 col-md-6 mb-md-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                            <div class="panel-heading">
                                                Employee
                                            </div>
                                    <div class="panel-body">
                                                <table class="table table-condensed table-striped">
                                <thead>
                                    <tr>
                                                <th></th>
                                      <th>Fist Name</th>
                                      <th>Last Name</th>
                                      <th>City</th>
                                      <th>State</th>
                                      <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle">
                                       <td><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></td>
                                        <td>Carlos</td>
                                        <td>Mathias</td>
                                        <td>Leme</td>
                                        <td>SP</td>
                                          <td>new</td>
                                    </tr>

                                    <tr>
                                        <td colspan="12" class="hiddenRow">
                                                        <div class="accordian-body collapse" id="demo1">
                                          <table class="table table-striped">
                                                  <thead>
                                                    <tr class="info">
                                                                                <th>Job</th>
                                                                                <th>Company</th>
                                                                                <th>Salary</th>
                                                                                <th>Date On</th>
                                                                                <th>Date off</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                        </thead>

                                                                        <tbody>

                                                    <tr data-toggle="collapse"  class="accordion-toggle" data-target="#demo10">
                                                                                <td> <a href="#">Enginner Software</a></td>
                                                                                <td>Google</td>
                                                                                <td>U$8.00000 </td>
                                                                                <td> 2016/09/27</td>
                                                                                <td> 2017/09/27</td>
                                                                                <td>
                                                                                    <a href="#" class="btn btn-default btn-sm">
                                                                              <i class="glyphicon glyphicon-cog"></i>
                                                                                        </a>
                                                                                </td>
                                                                            </tr>

                                                                             <tr>
                                        <td colspan="12" class="hiddenRow">
                                                        <div class="accordian-body collapse" id="demo10">
                                          <table class="table table-striped">
                                                  <thead>
                                                    <tr>
                                                                                <td><a href="#"> XPTO 1</a></td>
                                                                                <td>XPTO 2</td>
                                                                                <td>Obs</td>
                                                                            </tr>
                                                    <tr>
                                                                                <th>item 1</th>
                                                                                <th>item 2</th>
                                                                                <th>item 3 </th>
                                                                                <th>item 4</th>
                                                                                <th>item 5</th>
                                                                                <th>Actions</th>
                                                                            </tr>
                                                  </thead>
                                                  <tbody>
                                                    <tr>
                                                                                <td>item 1</td>
                                                                                <td>item 2</td>
                                                                                <td>item 3</td>
                                                                                <td>item 4</td>
                                                                                <td>item 5</td>
                                                                                <td>
                                                                                        <a href="#" class="btn btn-default btn-sm">
                                                                          <i class="glyphicon glyphicon-cog"></i>
                                                                                        </a>
                                                                                </td>
                                                                            </tr>
                                                  </tbody>
                                               </table>

                                          </div>
                                      </td>
                                    </tr>

                                                    <tr>
                                                                                <td>Scrum Master</td>
                                                                                <td>Google</td>
                                                                                <td>U$8.00000 </td>
                                                                                <td> 2016/09/27</td>
                                                                                <td> 2017/09/27</td>
                                                                                <td> <a href="#" class="btn btn-default btn-sm">
                                                                              <i class="glyphicon glyphicon-cog"></i>
                                                                                        </a>
                                                                                </td>
                                                                            </tr>


                                                    <tr>
                                                                                <td>Back-end</td>
                                                                                <td>Google</td>
                                                                                <td>U$8.00000 </td>
                                                                                <td> 2016/09/27</td>
                                                                                <td> 2017/09/27</td>
                                                                                <td> <a href="#" class="btn btn-default btn-sm">
                                                                              <i class="glyphicon glyphicon-cog"></i>
                                                                                        </a>
                                                                                </td>
                                                                            </tr>


                                                    <tr>
                                                                                <td>Front-end</td>
                                                                                <td>Google</td>
                                                                                <td>U$8.00000 </td>
                                                                                <td> 2016/09/27</td>
                                                                                <td> 2017/09/27</td>
                                                                                <td> <a href="#" class="btn btn-default btn-sm">
                                                                              <i class="glyphicon glyphicon-cog"></i>
                                                                                        </a>
                                                                                </td>
                                                                            </tr>


                                                  </tbody>
                                               </table>

                                          </div>
                                      </td>
                                    </tr>



                                    <tr data-toggle="collapse" data-target="#demo2" class="accordion-toggle">
                                         <td><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></td>
                                         <td>Silvio</td>
                                        <td>Santos</td>
                                        <td>São Paulo</td>
                                        <td>SP</td>
                                      <td> new</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="hiddenRow"><div id="demo2" class="accordian-body collapse">Demo2</div></td>
                                    </tr>
                                    <tr data-toggle="collapse" data-target="#demo3" class="accordion-toggle">
                                        <td><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></td>
                                        <td>John</td>
                                        <td>Doe</td>
                                        <td>Dracena</td>
                                        <td>SP</td>
                                      <td> New</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="hiddenRow"><div id="demo3" class="accordian-body collapse">Demo3 sadasdasdasdasdas</div></td>
                                    </tr>
                                </tbody>
                            </table>
                                        </div>

                                      </div>

                                  </div>
                                <div class="col-lg-6 col-5 my-auto text-end">
                                    <div class="dropdown float-lg-end pe-4">
                                        <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fa fa-ellipsis-v text-secondary"></i>
                                        </a>
                                        <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5"
                                            aria-labelledby="dropdownTable">
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a>
                                            </li>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Another
                                                    action</a></li>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Something
                                                    else here</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Companies</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Members</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Budget</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Completion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ asset('assets') }}/img/small-logos/logo-xd.svg"
                                                            class="avatar avatar-sm me-3" alt="xd">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Material XD Version</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="avatar-group mt-2">
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Ryan Tompson">
                                                        <img src="{{ asset('assets') }}/img/team-1.jpg" alt="team1">
                                                    </a>
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Romina Hadid">
                                                        <img src="{{ asset('assets') }}/img/team-2.jpg" alt="team2">
                                                    </a>
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Alexander Smith">
                                                        <img src="{{ asset('assets') }}/img/team-3.jpg" alt="team3">
                                                    </a>
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Jessica Doe">
                                                        <img src="{{ asset('assets') }}/img/team-4.jpg" alt="team4">
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> $14,000 </span>
                                            </td>
                                            <td class="align-middle">
                                                <div class="progress-wrapper w-75 mx-auto">
                                                    <div class="progress-info">
                                                        <div class="progress-percentage">
                                                            <span class="text-xs font-weight-bold">60%</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-info w-60"
                                                            role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ asset('assets') }}/img/small-logos/logo-atlassian.svg"
                                                            class="avatar avatar-sm me-3" alt="atlassian">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Add Progress Track</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="avatar-group mt-2">
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Romina Hadid">
                                                        <img src="{{ asset('assets') }}/img/team-2.jpg" alt="team5">
                                                    </a>
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Jessica Doe">
                                                        <img src="{{ asset('assets') }}/img/team-4.jpg" alt="team6">
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> $3,000 </span>
                                            </td>
                                            <td class="align-middle">
                                                <div class="progress-wrapper w-75 mx-auto">
                                                    <div class="progress-info">
                                                        <div class="progress-percentage">
                                                            <span class="text-xs font-weight-bold">10%</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-info w-10"
                                                            role="progressbar" aria-valuenow="10" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ asset('assets') }}/img/small-logos/logo-slack.svg"
                                                            class="avatar avatar-sm me-3" alt="team7">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Fix Platform Errors</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="avatar-group mt-2">
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Romina Hadid">
                                                        <img src="{{ asset('assets') }}/img/team-3.jpg" alt="team8">
                                                    </a>
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Jessica Doe">
                                                        <img src="{{ asset('assets') }}/img/team-1.jpg" alt="team9">
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> Not set </span>
                                            </td>
                                            <td class="align-middle">
                                                <div class="progress-wrapper w-75 mx-auto">
                                                    <div class="progress-info">
                                                        <div class="progress-percentage">
                                                            <span class="text-xs font-weight-bold">100%</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-success w-100"
                                                            role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ asset('assets') }}/img/small-logos/logo-spotify.svg"
                                                            class="avatar avatar-sm me-3" alt="spotify">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Launch our Mobile App</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="avatar-group mt-2">
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Ryan Tompson">
                                                        <img src="{{ asset('assets') }}/img/team-4.jpg" alt="user1">
                                                    </a>
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Romina Hadid">
                                                        <img src="{{ asset('assets') }}/img/team-3.jpg" alt="user2">
                                                    </a>
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Alexander Smith">
                                                        <img src="{{ asset('assets') }}/img/team-4.jpg" alt="user3">
                                                    </a>
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Jessica Doe">
                                                        <img src="{{ asset('assets') }}/img/team-1.jpg" alt="user4">
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> $20,500 </span>
                                            </td>
                                            <td class="align-middle">
                                                <div class="progress-wrapper w-75 mx-auto">
                                                    <div class="progress-info">
                                                        <div class="progress-percentage">
                                                            <span class="text-xs font-weight-bold">100%</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-success w-100"
                                                            role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ asset('assets') }}/img/small-logos/logo-jira.svg"
                                                            class="avatar avatar-sm me-3" alt="jira">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Add the New Pricing Page</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="avatar-group mt-2">
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Ryan Tompson">
                                                        <img src="{{ asset('assets') }}/img/team-4.jpg" alt="user5">
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> $500 </span>
                                            </td>
                                            <td class="align-middle">
                                                <div class="progress-wrapper w-75 mx-auto">
                                                    <div class="progress-info">
                                                        <div class="progress-percentage">
                                                            <span class="text-xs font-weight-bold">25%</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-info w-25"
                                                            role="progressbar" aria-valuenow="25" aria-valuemin="0"
                                                            aria-valuemax="25"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ asset('assets') }}/img/small-logos/logo-invision.svg"
                                                            class="avatar avatar-sm me-3" alt="invision">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Redesign New Online Shop</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="avatar-group mt-2">
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Ryan Tompson">
                                                        <img src="{{ asset('assets') }}/img/team-1.jpg" alt="user6">
                                                    </a>
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Jessica Doe">
                                                        <img src="{{ asset('assets') }}/img/team-4.jpg" alt="user7">
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> $2,000 </span>
                                            </td>
                                            <td class="align-middle">
                                                <div class="progress-wrapper w-75 mx-auto">
                                                    <div class="progress-info">
                                                        <div class="progress-percentage">
                                                            <span class="text-xs font-weight-bold">40%</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-info w-40"
                                                            role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                            aria-valuemax="40"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="card h-100">
                        <div class="card-header pb-0">
                            <h6>Voters overview</h6>
                            <p class="text-sm">
                                <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                                <span class="font-weight-bold">24%</span> this month
                            </p>
                        </div>
                                            <div class="svg-parent"><svg id="chart" class="" viewBox="0 0 432 488" preserveAspectRatio="xMidYMid meet" pointer-events="auto"><g class="regions"></g><g class="state-borders" fill="none" stroke-width="1.5"><path d="M368.2100605024375,243.4989926765191L368.165094457976,244.7482716429098L368.8845511693612,246.741254343901L368.72717001374576,248.51370578623175L369.5590418362849,249.25727282871833L369.71642299190034,251.5956918893612L369.1543474361306,253.1459951051233L367.535569835514,252.81855613663242L366.77114707966734,255.15323861573285L365.89430921266626,255.74197982002136L364.65774298997303,255.00057679457007L362.45440681135574,253.60432896332463L362.20709356681687,255.37130891461868L360.9030782774312,255.82918761626541L360.9930103663546,254.04074999855038L360.633282010662,250.8966101966913L359.576579965815,244.22234675038993L358.67725907658337,242.0734999593161L357.55310796504386,241.10801876359346L357.8453872540442,239.17576064138086L357.1708965871205,236.29610911790297L358.00276840965967,235.83412491994062L357.4406928538899,234.93186712868714L356.09171152004274,229.7970982469957L355.9792964088888,228.45073327985256L355.86688129773506,227.0593156758572L356.8561342758894,225.44587649969725L356.67627009804323,223.2115153828487L356.9460663648126,221.10768206720206L356.42895685350436,220.11037835966232L358.2950476986598,220.02170568994188L358.49739489873696,221.572924919763L359.9138252992768,221.196307865403L360.1836215660462,220.06604250396128L361.0829424552776,219.93302918637352L361.28528965535475,218.71333787437902L362.2295765890476,218.358382012636L363.2862786338949,215.7831025955789L363.84835418966463,217.29314401206744L365.2647845902043,217.75925407821552L366.92852823528256,217.40413226614857L367.1308754353597,220.28771220215162L366.43390174620527,222.19308523570663L369.8288381030543,223.30005079705575L370.503328769978,223.7205422561999L372.6167328596723,225.24687267504459L373.0663933042879,229.6867729644013L373.0214272598264,231.64969837594663L372.5268007707491,232.13463422627513L372.70666494859506,233.8750788802319L372.05465730390233,234.7997973266829L372.54928379297985,236.56005520728655L372.00969125944084,238.91213654592013L371.20030245913244,240.0103572813149L369.67145694743886,239.1977278572828L368.5922718803613,239.9883983544513L368.9295172138229,241.23970066169045L368.2100605024375,243.4989926765191M175.77787322911945,406.15438543327946L173.95674842842573,409.00771993206286L173.55205402827164,409.23507232161984L173.55205402827164,409.87572383634495L173.30474078373277,410.6402397904577L172.49535198342437,410.5782573728726L171.03395553842324,411.77641703789357L172.83259731688622,412.31340909035265L172.81011429465548,412.4786232698357L172.65273313904004,413.201357266982L172.135623627732,415.6370734271328L172.2255557166552,417.1638315817245L172.90004638357868,418.62817471833455L173.55205402827164,422.3383458886653L173.46212193934844,425.20125313055644L171.9557594498856,425.0365320698666L171.596031094193,426.04535237589914L172.9899784725019,426.78638046610513L173.4396389171177,427.5684433389141L173.77688425057931,434.5598616263122L173.59702007273313,435.7103767191842L172.24803873888573,435.87471307424585L167.88633242611263,435.217333289769L166.64976620341963,435.19678869318244L164.87360744718717,436.51146251329055L164.2890488691869,437.8873714474537L164.64877722487927,439.18077577398367L162.78268637972383,441.68448116150796L162.7377203352621,441.72551481495145L162.71523731303137,442.1358325029054L162.6702712685701,442.17686238925717L160.66928229002974,444.57651911308255L159.9273425564138,445.97066173957364L159.477682111798,447.8562434320329L160.71424833449146,449.49531513947204L161.90584851272297,450.3965831739276L163.27731286880135,450.6013950548511L165.8853434475725,450.2122456017893L165.41319998072595,451.19530412193694L163.95180353572482,450.7037979817993L162.2655768684158,450.97003620326745L160.6917653122605,450.7652387745385L159.07298771164392,451.01099472722245L154.75624744333254,452.89474212447465L152.4854621980228,453.0994568390155L151.9009036200223,453.44745376980063L149.6076353524818,455.2280248903346L148.77576352994265,456.5784110524018L148.61838237432698,457.74438456554185L149.1130088634045,458.5420134706204L148.28113704086536,459.6053400813795L148.3485861075576,462.2627743655155L147.08953686263362,464.08137880401324L145.80800459547868,464.7351188130317L143.9194307280925,465.981107348469L143.22245703893782,467.28808980312874L140.20973206001236,467.6352084979439L139.71510557093484,468.57436948598524L138.09632797031827,468.3089693854432L134.9711878802384,467.0226323939488L132.99268192392924,465.36835931896246L135.3983653026237,462.18102576606793L135.5107804137774,461.1181868946985L134.04938396877628,458.685165450309L134.47656139116134,458.2556984029617L135.30843321370048,456.6397842739358L134.38662930223813,455.9441806029515L133.73462165754518,454.69596204523714L134.54401045785357,453.7954279807409L135.48829739154667,452.5671821544626L135.69064459162382,450.3965831739276L136.5449994363937,448.59389026813096L137.46680334785606,447.01601616677704L136.23023712516283,445.8681643967666L135.5107804137774,446.31913716483075L134.0044179243148,445.72466462143973L135.1735350803158,442.93585372885093L134.67890859123827,441.7665481254312L135.4208483248542,439.5092041166811L135.48829739154667,438.1132290534713L135.78057668054703,436.4703844873533L134.20676512439172,434.60095630486563L132.8802668127753,435.2378777966299L132.2957082347748,436.01850269529353L131.28397223438924,436.6552328033882L130.06988903392653,436.16228794387985L130.04740601169578,436.1417474616197L129.9574739227728,436.0595846408702L129.1031190780027,434.86806293483295L128.8333228112333,433.61458431250026L129.17056814469515,431.0243598654458L130.18230414508048,428.2474925455808L129.05815303354143,426.9304549575541L126.49508849923131,425.9012492447812L127.93400192200193,423.80092781975355L127.05716405500107,422.4825659118913L127.23702823284748,421.3904950394153L126.09039409907723,422.07049600164925L123.34746538692093,421.9674724130309L124.51658254292192,420.9371016437707L124.89879392084549,419.5972510926923L123.61726165369055,419.1642867307584L120.28977436353375,417.0813182858652L122.40317845322784,415.9672303758259L122.98773703122833,414.91476413112946L124.35920138730648,414.4193939349537L125.07865809869168,415.65770899972654L127.97896796646341,415.7196151065575L129.30546627807985,416.0703990837003L129.12560210023344,415.16242712180235L130.20478716731145,413.0568206154486L131.73363267900527,412.767732099406L133.17254610177565,413.3871826627191L135.8480257472395,412.850330889533L137.8490147257794,413.46976904236044L138.81578468170324,410.82618137602833L141.4912643271673,410.7022212632785L141.96340779401385,409.44174519680416L142.95266077216843,408.28424055267146L142.5254833497836,407.64333564675314L140.52449437124324,406.8782501717279L138.9731658373189,407.0023280516838L138.4785393482416,406.3198518522173L139.6476565042426,405.5958852977216L140.5919434379357,404.4579556927715L140.88422272693606,402.6365824500783L140.1872490377816,402.2432198855558L140.38959623785877,399.92363921631704L142.41306823862965,399.8614883998184L143.19997401670707,398.70115479630374L143.76204957247683,396.9392591880378L144.2791590837851,396.87705968605474L145.20096299524744,396.56604682416724L145.94290272886337,397.3953576450434L147.08953686263362,397.1465834776219L148.2136879741729,398.203761094275L149.6526013969435,398.53536410504523L150.6868204195598,399.9650725353037L152.30559802017638,400.54509213272604L154.9585946434097,398.203761094275L155.1159757990249,397.2709726028056L155.38577206579453,395.05208434784544L157.29682895541146,394.0977666392871L159.36526700064405,393.4752540092643L160.87162949010667,393.620516267623L163.34476193549358,394.61644778743164L164.40146398034085,393.3299860751252L164.31153189141764,392.54128948551477L165.12092069172581,393.06018769518107L167.39170593703557,392.0845988743573L166.9195624701888,389.86261367117527L168.8531023820367,389.8002956033107L168.80813633757498,390.75572264400955L170.98898949396175,390.4441977459441L171.28126878296212,391.56556368987776L172.6302501168093,391.295636495247L172.85508033911697,390.13264634981897L174.85606931765733,389.4263648472654L176.20505065150473,386.7869808065768L176.81209225173575,387.5353482202108L178.8130812302761,387.51456233296904L179.59998700835354,386.391946395858L180.45434185312342,388.20043351815L180.72413811989304,390.75572264400955L180.07213047520008,392.76961365051005L179.33019074158415,397.0636551244569L179.3976398082766,398.2452130490322L178.09362451889092,402.01546547639055L177.6889301187366,403.79573616008565L175.77787322911945,406.15438543327946M207.7936968857623,338.0545833901276L207.99604408583946,338.3078521971803L208.58060266383995,338.37116597514057L208.98529706399427,338.7088163504323L209.03026310845576,338.28674730029394L207.7936968857623,338.0545833901276M122.98773703122833,414.91476413112946L122.9202879645361,413.6142912339898L121.52634058622698,413.71751827729065L119.88507996337967,412.0655753480642L118.51361560730152,412.10688201197706L118.51361560730152,410.28899358864646L116.89483800668472,411.01211446817126L115.90558502852991,410.8675005746163L114.9388150726063,410.7022212632785L113.81466396106657,409.1317319152436L111.49891267129556,407.7467143413026L110.6220748042947,407.62265958732576L109.27309347044752,405.6165718922423L108.23887444783122,405.6165718922423L108.35128955898517,404.37518435632614L107.51941773644603,403.7750399987695L108.26135747006197,402.4709609529235L106.26036849152183,402.0982868063205L103.78723604613515,399.73718374865393L101.87617915651799,398.8669382871243L100.21243551143971,398.5560883354567L99.537944844516,397.229510014879L98.86345417759253,393.84877407428723L97.98661631059167,390.1741880685811L97.289642621437,385.3313757606395L96.00811035428228,380.9193345064175L95.01885737612747,380.00293428897646L94.344366709204,376.93957033325773L93.93967230904991,376.39746764384256L93.24269861989524,373.456103746806L92.65814004189497,372.07841800695917L91.39909079697054,370.2824038223705L91.30915870804756,368.88251343008875L89.1732715961225,367.8792435463023L88.70112812927596,366.12278638250007L90.40983781881596,365.7462803919617L91.80378519712508,363.98867799183813L91.44405684143203,363.13045534015816L92.09606448612521,361.7693912391307L91.26419266358607,360.93152711432356L92.23096261950991,360.30298525856836L92.18599657504842,359.00360653197083L91.48902288589375,358.6472325808302L91.12929453020115,357.1164651656124L91.53398893035524,356.65499247900243L90.926947330124,354.4305821362681L89.1732715961225,354.68248154546563M88.70112812927596,366.12278638250007L87.1722826175826,363.7793763466385L85.73336919481198,359.21321960134367L86.47530892842792,358.01823970568796L84.00217648304147,357.0745158952351L82.81057630480927,353.5067767316349M234.63842542932343,247.61671758132377L236.0998218743248,248.4262108249671L237.358871119249,250.00058958377485L238.75281849755788,250.56883981193528L240.776290498329,250.4158637089795L242.3276190322531,249.21354052577732L245.49772516679445,249.34473483659679L246.37456303379508,248.79804042796673L248.55541619018186,248.9292594374598L250.19667681302917,248.2074582187015L250.30909192418312,251.92331071393085L249.58963521279793,254.06256881444784L251.81545441364574,254.84790458056392L252.66980925841608,255.8509890366209L253.20940179195486,254.69522196799147L255.00804357041784,253.4079116870576L259.2123687275755,255.0878133931747L260.17913868349933,254.82609341554814L260.69624819480737,256.24337846140685L262.35999183988565,256.2651758670818L264.0012524627334,254.17165970201722L264.33849779619527,252.99319623514305L263.48414295142516,252.0761829820002L264.29353175173355,250.69995378116596L264.1361505961179,249.23540678551217L263.3267617958097,248.29496186813037L264.8556073075033,247.15714289738588L265.62003006335,248.27308628169772L268.02571344204466,248.88552063486793L269.1498645535837,250.45957224480526L270.1840835762,250.9840074508607L271.1733365543548,250.50327991829283L272.0276913991247,251.26802475502126L274.56827291120385,252.57840366039642L276.18705051182064,254.45527112511826L278.0531413569761,254.65159645365782L278.9974282906692,255.3931147792477L278.59273389051486,257.37656396225395L280.0541303355162,258.1607437695603L280.16654544667017,257.2022647999703L282.14505140297956,256.5703173851811L282.23498349190277,258.31319159441324L282.72960998097983,259.1188167835528L285.06784429298204,259.68476059413837L285.69736891544426,262.09932332841703L284.5732178039045,263.20786178190934L281.8078060695175,263.3599722799399L280.75110402467067,263.7727928285829L277.8283111346682,266.16135249497614L276.50181282305175,268.4390424134878L276.41188073412854,270.32458389478785L278.23300553482227,274.0046047805903L278.0981074014378,275.0858725634809L276.59174491197496,275.215591566649L275.7149070449741,275.97214460478534L276.5242958452825,275.34530348229924L278.90749620174597,275.4101567833875L279.4021226908235,276.29630796304826L275.46759380043545,279.1254654705514L274.70317104458877,280.2691385576315L275.28772962258904,282.25309552412483L273.8712992220494,283.37374404953823L271.7129290878938,284.66615888421546L269.3072457091994,287.7866787236396L267.21632464173626,289.05527556553113L262.18012766203947,290.43064579847066L259.14491966088303,291.48314925524636L254.3560359257251,293.9301154676676L251.70303930249202,295.81737230170785L250.3315749464141,297.2533163268572L248.89266152364348,298.17446447106767L246.39704605602606,300.65776450157654L245.72255538910235,301.89851303715903L244.77826845540926,301.2568212788392L245.7000723668716,301.94128680410773L243.33935503263865,304.80551846801353L242.57493227679197,306.3645559034897L241.72057743202208,307.1330539512041L239.67462240902023,310.0129218778187L236.6394144078638,312.82576651933846L236.34713511886343,313.76272249013573L233.51427431778416,315.3803307277066L229.5122963607041,317.37971556690445L227.3988922710098,319.37762882907356L225.93749582600844,320.82201743336566L224.85831075893066,322.838643416455L222.13786506900533,325.4050630075431L220.06942702377273,326.2105585099651L219.64224960138768,326.7403633875493L215.39295839976876,328.7315364691631L213.03224106553603,330.19224925321834L209.74971981984095,333.1325701859349L208.71550079722465,335.01363999261446L208.71550079722465,335.9220327434618L210.37924444230293,336.2388469959311L209.7272367976102,339.21521904200824L209.6822707531485,340.79716587683697L208.49067057491675,341.05019868567683L204.42124355114402,343.2843848663954L202.8474319949887,343.6425417799953L200.86892603867955,344.5903972085086L198.48572568221584,344.04278401304305L196.1250083479831,344.1059752606034L194.25891750282767,345.09579758253983L193.494494746981,346.1694914659786L192.52772479105693,349.74572380574756L190.57170185697828,351.637329305188L190.4817697680553,353.10777590818884L189.447550745439,353.6957592372588L187.8737391892837,353.8427376910373L187.04186736674455,351.38518245254227L185.6479199884359,351.11200007350715L183.53451589874157,351.61631785508115L181.80332318697083,352.4356584696585L180.29696069750798,353.5907703746818L179.3526737638149,354.9553496425532L178.6781830968912,357.3891218277098L177.4640998964287,359.00360653197083L176.25001669596622,364.47002058696734L177.26175269635155,368.5899244662831L178.5432849635065,370.90902983773424L178.13859056335218,374.4785680944054L177.57651500758266,376.3349118210916L177.80134522989056,379.1696340714409L179.3976398082766,383.08441995169403L179.0828774970455,384.99858291896464L179.59998700835354,386.391946395858M132.99268192392924,465.36835931896246L130.9467269009274,463.4479976670746L127.12461312169353,458.7260653366865L126.87729987715466,458.1738913738211L124.89879392084549,456.29199354985946L123.88705792045994,453.01757189980543L121.97600103084301,449.08559606784866L121.54882360845772,447.65132269649564L120.96426503045745,443.0794335753683L119.30052138537894,437.23027047370135L119.99749507453339,437.04544451606046L119.23307231868671,437.18919865842923L118.3337514294551,434.23109121079204L116.22034733976125,429.6875615886563L115.52337365060657,428.08288397510495L114.28680742791335,423.1417966200068L112.39823356052693,418.60755367724744L111.22911640452617,417.8238799029757L110.28482947083307,414.46067703953213L110.0375162262942,414.3987522287599L109.97006715960197,414.3987522287599L107.81169702544616,412.12753518784575L107.38451960306134,412.08622873205434L105.83319106913677,409.8550592423301L105.09125133552061,409.87572383634495L104.57414182421257,408.63566107557654L102.75301702351862,404.126859887723L102.37080564559551,403.69225426042715L100.21243551143971,398.5560883354567M295.11775523014444,261.1642556092064L293.7462908740663,260.9467430852385L294.80299291891356,258.5091808522876L295.7247968303757,258.8140193186129L295.79224589706814,260.1635260111431L295.11775523014444,261.1642556092064M308.20287416846327,259.510639064621L309.34950830223374,261.51223251374955L308.54011950192535,262.16454633377396L308.20287416846327,259.510639064621M304.6955227004603,258.09540584249646L305.16766616730683,261.25125481047445L304.2458622558445,261.3599991470084L303.4364734555361,259.9459178675629L303.7962018112287,257.50727950153583L304.6955227004603,258.09540584249646M307.1461721236162,257.35477730314017L307.2136211903087,259.6629961329742L305.34753034515325,257.1586879055543L306.24685123438485,257.37656396225395L307.1461721236162,257.35477730314017M110.30731249306382,414.15104374638247L110.10496529298666,413.90332046441563L110.0375162262942,414.19232952059235L110.30731249306382,414.15104374638247M173.30474078373277,410.6402397904577L172.83259731688622,412.31340909035265M185.37812372166627,266.55197254752545L184.68115003251182,268.243899348228L182.47781385389453,269.046049627439L182.11808549820194,270.28125519830496L182.47781385389453,272.92284256151237L183.691897054357,272.83628016414497L183.91672727666514,274.5885506642957L184.1865235434343,276.9445023831133L183.30968567643367,278.4130920196855L184.72611607697354,278.32672934026704L184.34390469904997,281.34757805026777L184.86101421035823,282.29620696045447L181.46607785350898,283.67536884329616L182.00567038704799,285.3766953991411L183.08485545412577,285.24752229959677L183.66941403212627,285.9363667516583L183.44458380981837,288.4533108385035L182.54526292058677,290.2157944473971L183.691897054357,290.3447074875358L183.9392102988959,291.2683887574663L185.5355048772817,292.14878932807136L186.16502949974392,293.5009959963532L188.8180261229768,295.00259383908593L188.18850150051458,297.4247180004906L186.70462203328293,298.6242063924207L184.65866701028108,298.2815530809514L184.14155749897282,296.9104782590516L182.74761012066392,297.85317161362866L181.44359483127823,300.18697895462606L180.54427394204663,300.8503336990302L180.4993078975849,302.0054461237708L179.64495305281525,303.9935951878714L180.7915871865855,305.4676893045989L179.68991909727674,306.748833118846L179.71240211950771,307.45319497145044L177.39665082973625,308.0720236147391L175.93525438473512,306.6634430578111L174.38392585081078,305.80938909539L175.08089953996523,305.1900252530876L174.76613722873412,302.5614267274125L173.57453705050239,301.5135171753282L174.60875607311846,300.6363670325046L175.32821278450388,296.8890493416166L174.83358629542658,295.77449577791907L173.66446913942536,295.1527043752976L172.81011429465548,294.0802899650972L171.88831038319313,293.60828274047594L167.88633242611263,295.3028059785232L166.3350038921883,294.12319531642106L164.67126024711,293.865752221271L163.74945633564766,295.9459975097123L162.37799197956974,294.80958144369424L160.01727464533678,294.53075965343004L160.30955393433715,292.87864235534573L158.8931235337975,292.3634740927217L158.6233272670279,291.22543443707144L154.71128139887082,290.3447074875358L152.59787730917674,290.40916149935356L151.8559375755608,289.3776964312693L150.75426948625227,288.88330059587133L151.60862433102193,290.92473345138L151.29386201979105,291.97702823496L150.30460904163624,292.3205386148391L150.75426948625227,293.65119615408014L150.79923553071376,295.6029824072024L149.36032210794315,296.43900022765195L149.09052584117376,298.17446447106767L148.82072957440437,299.395008135298L146.86470664032572,298.88116616423434L145.42579321755534,297.76748666660114L144.23419303932337,298.36722072773574L144.18922699486188,300.2939832584313L143.26742308339954,301.9626734214149L143.94191375032324,304.52778378512915L145.49324228424734,305.5317614246396L143.89694770586152,306.1296920331829L143.1325249500146,308.02935045477244L142.27817010524473,308.28537903189954L142.41306823862965,309.991601073371L140.3221471711663,310.0982033786218L140.1422829933199,311.69672404844084L139.26544512631926,312.8470646176613L139.6476565042426,314.0820644185967L138.3886072593184,314.5503638720703L137.55673543677926,313.9330429162161L137.62418450347172,312.52757531400954L136.20775410293209,311.7606448813965L135.4433313470854,312.05892182099956L135.1735350803158,312.86836254626604L132.49805543485195,316.27385554479633L130.83431178977366,315.6994806846033L130.38465134515786,316.78430856963826L130.8567948120044,317.9749919944694L130.15982112284973,318.4638716117512L130.36216832292712,319.9087425726369L128.2487642332328,320.50346770989375L127.73165472192477,320.1636405742418L128.47359445554093,321.28915690173204L127.3494433440012,321.9897174869891L126.92226592161637,323.5175966334206L126.49508849923131,322.9659598241531L124.53906556515267,322.3080952848776L124.0444390760756,323.8570108987007L123.145118186844,324.1115443718832L121.72868778630436,324.8325960536707L121.70620476407362,326.78274345349035L122.31324636430463,327.3124403099387L122.47062751992007,329.17618098117003L120.22232529684129,328.392712737739L117.95154005153177,328.8374105520343L115.83813596183768,329.0491468244974L115.2985434282989,327.84203738422815L114.10694325006693,328.2868219818396L111.45394662683384,326.67679208825695L110.57710875983321,328.1173885046705L111.02676920444901,329.3243802917495L111.76870893806495,329.8112663085058L111.34153151567989,331.35604764336426L112.03850520483456,332.24444673844187L111.92609009368039,334.33744160267224L109.92510111514025,334.4853735317836L108.98081418144716,334.1895020868333L107.15968938075343,334.696691708251L106.26036849152183,334.696691708251L106.0355382692137,336.13324608585606L104.82145506875145,336.42891896263467L103.4499907126733,334.7600841461107L100.70706200051723,336.13324608585606L100.95437524505564,337.50575903981166L99.94263924467032,337.50575903981166L97.67185399936079,338.3922702636092L96.70508404343695,340.4175760379173L95.8282461764361,340.86042610897977L95.44603479851253,339.616059271383L92.07358146389424,340.86042610897977L92.32089470843289,342.39934215564455L92.09606448612521,344.3587269167076L92.92793630866436,345.3484658903204L94.50174786481944,345.53795319410347L94.50174786481944,347.09550870021513L92.90545328643361,348.14745754022647L94.25443462028079,348.75742110718363L93.13028350874151,350.81777654426855L92.52324190851004,352.96076267340675L90.94943035235497,353.25478217715886L90.52225292996968,352.70872376518497L89.24072066281497,353.63276634512624L89.1732715961225,354.68248154546563L87.30718075096706,355.29115460849647L86.54275799512038,353.2967826895309L85.59847106142706,353.17077944756636L82.81057630480927,353.5067767316349L81.39414590426986,350.7337075076276L80.24751177049961,350.3133278073674L78.78611532549826,345.18002271110595L78.15659070303627,343.79000567715116L77.84182839180517,341.239959090874L77.90927745849763,339.93247351358445L77.23478679157415,338.16011472352744L77.41465096942034,337.0201745538279L76.80760936918887,335.68968030816086L77.09988865818923,334.25290566578303L76.98747354703528,332.24444673844187L76.02070359111121,329.93826630476786L76.33546590234232,329.07031957999726L75.43614501311072,328.09620860424155L75.34621292418797,325.0446345519327L73.39018999010932,318.888913027936L72.33348794526205,316.6779721268407L72.28852190080056,314.84833013741405L73.16535976780119,314.5077945673256L71.47913310049216,313.1239244569379L71.1868538114918,311.4410253651083L71.77141238949253,310.22612048051855L70.62477825572228,307.77329694908633L70.80464243356846,306.21509951831786L70.33249896672191,305.2113850766203L69.83787247764462,304.5705141286223L70.3774650111834,302.3476022081399L69.59055923310598,301.0856764485497L69.568076210875,298.9882251001346L69.77042341095216,298.36722072773574L68.6013062549514,294.7023459465084L68.55634021048968,293.0288797975515L67.6570193212583,290.06538744305016L67.79191745464277,288.5393147749173L68.80365345502832,287.9372243010922L68.44392509933573,286.34527654727094L69.43317807749031,285.44127939184284L70.87209150026092,283.95541555045895L72.17610678964661,284.23543007389594L72.2210728341081,285.505861680397L74.76165434618724,286.1515909311974L75.84083941326503,285.61349504214576L76.40291496903478,285.59196874830667L77.14485470265072,284.2138916369992L78.85356439219072,284.30004424326154L78.67370021434431,281.4553955188571L79.6179871480374,279.7297378646218L79.68543621472986,278.3483203019426L78.7186662588058,277.72210335817573L79.7079192369606,276.209868716718L81.7763572821932,277.70050674738934L82.33843283796296,278.65057334408L83.68741417181013,278.65057334408L85.05887852788828,277.7652959947034L85.59847106142706,276.0585924836837L86.2279956838895,276.14503722256995L86.58772403958187,274.3290369398761L85.80081826150422,272.8579210614112L85.21625968350395,271.84058389546976L85.21625968350395,271.8189336445579L84.60921808327248,271.6673763040509L84.5192859943495,271.34257764751965L83.57499906065641,270.5628773920299L82.54078003804011,269.37116706610857L84.72163319442643,269.06772553304796L84.83404830558038,267.5499246969801L86.58772403958187,267.072696816181L86.83503728412052,265.5752986776284L88.11656955127569,264.7719461996339L90.52225292996968,264.51133931372397L92.16351355281745,263.94658981350665L91.48902288589375,262.94707745684065L89.84776226304643,262.8384085655481L87.1722826175826,263.55552810731183L87.1722826175826,263.57725550436294L85.0139124834268,263.59898269583147L84.69915017219569,261.64271017786166L85.68840315035027,260.533412090034L84.85653132781113,259.79357977235304L84.74411621665718,258.530956389162L86.54275799512038,258.00828567001014L89.60044901850756,256.78825030177217M69.43317807749031,285.44127939184284L68.91606856618228,283.6969120410993L69.47814412195203,282.23153951844193L70.22008385556796,281.73569844657766L71.07443870033785,280.2691385576315L71.32175194487672,278.477861986839L70.6022952334913,275.7343967387643L68.64627229941266,271.0393916853882L69.07344972179794,270.82280628859183L67.16239283218079,270.2379256996293L67.40970607671943,268.48240531749315L66.82514749871893,266.8123493084137L67.6570193212583,266.3566707625562L68.2190948770276,264.53305768065474L68.84861949948981,264.31586478988004L68.42144207710498,263.4903446825006L67.00501167656512,262.6427915730003L68.33150998818155,261.62096441821745L66.01575869841054,260.22880439423415L67.18487585441153,259.0317359747364L65.52113220933325,256.8972088565251L66.3754870541029,253.12416733581836L67.5670872323351,252.57840366039642L69.09593274402846,253.25513074919206L70.78215941133772,252.6002367731303L71.95127656733871,251.35540738433673L67.72446838795031,251.57384891733625L65.61106429825645,250.8966101966913L64.80167549794805,251.92331071393085L63.5651092752546,251.00585622640926L63.00303371948485,253.1896500031919L61.6315693634067,256.0907907085739L61.0470107854062,257.7251219206184L61.58660331894521,258.79224650272477L60.88962962979099,259.96767961913724L62.57585629709979,261.94712908067964L61.496671230022,264.61992909992597L59.63058038486656,267.05100230715357L59.69802945155902,268.67752839364096L55.42625522770936,270.5412153488389L53.290368115784304,271.86223394699664L50.83971869262837,272.68478832037374L49.76053362555058,273.8748194601293L48.05182393601058,274.22089782779216L46.36559726870155,275.0210104029956L44.072329001160824,276.0369808083752L43.330389267545115,275.8640803389601L42.16127211154412,275.8640803389601L40.78980775546597,276.6852457635207L35.214018242230395,274.1992694125984L32.15632721884322,271.9271829054315L29.975474062456897,269.9995991119276L28.356696461839874,268.2222157752747L24.33223548252886,263.3599722799399L19.38597059175538,258.7051531469332L19.745698947447863,257.7686878836714L19.09369130275502,258.55273171663043L17.115185346445855,256.67928647868337L13.427969700596464,252.29455371884785L13.00079227821152,251.0714012621392L14.012528278597074,249.01673444160116L16.328279568368202,250.48142618933292L16.55310979067599,252.62206967192594L18.936310147139693,251.0495531320318L21.13964632575687,250.65624998653277L21.881586059372808,250.02244805911346L23.05070321537403,250.10987980142187L25.00672614945256,249.36659979741415L26.62550375006913,248.64494171589382L28.26676437291667,247.37599997277755L30.47010055153396,247.22280230965094L31.90901397430457,245.49311503921888L31.84156490761211,244.5948899833091L32.920749974690125,243.82781977773777L34.4945615308452,241.6127558397618L35.23650126446114,242.57801210056658L35.93347495361559,241.15191362081123L36.87776188730868,239.61506235483483L38.76633575469509,238.2089807853951L39.19351317707992,237.0658607736736L36.04589006476954,237.26375213346256L34.87677290876877,236.62603663421203L33.21302926369026,236.64802999044565L31.054659129534457,239.02198384715552L29.81809290684123,241.37137454117885L27.547307661531477,241.74440701997742L25.231556371760462,242.86311924716665L23.455397615528,243.3455230176241L20.060461258678856,243.1043345200577L15.85613610152177,242.09543771126374L8.526670854284589,237.37368387198012L7.042791387052603,235.6140972721712L7.312587653821879,234.4035387009302L5.109251475204701,233.36851470106518L5.334081697512602,232.3109469365628L4.030066408126913,232.1566741195603L3.782753163588154,230.8338729840525L1.309620718201586,230.4589283415172L0.702579117970231,229.22334345541645L1.759281162817274,228.9364072100185L2.298873696356168,226.06487771093498L4.2099305859730975,224.6055083557327L10.302829610516824,224.51702875076313L10.460210766132263,219.29000977355628L11.696776988825832,220.1990471966829L13.135690411596215,219.17912395208293L13.967562234135357,220.465030723025L15.316543567982649,219.64480405838214L16.77794001298389,220.24338017828967L18.531615746985608,219.53393744564943L21.162129347987616,219.75566467309886L22.668491837450574,219.33436242056325L24.691963838221454,221.30708474330936L29.00870410653306,221.30708474330936L30.245270329226287,219.31218621715476L37.05762606515509,217.24874701775877L37.035143042924346,219.9995369235179L38.451573443463985,220.53152122012204L40.475045444234865,220.50935796031672L41.48678144462042,219.31218621715476L43.12804206746796,218.15869223672456L44.04984597893031,218.3140081940855L44.83675175700796,217.0267475314228L43.30790624531437,216.89353622258778L43.12804206746796,214.4497799508872L44.971649890392655,213.16006596611408L46.09580100193193,213.56041013680016L47.55719744693329,214.11631211050508L48.88369575854972,213.96067496847235L50.36757522578205,213.09333421669788L52.27863211539875,213.13782229486714L52.9756058045532,213.7383154061759L54.97659478309333,213.13782229486714L56.84268562824877,213.20455257302189L58.888640651250626,212.55940071717254L60.462452207405704,214.02737806768494L62.95806767502336,213.84949824528678L63.22786394179275,214.96099063533734L65.38623407594855,217.33754003906057L65.67851336494891,215.98302542702993L68.08419674364313,216.5826759270039L68.73620438833586,218.13650327845693L72.1311407451849,218.24744565871737L72.7606653676471,216.3161864314664L74.0197146125713,216.02745005059455L73.86233345695564,217.67047942288724L74.9640015462644,218.33619522385152L73.72743532357094,220.93041901026214L74.58179016834083,222.0380626548403L75.88580545772675,222.81305906840663L76.3129828801118,224.03032339958867L77.39216794718959,223.18938093673984L78.69618323657505,223.38858241975362L78.85356439219072,225.2689851524994L78.29148883642097,225.60064407781806L78.15659070303627,227.03722220733812L79.7079192369606,228.80396184925877L80.42737594834603,230.37069636377163L81.14683265973122,229.62057501272216L82.38339888242444,230.15010022519328L81.95622146003961,232.9058938199626L83.84479532742557,232.81776409694464L84.94646341673456,233.2804042266112L85.84578430596594,234.73375935062114L86.83503728412052,234.00720616665353L87.1722826175826,234.68973289401652L89.48803390735361,235.83412491994062L89.30816972950743,237.28573893281117L91.08432848573966,237.1538147485146L92.1410305305867,239.13182553649392L93.10780048651077,238.2968878502532L94.883959242743,238.73636918582042L98.23392955513009,236.56005520728655L95.22120457620463,234.95387796531952L95.85072919866684,233.36851470106518L98.79600511090007,231.4071886640163L99.89767320020883,231.25284978267752L100.99934128951713,229.42196863275268L101.26913755628675,227.83243980999953L100.70706200051723,226.08698149088036L101.76376404536427,223.41071473313826L100.36981666705515,221.2627747080008L100.7969940894402,220.64233393146185L100.18995248920874,220.13254592818816L98.52620884413068,220.1547132571883L98.93090324428476,218.60242078962796L100.01008831136255,217.22654815781567L99.42552973336205,216.49384997521207L97.69433702159154,216.27176811965217L98.99835231097722,214.60537947340043L98.79600511090007,213.3824891955212L99.26814857774662,212.18111221241656L100.50471480044007,213.8272621668114L102.03356031213343,212.87087910758856L101.80873008982553,211.7137164826724L100.10002040028576,211.15715130844973L99.58291088897772,209.53109699146876L100.70706200051723,209.0407942008415L101.53893382305637,210.19949816254245L102.70805097905713,210.39997503206564L103.85468511282738,209.8876053808561L103.8097190683659,208.43889449815975L104.95635320213614,207.30147712021056L107.31707053636887,207.59146869830084L107.09224031406097,208.66184146665967L104.84393809098219,211.9808130508498L108.84591604806246,213.07108980973862L110.21738040414061,212.71514592873683L111.09421827114147,213.04884515750535L113.67976582768188,211.7582350403839L114.2643244056826,213.29352284500686L115.68075480622201,215.2943194312777L115.38847551722188,216.91573871267303L113.70224884991262,216.7603161962095L112.84789400514273,217.67047942288724L114.10694325006693,220.11037835966232L113.18513933860459,221.75013263322847L114.44418858352878,223.14511133332928L112.4656826272194,224.6055083557327L109.8126860039863,223.6541545501911L108.93584813698567,225.37954400932404L110.44221062644829,226.37430927608494L110.7120068932179,227.3465094833473L112.28581844937298,228.119527361905L113.81466396106657,226.19749686999472L115.92806805076088,225.71118529392055L117.45691356245447,222.9901602519932L118.71596280737867,222.63594269368355L118.58106467399398,220.93041901026214L119.97501205230265,220.68665734207815L121.5713066306887,220.11037835966232L124.26926929838328,220.77530129452293L125.23603925430712,220.68665734207815L126.31522432138513,219.71132114683058L126.78736778823145,220.97473620742227L128.63097561115615,222.17093986645227L129.80009276715737,221.94947308761192L130.4071343673886,220.64233393146185L129.53029650038775,219.66697666109485L129.08063605577195,218.2918209233198L129.26050023361813,217.0267475314228L128.85580583346427,215.44985411948062L129.50781347815723,215.20543711093757L131.21652316769678,216.6270874483855L132.5655045015444,215.0721063241832L132.04839499023615,212.62615013878042L130.7668627230812,211.80275261269435L129.41788138923403,212.0475816528899L128.67594165561786,211.02355272093314L130.81182876754292,210.02127966223958L129.50781347815723,208.52807627351444L129.7326437004649,207.2345499877598L131.55376850115886,206.67673630965936L132.81281774608283,207.01144328844862L134.11683303546852,206.09644397322825L135.5107804137774,206.0294762520095L136.14030503623962,206.5874715974225L137.33190521447136,205.96250627111868L137.60170148124098,204.26517817618077L136.9496938365478,201.22420824429963L136.16278805847037,200.88851913092162L134.99367090246915,201.73882010620457L134.83628974685394,202.72291982042339L132.76785170162134,202.43221430333296L130.74437970085046,203.28184836137234L129.44036441146477,202.499304001376L128.04641703315588,202.70055938102786L126.6974356993087,202.2309314876798L125.5732845877692,201.2689624551254L124.42665045399872,199.3212092357315L124.24678627615253,196.9903102884008L124.87631089861475,194.252419556946L126.29274129915439,193.10674233294566L127.37192636623195,193.21909370751172L128.42862841107922,192.5224095842063L129.3729153447723,191.08329564260998L130.0923720561575,190.09327874529941L131.5312854789281,189.48551499157264L133.30744423516035,188.11170730662718L135.53326343600838,187.2328525180992L137.06210894770197,185.6318430311929L137.9839128591641,185.00008755688083L139.46779232639642,184.86468397843328L142.50300032755263,182.78728088915636L143.64963446132288,182.58393387283974L144.8412346395546,180.79805570744838L146.25766504009448,180.2099269173329L147.56168032948017,180.52663455691493L147.89892566294202,178.55765479531544L149.51770326355881,177.94617042733995L151.51869224209872,177.33448564016356L152.05828477563773,178.19531785965967L154.26162095425502,179.0783910963238L157.7240063777965,178.98783867777342L159.07298771164392,180.16467860276208L161.05149366795308,180.59449352444204L160.80418042341466,182.1093721422248L162.94006753533927,184.39069518220964L162.98503357980098,186.06041443306088L160.87162949010667,188.3820426680805L161.11894273464554,190.25081563943877L160.1971388231832,191.15077819093682L160.03975766756753,192.38753838713353L159.27533491172085,193.03932836551178L157.47669313325787,196.18280999678103L158.1736668224121,197.81989188029127L156.8022024663344,198.0664561097849L155.9253645993333,198.80596179442637L152.8901565981771,198.60430622092792L152.41801313133033,199.25401075259998L152.37304708686884,200.14980075221837L152.05828477563773,200.68707808871193L151.47372619763723,200.55277256290827L151.24889597532956,200.86613781456367L151.24889597532956,201.13469676161787L151.3163450420218,202.566391413337L151.9908357089455,204.55561380279602L152.82270753148464,205.9178583615714L151.74352246440685,206.2973335838446L151.20392993086784,206.52052043187786L151.1814469086371,206.78831156297593L151.33882806425277,207.7029926782419L148.77576352994265,209.909885047366L149.04555979671227,210.4667962001878L150.30460904163624,213.3602479754668L150.1921939304823,216.80472384052575L151.6760733977144,218.0255548696034L151.0915148197139,218.77988523697832L151.96835268671475,219.82217816381473L153.63209633179304,217.75925407821552L154.8686625544865,218.358382012636L156.5773722440265,220.39853807261665L158.10621775571985,221.17415177389626L160.53438415664505,218.44712675831806L160.8266634456454,217.33754003906057L160.7367313567222,216.93794096062277L159.7025123341059,216.64929284551118L160.26458788987543,215.22765805627142L159.23036886725913,213.7160781042428L157.29682895541146,214.3830907794068L157.7240063777965,212.6706485249627L157.56662522218107,210.17722171690622L156.19516086610292,209.5533806263865L155.54315322140997,208.59495999037682L155.65556833256414,206.7436822131175L154.46396815433218,204.44391284074004L153.78947748740848,203.41596763802636L155.94784762156405,201.67170446403247L157.63407428887353,202.16383264027468L157.00454966641132,200.4632304332613L159.25285188948988,199.52279082718655L160.10720673426,199.9034993806925L159.18540282279764,201.6269594291178L160.3770030010296,202.29802804698835L159.05050468941317,204.86834294836825L159.18540282279764,205.33734405868904L159.9273425564138,204.53327411505444L161.88336549049222,204.28752089294233L162.87261846864703,206.11876604490465L164.55884513595606,206.0517990767994L165.7054792697263,205.47132398487923L165.43568300295715,204.9800199544856L165.25581882511074,204.91301450679902L165.05347162503335,203.95235361647195L164.82864140272568,203.46067203741575L165.0759546472641,202.6334765397201L166.13265669211137,202.54402919666137L167.3692229148046,203.77357448215753L166.69473224788112,205.136357181871L166.9195624701888,206.16340943527427L168.178611715113,206.60978815135434L169.32524584888324,205.11402404783905L170.85409136057683,205.9401824419195L171.9557594498856,205.62762245409385L173.30474078373277,206.2973335838446L173.52957100604067,204.7566596413032L176.13760158481227,202.34275781561223L177.19430362965932,202.20856545946924L178.90301331919932,201.44796909848702L180.29696069750798,201.58221337525544L180.22951163081575,203.2594942619557L181.60097598689367,203.95235361647195L181.98318736481724,205.06935702425443L180.83655323104722,205.8955340300563L179.93723234181562,206.94450639939396L179.53253794166108,207.5022450183834L180.67917207543155,207.68068838170717L181.55600994243218,206.7659970132791L182.68016105397146,208.2828168009213L183.01740638743354,207.2345499877598L184.36638772128072,206.43124870171494L186.16502949974392,206.83293991104978L186.29992763312862,205.98482984918786L188.07608638936085,204.86834294836825L188.57071287843837,206.83293991104978L187.8737391892837,207.36840200246638L188.30091661166875,209.0630832999944L189.55996585659295,208.43889449815975L190.8639811459784,208.66184146665967L192.1230303909026,209.46424459755315L192.7075889689031,209.30824698927938L194.23643448059693,207.03375508425228L194.43878168067408,205.20335507314826L196.1250083479831,205.7615827654164L197.69881990413842,205.49365309208832L198.30586150436966,204.84600679110542L199.56491074929363,205.2926820703011L200.1719523495251,206.8998805551363L202.0155601724498,207.83681321461017L203.47695661745092,208.08212753183136L204.21889635106686,210.39997503206564L206.4447155519149,210.86767646549896L208.24335733037788,211.2462120963409L209.43495750860984,214.27193727601372L211.21111626484208,214.4720091863975L211.21111626484208,213.53817087638868L212.7624447987664,213.13782229486714L214.9208149329222,212.80413778964464L215.46040746646122,213.7827892758766L216.42717742238506,213.69384055756348L216.78690577807788,214.7609670389707L216,216.0496619980794L215.5503395553842,217.93679180041983L216.38221137792334,218.09212463847297L216,221.39570195115408L214.83088284399923,221.99376834726996L217.01173600038555,224.67186558224176L218.99024195669494,226.13118834659565L221.10364604638903,226.13118834659565L222.8123557359288,225.31320940126614L224.610997514392,222.41452584882916L226.11736000385486,222.6802232120328L227.33144320431734,224.36218035573995L228.16331502685648,226.2638032816111L230.1418209831661,226.94884599338133L231.15355698355143,230.32657898710443L233.55924036224587,230.98824255043223L234.7058744960159,229.92948093797713L234.68339147378515,232.02443131085795L233.91896871793847,233.91912222297583L235.56022934078578,234.75577223713685L235.020636807247,237.35169797588736L235.40284818517057,238.27491142164945L237.0890748524796,240.405579728637L239.96690169802037,240.4275344081202L240.30414703148222,241.23970066169045L239.22496196440443,242.46834553154054L238.77530151978885,243.71821626484558L237.96591271948046,245.01118655356788L236.70686347455626,245.88734116252078L235.6951274741707,245.86544157465636L234.6159424070927,246.8944856115864L234.63842542932343,247.61671758132377L235.1555349406317,248.55745196428205L234.6159424070927,250.10987980142187L232.4575722729371,250.54698672957738L231.5582513837055,251.33356204939224L228.99518684939585,252.7748939746333L227.66868853777942,255.28408333778236L227.69117156001016,256.54852293384806L228.45559431585684,258.7704734776293L226.5445374262399,260.79447196891806L226.92674880416303,261.64271017786166L225.39790329246944,262.0123564274094L224.72341262554596,263.9031417994257L225.62273351477756,265.423334526894L225.53280142585436,266.4000725832204L223.8016087140836,265.8574912889921L223.7566426696219,265.8574912889921L223.7116766251604,265.8574912889921L222.58752551362113,269.60955774234714L220.90129884631187,270.0429330249793L219.26003822346433,269.046049627439L214.4711544883064,269.37116706610857L214.44867146607567,270.4112388816923L213.30203733230542,272.64150314787855L212.24533528745815,273.2474232625957L211.81815786507332,274.5453003510488L210.04199910884108,273.7882919559541L210.24434630891824,276.51239235588304L210.60407466461083,277.59252076759645L209.9520670199181,278.6937492397244L211.5033955538422,280.700572186207L210.9413199980727,282.166870351132L211.2560823093038,284.30004424326154L210.73897279799576,285.225992786545L210.91883697584194,286.62501767972105L215.61778862207666,287.6791405394448L215.30302631084555,290.1513354182346L213.79666382138294,291.01065172405964L212.8748599099206,289.3991896632078L211.6158106649964,288.9047981208613L210.1319311977643,290.06538744305016L209.007780086225,287.89421221684734L207.77121386353156,287.7436640129897L206.0849871962223,286.60350026242526L205.32056444037562,286.7326019392257L204.26386239552858,285.85027178905193L203.22964337291228,286.689568800756L203.22964337291228,286.71108546420237L202.77998292829625,288.25979103151303L203.1397112839893,289.03377934799676L204.6011077289902,289.7000753384096L204.84842097352907,290.6025135068488L206.01753812953007,290.7743693372183L205.92760604060686,293.3078682953254L205.47794559599083,295.1955914589453L206.5346476408381,295.04548347555584L206.91685901876144,296.4175673234107L207.8386629302238,296.43900022765195L207.43396853006948,299.9515537585971L208.08597617476266,301.214036139142L208.67053475276293,304.3568553860261L207.6587987523776,304.6132437698453L207.389002485608,306.38590611835997L206.39974950745318,307.17574167819885L203.58937172860487,308.3707163557692L203.7467528842203,309.7783835813269L201.67831483898772,312.1228339647078L201.38603554998758,313.1239244569379L200.0370542161404,313.23040138013846L198.148480348754,314.89089405277133L198.08103128206176,316.2313134453493L197.4290236373688,317.80492631959953L197.45150665959954,318.95266352806374L196.2374234591373,320.2486013062439L196.19245741467557,321.41654480746115L194.25891750282767,321.52269689282633L192.79752105782632,320.80078193469564L191.60592087959458,321.7349887910929M63.27282998625424,259.2058942490245L62.59833931933076,258.530956389162L62.328543052561145,256.5267282715989L63.542626253023855,255.54574990222073L64.4644301644862,257.1586879055543L63.27282998625424,259.2058942490245M149.6526013969435,398.53536410504523L149.9673637081744,397.0221902666455L150.84420157517548,397.0429227523314L151.47372619763723,395.81951134430466L153.114986820485,395.30099678162685L153.81196050963945,393.9940217586318L154.8686625544865,390.75572264400955L152.77774148702315,390.2572700909077L151.60862433102193,389.4471397840182L151.74352246440685,387.2235473425733L152.14821686456094,386.0384577247579L151.0465487752524,385.9344838387466L149.13549188563525,386.3295685717369L149.2479069967892,385.41456912690865L148.03382379632671,384.1040481801888L148.10127286301918,383.02198419484705L147.9438917074035,381.8771328332061L146.25766504009448,381.73139777365213L145.80800459547868,380.4195096506329L143.51473632793818,381.0859269238159L143.04259286109186,382.5432733933859L140.6818755268589,383.3133416305616L138.2537091259337,384.6033510946153L138.45605632601087,383.45901135338335L137.91646379247186,382.1685848352115L136.34265223631655,382.31430178688527L134.20676512439172,381.7730369787499L133.86951979092987,382.7306027416779L132.49805543485195,383.68790881622556L131.21652316769678,382.4183816336855L132.1608101013901,380.81521021936544L130.5420325007733,379.3363100909173L130.78934574531195,378.35697376036944L130.0024399672343,377.2522829787066L131.59873454562035,376.7936280296344L131.95846290131294,378.8570949621379L134.09435001323777,379.60714157403197L136.27520316962455,379.3363100909173L137.39935428116382,381.2108660373848L137.9389468147026,380.58612587672064L137.28693917000987,379.5446438732567L137.33190521447136,377.1480485892632L138.95068281508816,377.4190514364095L138.59095445939533,375.3755793407373L137.55673543677926,374.68719645370254L136.9047277920863,375.6258659424137L133.57724050192974,374.68719645370254L133.26247819069863,376.3766158297702L131.6212175678511,376.23064957898316L129.84505881161886,374.52029479042596L130.0923720561575,372.37070143247956L128.6984246778486,371.7443486907565L128.09138307761737,370.6583935357795L128.2487642332328,369.4676139383835L129.14808512246418,367.7956239753053L129.5977455670802,365.0768293271419L128.02393401092513,364.7839012913978L128.6084925889254,363.1513903062983L131.32893827885096,364.386313951856L133.21751214623714,364.0933237531512L133.84703676869913,362.48140410815665L133.39737632408355,361.1619615566112L133.7795877020069,360.15630771551014L132.4755724126212,359.61144639814796L132.02591196800518,357.9763024069549L132.00342894577443,354.93436063488946L132.76785170162134,354.55653438234856L131.9359798790822,351.8474359357862L132.6104705460059,350.7337075076276L135.19601810254653,349.8928904961221L139.1080639707036,350.4604672499446L141.24395108262866,351.11200007350715L143.35735517232274,351.28011517464984L144.59392139501597,350.79675950067804L147.47174824055696,351.78440544875787L148.82072957440437,351.5322706229566L149.89991464148216,349.78777215339574L150.0123297526361,349.22007068610407L152.28311499794563,348.2105628873989L154.35155304317823,348.6943270914546L155.09349277679416,348.0633150405487L157.13944779979602,349.22007068610407L159.81492744525985,347.4742522919842L159.54513117849024,346.5483509830394L161.38873900141493,345.66427143710615L163.27731286880135,346.1484423211059L164.10918469134026,345.89584112635896L164.04173562464803,343.8953325795894L164.17663375803272,341.5140359870794L164.73870931380247,340.691729147672L167.0994266480352,340.4597550962666L167.52660407042026,339.8691933851028L168.92055144872916,339.6582498020447L170.94402344950004,338.7299182075236L172.60776709457832,338.24453705008614L173.84433331727178,338.66661218067463L174.90103536211882,339.616059271383L176.4748469182739,337.9490482492745L176.72216016281277,336.8301412106184L176.22753367373548,335.28830040873225L176.4748469182739,334.46424086335946L178.4083868301218,333.7033616280257L180.1620625641233,334.4219750622625L180.3868927864312,335.8797882304449L184.0291423878191,337.59020026646783L183.9392102988959,336.5978613900968L184.5012858546654,335.2671736099114L183.51203287651083,334.612166293502L180.99393438666243,334.37970864207193L183.08485545412577,332.96342501683444L184.1865235434343,331.67336474516026L185.9401992774358,332.73083412978826L188.07608638936085,333.4074098421323L188.54822985620763,332.94228116988154L188.59319590066912,331.5464421368405L189.49251678990072,330.6578257081953L190.27942256797814,331.081010939613L192.90993616898027,330.46737182676316L193.1572494135189,329.0279739105419L194.3938156362126,329.13383689590773L194.91092514752063,327.71494317432547L190.66163394590149,326.019804223012L189.04285634528492,324.19638368209445L188.6831279895921,322.69010020238863L189.96466025674727,322.0109438162972L191.22370950167124,322.7325419347086L191.60592087959458,321.7349887910929L190.59418487920925,321.77744520815463L189.91969421228555,317.8687021941131L190.05459234567002,316.0398657125112L188.39084870059196,316.44401725113886L188.18850150051458,315.42288623743144L186.77207109997494,315.97604678746836L186.6596559888212,313.8265939175697L186.030131366359,311.8032579175971L185.01839536597345,310.5032530175455L182.3429157205096,308.8400222210896L181.12883252004713,309.13862791742974L179.71240211950771,307.45319497145044M173.46212193934844,425.20125313055644L173.4396389171177,427.5684433389141M73.52508812349402,465.65431637956203L73.36770696787835,465.79728967017735L73.00797861218575,465.6134662268048L73.52508812349402,465.65431637956203M70.22008385556796,281.73569844657766L70.33249896672191,280.39857675239057L71.07443870033785,280.2691385576315M43.330389267545115,275.8640803389601L42.993143934083264,276.4907847984798L42.16127211154412,275.8640803389601M399.64132558107985,180.4135308237888L397.1007440690007,184.2326725297292L398.0000649582323,185.90253096540033L397.9101328693091,189.8456945843066L398.92186886969466,190.40833958140684L398.0450310026938,191.8254732951113L396.40377037984626,193.39884229375588L396.7859817577696,195.82381316015983L395.257136246076,197.03516157986718L394.47023046799836,198.357809996968L393.36856237868983,199.88110681022363L391.4125394446112,200.6646944733265L389.63638068837895,199.70195702180837L389.59141464391746,198.4698575957417L388.6696107324551,198.0664561097849L387.61290868760807,199.1868099589674L386.2189613092992,199.7243516423776L384.55521766422066,199.8363209006764L384.2854213974513,198.9851937099886L383.0713381969888,199.4108036200027L381.5874587297567,198.6715270601573L380.5532397071404,198.80596179442637L378.0351412172922,199.14200814601628L378.6196997952925,200.3736842122609L376.5962277945216,202.85707712717016L375.69690690529,204.66730845741046L374.16806139359664,203.95235361647195L373.69591792674987,202.9241523551957M274.56827291120385,252.57840366039642L276.1196014451282,250.83105999601986L276.2994656229746,249.65082459930676L275.10786544474263,249.23540678551217L275.64745797828164,248.25121047799308L275.1303484669734,246.85070634133768L273.5565369108185,246.85070634133768L273.30922366627965,245.55882432749638L272.09514046581717,244.66062630068006L270.02670242058457,243.43322129176278L270.2740156651232,241.2616468650195L271.2407856210473,240.18602064442905L267.41867184181297,240.14210614537546L264.5183619740412,237.76939141161546L262.18012766203947,237.41765498687136L261.21335770611563,235.79012120680818L262.1576446398087,234.49160255690322L261.7979162841159,233.21431896631873L262.18012766203947,232.35502281608967L264.4509129073492,232.11259410308043L265.0804375298112,231.0323460631859L266.2045886413507,231.14260080664485L266.4743849081199,232.57538843244515L268.4304078421985,233.5006735451497L269.2397966425069,231.5835621281135L271.0159553987394,229.9074177354044L274.34344268889595,228.89225968643308L275.64745797828164,228.89225968643308L276.029669356205,227.83243980999953L275.64745797828164,226.72788907314225L277.3336846455909,225.954355289621L279.8293001132083,227.0814089104237L280.4813077579013,226.41851003224383L282.01015326959487,226.37430927608494L282.90947415882624,225.6448612694977L282.01015326959487,223.6541545501911L283.5165157590577,223.4992416180525L285.0453612707513,224.34005821213282L287.8557390495996,221.41785565680897L287.9681541607538,219.9551986717517L288.95740713890837,219.86651929204368L290.3513545172175,217.89240881806478L290.23893940606354,214.64983428338735L291.65536980660295,214.9387667664539L291.92516607337257,212.40364346664177L290.913430072987,212.02532569834705L291.6778528288339,210.24405031093966L292.68958882921925,209.17452506761623L292.59965674029627,208.327411674482L290.2614224282943,206.4758850682062L290.0365922059864,205.5606389046763L290.01410918375564,203.840618554123L289.0248562056008,203.70652813366212L289.7892789614475,203.59477915918285L290.5986677617559,203.97469987046992L291.02584518414096,203.05829596306438L290.1040412726786,202.36512231870518L289.85672802813997,201.13469676161787L291.3181244731411,199.8139275615602L292.68958882921925,199.14200814601628L294.26340038537455,200.03784942442138L293.5889097184506,198.20093254423512L294.0160871408359,196.49687777229695L292.8020039403732,196.093067013952L291.70033585106466,193.803215400044L290.7335658951406,193.39884229375588L290.66611682844837,192.65727133490464L291.02584518414096,191.73552763467018L290.935913095218,191.66806562720058L291.11577727306417,191.12828427175089L291.0708112286027,190.97081945604486L292.9144190515274,189.26036830341496L294.35333247429776,188.74243025542103L295.4325175413753,187.50331256193084L297.38854047545396,186.1957326708128L296.8039818974537,184.09721403232572L294.89292500783677,182.62912399451233L295.6348647414525,181.15988955241363L296.01707611937604,178.94256082447095L295.050306163452,175.99714173838458L293.1617322960658,173.38768315540204L293.8362229629895,171.54750449671536L294.6905778077594,172.9789130780631L295.54493265252927,173.36497607844342L297.4110234976847,173.00162489949003L299.524427587379,174.00066887169754L301.0982391435341,172.2747079990349L302.06500909945817,172.07021101032637L303.8861339001521,172.88806299949783L305.999537989846,173.38768315540204L306.04450403430747,175.74770005683268L306.8089267901544,175.2714001696047L309.2820592355413,177.01723671916784L309.304542257772,177.81025780847506L309.8666178135418,178.37649511305597L311.7327086586972,178.35384891750977L313.4863843926987,177.5837147715933L314.6555015486995,178.51236652149305L316.0269659047776,178.2632613894408L317.3309811941633,179.28211801454836L319.197072039319,180.14205403599158L320.50108732870444,180.16467860276208L320.6135024398584,179.55371941397095L323.4013971964764,179.62161360815935L325.537284308401,178.91992148674427L326.07687684194,177.5157464942671L327.6282053758646,177.44777573925705L328.8198055540963,176.74526606037483L330.70837942148273,178.19531785965967L333.2264779113307,178.98783867777342L336.6663803126414,178.85200182902577L338.17274280210427,178.7840797040859L338.8247504467972,178.10472264063327L340.8707054697986,178.28590868338034L342.3321019148002,178.80672068656747L343.38880395964725,177.81025780847506L344.67033622680196,178.62558514816146L346.5813931164191,178.1273718575187L347.72802725018914,178.2632613894408L350.51592200680716,176.51859348949495L351.8424203184236,177.5157464942671L352.9216053855016,177.71964389532712L353.75347720804075,176.949247778193L353.6185790746558,175.0672342275334L352.58436005203976,174.1141624638558L352.44946191865483,172.5019002869775L353.12395258557876,170.61535511470396L352.89912236327086,168.56751307788642L352.2920807630394,167.08709050193585L351.2128956959616,167.56551202876574L347.0085705388042,167.20101176094283L345.6820722271875,165.51424978142933L345.6146231604953,164.69309736870974L346.5813931164191,163.50633234782367L346.6488421831116,161.907535239894L349.52666902865235,161.77042967585152L350.336057828961,163.23235314168426L351.8873863628853,162.43301019751112L352.9216053855016,162.61574829492355L354.4054848527335,161.31333591012793L355.86688129773506,160.9018524763885L356.6313040535815,162.27309921036692L358.96953836558373,161.67902018260446L360.34100272166165,161.58760606071945L361.9372973000475,160.28445112134392L362.8815842337408,159.00323929752477L361.8248821888935,157.49206501097768L362.20709356681687,156.50682565958732L363.8708372118956,155.24584337992928L365.2647845902043,155.19997267969188L367.1533584575907,153.54783994841722L370.07615134759294,152.9049290305806L369.4691097473619,151.38857336438866L370.88554014790134,150.19295309658827L371.7848610371327,147.91443352609042L374.0331632602117,147.17731080527108L375.9442201498289,147.63804875693927L379.22674139552396,146.78558842923786L380.93545108506373,146.69340574378674L381.45256059637177,144.54878920538607L383.8132779306047,142.63255022619722L384.2404553529898,141.22288384587006L385.7693008646834,139.39554654007213L386.7810368650689,139.30297181579255L387.8602219321467,138.05272738766092L389.72631277730216,138.02956617301504L390.0185920663023,137.14920940294525L391.47998851130365,136.36114018728517L393.1437321563817,138.0758882913767L394.33533233461367,138.79372220350137L399.91112184784924,140.04343095324793L400.1584350923879,141.03792467127755L402.8788807823132,141.2922384542278L404.1154470050067,138.30748023215165L404.83490371639186,138.23800591316729L406.54361340593186,136.84793142449104L409.1741270069342,135.3175517621517L410.27579509624275,135.45673352128586L412.2093350080904,134.13405066506897L413.4908672752456,135.7814470961356L414.48012025339995,137.96008066327965L416.68345643201746,137.61261111562084L415.986482742863,139.04836576457882L414.0979088754766,139.60382155584546L413.10865589732225,141.03792467127755L414.5475693200924,142.88663078098676L415.986482742863,141.38470695477963L417.31298105447945,141.2922384542278L418.52706425494216,142.42463853771574L418.79686052171155,143.87949927347097L419.83107954432785,145.33314745878602L419.493834210866,146.624265549261L417.8300905657877,147.17731080527108L418.1448528770186,148.02958101872025L415.6942034538629,150.07794695008005L416.36869412078636,150.56092243003673L415.51433927601624,152.2158373137446L418.3696830993265,151.71033305293332L419.4039021219428,150.97479633156206L420.64046834463625,150.9288151283842L422.37166105640677,152.53744677245413L424.08037074594677,152.2617850949249L425.5192841687174,153.43305149689223L426.91323154702604,152.56041664433235L428.104831725258,153.73148604711088L428.84677145887395,153.73148604711088L431.05010763749124,154.97060146732542L430.420583015029,156.02546482505977L430.420583015029,157.65240148400216L431.2974208820301,158.54544214672222L431.1175567041837,160.1243495452551L429.3189149257207,160.26158033940476L427.90248452518085,161.70187298979982L426.05887670225616,162.77562898611973L424.17030283486974,165.03528929179924L423.56326123463896,164.73872668270548L424.6424463017165,166.76807313455453L424.17030283486974,167.70218087795195L425.0471407018706,168.54474642110074L426.9357145692568,171.66114896269323L428.0148996363348,172.8426362842216L426.5310201691027,173.66014632986042L425.3619030131017,172.638202233593L423.540778212408,172.04748772263684L423.9005065681006,170.88822821660284L422.61897430094564,169.455192030766L419.8085965220971,169.1365875245927L418.3696830993265,170.25146128475848L415.4019241648623,170.3196968678941L412.2093350080904,171.50204474679418L411.22008202993584,172.20654485581207L410.09593091839656,174.34112878041174L407.9825268287025,174.93111111578168L407.15065500616333,176.9039204386164L406.25133411693173,176.76793179930314L405.1271830053922,178.2632613894408L403.4859223825447,178.19531785965967L402.47418638215913,180.16467860276208L400.6530615814654,180.93375156843007L399.64132558107985,180.4135308237888L399.1691821142333,177.71964389532712L399.5738765143874,176.45058633386583L399.0792500253099,174.6134516566417L397.685302647001,175.81573292732423L395.9316269129997,176.60926583074888L395.0772720682296,176.01981659475757L394.2229172234597,176.67726718769262L393.12124913415096,178.53501079560965L392.31186033384256,179.30475296972304L390.1085241552255,179.71213537195842L387.4105614875309,181.5894767651336L387.38807846529994,182.8550583541218L386.1065461981452,184.052059043273L385.67936877576017,182.4031625484456L384.19548930852807,184.14236794298233L383.90321001952816,185.85741899107563L383.0263721525273,186.37614199197338L381.4975266408335,188.78747392112888L380.8230359739098,192.11776763738686L381.1827643296026,192.97191204042917L379.743850906832,194.16258708031688L378.2150053951384,194.07275042752798L378.19252237290766,192.11776763738686L376.79857499459854,193.1741539432444L377.1133373058299,194.02783053469386L374.77510299382766,196.00331988104625L374.3254425492121,196.92303141147397L373.0663933042879,197.61813429847217L371.6274798815175,199.074803500421L373.49357072667294,200.84375624283257L373.69591792674987,202.9241523551957L372.3919026373644,203.99704587168753L371.8523101038252,205.8955340300563L370.4133966810548,208.34970873749205L370.43587970328554,209.28596062335555L369.356694636208,211.17941687564286L368.3899246802839,210.95675009354903L368.05267934682206,212.60390057724038L368.0751623690528,214.82764376546936L367.5130868132833,215.27209921642333L366.92852823528256,217.40413226614857M355.9792964088888,228.45073327985256L354.67528111950287,228.75981153538788L353.84340929696396,228.36241682668714L352.9665714299631,229.7970982469957L351.1679296515001,229.04677195135702L351.7075221850389,232.3990977766784L351.23537871819235,233.25837603553828L350.1112276066531,232.94995730561402L349.21190671742147,231.8480946854454L349.70653320649876,234.16134427435645L348.53741605049777,235.83412491994062L349.3692878730369,237.76939141161546L349.2343897396522,239.08788953404837L347.975340494728,240.29580298000235L345.8619364050337,240.64706892019518L345.36730991595664,240.09819075193013L344.8502004046484,237.1538147485146L344.06329462657095,235.92212962254501L342.08478867026133,235.6581046184242L341.14050173656824,232.3109469365628L339.7465543582596,230.56921311091634L339.6791052915671,228.20785406588323L340.7133243141834,228.36241682668714L341.0280866254143,226.7941786076969L340.60090920302946,225.99856496253483L341.79250938126097,224.09669904377125L342.871694448339,224.03032339958867L344.28812484887885,223.05656928123642L346.6488421831116,222.3923828573836L347.0310535610349,221.06336773574913L348.4924500060363,221.77228252524048L348.35755187265136,220.11037835966232L350.02129551772964,221.10768206720206L350.96558245142296,222.30380851441726L351.23537871819235,219.82217816381473L350.943099429192,218.60242078962796L351.6625561405774,217.89240881806478L353.12395258557876,217.98117381755134L354.1356885859641,217.20434905598972L354.38300183050274,215.58316007640576L355.23735667527285,215.84974572626857M399.0792500253099,174.6134516566417L400.0010539367722,174.68152612312417L401.61983153738925,173.36497607844342L401.7322466485432,173.59203429960752L402.78894869339,173.00162489949003L403.3060582046983,171.18379506517118L404.04799793831444,170.82001373739962L405.50939438331557,171.36565876284556L407.1056889617016,170.7745360121379L408.79191562901065,170.70631731515624L410.2982781184735,170.04673932318514L411.13014994101286,169.09106807400508L410.0284818517041,167.95271389129755L409.1741270069342,167.97548791718424L409.0392288735493,166.1754641972754L407.66776451747137,164.8984202562649L407.57783242854816,163.0496773077897L410.45565927408893,159.27786157224932L408.2298400732409,159.07189880268027L405.1046999831615,159.3465105819941L403.82316771600654,160.53601055146703L403.7557186493141,160.60461157100235L401.77721269300446,161.29047818221875L400.7429936703884,160.81039895812654L398.20241215830924,161.67902018260446L394.0205700233828,163.14101752858807L388.28739935453154,165.99308420472312L386.84848593176116,165.6738752539506L384.9823950866057,164.7159121689955L384.6226667309131,165.14933894821905L385.40957250899055,166.5857524416062L384.71259881983633,166.83643869547728L381.3626285074488,169.7509895151403L378.64218281752323,172.72906460643605L378.9794281509853,174.06876586194176L377.04588823913764,175.2714001696047L376.57374477229087,175.7023434256688L373.7184009489806,176.22387785735907L372.63921588190306,175.88376330678574L367.69295099112946,176.4732556619427L367.10839241312897,176.60926583074888L365.1298864568196,175.18066252433488L361.9822633445092,174.65883491209587L361.7349500999708,175.04454773594563L360.3634857438924,175.88376330678574L358.6547760543526,175.86108679037966L357.37324378719745,176.4052468490122L354.9450773862727,176.99457401460182L353.75347720804075,176.949247778193M391.4125394446112,200.6646944733265L389.95114299960983,204.42157189123185L391.0977771333803,206.0294762520095L392.31186033384256,206.0517990767994L392.42427544499674,207.30147712021056L391.5924036224576,209.68707722511004L390.7830148221492,210.51134240851565L390.7380487776877,211.84726919975043L389.50148255499425,212.5816507700439L389.3441013993786,213.69384055756348L387.0058670873768,216.09408516454317L387.47801055422315,217.00454625183642L385.7693008646834,220.30987785497337L385.2072253089136,222.21523036709993L384.9823950866057,223.47711025208213L383.99314210845114,225.20264701390266L383.790794908374,226.5069087311166L381.74483988537213,225.22475996218492L379.9237150846784,224.80457366734862L378.6646658397542,225.24687267504459L377.6754128615994,223.96394562796934L375.9667031720596,223.87543862230092L374.21302743805813,224.98150457894116L372.90901214867245,222.9016115585212L372.3469365929027,222.63594269368355L370.503328769978,223.7205422561999M364.8151241455887,406.4439471430881L364.65774298997303,407.5813071478491L363.39869374504883,407.2297941381608L362.971516322664,406.2784858938817L364.0057353452803,405.2648850686768L364.3204976565112,405.4510761072603L364.9050562345119,405.4303886472072L364.8151241455887,406.4439471430881M364.92753925674265,404.9959269601941L364.29801463428043,405.4303886472072L363.98325232304956,405.2235080907593L363.53359187843375,405.2648850686768L362.6567540114331,405.4717634590764L362.36447472243253,405.0373063237787L362.5668219225099,401.7876977079968L363.03896538935624,399.0948788424058L362.81413516704833,397.3953576450434L363.7584221007414,397.0014576673865L363.6684900118182,394.61644778743164L364.1631165008955,393.22621978754245L364.4553957898961,389.0108412261104L364.88257321228093,387.7847695395011L365.8043771237433,387.3898444964634L366.6137659240517,386.24639645379756L367.4231547243601,386.93250886473515L367.24329054651366,389.71720319155605L367.73791703559095,390.7972572974195L367.24329054651366,392.2299156444393L367.2882565909754,393.68276978484676L366.1865885016666,394.67868468674453L365.4896148125122,394.0977666392871L364.7027090344345,396.4001628252291L365.6694789903586,396.669720622516L366.3214866350513,398.84621574431543L366.1416224572049,400.58651876042904L366.4114187239745,401.8084044212527L364.92753925674265,404.9959269601941M359.7339611214304,426.5188012105983L360.7007310773545,428.16518901288157L360.8581122329697,429.74926860482367L359.8913422770461,432.15519212630477L358.45242885427547,431.70289259345725L357.7329721428903,429.91381655291434L357.64304005396707,428.2474925455808L359.7339611214304,426.5188012105983M361.4876368554319,417.32885333136943L362.2295765890476,419.37046570975656L360.88059525520043,419.7827938248516L360.7007310773545,418.97871713017173L361.4876368554319,417.32885333136943M363.1963465449717,407.31250586428405L363.1963465449717,407.3538610849056L362.8815842337408,408.7183437933055L363.57855792289547,409.25574008527565L362.4768898335865,410.37164248646695L363.71345605627994,411.69379662598817L363.17386352274093,414.46067703953213L361.8023991666628,415.18306504012276L363.1288974782792,415.8434245721072L361.86984823335524,417.4113617868014L360.1836215660462,414.19232952059235L359.9587913437381,411.30132686286674L360.92556129966215,412.25145205864067L361.24032361089326,408.4496187448165L361.8023991666628,406.75416842760245L363.1963465449717,407.31250586428405M379.09184326213904,480.97426246712837L379.5639867289856,481.5039897153546L380.2384773959095,485.29237127867646L379.6988848623705,487.5929039587656L378.55225072860026,487.99999999999994L377.3381675281378,484.6611195168338L376.5962277945216,484.19273424316384L376.28146548329073,482.6651689510825L376.7086429056758,481.70771982956404L379.09184326213904,480.97426246712837M377.0908542835991,477.9377015917818L377.7203789060609,478.9568379575161L377.2707184614453,479.91468179481956L376.14656734990604,480.91313739450254L375.7418729497517,479.91468179481956L377.0908542835991,477.9377015917818M363.7359390785107,451.2976954302485L364.230565567588,452.7514371275113L362.7916521448176,452.95615736724744L362.67923703366364,451.5843804694513L363.7359390785107,451.2976954302485M149.51770326355881,177.94617042733995L150.237159974944,176.49592471381243L148.4385181964808,176.01981659475757L147.87644264071128,176.9039204386164L146.05531784001732,177.01723671916784L142.72783054986053,176.29189330186995L142.165754994091,177.24384860279855L139.26544512631926,178.17266946701233L138.23122610370297,179.4179236398544L137.39935428116382,177.96882156813717L138.748335615011,176.8132624493296L141.2664341048594,175.65698568698423L139.6476565042426,173.34226872255766L141.2214680603979,172.3655882717078L141.0416038825515,171.18379506517118L137.9839128591641,167.63384773127706L136.5449994363937,166.47179274953226L136.72486361424012,164.3964788773534L135.71312761385457,161.95323478167535M289.0248562056008,203.70652813366212L288.7550599388312,202.83471821043156L286.68662189359884,202.52166672601396L285.6074368265208,204.73432222357246L283.381617625673,204.26517817618077L282.90947415882624,206.45356701032227L281.15579842482475,206.9668189460379L280.7061379802092,207.59146869830084L280.88600215805513,209.82076489392534L280.1890284689009,210.3108766766228L279.334673624131,213.93844011300024L277.8732771791297,213.87173407912496L277.2887186011292,215.22765805627142L274.9504842891274,214.0940789664739L273.4666048218953,214.84986885326907L272.8595632216641,214.24970584253288L271.2183025988163,215.8275315924002L270.52132890966186,218.04774503376967L269.01496642019924,216.84913051593702L267.93578135312123,216.53826343599422L268.2955097088138,215.0054376419355L265.82237726342737,214.316399410119L265.7549281967349,212.78189019270235L264.6757431296569,211.46884679468383L262.8771013511939,212.13660301011572L262.4274409065781,211.69145683424563L260.0217575278839,210.82313816905747L258.9650554830366,213.3824891955212L259.1224366386523,214.51646692505085L257.1439306823429,215.4720723871876L254.67079823695622,215.1165508941275L254.041273614494,215.8275315924002L253.41174899203202,215.62759344941736L250.4664730797988,218.09212463847297L249.58963521279793,217.3597376898589L247.74602738987323,218.04774503376967L247.52119716756556,216.5826759270039L246.26214792264136,215.49429041158243L243.06955876586926,217.60389589547043L241.7655434764838,219.42306483265537L241.22595094294456,218.6246046880375L239.49475823117405,217.71486723352376L239.26992800886592,216.16071809324785L238.23570898624962,215.56094302507728L235.8300256075554,215.44985411948062L234.59345938486194,213.69384055756348L233.53675734001513,215.20543711093757L232.5924704063218,215.4720723871876L230.32168516101228,215.93859983188412L227.15157902647115,215.58316007640576M217.01173600038555,224.67186558224176L215.25806026638406,225.35743270862667L214.40370542161395,226.66159743062695L212.38023342084307,227.5232244989087L208.89536497507106,226.92675135483387L208.13094221922393,226.41851003224383L206.2648513740687,227.01512850484846L205.16318328475995,226.2859049496139L203.90413403983598,226.13118834659565L202.2628734169882,227.14768721058402L201.026307194295,226.63949974793672L200.1719523495251,225.2689851524994L199.227665415832,225.9101446773575L199.34008052698596,226.68369487904596L200.59912977190993,228.5390460075647L199.38504657144745,229.4661050078696L199.34008052698596,231.89218022226925L201.49845066114153,231.29694775870172L202.42025457260388,231.8480946854454L203.83668497314352,231.53947014451995L204.84842097352907,233.45662151261507L206.5796136852996,233.72091998100075L207.99604408583946,235.06392873366076L206.87189297429995,238.42874169653413L204.21889635106686,238.82425466291818L204.3313114622208,240.36166969947817L203.02729617283535,241.8541102221863L201.76824692791092,242.09543771126374L202.03804319468054,243.82781977773777L201.1162392832182,245.25216408295194L201.0712732387567,245.3616905377184L199.90215608275548,246.23770477966417L199.49746168260117,247.46353669894637L197.3390915484456,248.22933445700005L195.18072141429002,247.6604815874491L194.01160425828903,248.7105567512076L193.20221545798063,248.2074582187015L191.98813225751792,249.08233841932707L192.10054736867187,251.3772525043865L191.02136230159408,252.1853710286345L190.41432070136307,255.0660045616135L188.9978903008232,254.25892858277388L187.89622221151444,257.6379874741467L188.0985694115916,258.6180564427656L187.67139198920677,259.7718163536691L186.77207109997494,259.7718163536691L186.16502949974392,261.3599991470084L186.50227483320577,264.33758500130074L185.37812372166627,266.55197254752545L184.79356514366577,266.7472578617716L183.42210078758762,265.5752986776284L181.8707722536633,264.85880861040016L181.17379856450884,263.5338005046621L179.59998700835354,262.0558402913773L177.44161687419773,262.16454633377396L176.63222807388956,263.055741196677L174.45137491750302,263.5338005046621L171.82086131650067,262.2949867653879L168.87558540426744,263.2730532301903L168.4484079818826,262.4036814447588L168.24606078180545,261.1642556092064L166.71721527011186,261.1642556092064L164.40146398034085,260.46814244401054L164.24408282472518,261.5774722777289L162.08571269056938,262.25150744789653L160.57935020110654,262.0558402913773L159.72499535633665,262.49063347171574L159.477682111798,263.9031417994257L154.84617953225575,264.1203736589941L153.76699446517773,263.4686164629562L152.62036033140748,263.96831351258334L152.41801313133033,262.79493956616363L151.29386201979105,262.5123709624061L149.54018628578933,263.09920525066366L148.8432125966351,263.92486590912625L146.6848424624793,265.16280127333005L144.54895535055425,265.74895974848255L143.334872150092,265.3582039711842L139.80503765985804,265.5535901255982L138.72585259278026,265.90090247803136L138.23122610370297,263.07747332665L140.0073848599352,263.4903446825006L139.53524139308888,260.685700655545L138.59095445939533,259.6412314632642L135.66816156939308,259.83710598439757L134.63394254677678,260.9249906914684L132.45308939039046,260.5551682229161L132.13832707915913,260.79447196891806L131.89101383462048,260.9467430852385L131.64370059008206,261.0990040305394L131.5312854789281,260.8814852811474L130.11485507838825,262.38194292188825L129.41788138923403,262.12106453687977L128.338696322156,262.99054357083503L128.36117934438676,264.4896207419155L125.97797898792305,266.5736717289267L126.58502058815475,267.3763986401044L126.00046201015402,268.8943126460534L124.0444390760756,268.78592304068036L123.8645748982292,269.479529481531L122.47062751992007,270.60620087741404L119.30052138537894,270.5628773920299L119.18810627422499,267.78850185591307L118.2438193405319,265.9443128517437L116.64752476214608,265.9877224102602L111.09421827114147,265.6621308451458L107.76673098098445,265.81407928449573L105.24863249113628,265.31478257953853L103.71978697944269,264.51133931372397L102.91039817913429,262.86014275602156L100.1225034225165,261.79492469904255L98.84097115536156,262.09932332841703L96.00811035428228,261.3165020342865L94.86147622051226,260.3375975372823L95.1537555095124,257.398350411083L94.09705346466512,256.61390565516456L93.80477417566499,255.52394551983252L91.57895497481695,257.04974198633124L89.60044901850756,256.78825030177217L88.83602626266088,255.74197982002136L89.26320368504571,254.45527112511826L89.24072066281497,252.64390235680003L88.22898466242941,251.26802475502126L88.45381488473731,250.35029928806267L90.22997364096977,250.91845983306354L90.61218501889289,248.99486601565394L89.19575461835325,249.34473483659679L88.29643372912187,247.2665741607115L89.64541506296905,247.72612596358795L91.30915870804756,245.77784103166402L93.01786839758756,245.90924053126577L93.35511373104919,244.37575461480566L94.27691764251153,243.01662297453777L94.20946857581907,241.56887033362534L93.22021559766449,241.74440701997742L92.1410305305867,239.13182553649392M358.3400137431215,207.41301734077405L359.1494025434299,206.14108786558035L360.02624041043055,206.2973335838446L361.2178405886625,206.0294762520095L361.8473652111245,205.02468899318632L363.0164823671255,204.53327411505444L363.7359390785107,203.30420220743213L361.68998405550906,200.84375624283257L360.4534178328156,200.328909567128L361.8023991666628,198.60430622092792L360.6782480551235,198.94038727316092L359.5091308991225,197.86472406080117L358.6098100098909,196.18280999678103L355.3947378308883,196.25011451114244L354.3155527638105,196.96788425474108L354.3155527638105,194.6117077261772L355.05749249742644,193.12921313159035L354.49541694165646,192.09528503420222L356.1141945422735,190.54334979920532L354.6303150750414,190.3633340621115L354.0457564970409,190.88083375999736L350.1337106288838,190.9258271355319L349.52666902865235,189.66561326245682L348.02030653918973,191.03830595898228L347.997823516959,192.16273205554762L345.9069024494954,191.0608009326163L343.928396493186,194.2299618292372L342.30961889256923,194.20750384057538L340.64587524749095,196.1379390240507L339.5442071581822,194.0502906116634L337.4982521351808,194.47698248579837L337.76804840194995,193.46624369574357L336.62141426817993,192.45497516672435L333.2264779113307,192.34257922153648L331.9674286664067,192.92696651364815L329.06711879863497,191.75801444433387L325.42486919724706,192.5224095842063L324.4805822635542,192.27513850395394L323.55877835209185,193.01685651913726L321.1980610178591,196.07063061984258L322.97421977409135,198.02162857008324L320.883298706628,198.96279062005817L320.7933666177048,200.14980075221837L320.50108732870444,200.328909567128L320.95074777332024,197.86472406080117L320.1413589730121,195.98088244922798L320.36618919532,193.53364274333688L321.0181968400127,192.49993170747035L318.70244555024146,188.80999535560653L317.30849817193257,187.86386622414176L316.92628679400923,189.10274984497897L317.53332839424047,190.56585057777647L315.9370338158544,191.5106450661874L313.10417301477514,191.44317516297508L311.35049728077365,189.575566246258L310.2488291914651,189.32791509331787L309.39447434669523,185.20317478034963L307.7307307016167,184.27782320613L306.65154563453916,185.38367848827244L307.7756967460782,185.87997511227115L306.8988588790776,186.96235403965198L304.44820945592164,186.21828477304L303.59385461115176,185.2708656851467L301.07575612130336,183.7585253177803L299.45697852068656,182.380564913333L299.1646992316864,181.04682396332447L298.1754462535316,183.46494598075537L300.40126545437965,184.052059043273L300.8509258989957,185.6318430311929L299.1871822539172,186.1957326708128L298.445242520301,187.97652525560028L295.9046610082221,189.1703022043481L294.6456117632979,192.74717392275141L294.75802687445184,194.3871604442499L295.38755149691406,194.9709291740636L297.208676297608,195.17296194676436L299.95160500976385,197.10243657771719L299.83918989861013,198.22334438157935L302.78446581084336,200.12741099867793L305.21263221176855,199.38840540886827L305.61732661192264,201.98489119045092L307.7981797683092,203.46067203741575L306.65154563453916,204.9800199544856L305.1227001228451,205.136357181871L304.0659980779981,204.66730845741046L299.6818087429947,204.6449700309717L299.92912198753334,206.60978815135434L299.0747671427632,208.39430211606344L297.3660574532232,209.68707722511004L296.6016346973763,208.55037109478582L295.34258545245234,209.28596062335555L295.83721194152986,210.15494502362048L294.2858834076053,211.6246764104614L293.67884180737383,212.91537209233132L295.2301703412984,215.8275315924002L298.19792927576236,216.91573871267303L298.89490296491704,217.67047942288724L301.5029335436884,219.09041096964927L303.32405834438214,218.8242489422397L304.178413189152,219.9551986717517L304.2458622558445,221.68368152781005L303.5713715889208,222.50309543796368L304.20089621138277,223.4992416180525L304.04351505576733,225.49009698369122L302.19990723284286,226.2859049496139L301.5703826103809,228.67150811637526L301.9975600327657,230.21628149657494L303.90861692238286,231.89218022226925L304.49317550038313,232.94995730561402L303.7062697223057,236.38409477212406L305.1901491895376,236.01013069452756L307.1236891013855,236.80197714747953L305.887122878692,240.6031638039509L307.5283835015398,242.57801210056658L306.69651167900065,243.95933670963234L307.4384514126166,244.98927818698422L306.8988588790776,245.66833542069753L307.97804394615537,249.1916740494974L307.91059487946313,251.4427865753343L308.94481390207943,252.70939912806188L308.78743274646376,253.97529227378982L308.9897799465409,256.81004243412303L308.09045905730954,257.55084966630375L306.9887909680008,256.9189999354585L305.8196738119998,257.22405293154367L304.49317550038313,256.7228726402522L304.49317550038313,255.76378208633906L302.58211861076643,256.7228726402522L301.0982391435341,258.3349690166874L299.8167068763794,257.31120335399106L299.0298010983015,257.6379874741467L298.55765763145496,259.0970468948286L297.208676297608,260.3158393248062L297.72578580891604,261.2295053212104L297.09626118645406,263.0340088607277L296.3992874972994,259.44534004859435L295.4100345191446,256.7228726402522L296.3318384306069,255.58935803196744L296.48921958622236,254.36800989885L295.9721100749143,253.03685412306936L294.48823060768245,251.8577908110779L293.251664384989,252.11985884355863L293.49897762952764,252.79672516252657L295.2751363857601,253.05868274661952L296.01707611937604,254.3461940608674L294.21843434091284,255.7201773421719L292.622139762527,258.68337928484306L290.1714903393711,260.7727181216838L288.4852636720618,261.5339793088642L285.69736891544426,262.09932332841703M152.10325082009945,81.5429352661858L152.9351226426386,82.81295723342777L154.10423979863936,83.48349755673365L153.31733402056193,84.63233021284816L153.33981704279267,85.8281401694577L155.20590788794811,86.9513755199576L154.93611162117872,88.00219186966535L156.1501948216412,89.31473219745055L157.74648940002726,90.79302216022876L156.62233828848798,94.57785818903375L157.47669313325787,96.31255206239564L158.69077633372035,97.45215106835911L157.0495157108728,98.68580558858912L157.97131962233516,100.29762191271487L157.27434593318048,101.6237929590356L157.88138753341195,102.68867909347927L159.2078858450284,103.0434857042705L160.7367313567222,104.9344792717958L161.07397669018383,106.02080599378047L159.27533491172085,106.23326350001224L158.15118380018157,104.50919750259402L156.12771179941046,104.53282718477067L155.20590788794811,103.98925758492987L153.36230006502342,104.50919750259402L151.69855641994536,102.9961826405252L150.8217185529445,103.0434857042705L149.8774316192514,103.96561999969339L147.76402752955732,104.72185228434887L145.76303855101696,104.9344792717958L144.25667606155434,106.04441375043041L143.73956655024608,107.41307954173863L143.40232121678423,110.42953698318485L141.89595872732139,111.95921188357568L143.58218539463064,115.43687846380374L143.53721935016893,116.37553481048968L140.0073848599352,118.15752119008204L141.2214680603979,118.15752119008204L142.165754994091,119.37567648359311L145.650623439863,120.87372464136291L144.18922699486188,123.0481881877322L143.334872150092,123.35192099671212L142.0758229051678,126.92251010493908L143.60466841686116,130.50883753210553L145.1784799730167,129.83406905945645L146.54994432909461,132.06676345644382L148.16872192971164,130.88100905616938L149.2479069967892,129.438390556466L151.1814469086371,128.4138530436337L153.76699446517773,129.64787889024302L154.0817567764086,131.09031979261152L155.31832299910207,132.46183180410338L158.01628566679688,134.04119247998375L159.85989348972134,134.4822240383554L158.7582254004128,136.01334779309036L157.43172708879615,137.42726538470652L159.11795375610518,138.4232645502476L159.88237651195232,139.88148258510347L160.57935020110654,139.67324098968385L161.47867109033814,139.0252179003624L163.20986380210888,139.92775509321194L163.05248264649322,140.73732394611335L164.76119233603322,142.00874057959822L166.94204549241954,142.67874944981673L167.16687571472767,143.602476591019L169.55007607119114,144.4564886087245L170.98898949396175,144.3180285641797L173.01246149473263,143.76407850423834L174.99096745104202,146.53207438155283L176.09263554035056,146.09410009431065L176.60974505165882,144.61801145150974L177.419133851967,144.77951935804305L179.73488514173846,146.71645186945568L180.27447767527724,148.0986658940107L182.41036478720207,148.1677480547832L183.78182914328022,147.062107420208L185.46805581058948,147.86837241671014L186.16502949974392,149.11159916251592L191.13377741274803,151.8482121606139L193.494494746981,152.62932447486878L193.78677403598113,153.7773946067232L195.06830630313607,155.31464721716867L196.6196348370604,155.75034321557786L197.3840575929073,157.21716907341352L201.27362043883363,159.39227513153259L203.36454150629697,160.9933013548614L204.48869261783648,159.87273257371726L206.0849871962223,159.87273257371726L206.8494099520692,160.83326277274404L208.1084591969934,161.1990443739952L211.66077670945788,163.9400480571705L214.83088284399923,163.20951967031078L215.43792444423025,163.52916207809204L216.1348981333847,165.46863993108872L215.82013582215382,167.13265985879747L218.72044568992533,166.9048016941964L220.2717742238499,167.77051146933468L222.54255946915964,167.6794034463416L224.04892195862226,169.6372268965L224.81334471446917,169.6372268965L225.780114670393,168.33983376473708L225.57776747031585,167.2465782738435L228.79283964931847,167.42883295405016L231.9854288060908,169.06830792468395L232.43508925070637,169.6372268965L231.9854288060908,168.112126115951L234.7058744960159,167.95271389129755L235.89747467424786,166.6313343239101L238.2581920084806,167.7249580256406L238.5729543197117,168.6585768736831L243.5866682771773,169.56896593896926L244.59840427756285,171.52477476202688L243.90143058840863,174.3865187062333L245.6101402779484,175.13529203776187L246.57691023387224,174.8403568237876L248.60038223464312,175.83840999723265L249.61211823502867,177.24384860279855L251.99531859149215,177.33448564016356L251.792971391415,178.51236652149305L252.9171225029545,179.23684728289294L254.0862396589555,179.44055695286954L257.16641370457387,177.85556311471964L258.62781014957477,177.60637031353116L259.88685939449897,178.33120244739496L259.79692730557576,180.54925448541366L261.16839166165414,181.77032623342234L261.7979162841159,182.29017166189567L263.281795751348,180.93375156843007L264.29353175173355,180.6849683311683L266.67673210819703,181.5216537309779L268.88006828681455,181.65729735342507L271.8478272212783,182.78728088915636L272.2525216214324,183.46494598075537L274.5008238445114,184.6389898305144L276.32194864520534,184.36812132576443L279.1997754907461,182.42575991249868L279.9192322021315,184.2326725297292L280.9534512247476,184.9775209659755L283.98865922590426,184.93238697761956L285.38260660421315,184.39069518220964L287.2262144271376,185.36111646471L288.2604334497539,185.38367848827244L291.04832820637193,184.45841513554478L293.76877389629726,185.18061060814762L294.7355438522211,184.14236794298233L294.89292500783677,182.62912399451233M107.78921400321519,49.17832166734854L107.65431586983073,48.713026461248546L106.8449270695221,47.880030415525084L107.38451960306134,46.188104728666985L105.65332689129059,44.420560940001224L104.07951533513506,44.1011965092199L102.43825471228774,44.46968782249576L101.04430733397885,43.8063374672231L98.21144653289934,43.65888593266857L96.27790662105167,42.4787445411356L95.71583106528215,41.91292619234332L92.1410305305867,41.593019937985446L93.51249488666463,41.37150576994429L94.16450253135758,40.41122658758843L95.7832801319746,40.04172185287791L96.07555942097451,37.600661431359185L94.59167995374264,35.798085324476006L93.04035141981831,36.73668909486253L91.1517775524319,37.1070252429389L89.60044901850756,36.02044055302349L84.4293539054263,33.37469421895037L83.4850669717332,33.86959023936231L83.0354065271174,31.343863350633796L84.40687088319555,29.48391236652924L84.27197274981086,28.317128004557162L82.06863657119357,27.472485575609653L78.7186662588058,27.621575908864884L74.7391713239565,24.811124136396074L74.98648456849492,22.593723518538468L74.04219763480205,21.845514780716144L71.68148030056932,22.518920159167465L71.276785900415,21.870461346258594L68.17412883256611,22.74331857051402L65.88086056502561,21.22170983656929L66.78018145425744,19.22371000213741L65.83589452056435,18.37371576899409L66.78018145425744,14.943606856039992L69.47814412195203,14.065976695122458L71.00698963364539,12.660641038962012L70.9620235891839,11.630852103039047L72.60328421203167,11.37957062940552L74.3794429682639,8.587347799984173L74.58179016834083,7.176562581921644L77.34720190272787,6.823645711432164L79.21329274788332,6.117546703150879L83.0354065271174,7.226972066739904L84.60921808327248,6.647154133549861L85.4186068835811,5.335380983938421L83.37265186057925,4.477021425574435L82.87802537150174,3.036829193296626L85.64343710588878,3.3654241873783803L88.25146768466016,4.982002274372007L89.53299995181533,4.376003478836424L89.9152113297389,3.2137745228911854L91.26419266358607,3.517057464263644L93.73732510897275,1.620461960669104L95.24368759843537,1.6710711692519453L96.05307639874377,0.6078932823550076L97.85171817720698,-1.1368683772161603e-13L98.23392955513009,1.038324510707298L99.78525808905488,1.013008692723929L100.97685826728639,3.1632209918844865L102.39328866782625,1.8734897144871638L103.5399228015965,2.480569910103327L105.20366644667479,0.75982531231125L107.18217240298418,0.4559447428854355L107.29458751413813,1.7722840991913245L108.35128955898517,2.1517674566573533L109.09322929260111,4.906266710568389L111.18415036006468,5.814824437557718L113.14017329414332,8.990170517877345L115.70323782845298,10.550025534075075L117.97402307376274,11.077974055100526L120.58205365253389,13.388577614560518L121.99848405307375,13.16270617370742L123.19008423130526,14.116141572180027L123.90954094269068,15.870799655081896L125.6632166766924,16.697247037228067L126.29274129915439,16.37173400031793L127.41689241069366,18.198654268137147L128.6084925889254,18.84877476101599L127.46185845515538,20.572665113038624L128.76587374454107,22.54385504447214L130.5869985452348,23.640562545304306L133.23999516846789,23.391384183404398L133.98193490208382,24.53724807140452L137.87149774801014,25.98073689692319L138.36612423708766,27.447635694429096L137.9389468147026,28.466131465904596L140.54697739347398,29.335013396218415L142.165754994091,29.21091925418341L143.5597023723999,28.540627455111917L144.77378557286238,29.359830951742197L145.74055552878622,27.472485575609653L146.84222361809498,27.199113423099107L148.2586540186344,28.06875486417755L149.157974907866,25.70708262742778L150.237159974944,24.761332355114973L151.9009036200223,24.512347668798384L152.46297917579182,23.615646648654092L153.90189259856243,24.01424930324788L156.0152966882565,22.294486738018236L158.33104797802775,22.34436385824131L160.35451997879886,21.670876695915922L161.25384086803024,22.469049091870488L162.87261846864703,22.693455281324987L163.79442238010938,21.77067248589458L164.10918469134026,20.0981774741565L166.49238504780396,19.798420159464513L167.14439269249692,21.59602530474058L173.73191820611783,23.665478011052983L175.620492073504,22.668522988723453L177.21678665189006,25.50802877818819L179.91474931958487,26.82624999339498L180.45434185312342,29.31019541643866L178.9479793636608,33.82010818342826L178.3184547411986,34.78470619075506L178.20603963004464,37.72404454794969L176.6996771405818,40.85451004693152L176.6547110961203,42.89681895263084L174.8111032731956,43.48684058340018L173.57453705050239,43.3393572266541L172.33797082780893,44.44512458474571L172.60776709457832,46.997526616750065L169.6624911823451,46.70324235716225L168.40344193742112,47.169165557064844L169.64000816011435,50.59780030948525L168.38095891519015,51.96705417758608L168.20109473734396,53.21296553512548L166.1551397143421,54.97014115819752L163.83938842457087,54.70181663811411L162.91758451310852,55.14086822048182L161.25384086803024,54.70181663811411L159.54513117849024,56.042961304102846L160.93907855679913,59.086590720615845L161.61356922372283,59.76752483940447L162.51289011295444,62.391125843137274L160.7816974011837,62.488209319185785L159.68002931187516,63.14336087915535L159.94982557864455,65.6400605402414L160.7816974011837,67.38290755556807L162.55785615741615,68.10850912256831L164.46891304703308,68.01178207462499L167.61653615934347,68.7129151229044L166.46990202557322,71.75551127855681L167.14439269249692,73.92512571740326L169.28027980442175,76.98153242932756L170.1571176714226,77.79876388548615L167.52660407042026,81.42306874600308L165.63803020303408,80.36784747903289L163.79442238010938,82.28590314150932L162.94006753533927,82.38174432709638L162.6253052241084,84.0101500161054L161.43370504587665,83.96227980826217L160.66928229002974,84.7997982543663L158.8481574893358,83.02851927297297L157.65655731110428,80.96749228521412L157.43172708879615,79.2879069299322L155.9703306437948,79.2879069299322L152.98008868710008,80.5837460863412L152.10325082009945,81.5429352661858L150.84420157517548,80.70367688304464L152.2156659312534,79.88796604314695L151.94586966448378,77.48634369150966L149.4727372190971,79.11984905002049L148.3485861075576,78.80769353942111L147.69657846286486,79.69597220535945L146.48249526240215,79.88796604314695L145.04358183963177,78.66360069822059L145.29089508417064,78.03904447629282L143.4697702834767,74.86434805482429L142.4355512608604,73.78057941221118L140.4120792600895,74.23826309741764L138.43357330378012,75.73081783944122L137.51176939231777,75.2976434304428L136.52251641416296,76.4525067757196L135.57822948046987,75.4420483335183L133.75710467977592,73.63601960847268L131.68866663454355,73.44325219621123L130.56451552300405,72.7442688729434L129.8675418338496,71.10403215067163L128.85580583346427,70.42813324983808L128.2037981887711,68.83376778306638L124.22430325392179,64.16192588598028L121.39144245284228,63.1918794136177L120.82936689707276,61.92989470587679L120.73943480814955,60.180799903666184L119.34548742984066,59.23253094553536L117.54684565137768,56.8714359911105L117.16463427345434,55.652933286405755L114.84888298368287,55.99421332157408L112.24085240491172,52.773350273745336L110.89187107106432,52.08924813068256L109.45295764829393,51.453730717698704L108.21639142560048,50.573337958388606L107.78921400321519,49.17832166734854M128.27124725546355,109.55816255202666L127.61923961077105,108.99269911544303L126.02294503238477,107.93192878106038L126.33770734361565,104.320147682536L125.48335249884599,103.20903556689939L124.15685418722933,103.27998033778812L123.19008423130526,102.31013310405513L122.605525653305,100.81874744128868L121.09916316384215,102.64136567919769L119.79514787445646,102.7123352828504L118.62603071845524,99.34968978476525L117.09718520676188,97.04863556603516L116.26531338422274,94.45897474189468L116.26531338422274,93.15067291470228L115.52337365060657,91.53165183778276L111.76870893806495,89.33858650989373L110.9368371155258,89.24316710757074L110.9818031599873,89.05231107819549L111.85864102698793,88.28865706723838L111.5213956935263,86.30621034144457L113.47741862760495,85.66078137836263L114.98378111706756,83.79472260487671L115.83813596183768,83.8186604413624L114.44418858352878,81.78264080016584M129.17056814469515,112.12386132629348L129.2829832558491,110.75912568444716L128.27124725546355,109.55816255202666L129.62022858931095,110.09988213639912L130.3172022784654,109.62883177232561L131.91349685685122,112.2179393338422L134.0044179243148,113.32295396423399L134.07186699100703,114.73253709535277L133.35241027962184,115.38993169112189L134.61145952454604,116.68048380076033L137.53425241454852,117.71220363196386L139.24296210408852,117.43088900364017L140.07483392662766,118.53243306865761L140.0073848599352,118.15752119008204M44.971649890392655,213.16006596611408L42.40858535608277,208.88476354534936L41.689128644697576,205.49365309208832L39.66565664392647,203.3936150584725L38.40660739900227,201.44796909848702L38.54150553238719,196.90060460182877L37.574735576463354,196.2725488307433L36.42810144269288,196.7884666727324L34.31469735299879,196.94545796243835L32.583504641228046,196.29498289111513L30.08788917361062,192.6123184673483L29.863058951302946,190.25081563943877L30.69493077384186,189.05771361222082L31.18955726291938,187.50331256193084L31.34693841853459,185.47392389778616L31.18955726291938,182.5613384056578L29.458364551148634,181.77032623342234L26.962749083531207,182.1093721422248L25.568801705222086,181.79293119452444L24.51209966037527,180.86590486368925L21.43192561475712,179.4179236398544L21.049714236833665,178.39914103405306L21.47689165921861,175.02186096690298L22.556076726296624,172.13837919308935L26.62550375006913,168.52197948114008L27.659722772685427,166.95037560349863L29.00870410653306,165.87908743327858L30.58251566268791,161.83898375903215L31.95398001876606,160.26158033940476L34.08986713069089,158.40808022470634L36.090856109231254,157.99593131913525L37.282456287462765,158.43097460883035L38.58647157684891,159.91848373139692L38.676403665771886,161.47333189734434L39.77807175508042,163.23235314168426L41.958924911466966,163.43784143100714L46.34311424647058,161.33619334841933L48.95114482524218,160.71894079876108L53.132986960168864,160.62747799697928L56.19067798355604,159.3465105819941L56.28061007247925,160.0328565357271L56.977583761633696,156.5755809065153L57.96683673978828,155.131164415802L59.96782571832864,153.38713403927807L61.06949380763717,152.03203427356738L62.440958163715095,147.43073163963157L63.96980367540891,145.51765121193375L67.76943443241203,143.6717363879684L68.80365345502832,142.74804598566402L71.92879354510774,141.40782331031255L72.8056314121086,139.30297181579255L73.97474856810959,137.91375543507496L76.89754145811207,132.22944973205313L78.58376812542133,125.89644839908289L81.50656101542381,124.65968142679304L84.58673506104174,123.8424503411461L86.96993541750544,121.69240234347961L87.08235052865939,122.95472088509376L86.02564848381235,124.12268857663673L85.89075035042742,125.42985046644867L91.8262682193556,125.75648256996413L94.02960439797312,125.87312156713011L95.17623853174314,125.98975250270416L96.95239728797537,126.47951446254183L97.80675213274526,125.40651718097536L99.38056368890057,125.10315507679042L101.0667903562096,125.82646693581137L102.10100937882589,127.22554551373196L103.87716813505813,127.83145354710103L104.95635320213614,127.62174069602156L105.69829293575208,129.20559542975303L104.61910786867429,130.62514987529534L106.59761382498368,132.43859502012322L107.2271384474459,130.1365845891346L108.9133651147547,128.25080136178462L110.66704084875619,129.39183408431268L112.73547889398878,128.13432626945752L113.5898337387589,127.99454558844337L116.06296618414558,129.5780523161945L117.56932867360842,129.27543731921543L118.28878538499362,128.20421228558297L119.99749507453339,127.69164786603676L119.3679704520714,126.22299020024639L120.58205365253389,123.46872668535616L122.87532192007438,122.51068010213277L123.70719374261375,123.30519644722006L125.32597134323032,123.25847059801043L126.22529223246192,122.48730627901114L126.29274129915439,122.44055765559403L125.10114112092242,120.87372464136291L127.30447729953971,119.44592752306795L127.84406983307872,117.68876256369498L130.24975321177294,117.73564436989062L130.04740601169578,117.40744396948793L130.18230414508048,117.17297543907432L130.4521004118501,114.59163285058702L129.0131869890797,113.36995944955044L129.17056814469515,112.12386132629348L127.28199427730874,112.0062562609989L127.7091716996938,113.18192947641796L129.0131869890797,113.36995944955044M95.17623853174314,125.98975250270416L95.6933480430514,127.20223702531388L94.5691969315119,128.13432626945752L94.50174786481944,129.29871731057636L96.50273684335957,129.18231416139866L95.89569524312856,132.3688827708129L96.592668932283,132.9265011127074L96.03059337651302,134.1572644247558L96.30038964328264,135.73506320071198L99.02083533320797,135.7814470961356L99.94263924467032,135.08555708148975L101.22417151182526,135.7814470961356L101.56141684528711,137.14920940294525L102.88791515690355,137.0565141006938L103.33757560151935,138.02956617301504L105.67580991352133,137.49677236957177L107.2271384474459,137.10286237545995L108.10397631444653,137.49677236957177L107.90162911436937,140.82982202635327L108.6435688479853,140.89919234891937L109.9026180929095,142.3553291189566L109.11571231483185,143.11758092813028L109.79020298175556,144.66415809144922L110.39724458198702,148.37497825570864L111.29656547121863,148.5591623858453L111.99353916037285,149.9399296807117L115.27606040606793,152.1009626481482L117.65926076253163,154.92472368145167L116.82738893999226,156.55266278478518L116.96228707337718,157.629497152471L116.44517756206892,159.73547211814935L115.86061898406842,159.8041036553122L116.42269453983818,161.0618849696438L117.97402307376274,161.2447618574655L119.43541951876387,161.95323478167535L120.15487623014906,161.3819073562314L119.32300440760991,160.21583790382152L119.18810627422499,158.63701091900003L120.67198574145709,157.49206501097768L121.52634058622698,158.33939531887165L122.13338218645845,156.5297443691494L121.43640849730377,155.63569669182777L124.83134485415303,158.0417303214009L124.7638957874608,159.0261260909095L126.67495267707773,158.38518554835213L126.94474894384712,157.14843849105966L128.54104352223317,156.14008631568345L129.39539836700305,154.92472368145167L131.10410805654283,156.30054404341928L130.51954947854256,158.70568443188802L130.69941365638874,161.22190326057995L129.9574739227728,163.0496773077897L131.21652316769678,164.35084096151058L132.2057761458516,161.58760606071945L135.71312761385457,161.95323478167535L136.61244850308617,161.10760593024867L137.73659961462545,161.01616284966627L139.33289419301173,159.8269802523929L139.51275837085768,158.7743553171195L138.54598841493407,157.1942591726281L138.90571677062644,155.17703688688727L138.9731658373189,152.4225929493748L136.6574145475479,149.9169257528721L135.9154748139315,149.13461360098L136.56748245862468,148.42102609597526L136.20775410293209,147.89140312230205L135.93795783616224,146.7625432121597L134.90373881354617,145.7482535455273L134.61145952454604,145.37927522161073L134.8138067246232,144.71030351227415L134.72387463569999,144.34110600089326L134.9711878802384,143.2330445174532L134.0044179243148,141.3153560411718L133.64468956862197,139.07151331879635L133.82455374646838,136.87110852534937L133.4198593463143,135.9901591315476L133.48730841300676,133.7161491708291L133.1050970350832,131.2065924218739L133.7795877020069,130.27618898977073L133.30744423516035,129.13575066675685L134.09435001323777,128.29738915722186L134.88125579131543,126.01307772267364L138.2537091259337,122.20679498915416L140.11979997108915,119.75031452155741L140.07483392662766,118.53243306865761M159.2078858450284,103.0434857042705L160.12968975649073,101.6237929590356L161.05149366795308,101.4107316651909L162.01826362387692,100.08438572457953L162.98503357980098,100.46345281633813L163.41221100218604,101.7184778641564L164.37898095810988,102.19181934549187L164.22159980249444,103.44550607733402L165.30078486957223,104.1783458894518L165.63803020303408,105.59580789574449L166.94204549241954,106.65809551250425L168.40344193742112,107.36590326173149L169.7973893157298,109.06339271365539L171.70844620534695,108.28559527553597L173.66446913942536,108.37989343279736L174.0241974951182,109.32257648889066L176.45236389604315,110.594339598023L177.14933758519783,111.53575198992178L178.20603963004464,111.20631895110603L179.33019074158415,112.28849431440818L178.79059820804537,115.03778847601637L181.80332318697083,116.04706552339536L183.6019649654338,117.36055290924469L184.59121794358862,116.96192547323142L186.07509741082072,117.87628186154672L187.4690447891296,119.46934387887973L190.3468716346706,120.42913177263642L191.02136230159408,121.41175794929154L189.31265261205408,122.01976138595461L186.86200318889814,124.14603965546218L185.58047092174343,125.7098247132264L184.5012858546654,125.7098247132264L183.8043121655112,127.52852664481651L182.05063643150947,128.29738915722186L181.03890043112415,129.39183408431268L181.66842505358613,131.8343275813533L180.67917207543155,133.27492019960215L179.2177756304302,134.3893847227717L180.3419267419697,136.80157628657497L179.46508887496884,138.72426744580866L177.7788622076598,140.15909908653663L177.39665082973625,142.19359639870856L176.74464318504351,142.86353408128753L176.60974505165882,144.61801145150974M86.96993541750544,121.69240234347961L86.85752030635149,120.38232564417501L85.66592012811952,118.86041175484712L86.92496937304372,117.75908477749823L86.90248635081298,116.72739405857305L90.61218501889289,113.20543439450836L92.8155211975104,109.74660704111204L96.21045755435944,107.27154661542465L97.85171817720698,106.68169404820247L97.58192191043759,105.71387404084538L94.95140830943524,105.6430353804256L95.55844990966648,101.64746470461534L97.01984635466783,100.06069107617088L96.43528777666711,99.32598434313269L94.83899319828129,95.17214297540556L95.67086502082066,94.86314242526413L95.85072919866684,93.46000460602579L97.24467657697573,92.0080052692386L99.29063159997736,91.31724628620015L100.86444315613267,89.91098244958312L102.3258396011338,90.05404918961057L103.94461720175059,89.26702249631381L104.7090399575975,89.5055566542701L107.72176493652296,87.50075297597738L107.7442479587537,85.99548120594443L107.15968938075343,84.65625530931538M128.2037981887711,68.83376778306638L127.84406983307872,70.09007254820813L126.33770734361565,70.40398851811904L125.21355623207637,69.55868423644347L122.87532192007438,69.96931858990149L121.14412920830364,71.41774163535979L120.10991018568734,72.86480578518058L118.49113258507077,73.12995391464801L118.13140422937818,73.99739380976803L116.17538129529953,75.46611451101239L114.64653578360571,74.47909493760369L113.92707907222075,75.24950547619221L115.72572085068373,77.65457773821737L115.63578876176052,79.64797005916375L114.44418858352878,81.78264080016584L112.84789400514273,82.81295723342777L112.24085240491172,83.89047176438032L110.91435409329483,84.10588606130119L109.6777878706016,85.3260104983832L107.15968938075343,84.65625530931538L105.15870040221307,83.41166763925168L103.71978697944269,82.66923276206631L101.35906964520996,82.90876623794958L100.50471480044007,81.61485077657295L100.21243551143971,82.21401840921243L97.44702377705266,82.11816697405959L96.81749915459068,80.00795021391701L97.13226146582178,76.95748971230643L94.99637435389673,77.72667248041842L94.00712137574214,76.93344662368224L93.06283444204905,77.48634369150966L90.05010946312336,75.2976434304428L88.31891675135262,74.84027253966997L86.81255426188977,73.46734943608578L84.92398039450359,73.10585141800277L82.85554234927099,71.70726299935961L81.95622146003961,71.6590132115141L82.38339888242444,69.58284223280737L81.03441754857727,67.2377460317474L81.86628937111618,63.14336087915535L80.98945150411555,62.318309170878365L81.52904403765456,60.69116073294845L80.9669684818848,59.57300346157649L81.39414590426986,57.67510909065527L80.40489292611528,55.872336467055106L79.91026643703776,53.04201934623245L79.97771550373022,51.69819239932076L78.47135301426738,48.95793676279209L79.30322483680652,45.40278954661551L81.82132332665469,45.18184479861884L83.7548632385026,41.593019937985446L86.90248635081298,40.6082579107599L88.52126395142977,38.85868333764142L88.40884884027582,36.90952426538581L89.60044901850756,36.02044055302349M139.6476565042426,314.0820644185967L140.38959623785877,314.3375106050478L139.8275206820888,315.57182523303993L140.34463019339705,317.16708521653703L139.6026904597809,317.7411489488714L141.19898503816717,319.0801600616893L140.16476601555087,320.03619453787593L139.44530930416568,322.0109438162972L138.20874308147222,323.32665785726863L138.0738449480873,325.0234314278245L138.41109028154938,325.12944543634273L138.81578468170324,325.2990594705033L141.626162460552,326.14697519187723L139.08558094847285,327.3971825412574L138.6584035260878,328.5621296847546L137.1295580143942,330.5943424977285L136.9047277920863,331.58875029975655L138.36612423708766,332.32904178301135L138.86075072616495,333.36512852903206L138.41109028154938,334.71782267543756L138.2986751703952,335.79529735895176L138.54598841493407,337.27353306835386L137.8040486813179,338.3078521971803L138.20874308147222,339.9113802884659L137.6691505479332,341.429707334981L135.10608601362333,342.1042694246895L135.78057668054703,343.094754982906L137.64666752570247,343.7268077548465L138.748335615011,343.45293464721277L140.27718112670482,344.1059752606034L138.90571677062644,345.95899340849985L139.1080639707036,350.4604672499446M356.42895685350436,220.11037835966232L355.3048057419651,219.44523983538272L355.9118473421963,218.26963341153646L355.23735667527285,215.84974572626857L355.82191525327335,213.11557837840127L356.42895685350436,212.15885773427692L355.52963596427276,209.53109699146876L356.47392289796585,209.2636740090482L357.755455165121,210.3108766766228L359.6665120547382,209.84304530415403L358.3400137431215,207.41301734077405L355.0125264529647,205.87320944735495L353.281333741194,204.91301450679902L352.3370468075009,204.82367038178552L348.35755187265136,205.11402404783905L346.82870636095777,205.87320944735495L346.2441477829575,205.06935702425443L344.6253701823405,205.71693033369343L342.9616265372622,205.02468899318632L342.6018981815696,204.10877208671786L341.09553569210675,204.68964663164456L338.57743720225835,204.62263135230944L336.9361765794108,205.0916906619729L335.2499499121018,205.3150131903286L334.148281822793,204.91301450679902L332.8667495556381,205.3150131903286L330.19126991017447,205.15869006408747L329.2244999542504,205.5606389046763L327.5607563091721,204.77899680690325L326.12184288640174,204.60029242140507L324.32320110793876,204.26517817618077L322.29972910716765,203.03593932905312L320.253774084166,203.0806523435325L319.96149479516566,201.58221337525544L320.7933666177048,200.14980075221837M232.43508925070637,169.6372268965L233.10957991763007,170.63809608678525L234.36862916255427,172.29742848697998L233.94145174016944,173.79636286686815L235.2005009850934,174.45460150978084L235.35788214070885,177.03989914800133L238.28067503071134,178.39914103405306L239.31489405332763,180.39090925889997L240.61890934271332,181.2503371251491L238.59543734194244,181.77032623342234L236.12230489655576,181.27294833814375L235.22298400732416,182.5613384056578L233.22199502878402,183.37460469415583L233.10957991763007,184.27782320613L236.7743125412485,185.451362948079L237.06659183024885,187.27793186024098L235.7400935186322,188.02158700415328L235.29043307401662,189.9807444587998L238.82026756425034,192.49993170747035L239.67462240902023,192.27513850395394L241.40581512079075,193.53364274333688L243.65411734386976,195.0158271675752L243.29438898817716,195.98088244922798L242.66486436571495,196.83332262062044L239.40482614225084,195.80137365201693L239.15751289771197,197.03516157986718L237.49376925263368,197.01273606343653L236.52699929670985,196.00331988104625L235.56022934078578,196.5866020947537L235.650161429709,197.55087712615182L233.44682525109192,198.82836668351786L232.2102590283987,200.84375624283257L231.2210060502439,201.42559416036562L230.65893049447413,201.22420824429963L229.30994916062673,202.38748656767723L227.66868853777942,202.87943579019833L224.90327680339237,204.91301450679902L224.92575982562312,207.747600522261L225.57776747031585,211.44658443479636L226.949231826394,212.18111221241656L227.55627342662524,213.67160276611997L227.46634133770203,215.18321592207457L227.15157902647115,215.58316007640576L225.6452165370083,216.02745005059455L225.35293724800817,219.0016941412979L225.780114670393,219.75566467309886L224.610997514392,222.41452584882916M75.84083941326503,285.61349504214576L74.71668830172575,284.3861938065795L75.1888317685723,282.98588576889335L73.36770696787835,282.4039821976396L71.74892936726178,282.8781363706169L72.17610678964661,284.23543007389594M231.42335325032082,302.81799278820716L230.7488625833971,303.2027941476589L230.88376071678204,304.48505273924457M230.88376071678204,304.48505273924457L229.5122963607041,301.5562973356006L228.7029075603955,301.5990767850153L226.83681671523982,302.5614267274125L226.52205440400894,303.7798889661604L224.8807937811614,302.81799278820716M224.8807937811614,302.81799278820716L224.43113333654583,303.5020445442596L225.82508071485472,305.0618626336847L222.76738969146732,306.94095057738656L221.755653691082,306.42860602527935L219.75466471254163,309.18128311579073L220.4066723572348,310.1621627018085L220.04694400154176,311.52626098958984L220.90129884631187,312.3571653871958M220.90129884631187,312.3571653871958L219.30500426792582,313.01744329564167L218.20333617861706,312.6979743644775L216.92180391146235,311.61149388371393L216.42717742238506,313.31557986852647L213.68424871022876,314.31622435089565L213.97652799922912,312.9322553139194L212.20036924299689,310.4179845538481L211.346014398227,311.07874347819785M240.68635840940578,303.88674427768785L240.8662225872522,304.2713869696947L239.15751289771197,306.38590611835997L237.7635655194033,306.21509951831786L235.7850595630939,306.85556677976746L234.99815378501626,305.93751498421256L232.86226667309143,305.9588686878389L231.42335325032082,302.81799278820716M244.77826845540926,301.2568212788392L243.631634321639,301.7701874765389L243.15949085479224,302.7324735982772L242.03533974325296,302.3262187821396L240.68635840940578,303.88674427768785M211.346014398227,311.07874347819785L210.37924444230293,312.0802260391547L210.69400675353404,312.91095789438015L209.6822707531485,315.74203115988996L210.2218632866875,315.93349999984366L209.74971981984095,317.91121861275644L208.7379838194554,318.7189044116174L207.52390061899268,317.7836673622894L205.52291164045255,317.52854690197216L204.75848888460587,318.40010968259304M204.75848888460587,318.40010968259304L202.2628734169882,319.2713937015509L200.8914090609103,320.5247055081348L199.43001261590916,321.3316201920964L196.19245741467557,321.41654480746115M320.253774084166,184.81954730098056L320.36618919532,185.33855417263595M320.50108732870444,180.16467860276208L320.77088359547406,181.54426168082517L320.253774084166,184.81954730098056M320.36618919532,185.33855417263595L319.4668683060884,185.83486260179404L318.27526812785663,188.0441174790722L318.70244555024146,188.80999535560653M136.6574145475479,149.9169257528721L135.28595019146974,150.53792659275922L134.11683303546852,151.8482121606139M134.11683303546852,151.8482121606139L133.30744423516035,150.44594024966932L132.9701989016985,150.10094877889287L131.64370059008206,149.5718308300514L129.84505881161886,150.2159534267281M129.84505881161886,150.2159534267281L129.2829832558491,149.41076341694048L129.91250787831132,148.0526096121319L130.8567948120044,147.45376808351426L131.1265910787738,146.9468964709858L130.69941365638874,145.263953533292M130.69941365638874,145.263953533292L131.08162503431208,145.03328733715534L133.3299272573911,144.24879442335947L134.72387463569999,144.34110600089326M294.9603740745292,164.94404441354504L296.1744572749917,162.11317407409388L296.28687238614566,159.5753216775937L300.153952209841,158.31649976570378L300.5586466099953,157.69820926835L302.37977141068905,156.96514402845133L304.40324341146015,157.33171417818147L305.6847756786151,158.7285750188995L305.57236056746115,159.78122676725843L306.3367833233078,160.9933013548614L305.8646398564615,161.6561670861194L305.75222474530756,164.1226341649687L304.5156585226141,165.83348672606246L304.94283594499916,168.29429450247613M293.8362229629895,171.54750449671536L293.92615505191293,167.26936110379586L294.9603740745292,164.94404441354504M304.94283594499916,168.29429450247613L306.78644376792363,169.88749534815088L306.5616135456157,170.6835771869915L305.0777340783836,171.0928564767043L304.9203529227684,172.11565674553248L303.8861339001521,172.88806299949783" stroke="rgba(255, 7, 58, 0.25098039215686274)"></path></g><g class="district-borders" fill="none" stroke-width="1.5"></g><g class="circles"><circle transform="translate(364.31541636802035,235.02477638505803)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="4.9266418583047"><title>0.4% from Mizoram</title></circle><circle transform="translate(152.29096220654276,424.641134884316)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="23.249184931949767"><title>7.9% from Tamil Nadu</title></circle><circle transform="translate(150.58107133240713,231.16261259587168)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="12.592489825288721"><title>2.3% from Madhya Pradesh</title></circle><circle transform="translate(118.57781233725613,295.7527477034413)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="36.36228265662099"><title>19.3% from Maharashtra</title></circle><circle transform="translate(205.7811059225864,267.181986258143)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="14.18486517383933"><title>2.9% from Chhattisgarh</title></circle><circle transform="translate(51.70548399295781,244.658588126114)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="12.857503645731544"><title>2.4% from Gujarat</title></circle><circle transform="translate(240.8684494185893,279.30421614681916)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="14.432304043360505"><title>3% from Odisha</title></circle><circle transform="translate(175.3246926361634,352.81771846088606)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="20.32953516438583"><title>6% from Andhra Pradesh</title></circle><circle transform="translate(119.28718508009595,368.72492647404613)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="24.4472207009304"><title>8.7% from Karnataka</title></circle><circle transform="translate(88.29258755811814,359.06731422502867)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="5.9683833657029774"><title>0.5% from Goa</title></circle><circle transform="translate(122.82638986814497,433.09329030967484)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="31.523505515725883"><title>14.5% from Kerala</title></circle><circle transform="translate(161.08088331933308,321.57112579166403)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="11.58846840613547"><title>2% from Telangana</title></circle><circle transform="translate(292.90307487917397,226.2294792850576)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="17.848854304968707"><title>4.6% from West Bengal</title></circle><circle transform="translate(72.45613647058718,283.830435609882)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="1.46157449348297"><title>0% from Dadra And Nagar Haveli And Daman And Diu</title></circle><circle transform="translate(173.96660590887575,415.09693071551004)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="5.059901184805885"><title>0.4% from Puducherry</title></circle><circle transform="translate(73.30025790362245,465.68835744088256)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="1.439791651594077"><title>0% from Lakshadweep</title></circle><circle transform="translate(391.4289649321827,157.8783569508753)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="3.321294928186896"><title>0.2% from Arunachal Pradesh</title></circle><circle transform="translate(364.32148487075466,185.6426228249223)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="11.051199029969553"><title>1.8% from Assam</title></circle><circle transform="translate(388.35221864211456,190.5800945419211)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="2.523568901377571"><title>0.1% from Nagaland</title></circle><circle transform="translate(341.442363581854,199.12969353582602)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="4.089669913330415"><title>0.2% from Meghalaya</title></circle><circle transform="translate(379.63129368104353,212.2324690066217)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="4.974555256502836"><title>0.4% from Manipur</title></circle><circle transform="translate(348.3817006299704,227.9866409674009)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="4.11018247770096"><title>0.2% from Tripura</title></circle><circle transform="translate(366.0234218936515,420.1156161453542)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="1.2370125302518158"><title>0% from Andaman And Nicobar Islands</title></circle><circle transform="translate(183.79674963653483,176.04212922360415)" fill-opacity="1" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="18.494096355323773"><title>5% from Uttar Pradesh</title></circle><circle transform="translate(85.23994570723477,181.58288599926146)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="13.816142732325837"><title>2.8% from Rajasthan</title></circle><circle transform="translate(133.22602344237674,147.82858416482105)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="16.969796698841147"><title>4.2% from Delhi</title></circle><circle transform="translate(121.91114184821578,138.40739833520587)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="12.419758451757424"><title>2.2% from Haryana</title></circle><circle transform="translate(300.247024241958,165.81435472624932)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="2.52899189401627"><title>0.1% from Sikkim</title></circle><circle transform="translate(258.10520737326493,196.7477521452719)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="12.050709522679568"><title>2.1% from Bihar</title></circle><circle transform="translate(257.35975431476936,229.49381810277922)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="8.351814174177967"><title>1% from Jharkhand</title></circle><circle transform="translate(128.09381686013973,38.3919769062048)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="2.0475351034841864"><title>0.1% from Ladakh</title></circle><circle transform="translate(99.98964059171111,61.7717487765743)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="8.15167467456841"><title>1% from Jammu And Kashmir</title></circle><circle transform="translate(135.14816551468584,91.84262647412817)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="6.694863702869536"><title>0.7% from Himachal Pradesh</title></circle><circle transform="translate(108.27177092897081,110.50105424227542)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="10.976347297712476"><title>1.8% from Punjab</title></circle><circle transform="translate(164.03998792444185,122.21730078795434)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="8.293322615212796"><title>1% from Uttarakhand</title></circle><circle transform="translate(128.30354756267604,112.63399360291403)" fill-opacity="0.25" pointer-events="all" style="cursor: pointer;" fill="rgba(255, 7, 58, 0.4392156862745098)" stroke="rgba(255, 7, 58, 0.4392156862745098)" r="3.615273157038068"><title>0.2% from Chandigarh</title></circle></g><g class="spikes"></g></svg></div>

                    </div>
                </div>
            </div>






            <div class="row mb-4">
                <div class="col-lg-6 col-md-6 mb-md-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-lg-6 col-7">
                                    <h6>Projects</h6>
                                    <p class="text-sm mb-0">
                                        <i class="fa fa-check text-info" aria-hidden="true"></i>
                                        <span class="font-weight-bold ms-1">30 done</span> this month
                                    </p>
                                </div>
                                <div class="col-lg-6 col-5 my-auto text-end">
                                    <div class="dropdown float-lg-end pe-4">
                                        <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fa fa-ellipsis-v text-secondary"></i>
                                        </a>
                                        <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5"
                                            aria-labelledby="dropdownTable">
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a>
                                            </li>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Another
                                                    action</a></li>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Something
                                                    else here</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Companies</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Members</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Budget</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Completion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ asset('assets') }}/img/small-logos/logo-xd.svg"
                                                            class="avatar avatar-sm me-3" alt="xd">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Material XD Version</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="avatar-group mt-2">
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Ryan Tompson">
                                                        <img src="{{ asset('assets') }}/img/team-1.jpg" alt="team1">
                                                    </a>
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Romina Hadid">
                                                        <img src="{{ asset('assets') }}/img/team-2.jpg" alt="team2">
                                                    </a>
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Alexander Smith">
                                                        <img src="{{ asset('assets') }}/img/team-3.jpg" alt="team3">
                                                    </a>
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Jessica Doe">
                                                        <img src="{{ asset('assets') }}/img/team-4.jpg" alt="team4">
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> $14,000 </span>
                                            </td>
                                            <td class="align-middle">
                                                <div class="progress-wrapper w-75 mx-auto">
                                                    <div class="progress-info">
                                                        <div class="progress-percentage">
                                                            <span class="text-xs font-weight-bold">60%</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-info w-60"
                                                            role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ asset('assets') }}/img/small-logos/logo-atlassian.svg"
                                                            class="avatar avatar-sm me-3" alt="atlassian">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Add Progress Track</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="avatar-group mt-2">
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Romina Hadid">
                                                        <img src="{{ asset('assets') }}/img/team-2.jpg" alt="team5">
                                                    </a>
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Jessica Doe">
                                                        <img src="{{ asset('assets') }}/img/team-4.jpg" alt="team6">
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> $3,000 </span>
                                            </td>
                                            <td class="align-middle">
                                                <div class="progress-wrapper w-75 mx-auto">
                                                    <div class="progress-info">
                                                        <div class="progress-percentage">
                                                            <span class="text-xs font-weight-bold">10%</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-info w-10"
                                                            role="progressbar" aria-valuenow="10" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ asset('assets') }}/img/small-logos/logo-slack.svg"
                                                            class="avatar avatar-sm me-3" alt="team7">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Fix Platform Errors</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="avatar-group mt-2">
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Romina Hadid">
                                                        <img src="{{ asset('assets') }}/img/team-3.jpg" alt="team8">
                                                    </a>
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Jessica Doe">
                                                        <img src="{{ asset('assets') }}/img/team-1.jpg" alt="team9">
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> Not set </span>
                                            </td>
                                            <td class="align-middle">
                                                <div class="progress-wrapper w-75 mx-auto">
                                                    <div class="progress-info">
                                                        <div class="progress-percentage">
                                                            <span class="text-xs font-weight-bold">100%</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-success w-100"
                                                            role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ asset('assets') }}/img/small-logos/logo-spotify.svg"
                                                            class="avatar avatar-sm me-3" alt="spotify">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Launch our Mobile App</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="avatar-group mt-2">
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Ryan Tompson">
                                                        <img src="{{ asset('assets') }}/img/team-4.jpg" alt="user1">
                                                    </a>
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Romina Hadid">
                                                        <img src="{{ asset('assets') }}/img/team-3.jpg" alt="user2">
                                                    </a>
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Alexander Smith">
                                                        <img src="{{ asset('assets') }}/img/team-4.jpg" alt="user3">
                                                    </a>
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Jessica Doe">
                                                        <img src="{{ asset('assets') }}/img/team-1.jpg" alt="user4">
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> $20,500 </span>
                                            </td>
                                            <td class="align-middle">
                                                <div class="progress-wrapper w-75 mx-auto">
                                                    <div class="progress-info">
                                                        <div class="progress-percentage">
                                                            <span class="text-xs font-weight-bold">100%</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-success w-100"
                                                            role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ asset('assets') }}/img/small-logos/logo-jira.svg"
                                                            class="avatar avatar-sm me-3" alt="jira">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Add the New Pricing Page</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="avatar-group mt-2">
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Ryan Tompson">
                                                        <img src="{{ asset('assets') }}/img/team-4.jpg" alt="user5">
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> $500 </span>
                                            </td>
                                            <td class="align-middle">
                                                <div class="progress-wrapper w-75 mx-auto">
                                                    <div class="progress-info">
                                                        <div class="progress-percentage">
                                                            <span class="text-xs font-weight-bold">25%</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-info w-25"
                                                            role="progressbar" aria-valuenow="25" aria-valuemin="0"
                                                            aria-valuemax="25"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ asset('assets') }}/img/small-logos/logo-invision.svg"
                                                            class="avatar avatar-sm me-3" alt="invision">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Redesign New Online Shop</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="avatar-group mt-2">
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Ryan Tompson">
                                                        <img src="{{ asset('assets') }}/img/team-1.jpg" alt="user6">
                                                    </a>
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Jessica Doe">
                                                        <img src="{{ asset('assets') }}/img/team-4.jpg" alt="user7">
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> $2,000 </span>
                                            </td>
                                            <td class="align-middle">
                                                <div class="progress-wrapper w-75 mx-auto">
                                                    <div class="progress-info">
                                                        <div class="progress-percentage">
                                                            <span class="text-xs font-weight-bold">40%</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-info w-40"
                                                            role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                            aria-valuemax="40"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="card h-100">
                        <div class="card-header pb-0">
                            <h6>Voters overview</h6>
                            <p class="text-sm">
                                <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                                <span class="font-weight-bold">24%</span> this month
                            </p>
                        </div>
                        <div class="card-body p-3">
                            <div class="timeline timeline-one-side">
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                        <i class="material-icons text-success text-gradient">notifications</i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">$2400, Designation
                                        </h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 PM
                                        </p>
                                    </div>
                                </div>
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                        <i class="material-icons text-danger text-gradient">code</i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">New order #1832412</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 11 PM
                                        </p>
                                    </div>
                                </div>
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                        <i class="material-icons text-info text-gradient">shopping_cart</i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">Server payments for
                                            April</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 9:34 PM
                                        </p>
                                    </div>
                                </div>
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                        <i class="material-icons text-warning text-gradient">credit_card</i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">New card added for order
                                            #4395133</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">20 DEC 2:20 AM
                                        </p>
                                    </div>
                                </div>
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                        <i class="material-icons text-primary text-gradient">key</i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">Unlock packages for
                                            development</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">18 DEC 4:54 AM
                                        </p>
                                    </div>
                                </div>
                                <div class="timeline-block">
                                    <span class="timeline-step">
                                        <i class="material-icons text-dark text-gradient">payments</i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">New order #9583120</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">17 DEC</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>
    </div>
    @push('js')
    <script src="{{ asset('assets') }}/js/plugins/chartjs.min.js"></script>
    <script>
        var ctx = document.getElementById("chart-bars").getContext("2d");

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["M", "T", "W", "T", "F", "S", "S"],
                datasets: [{
                    label: "Sales",
                    tension: 0.4,
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                    backgroundColor: "rgba(255, 255, 255, .8)",
                    data: [50, 20, 10, 22, 50, 10, 40],
                    maxBarThickness: 6
                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: 500,
                            beginAtZero: true,
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                            color: "#fff"
                        },
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });


        var ctx2 = document.getElementById("chart-line").getContext("2d");

        new Chart(ctx2, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0,
                    borderWidth: 0,
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(255, 255, 255, .8)",
                    pointBorderColor: "transparent",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderWidth: 4,
                    backgroundColor: "transparent",
                    fill: true,
                    data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });

        var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

        new Chart(ctx3, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0,
                    borderWidth: 0,
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(255, 255, 255, .8)",
                    pointBorderColor: "transparent",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderWidth: 4,
                    backgroundColor: "transparent",
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#f8f9fa',
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });

    </script>
    @endpush
</x-layout>
