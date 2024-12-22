<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Teammates') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-base font-semibold leading-6 dark:text-white">Teammate Edit</h1>
                            </div>
                            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                                <a href="{{route('teammates.index')}}"
                                   class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold dark:text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back</a>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('teammates.update',$teammate) }}">
                            @method('PUT')
                            @csrf
        
                            <!--First Name -->
                            <div>
                                <x-input-label for="name" :value="__('Name')"/>
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                              value="{{ $teammate->name }}"  autofocus autocomplete="name"/>
                                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                            </div>
    
                            <!-- Employee ID -->
                            <div class="mt-4">
                                <x-input-label for="employee_id" :value="__('Employee ID')"/>
                                <x-text-input id="employee_id" class="block mt-1 w-full" type="text" name="employee_id"
                                              value="{{ $teammate->employee_id }}"  autofocus autocomplete="employee_id"/>
                                <x-input-error :messages="$errors->get('employee_id')" class="mt-2"/>
                            </div>
    
                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-input-label for="email" :value="__('Email')"/>
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                              value="{{ $teammate->email }}"  autocomplete="username"/>
                                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                            </div>

                           {{-- Password --}}
                            @if(!empty($oldPassword))
                            <div class="mt-4">
                                <x-input-label for="old_password" :value="__('Old Password')"/>
                                <x-text-input id="old_password" class="block mt-1 w-full"
                                              type="password"
                                              name="old_password"
                                              autocomplete="new-password"/>
                                <x-input-error :messages="$errors->get('old_password')" class="mt-2"/>
                            </div>
                            <div class="mt-4">
                                <x-input-label for="password" :value="__('New Password')"/>
                                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                autocomplete="new-password"/>
                                <x-input-error :messages="$errors->get('password')" class="mt-2"/> 
                            </div>
                            @endif
                            {{-- <!-- Password -->
                            <div class="mt-4">
                                <x-input-label for="password" :value="__('Password')"/>
    
                                <x-text-input id="password" class="block mt-1 w-full"
                                              type="password"
                                              name="password"
                                              autocomplete="new-password"/>
    
                                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                            </div>
     --}}
                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>
    
                                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                              type="password"
                                              name="password_confirmation"  autocomplete="new-password"/>
    
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
                            </div>
    
                            <div class=" mt-4">
                                <x-primary-button>
                                    {{ __('Update') }}
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
