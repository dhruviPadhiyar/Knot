<x-home.layout>
    <x-admin.navbar :notifications="$notifications"/>
        <x-admin.dashboard-cards :events="$events" :onGoing="$onGoing" :upComing="$upComing" :users="$users" :hosts="$hosts" :requests="$requests" :pending="$pending" :apr="$apr" />
        <div class="d-flex flex-column mt-5">
            <footer id="sticky-footer" class="flex-shrink-0 py-4 bg-danger-subtle text-dark">
              <div class="container text-center">
                <small class="text-danger fw-bold">Copyright-test &copy; KNOT: Event Organizer</small>
              </div>
            </footer>
        </div>
</x-home.layout>
