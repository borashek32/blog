<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Manage Users
    </h2>
</x-slot>
<div class="py-2 m-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="pt-2">
            <div class="mb-2">
                <div class="flex md:flex-row w-full">
                    <div class="w-full md:w-8/10 text-center">
                        <input wire:model="search" type="text" class="w-full shadow appearance-none border rounded py-2
                        px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1"
                               placeholder="Search users:" name="search">
                        @error('search') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="w-full md:w-1/10">
                        <button class="w-14 ml-2 focus:outline-none text-center focus:shadow-outline bg-indigo-500 hover:bg-indigo-700
                            h-10 text-white font-bold py-1 px-4 rounded">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-indigo-200 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            <table class="space-y-48 table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2 w-4">No.</th>
{{--                        <th class="border px-4 py-2">Category</th>--}}
                        <th class="border px-4 py-2 w-28">Name</th>
                        <th class="border px-4 py-2 w-28">Email</th>
                        <th class="border px-4 py-2 w-16">Role</th>
                        <th class="border px-4 py-2 w-16">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="border px-4 py-2">
                            {{ $user->id }}
                        </td>
{{--                        <td class="border px-4 py-2">{{ $post->category }}</td>--}}
                        <td class="border px-4 py-2">
                            {{ $user->name }}
                        </td>
                        <td class="border px-4 py-2">
                            {{ $user->email }}
                        </td>
                        <td class="border px-4 py-2">
                            {{ $user->role }}
                        </td>
                        <td class="border px-4 py-2">
                            <button wire:click="edit({{ $user->id }})" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-4 rounded">
                                Edit
                            </button>
                            <button wire:click="delete({{ $user->id }})" class="mt-2 bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-4 rounded">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</div>
