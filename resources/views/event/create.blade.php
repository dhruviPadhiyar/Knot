<x-home.layout>
    <x-admin.navbar />

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

                            <div class="mt-3 row">
                                <div class="col-sm-6">
                                    <button type="button" id="przBtn" class="btn btn-danger bg-gradient btn-sm">
                                        Create Event & Add Prizing
                                    </button>
                                </div>
                                <div class="col-sm-6 text-end">
                                    <button type="submit" class="btn btn-danger bg-gradient btn-sm">
                                        Create Event
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $("#przBtn").click(function(){
            window.location.href = "{{ route('event.prizing.add') }}";
        });
        });
        // $(document).ready(function() {
        //     $("#eventForm").submit(function(e) {
        //         // e.preventDefault(); // Prevent the default form submission

        //         let form = $(this)[0]; // Get the form element

        //         let data = new FormData(form); // Serialize form data

        //         $.ajax({
        //             type: "post",
        //             url: "{{ route('event.prizing.add') }}",
        //             data: data,
        //             processData: false,
        //             contentType: false,
        //             success: function(response) {
        //                 console.log(response); // Log the response
        //             },
        //             error: function(xhr, status, error) {
        //                 console.error(error); // Log any errors
        //             }
        //         });
        //     });
        // });
    </script>
</x-home.layout>
