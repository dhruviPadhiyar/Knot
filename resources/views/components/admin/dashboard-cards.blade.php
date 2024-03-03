<div class="container dashboard p-3">
    <div class="heading text-center m-4">
        <h1 class="display-3 fw-bold">Admin Dashboard</h1>
    </div>
    <!-- manage events -->
    <div class="eventMangement shadow bg-body-tertiary rounded m-3 mt-5 p-3">
        <div class="heading text-danger">
            <h1 class="ms-3 fw-bold align-baseline">Events</h1>
        </div>
        <div class="row m-2 p-3 h-100">
            {{-- <div class="content"> --}}
                <!-- column - one -->
                <div class="col-4">
                    <div class="card m-2 p-3 rounded">
                        <div class="row g-0">
                            <div class="col-md-4 text-danger">
                                <h1 class="display-2 m-1 p-1">
                                    <i class="fa-solid fa-cubes-stacked"></i>
                                </h1>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Total Events</h5>
                                    <p class="card-text fw-bold">
                                        {{ $events->count() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- column - two -->
                <div class="col-4">
                    <div class="card m-2 p-3 rounded">
                        <div class="row g-0">
                            <div class="col-md-4 text-danger">
                                <h1 class="display-2 m-1 p-1">
                                    <i class="fa-solid fa-parachute-box"></i>
                                </h1>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">On-going Events</h5>
                                    <p class="card-text fw-bold">
                                        {{ count($onGoing) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- column - three -->
                <div class="col-4">
                    <div class="card m-2 p-3 rounded">
                        <div class="row g-0">
                            <div class="col-md-4 text-danger">
                                <h1 class="display-2 m-1 p-1">
                                <i class="fa-solid fa-fan"></i> </h1>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Upcoing Events</h5>
                                    <p class="card-text fw-bold">
                                        {{ count($upComing) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {{-- </div> --}}
    </div>

    <!-- manage users -->
    <div class="eventMangement shadow bg-body-tertiary rounded m-3 mt-5 p-3">

        <div class="heading text-danger">
            <h1 class="ms-3 fw-bold align-baseline">Users</h1>
        </div>
        <div class="content">

            <div class="row m-2 p-3">

                <!-- column - one -->
                <div class="col-4">
                    <div class="card m-3 p-3 rounded">
                        <div class="row g-0">
                            <div class="col-md-4 text-danger">
                                <h1 class="display-3 m-1 p-1">
                                <i class="fa-solid fa-users"></i>
                                </h1>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Total Users</h5>
                                    <p class="card-text fw-bold">
                                       {{ count($users) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- column - two -->
                <div class="col-4">
                    <div class="card m-3 p-3 rounded">
                        <div class="row g-0">
                            <div class="col-md-4 text-danger">
                                <h1 class="display-3 m-1 p-1">
                                <i class="fa-solid fa-clipboard-user"></i> </h1>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Total Hosts</h5>
                                    <p class="card-text fw-bold">
                                        {{ count($hosts) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- manage requests -->
    <div class="eventMangement shadow bg-body-tertiary rounded m-3 mt-5 p-3">

        <div class="heading text-danger">
            <h1 class="ms-3 fw-bold align-baseline">Requests</h1>
        </div>
        <div class="content">

            <div class="row m-2 p-3">

                <!-- column - one -->
                <div class="col-4">
                    <div class="card m-2 p-3 rounded">
                        <div class="row g-0">
                            <div class="col-md-4 text-danger">
                                <h1 class="display-3 m-1 p-1">
                                    <i class="fa-solid fa-people-group"></i></h1>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Total Requests</h5>
                                    <p class="card-text fw-bold">
                                        {{ $requests->count() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- column - two -->
                <div class="col-4">
                    <div class="card m-2 p-3 rounded">
                        <div class="row g-0">
                            <div class="col-md-4 text-danger">
                                <h1 class="display-3 m-1 p-1">
                                    <i class="fa-solid fa-people-line"></i> </h1>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Pending</h5>
                                    <p class="card-text fw-bold">
                                            {{ $pending->count()  }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                 <!-- column - three -->
                 <div class="col-4">
                    <div class="card m-2 p-3 rounded">
                        <div class="row g-0">
                            <div class="col-md-4 text-danger">
                                <h1 class="display-3 m-1 p-1">
                                    <i class="fa-solid fa-check-to-slot"></i> </h1>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Completed</h5>
                                    <p class="card-text fw-bold">
                                        {{ $apr->count() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
