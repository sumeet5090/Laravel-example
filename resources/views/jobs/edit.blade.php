<x-layout>
    <x-slot:heading>Create Job</x-slot:heading>
    <form method="post" action="/jobs/{{ $job->id }}">
        @csrf
        @method('PATCH')
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                        <div class="mt-2">
                            <input 
                                id="title" 
                                type="text" 
                                name="title" 
                                value="{{ $job->title }}"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" 
                            />
                        </div>
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-3">
                        <label for="salary" class="block text-sm/6 font-medium text-gray-900">Salary</label>
                        <div class="mt-2">
                            <input 
                                id="salary" 
                                type="text" 
                                name="salary" 
                                value="{{ $job->salary }}"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" 
                            />
                        </div>
                        @error('salary')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-between gap-x-6">
            <div>
                <x-link href="/jobs/{{ $job->id }}">Cancel</x-link>
                <x-button type="submit">Update</x-button>
            </div>
            <div>
                <x-button form="jobdestroy">Delete</x-link>
            </div>
        </div>
    </form>
    <form method="post" action="/jobs/{{ $job->id }}" id="jobdestroy">
        @csrf
        @method('DELETE')
    </form>
</x-layout>