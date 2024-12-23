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
                                <h1 class="text-base font-semibold leading-6 dark:text-white">Projects</h1>
                            </div>
                            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                                <a href="{{route('projects.create')}}"
                                   class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold dark:text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add
                                    Project</a>
                            </div>
                        </div>
                        <div class="mt-8 flow-root">
                            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                    <table class="min-w-full divide-y divide-gray-300">
                                        <thead>
                                        <tr>
                                            <th scope="col"
                                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold dark:text-white sm:pl-0">
                                               Project Name
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold dark:text-white">Project Code
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold dark:text-white">Assign By
                                            </th>
                                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                                <a class="sr-only">Edit</a>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200">

                                       @foreach($projects as $project)
                                           <tr>
                                             <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium dark:text-white sm:pl-0">{{$project->name}}</td>
                                              <td class="whitespace-nowrap px-3 py-4 text-sm dark:text-white">{{$project->project_code}}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm dark:text-white">{{$project->manager->name}}</td>
                                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                                  <a href="{{route('projects.edit',$project)}}"
                                                    class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                |
                                                <form method="POST"
                                                        class="inline-block"
                                                        action="{{route('projects.destroy',$project)}}"
                                                     onsubmit="return confirm('Are you sure?')">
                                                    @method('DELETE')
                                                      @csrf
                                                      <button type="submit" class="text-red-600 hover:text-red-900">
                                                          Delete
                                                    </button>
                                                  </form>
                                            </td>
                                          </tr>
                                      @endforeach
                                        </tbody>
                                    </table>
                                    <div class="mt-4">
                                       {{ $projects->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
