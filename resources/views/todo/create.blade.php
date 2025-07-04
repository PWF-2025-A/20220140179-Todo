<x-app-layout>
     <x-slot name="header">
         <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
             {{ __('Todo') }}
         </h2>
     </x-slot>
 
     <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                 <div class="p-6 text-gray-900 dark:text-gray-100">
                     <form method="POST" action="{{ route('todo.store') }}">
                         @csrf
            
 
                         <div class="mb-6">
                             <x-input-label for="title" :value="__('Title')" />
                             <x-text-input
                                 id="title"
                                 name="title"
                                 type="text"
                                 class="block w-full mt-1"
                                 required
                                 autofocus
                                 autocomplete="title"
                             />
                             <x-input-error class="mt-2" :messages="$errors->get('title')" />
                         </div>
 
                         <div class="mb-6">
                            <x-input-label for="category_id" :value="__('Kategori')" />
                            <select
                                name="category_id"
                                id="category_id"
                                class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:bg-gray-700 dark:text-white"
                                
                            >
                              <option value="">Empty</option> <!-- Ini akan menjadi null -->
                                @foreach ($categories as $category)

                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach

                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
                        </div>
                        
                         <div class="flex items-center gap-4">
                             <x-primary-button>{{ __('Save') }}</x-primary-button>
 
                             <a
                                 href="{{ route('todo.index') }}"
                                 class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest
                                     text-gray-700 uppercase transition duration-150 ease-in-out
                                     bg-white border border-gray-300 rounded-md shadow-sm
                                     dark:bg-gray-800 dark:border-gray-500 dark:text-gray-300
                                     hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none
                                     focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
                                     dark:focus:ring-offset-gray-800 disabled:opacity-25"
                             >
                                 {{ __('Cancel') }}
                             </a>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </x-app-layout>