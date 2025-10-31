<x-layout>
    <x-slot:heading>Job Listings</x-slot:heading>

    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a href="jobs/{{ $job['id'] }}" class="block border border-grey-400 rounded-lg px-2 py-4">
                <div class="text-blue-600 text-sm">{{ $job->employer->name }}</div>
                <div>{{ $job['title'] }} This pays {{ $job['salary'] }} per annum.</div>
            </a>
        @endforeach
    </div>
    <div class="mt-6">
        {{ $jobs->links() }}
    </div>
</x-layout>