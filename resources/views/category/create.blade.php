<x-home.layout>
    <x-admin.navbar />

    <div class="container" style="margin-bottom: 120px;">
        <div class="createCategory m-5 p-5 shadow">
            {{-- create-category-form  --}}
            <div class="row">
                <div class="col-5">
                    <img
                        src="{{ asset('images/create-1.jpg') }}"
                        class="img-fluid rounded-top"
                        alt="create-category"
                    />
                    
                </div>
                <div class="col-7">
                    <div class="heading text-center">
                        <h2 class="fw-bold text-danger">
                        Create Category

                        </h2>
                    </div>
                    <div class="categoryForm m-5 p-4 shadow bg-body-tertiary">
                        <form action="{{ route('category.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="category" class="form-label">Title</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="category"
                                    id="category"
                                    placeholder="Category title"
                                    required
                                />
                            </div>
                            
                            <div class="mb-3">
                                <label for="description" class="form-label">Description </label>
                                <textarea class="form-control" name="description" id="description" placeholder="Category Description" ></textarea>
                            </div>
                            
                            <div class="submitBtn text-end m-2">
                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm mt-1"
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