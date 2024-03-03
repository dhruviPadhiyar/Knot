<x-home.layout>
    <x-admin.navbar :notifications="$notifications"  />

    <div class="container">
        @if ($categories->count())
            <div class="showCategories m-5 p-4">
                <table class="table p-2 m-3 table-hover table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th class="text-danger">#</th>
                            <th class="text-danger">
                                Category
                            </th>
                            <th class="text-danger">
                                Description
                            </th>
                            <th class="text-danger">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->title }}</td>
                                <td>
                                    {{ $category->description }}
                                </td>
                                <td>
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn text-danger">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="{{ route('category.delete', $category->id) }}"
                                        onclick="return confirm('Are you sure you want to delete this item?');"
                                        class="btn text-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <h1 class="display-5 text-center text-danger fw-bold m-5">
                No Categories Yet!
            </h1>
        @endif
    </div>

    <!-- footer -->
    <x-knot.footer />
</x-home.layout>
