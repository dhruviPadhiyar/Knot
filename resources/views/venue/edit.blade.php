<x-home.layout>
    <x-admin.navbar />
    <div class="container">
        {{-- edit venue page --}}
        <div class="main" style="margin-top: 50px;">
            <div class="row m-5 shadow rounded p-4">
                <div class="col-5">
                    <div class="image">
                        <img src="{{ asset('images/venue/5.svg') }}" class="img-fluid rounded-top" alt="" />
                    </div>
                </div>
                <div class="col-7">
                    <div class="editForm">
                        <form action="{{ route('venue.update', $venue->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" aria-describedby="helpId"
                                    value="{{ $venue->name }}" />
                                <small id="helpId" class="form-text text-muted">Edit venue name</small>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Address </label>
                                <input type="text" class="form-control" name="" id=""
                                    aria-describedby="helpId" value="{{ $venue->address }}" />
                                <small id="helpId" class="form-text text-muted">Edit venue address</small>
                            </div>

                            <div class="submitBtn text-end">
                                <button type="submit" class="btn btn-danger btn-sm bg-gradient">
                                    Edit Venue Details
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-home.layout>
