<?php require_once 'config.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;

$sql = "SELECT id, judul, gambar_artikel,deskripsi_gambar, penulis, isi_deskripsi, tanggal_publikasi FROM Artikel WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header("Location: artikel.php");
    exit();
}

$artikel = $result->fetch_assoc();?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= htmlspecialchars($artikel['judul']); ?></title>
    <link rel="stylesheet" href="src/output.css" />
  </head>
  <body>
    <header class="font-inter tracking-tight leading-tight md:px-6">
      <nav class="flex justify-between p-4 items-center">
        <a
          class="flex items-center gap-2 text-lg sm:text-xl font-semibold lg:hidden"
          href="artikel.php"
          ><span class="font-bold">&#10229;</span>Artikel</a
        >
      </nav>
    </header>
    <main class="font-inter tracking-tight leading-tight md:px-6">
      <section class="p-4">
        <h1 class="text-3xl text-center font-semibold my-6 lg:text-4xl">
        <?= htmlspecialchars($artikel['judul']); ?>
        </h1>
        <img
          src="<?= $artikel['gambar_artikel']; ?>" alt="<?= $artikel['judul']; ?>"
          alt="logo"
          class="mx-auto w-3/4 py-8 ring-1 ring-stone-200 rounded-xl"
        />
        <p class="mt-4 text-stone-700 lg:mt-6 leading-tight lg:text-lg">
          <?= nl2br(htmlspecialchars($artikel['isi_deskripsi'])); ?>
        </p>
      </section>
    </main>
    <?php
    $stmt->close();
    $conn->close();
    ?>
  </body>
</html>
