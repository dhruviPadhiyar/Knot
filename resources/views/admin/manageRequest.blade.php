<x-home.layout>
    <x-admin.navbar :notifications="$notifications" />

    <div class="container">
        <div class="reqTable">
            <div class="requestsCards">
                @foreach ($requests as $request)
                    <div class="requests-{{ $request->id }} rounded border shadow bg-body-tertiary m-5">
                        <div class="row">

                            <div class="col-sm-6">
                               <div class="thumbnail m-4">
                                <img src="{{ asset("Events/$request->thumbnail") }}" class="img-thumbnail" alt="event image" />
                               </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="details m-3 p-3">
                                    <div class="title text-center">
                                        <h4 class="fw-bold">
                                            {{ ucwords($request->title) }}
                                        </h4>
                                    </div>
                                    <div class="author p-1">
                                        <div class="row">
                                            <div class="col-1">
                                               <label class="fw-bold"> <i class="fa-solid fa-user"></i></label>
                                            </div>
                                            <div class="col-11">
                                                <p class="fw-bold">
                                                    {{ ucwords($request->user->name) }}
                                               </p>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="descriprion p-1">
                                        <div class="row">
                                            <div class="col-sm-1">
                                                <label for="description" class="fw-bold"><i
                                                        class="fa-solid fa-circle-info"></i></label>
                                            </div>
                                            <div class="col-sm-11">
                                                <p>{{ $request->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dates m-1 p-1">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <label for="startDate" class="form-label"><i
                                                                class="fa-solid fa-circle-play"></i></label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <strong>
                                                            {{ date('d/m/Y', strtotime($request->startDate)) }}
                                                        </strong>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <label for="startDate" class="form-label"><i
                                                                class="fa-solid fa-circle-stop"></i></label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <strong>
                                                            {{ date('d/m/Y', strtotime($request->endDate)) }}
                                                        </strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="venue m-1 p-1">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <i class="fa-solid fa-location-dot"></i>
                                            </div>
                                            <div class="col-sm-10">
                                                <strong>{{ $request->venue->name }}</strong>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="status m-1 p-1">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <label for="" class="form-label"><i
                                                        class="fa-solid fa-chart-simple"></i></label>
                                            </div>
                                            <div class="col-sm-10">
                                                <strong class="text-danger">{{ ucwords($request->status) }}</strong>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="status m-1 p-1">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <label for="" class="form-label"><i
                                                        class="fa-regular fa-money-bill-1"></i></label>
                                            </div>
                                            <div class="col-sm-10">
                                                <strong>{{ $request->price }}</strong>
                                            </div>
                                        </div>
                                    </div>

                                    @if ($request->status == 'pending')
                                        <div class="action text-end m-2">
                                            <a href="{{ route('req.aproove', $request->id) }}"
                                                class="btn btn-sm btn-outline-danger">Aproove</a>
                                            <a href="{{ route('req.reject', $request->id) }}"
                                                class="btn btn-sm btn-danger">Reject</a>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-home.layout>
