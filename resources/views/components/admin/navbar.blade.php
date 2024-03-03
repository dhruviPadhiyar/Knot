<div class=" container-fluid ">
    <nav class="navbar row navbar-expand-sm navbar-light bg-danger-subtle">
        {{-- col-1 --}}
        <div class="col-3">
            <a class="navbar-brand m-2" href="#">
                <x-knot.icon />
                {{-- <span class="text-danger m-3 fw-bold h1">KNOT</span> --}}
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation"></button>
        </div>
        {{-- col-2  --}}
        <div class="col-6">
            <div class="collapse p-2 navbar-collapse ms-5" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item p-2">
                        <a class="nav-link active" href="{{ route('index') }}" aria-current="page">Dashboard<span
                                class="visually-hidden">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown p-2">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Events</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item text-danger" href="{{ route('event.create') }}">
                                Create
                                <i class="fa-solid fa-plus m-2"></i>
                            </a>
                            <a class="dropdown-item text-danger" href="{{ route('event.manage') }}">Manage
                                <i class="fa-solid fa-bars-progress m-2"></i>
                            </a>
                        </div>
                    </li>
                    <!-- category -->
                    <li class="nav-item dropdown p-2">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Category</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item text-danger" href="{{ route('category.create') }}">
                                Create
                                <i class="fa-solid fa-plus m-2"></i>
                            </a>
                            <a class="dropdown-item text-danger" href="{{ route('category.index') }}">Manage
                                <i class="fa-solid fa-bars-progress m-2"></i>
                            </a>
                        </div>
                    </li>


                    <!-- venue -->
                    <li class="nav-item dropdown p-2">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Venue</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item text-danger" href="{{ route('venue.create') }}">
                                Create
                                <i class="fa-solid fa-plus m-2"></i>
                            </a>
                            <a class="dropdown-item text-danger" href="{{ route('venue.manage') }}">Manage
                                <i class="fa-solid fa-bars-progress m-2"></i>
                            </a>
                        </div>
                    </li>


                    <!-- status -->
                    <li class="nav-item dropdown p-2">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Status</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item text-danger" href="{{ route('status.create') }}">
                                Create
                                <i class="fa-solid fa-plus m-2"></i>
                            </a>
                            <a class="dropdown-item text-danger" href="{{ route('status.manage') }}">Manage
                                <i class="fa-solid fa-bars-progress m-2"></i>
                            </a>
                        </div>
                    </li>


                    <!-- requests -->
                    <li class="nav-item dropdown p-2">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Requests</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item text-danger" href="{{ route('requests.manage') }}">
                                Manage
                                <i class="fa-solid fa-bars-progress m-2"></i>
                            </a>

                        </div>
                    </li>


                </ul>
            </div>
        </div>
        {{-- div-3  --}}
        <div class="col-3">


            {{-- profile-section --}}
            <div class="row">
                <div class="col-9 text-end">
                    <button type="button" id="bell" class="btn btn-lg text-danger">
                        <i class="fa-solid fa-bell"></i>
                        <span class="badge badge-light text-danger">{{ $notifications->count() }}</span>
                        <span class="sr-only">unread messages</span>
                    </button>
                </div>

                <div class="col-3">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a href="route('logout')"
                            onclick="event.preventDefault();
                                                this.closest('form').submit();"
                            class="btn btn-sm btn-outline-danger mt-2 ">

                            Logout
                        </a>
                    </form>
                </div>
            </div>

        </div>
    </nav>
</div>
<div class="notify d-flex flex-row-reverse">
    <div class="notifications border bg-body-tertiary" style="width:500px;">
        @foreach ($notifications as $notification)
            <div class="notification{{ $notification->id }} m-2 p-2 border">
                <strong class="mb-1">{{ $notification->subject }}</strong>
                <p>
                    <strong>{{ ucwords($notification->sender->name) }}</strong> has requested for Event.
                    <a href="{{ route('requests.manage') }}" class="btn btn-sm btn-outline-danger ms-3">Check the
                        request</a>
                </p>
            </div>
        @endforeach
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".notifications").hide();
        $("#bell").click(function() {
            $(".notifications").toggle();
            console.log("notification");
        });
    });
</script>
