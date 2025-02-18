<?php
session_start();

require_once '../config.php';
$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: ../artikel.php");
            exit();
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk</title>
    <link rel="stylesheet" href="../src/output.css">
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100 font-inter rounded-lg">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-center text-black mb-6">Masuk</h2>

        <?php if ($error): ?>
            <div class="mb-4 p-3 text-red-700 bg-red-100 border border-red-400 rounded">
                <?= $error ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Username:</label>
                <input type="text" name="username" required
                    class="w-full mt-1 p-2 border border-gray-300 rounded focus:ring-green-500 focus:border-green-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Password:</label>
                <input type="password" name="password" required
                    class="w-full mt-1 p-2 border border-gray-300 rounded focus:ring-green-500 focus:border-green-500">
            </div>
            <button type="submit"
                class="w-full p-2 bg-green-600 text-white font-semibold rounded hover:bg-green-700 transition duration-200">
                Masuk
            </button>
        </form>

        <div class="text-center mt-4">
            <p class="text-sm text-gray-600">Belum punya akun? 
                <a href="daftar.php" class="text-green-600 hover:underline">Daftar di sini</a>
            </p>
            <a href="../index.php"
                class="inline-block mt-2 px-4 py-2 text-sm text-green-600 border border-green-600 rounded hover:bg-green-600 hover:text-white transition duration-200">
                Kembali
            </a>
        </div>
    </div>

</body>

</html>
