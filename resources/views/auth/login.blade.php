<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 to-blue-200 min-h-screen flex items-center justify-center">

  <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl">
    <h2 class="text-2xl text-blue-600 text-center mb-6">Wellcome!</h2>

    @if (session('status'))
      <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4 text-sm">
        {{ session('status') }}
      </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <!-- ID -->
      <div class="mb-4">
        <label for="id" class="block text-sm font-medium text-gray-700">ID</label>
        <input id="id" name="id" type="text" value="{{ old('id') }}" required autofocus
               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
        @error('id')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Password -->
      <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input id="password" name="password" type="password" required
               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
        @error('password')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Remember Me -->
      <div class="flex items-center mb-4">
        <input id="remember_me" name="remember" type="checkbox"
               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
        <label for="remember_me" class="ml-2 block text-sm text-gray-700">Remember me</label>
      </div>

      <!-- Submit -->
      <div class="flex items-center justify-between">
        <a href="{{ route('password.request') }}" class="text-sm text-blue-500 hover:underline">
          Forgot your password?
        </a>
        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
          Log in
        </button>
      </div>
    </form>
  </div>
</body>
</html>
