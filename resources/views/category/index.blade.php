<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-100">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <a href="{{ route('category.create') }}"
                   class="bg-gray-100 text-black px-4 py-2 rounded font-semibold hover:bg-gray-300 transition">
                    CREATE
                </a>
            </div>

            <div class="bg-gray-900 text-white shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full table-auto text-sm">
                    <thead class="bg-gray-800 text-gray-400 uppercase text-left">
                        <tr>
                            <th class="px-6 py-3">Title</th>
                            <th class="px-6 py-3">Todo</th>
                            <th class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr class="border-t border-gray-700 hover:bg-gray-800">
                                <td class="px-6 py-4">{{ $category->title }}</td>
                                <td class="px-6 py-4">{{ $category->todos->count() }}</td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center text-gray-400">No categories found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
