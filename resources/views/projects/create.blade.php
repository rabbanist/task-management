<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-base font-semibold leading-6 dark:text-white">Project Create</h1>
                            </div>
                            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                                <a href="{{route('projects.index')}}"
                                   class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold dark:text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back</a>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('projects.store') }}">
                            @csrf
                            <!--Project Name -->
                            <div>
                                <x-input-label for="name" :value="__('Name')"/>
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                              value="{{old('name')}}"  autofocus autocomplete="name"/>
                                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                            </div>

                            <!-- Project ID -->
                            <div class="mt-4">
                                <x-input-label for="project_code" :value="__('Project Code')"/>
                                <x-text-input id="project_code" class="block mt-1 w-full" type="text" name="project_code"
                                              value="{{old('project_code')}}"  autofocus autocomplete="project_code"/>
                                <x-input-error :messages="$errors->get('project_code')" class="mt-2"/>
                            </div>

                            <!-- Assign By will select option -->
                            <div class="mt-4">
                                <x-input-label for="manager_id" :value="__('Assign By')"/>
                                <select id="manager_id" name="manager_id" class="block mt-1 w-full dark:bg-gray-800 text-white ">
                                    <option value="{{auth()->user()->id}}">{{auth()->user()->name}}</option>
                                </select>
                                <x-input-error :messages="$errors->get('manager_id')" class="mt-2"/>
                            </div>
                            <div class=" mt-4">
                                <x-primary-button>
                                    {{ __('Create') }}
                                </x-primary-button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
