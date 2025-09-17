<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resort Davao</title>
    <link href="./output.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-bold text-center mb-6" id="form-title">Login</h2>

        <!-- Form -->
        <form id="auth-form" class="space-y-4">
            <div class="flex flex-col">
                <label for="email" class="mb-1 text-gray-700">Email</label>
                <input type="email" id="email" placeholder="Enter your email" class="px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex flex-col">
                <label for="password" class="mb-1 text-gray-700">Password</label>
                <input type="password" id="password" placeholder="Enter your password" class="px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Registration extra field -->
            <div class="flex flex-col" id="name-field" style="display:none;">
                <label for="name" class="mb-1 text-gray-700">Full Name</label>
                <input type="text" id="name" placeholder="Enter your full name" class="px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">Submit</button>
        </form>

        <!-- Toggle -->
        <p class="mt-4 text-center text-gray-600">
            <span id="toggle-text">Don't have an account?</span>
            <button id="toggle-btn" class="text-blue-500 font-semibold ml-1 hover:underline">Register</button>
        </p>
    </div>

    <script>
        const toggleBtn = document.getElementById('toggle-btn');
        const toggleText = document.getElementById('toggle-text');
        const formTitle = document.getElementById('form-title');
        const nameField = document.getElementById('name-field');

        let isLogin = true;

        toggleBtn.addEventListener('click', () => {
            isLogin = !isLogin;
            if (isLogin) {
                formTitle.textContent = 'Login';
                toggleText.textContent = "Don't have an account?";
                toggleBtn.textContent = "Register";
                nameField.style.display = 'none';
            } else {
                formTitle.textContent = 'Register';
                toggleText.textContent = "Already have an account?";
                toggleBtn.textContent = "Login";
                nameField.style.display = 'flex';
            }
        });

        const form = document.getElementById('auth-form');
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const name = document.getElementById('name').value;
            if (isLogin) {
                alert(`Logging in with: ${email}`);
            } else {
                alert(`Registering: ${name}, ${email}`);
            }
        });
    </script>

</html>