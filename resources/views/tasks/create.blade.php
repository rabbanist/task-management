<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-base font-semibold leading-6 dark:text-white">
                                    {{ __('Create Task') }}
                                </h1>
                            </div>
                            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                                <a href="{{ route('tasks.index') }}"
                                   class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    {{ __('Back') }}
                                </a>
                            </div>
                        </div>

                        <!-- Task Form -->
                        <form method="POST" action="{{ route('tasks.store') }}" class="mt-6">
                            @csrf

                            <!-- Task Name -->
                            <div class="mb-4">
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                              value="{{ old('name') }}" autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Project ID -->
                            <div class="mb-4">
                                <x-input-label for="project_id" :value="__('Project Name')" />
                                <select id="project_id" name="project_id"
                                        class="block mt-1 w-full rounded-md border-gray-300 dark:bg-gray-800 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">
                                    @foreach($projects as $project)
                                        <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>
                                            {{ $project->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('project_id')" class="mt-2" />
                            </div>

                            <!-- Assign To -->
                            <div class="mb-4">
                                <x-input-label for="assign_to" :value="__('Assign To')" />
                                <select id="assign_to" name="assign_to"
                                        class="block mt-1 w-full rounded-md border-gray-300 dark:bg-gray-800 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">
                                    @foreach($assigns as $assign)
                                        <option value="{{ $assign->id }}" {{ old('assign_to') == $assign->id ? 'selected' : '' }}>
                                            {{ $assign->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('assign_to')" class="mt-2" />
                            </div>

                            <!-- Description -->
                            <div class="mb-4">
                                <x-input-label for="description" :value="__('Description')" />
                                <textarea id="description" name="description"
                                          class="block mt-1 w-full rounded-md border-gray-300 dark:bg-gray-800 dark:text-white focus:border-indigo-500 focus:ring-indigo-500"
                                          rows="3">{{ old('description') }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>

                            <!-- Status -->
                            <div class="mb-4">
                                <x-input-label for="status" :value="__('Status')" />
                                <select id="status" name="status"
                                        class="block mt-1 w-full rounded-md border-gray-300 dark:bg-gray-800 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>
                                        {{ __('Pending') }}
                                    </option>
                                    <option value="Working" {{ old('status') == 'Working' ? 'selected' : '' }}>
                                        {{ __('Working') }}
                                    </option>
                                    <option value="Done" {{ old('status') == 'Done' ? 'selected' : '' }}>
                                        {{ __('Done') }}
                                    </option>
                                </select>
                                <x-input-error :messages="$errors->get('status')" class="mt-2" />
                            </div>

                            <!-- Submit Button -->
                            <div class="mt-4">
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
</x-app-layout>
