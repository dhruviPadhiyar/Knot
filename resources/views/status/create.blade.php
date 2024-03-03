<x-home.layout>
    <x-admin.navbar :notifications="$notifications"  />
    <div class="container">
        <div class="main mt-5">
            <div class="row m-5 p-4 shadow rounded bg-body">
                <div class="col-sm-5">
                    <img
                        src="{{ asset('images/status.svg') }}"
                        class="img-fluid rounded"
                        alt="status i"
                    />

                </div>
                <div class="col-sm-7">
                    <div class="heading text-center ">
                        <h3 class="text-danger fw-bold">Create Status</h3>
                    </div>
                    <div class="createStatusForm">
                        <form action="{{ route('status.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="status" class="form-label">Name </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    id="name"
                                    aria-describedby="helpId"
                                    placeholder="Status title"
                                />
                            </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" name="description" id="description" placeholder="Description"></textarea>
                                </div>
                                <div class="submitBtn text-end">
                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                    >
                                        Create
                                    </button>

                                </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-home.layout>
