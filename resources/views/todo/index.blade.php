<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Todo') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            {{-- Tombol Create --}}
            <div class="flex justify-end">
                <a href="{{ route('todo.create') }}"
                    class="px-4 py-2 bg-white text-black rounded hover:bg-gray-200 font-semibold">
                    CREATE
                </a>
            </div>

            {{-- Tabel --}}
            <div class="bg-gray-800 shadow-md rounded-md overflow-hidden">
                <table class="min-w-full table-auto text-sm text-white">
                    <thead class="bg-gray-700 uppercase text-gray-300 text-xs">
                        <tr>
                            <th class="px-6 py-3 text-left">Title</th>
                            <th class="px-6 py-3 text-left">Category</th>
                            <th class="px-6 py-3 text-left">Status</th>
                            <th class="px-6 py-3 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @forelse ($todos as $todo)
                            <tr class="hover:bg-gray-700">
                                <td class="px-6 py-3">{{ $todo->title }}</td>
                                <td class="px-6 py-3">{{ $todo->category->title ?? '-' }}</td>
                                <td class="px-6 py-3">
                                    @if ($todo->is_complete)
                                        <span class="bg-green-600 text-white text-xs px-2 py-1 rounded">Complete</span>
                                    @else
                                        <span class="bg-blue-600 text-white text-xs px-2 py-1 rounded">Ongoing</span>
                                    @endif
                                </td>
                                <td class="px-6 py-3 flex space-x-4">
                                    {{-- Complete Button --}}
                                    @if (!$todo->is_complete)
                                        <form method="POST" action="{{ route('todo.complete', $todo->id) }}">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                    class="text-green-500 hover:underline font-semibold">
                                                Complete
                                            </button>
                                        </form>
                                    @endif

                                    {{-- Delete Button --}}
                                    <form method="POST" action="{{ route('todo.destroy', $todo->id) }}" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="text-red-500 hover:underline font-semibold">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-6 text-gray-400">No todos found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
