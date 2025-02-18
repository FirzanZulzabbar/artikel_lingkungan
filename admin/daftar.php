<?php
session_start();
require_once '../config.php';

$error = null;
$success = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $error = "Password tidak cocok!";
    }

    if (!$error) {
        $check_sql = "SELECT id FROM users WHERE username = ? OR email = ?";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->bind_param("ss", $username, $email);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();

        if ($check_result->num_rows > 0) {
            $error = "Username atau email sudah digunakan!";
        }
    }

    if (!$error) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $insert_sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("sss", $username, $email, $hashed_password);

        if ($insert_stmt->execute()) {
            $success = "Pendaftaran berhasil! Silakan masuk.";
        } else {
            $error = "Terjadi kesalahan saat mendaftar. Silakan coba lagi.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Peduli Lingkungan</title>
    <link rel="stylesheet" href="../src/output.css">
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100 font-inter">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-center text-black mb-6">Daftar Akun</h2>

        <?php if ($error): ?>
            <div class="mb-4 p-3 text-red-700 bg-red-100 border border-red-400 rounded">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
        <?php if ($success): ?>
            <div class="mb-4 p-3 text-green-700 bg-green-100 border border-green-400 rounded">
                <?= htmlspecialchars($success) ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Username:</label>
                <input type="text" name="username" required
                    class="w-full mt-1 p-2 border border-gray-300 rounded focus:ring-green-500 focus:border-green-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="email" name="email" required
                    class="w-full mt-1 p-2 border border-gray-300 rounded focus:ring-green-500 focus:border-green-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Password:</label>
                <input type="password" name="password" required
                    class="w-full mt-1 p-2 border border-gray-300 rounded focus:ring-green-500 focus:border-green-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Konfirmasi Password:</label>
                <input type="password" name="confirm_password" required
                    class="w-full mt-1 p-2 border border-gray-300 rounded focus:ring-green-500 focus:border-green-500">
            </div>
            <button type="submit"
                class="w-full p-2 bg-green-600 text-white font-semibold rounded hover:bg-green-700 transition duration-200">
                Daftar
            </button>
        </form>

        <div class="text-center mt-4">
            <p class="text-sm text-gray-600">Sudah punya akun? 
                <a href="masuk.php" class="text-green-600 hover:underline">Masuk di sini</a>
            </p>
            <a href="../index.php"
                class="inline-block mt-2 px-4 py-2 text-sm text-green-600 border border-green-600 rounded hover:bg-green-600 hover:text-white transition duration-200">
                Kembali
            </a>
        </div>
    </div>
</body>

</html>
