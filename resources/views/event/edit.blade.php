<x-home.layout>
    <x-admin.navbar />


    <div class="container">
        <div class="alert alert-danger mt-3">
            <p>Click on the field you want to edit! <span>
                    <small>
                        (click to hide me)</small></span></p>
        </div>
        <div class="main">
            <div class="showEvent shadow bg-body-tertiary mt-5 p-5 rounded">
                <a href="{{ url()->previous() }}" class="btn">
                    < Go back</a>
                        <form method="post" action="">
                            @csrf
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="eventThumbnail mt-5">
                                        <img src="{{ url('Events/' . $event->thumbnail) }}" class="img-fluid rounded"
                                            alt="" />
                                    </div>
                                    <div class="newImg">
                                        <input type="file" class="form-control" name="thumbnail"
                                            aria-describedby="helpId" placeholder="Select image" />
                                        <small id="helpId" class="form-text text-muted">Edit the Thumbnail</small>
                                    </div>

                                </div>
                                <div class="col-sm-7">
                                    <div class="eventTitle text-center  " style="margin-top: -50px;">
                                        <h3 class="text-danger fw-bold">{{ $event->name }}</h3>
                                    </div>
                                    <table class="table table-bordered table-responsive text-center m-3">
                                        <tr>
                                            <th>Title</th>
                                            <td class="orgVal">{{ $event->name }}</td>
                                            <td class="newVal">
                                                <input type="text" class="form-control form-control-sm"
                                                    id="name" value="{{ $event->name }}" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td class="orgVal">
                                                <p>{{ $event->description }}</p>
                                            </td>
                                            <td class="newVal">
                                                <textarea class="form-control form-control-sm" name="description">{{ $event->description }}</textarea>
                                            </td>

                                        </tr>
                                        <tr>
                                            <th>Category</th>
                                            <td class="orgVal">{{ $event->category->title }}</td>
                                            <td class="newVal">
                                                <select class="form-select form-select-sm" name="category"
                                                    id="category">
                                                    <option selected>{{ $event->category->title }}</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->title }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Host</th>
                                            <td class="orgVal">{{ $event->host->name }}</td>
                                            <td class="newVal">
                                                <select class="form-select form-select-sm" name="host"
                                                    id="host">
                                                    <option selected>{{ $event->host->name }}</option>
                                                    @foreach ($hosts as $host)
                                                        <option value="{{ $host->id }}">{{ $host->name }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Start Date</th>
                                            <td class="orgVal">
                                                {{ date_format(date_create($event->start_date), 'F d, Y') }}
                                            </td>
                                            <td class="newVal">
                                                <input type="date" class="form-control form-control-sm"
                                                    name="start" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>End Date</th>
                                            <td class="orgVal">
                                                {{ date_format(date_create($event->end_date), 'F d, Y') }}
                                            </td>
                                            <td class="newVal">
                                                <input type="date" class="form-control form-control-sm"
                                                    name="end" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Venue</th>
                                            <td class="orgVal">
                                                <a href="{{ route('mapview', $event->venue->id) }}" class="text-dark"
                                                    style="text-decoration: none;">{{ $event->venue->name }}</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td class="orgVal">{{ $event->status->name }}</td>
                                            <td class="newVal">
                                                <select class="form-select form-select-sm" name="status"
                                                    id="status">
                                                    <option selected>{{ $event->status->name }}</option>
                                                    @foreach ($statuses as $status)
                                                        <option value="{{ $status->id }}">{{ $status->name }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </td>
                                        </tr>
                                        <tr class="submitBtn">
                                            <td colspan="2" class="text-end">
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    Edit Details
                                                </button>

                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
            </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(".newVal").hide();
            $(".submitBtn").hide();
            $(".newImg").hide();

            $('.alert').click(function() {
                $(this).hide();
            });
            $(".orgVal").click(function() {
                var newVal = $(this).closest("tr").find(".newVal"); // Find the related newVal element
                $(this).hide(); // Hide orgVal
                newVal.show(); // Show newVal
                $(".submitBtn").show();
            });
            $(".eventThumbnail").click() {
                $(".newImg").show();
            }
        });
    </script>

</x-home.layout>
