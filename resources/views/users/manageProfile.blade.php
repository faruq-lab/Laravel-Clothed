<x-layout>
    <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
        <div class="flex">
            <a href="/" class="text-gray-600 hover:text-gray-900">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
        <header class="text-center">
            <h2 class="text-2xl font-bold  uppercase mb-1">Update Profile</h2>
        </header>

        <form method="POST" action="/users/{{auth()->user()->id}}">
            @csrf
            @method('put')
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
                    value="{{$user->name}}">
                @error('name')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email"
                    value={{$user->email}}>
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="old_password" class="inline-block text-lg mb-2">Old Password</label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full bg-gray-300" name="old_password"
                    value={{old('old_password')}}>
                @error('old_password')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">New Password</label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full bg-gray-300" name="password"
                    value={{old('password')}}>
                @error('password')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password2" class="inline-block text-lg mb-2">Confirm New Password</label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full bg-gray-300"
                    name="password_confirmation" value={{old('password_confirmation')}}>
                @error('password_confirmation')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <button type="submit" class="bg-red-500 text-white rounded py-2 px-4 hover:bg-black ">Confirm
                    Update</button>
            </div>

        </form>
    </x-card>
</x-layout>