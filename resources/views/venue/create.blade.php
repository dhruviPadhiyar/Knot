<x-home.layout>
    <x-admin.navbar />
    <div class="container">
        <div class="row mt-5">
            {{-- <div class="d-flex align-items-baseline"> --}}
            <div class="col-sm-7">
                <div class="venueForm p-4 bg-body-tertiary shadow rounded " style="margin-top: 100px;">
                    {{-- venue form --}}
                    <div class="note text-center m-3">
                        <small class="text-danger fw-bold text-uppercase">
                            the address is needed for the location feature. thankyou!
                        </small>
                    </div>
                    <form action="{{ route('venue.store') }}" method="post">
                        @csrf
                        <x-form.input name="name" placeholder="Enter venue name" class="form-control" />
                        <x-form.input name="address" placeholder="Enter full address" class="form-control" />
                        <div class="submitBtn text-end m-2 mt-4">
                            <button type="submit" class="btn btn-danger bg-gradient btn-sm">
                                Add Venue
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="mapImage">
                    <img src="{{ asset('images/venue/3.svg') }}" class="img-fluid rounded" alt="" />
                </div>
            </div>
        </div>
    </div>
    </div>
</x-home.layout>
