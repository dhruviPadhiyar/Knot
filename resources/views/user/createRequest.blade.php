<x-home.layout>
    <x-user.navbar :notifications="$notifications" />
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="container">
        <div class="main border shadow rounded p-2 m-2 mt-5 bg-body-tertiary">
            <div class="row m-3 p-1">
                <div class="col-5">
                    <img src="{{ asset('images/14.svg') }}" class="img-fluid " alt="" />
                </div>
                <div class="col-7">
                    {{-- create request form --}}
                    <h3 class="text-danger text-center">Fill the Details</h3>
                    <div class="reqForm me-3">
                        <form action="{{ route('request.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control form-control-sm" name="title" id="title"
                                    placeholder="Event Title" />
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description </label>
                                <textarea class="form-control" name="description" id="description" placeholder="What the event is about?"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select form-select-sm" name="category" id="category">
                                    <option selected disabled>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="venue" class="form-label">Venue</label>
                                <select class="form-select form-select-sm" name="venue" id="venue">
                                    <option selected disabled>Select Venue</option>
                                    @foreach ($venues as $venue)
                                        <option value="{{ $venue->id }}">{{ $venue->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="start" class="form-label">Start Date</label>
                                        <input type="date" class="form-control form-control-sm" name="start"
                                            id="start" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="end" class="form-label">End Date</label>
                                        <input type="date" class="form-control form-control-sm" name="end"
                                            id="end" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Price </label>
                                        <input type="number" class="form-control" name="price" id="price"
                                            placeholder="Price" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="thumbnail" class="form-label">Thumbnail</label>
                                        <input type="file" class="form-control" name="thumbnail" id="thumbnail"
                                            placeholder="Thumbnail of the Event" />
                                    </div>
                                </div>
                                <div class="text-end sub">
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


</x-home.layout>
