<x-home.layout>
    <x-admin.navbar />
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="container-fluid ">
        <div class="main p-4 m-2">
            <div class="row">

                <div class="col-5">
                    <div class="formImg m-2">
                        <img src="{{ asset('images/event-photo/6.svg') }}" class="img-fluid rounded " alt="" />
                    </div>
                </div>
                <div class="col-7">
                    {{-- event create form --}}

                    <div class="eventForm p-4 rounded border shadow">
                        <div class="heading mb-3 text-center">
                            <h2 class="fw-bold text-danger">
                                Create an Event
                            </h2>
                        </div>
                        <form action="{{ route('event.store') }}" method="POST" id="eventForm"
                            enctype="multipart/form-data">
                            @csrf

                            <x-form.input name="name" placeholder="Enter the Event name" required />

                            <x-form.textarea name="description" placeholder="What describes your event best?"
                                required />
                            <div class="row">
                                <div class="col-6">
                                    <x-form.input name="start" type="date" placeholder="Event start date" />
                                </div>
                                <div class="col-6">
                                    <x-form.input name="end" type="date" placeholder="Event end date" />
                                </div>
                            </div>
                            <x-form.field>
                                <x-form.label name="category" />
                                <select class="form-select form-select-sm" name="category">
                                    <option selected disabled> Select {{ ucwords('category') }}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </x-form.field>
                            {{-- <div class="row"> --}}
                            <div class="host">
                                <x-form.field>
                                    <x-form.label name="host" />
                                    <select class="form-select form-select-sm" name="host">
                                        <option selected disabled> Who's hosting the event ?</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </x-form.field>

                            </div>
                            <div class="venue">
                                <x-form.field>
                                    <x-form.label name="venue" />
                                    <select class="form-select form-select-sm" name="venue">
                                        <option selected disabled> Where the event will be held?</option>
                                        @foreach ($venue as $loc)
                                            <option value="{{ $loc->id }}">{{ $loc->name }}</option>
                                        @endforeach
                                    </select>
                                </x-form.field>

                            </div>
                            {{-- </div> --}}
                            <div class="row">
                                <div class="col-6">
                                    <x-form.input name="thumbnail" placeholder="Upload a thumbnail" type="file" />
                                </div>
                                <div class="col-6">
                                    <x-form.field>
                                        <x-form.label name="status" />
                                        <select class="form-select form-select-sm" name="status">
                                            <option selected disabled> What's the status of the Event? </option>
                                            @foreach ($statuses as $status)
                                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                                            @endforeach
                                        </select>
                                    </x-form.field>
                                </div>
                            </div>

                            <!-- pricing section -->
                            <label for="pricing" class="ms-2 form-label ms-1">Add Pricing (optional)</label>
                            <section class="secPrc p-2 shadow rounded m-2 mb-3 border bg-body-tertiary">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" class="form-control" name="price" id="price"
                                        placeholder="Enter price" />
                                </div>

                    </div>
                    </section>

                    <div class="text-end">
                        <button type="submit" class="btn btn-danger bg-gradient btn-sm">
                            Create Event
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    </script>
</x-home.layout>
