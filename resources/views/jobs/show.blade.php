<x-layout>
    <x-slot:heading>Job Description</x-slot:heading>
    Job for {{ $job->title }} pays {{ $job->salary }} per annum.

    <x-link href="/jobs/{{ $job->id }}/edit" display="block">Edit Job</x-link>
</x-layout>