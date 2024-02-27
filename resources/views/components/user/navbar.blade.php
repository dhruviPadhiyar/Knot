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
        <div class="col-3 text-end">
            <p class="me-5">
                {{-- profile-section --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a href="route('logout')"
                    onclick="event.preventDefault();
                                        this.closest('form').submit();"
                    class="btn btn-sm btn-outline-danger me-5 ">

                    Logout
                </a>
            </form>
            </p>
        </div>
    </nav>
</div>
