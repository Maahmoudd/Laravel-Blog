<x-layout>

    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register!</h1>
            <form method="POST" action="/register" class="mt-10">
                @csrf

                <x-form.input name="name" type="text" value="{{ old('name') }}"></x-form.input>
                <x-form.input name="username" type="text" value="{{ old('username') }}"></x-form.input>
                <x-form.input name="email" type="email" value="{{ old('email') }}"></x-form.input>
                <x-form.input name="password" type="password"></x-form.input>

                <x-form.button>Submit</x-form.button>
            </form>
        </main>
    </section>

</x-layout>