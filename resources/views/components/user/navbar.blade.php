<div class=" container-fluid ">
    <nav class="navbar row navbar-expand-sm navbar-light bg-danger-subtle">
        {{-- col-1 --}}
        <div class="col-3">
            <a class="navbar-brand m-2" href="{{ route('index') }}">
                <x-knot.icon />
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
            </button>
        </div>
        {{-- col-2  --}}
        <div class="col-6">
            <div class="collapse p-2 navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">

                    <h2 class="text-danger fw-bold">
                        KNOT: YOUR ONE STEP EVENT MANAGEMENT COMPANY
                    </h2>

                </ul>
            </div>
        </div>
        {{-- div-3  --}}
        <div class="col-3">
            <div class="row">
                <div class="col-7 text-end">
                    <button type="button" id="bell" class="btn btn-lg text-danger">
                        <i class="fa-solid fa-bell"></i>
                        <span class="badge badge-light text-danger">{{ $notifications->count() }}</span>
                        <span class="sr-only">unread messages</span>
                    </button>
                </div>
                <div class="col-5 mt-2">
                    <div class="dropdown open">
                        <button class="btn btn-danger dropdown-toggle" type="button" id="triggerId"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="triggerId">
                            <a class="dropdown-item" href="{{ route('user.booking') }}">
                                Bookings
                            </a>
                            <a href="{{ route('request.create') }}" class="dropdown-item">Make Request</a>
                            {{-- <a class="dropdown-item" href="{{ route('user.requests') }}">
                                Requests
                            </a> --}}
                            <button class="dropdown-item ">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <a href="route('logout')"
                                        onclick="event.preventDefault();
                                                        this.closest('form').submit();"
                                        class="btn btn-sm btn-outline-danger me-5 ">
                                        Logout
                                    </a>
                                </form>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </nav>
</div>
@if ($notifications->count())
    <div class="notify d-flex flex-row-reverse">
        <div class="notifications border bg-body-tertiary" style="width:500px;">
            @foreach ($notifications as $notification)
                <div class="notification{{ $notification->id }} m-2 p-2 border">
                    <strong class="mb-1">{{ $notification->subject }}</strong>
                    <p>
                        {{ $notification->body }}
                        {{-- <a href="{{ route('requests.manage') }}" class="btn btn-sm btn-outline-danger ms-3">Check the
                            request</a> --}}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
@endif

<script>
    $(document).ready(function() {
        $(".notifications").hide();
        $("#bell").click(function() {
            $(".notifications").toggle();
            console.log("notification");
        });
    });
</script>
