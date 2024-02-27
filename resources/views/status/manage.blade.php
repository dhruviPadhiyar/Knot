<x-home.layout>
    <x-admin.navbar />

    <div class="container">
        <div class="heading m-2 text-center">
            <h3 class="text-danger fw-bold">Manage Statuses</h3>
        </div>
        <div class="statuses m-5">
            <table class="table w-75 m-auto table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($statuses as $status)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $status->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</x-home.layout>
