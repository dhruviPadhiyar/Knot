<x-home.layout>
    {{-- edit category --}}
    <x-admin.navbar />
    <div class="container">
        <div class="alert alert-danger m-2">
            <h5>Click on the field you want to edit
                <span>
                    <small> (click to hide me) </small>
                </span>
            </h5>
        </div>
        <div class="editCategoryForm m-5 p-5 shadow border">
            <div class="row">
                <div class="col-7">
                    <div class="heading mb-4 text-danger text-center">
                        <h2>Edit Category</h2>
                    </div>

                    <div class="categoryTitle shadow m-3 p-4 border">
                        <form action="{{ route('category.update',$category->id) }}" method="POST">
                            @csrf
                        <div class="orgValue">
                            <h5> Category Title : {{ $category->title }}</h5>
                        </div>
                        <div class="newValue">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="title"
                                    id="title"
                                    value="{{ $category->title }}"
                                />
                            </div>

                        </div>
                    </div>
                    <div class="categoryDesctiption shadow m-3 p-4 border">
                        <div class="orgValue">
                            <h5>Description : {{ $category->description }} </h5>
                        </div>
                        <div class="newValue">
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description">
                                    {{ $category->description }}
                                </textarea>
                            </div>

                        </div>
                    </div>
                    <div class="editBtn m-3 text-end">
                        <button type="submit" class="btn btn-sm btn-danger p-2">
                            Edit <i class="fa-regular fa-pen-to-square m-1"></i>
                        </button>
                    </div>
                </div></form>
                <div class="col-5">
                    <img src="{{ asset('images/update-1.svg') }}" class="img-fluid rounded-top" alt="" />
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            console.log(">>");
            $(".alert").click(function() {
                $(this).hide();
            });
            $(".newValue").hide();
            $(".editBtn").hide();
            $(".orgValue").click(function () {
                $(this).hide();
                $(this).siblings(".newValue").show();
                $(".editBtn").show();
            });

        });
    </script>
    <x-knot.footer />
</x-home.layout>
