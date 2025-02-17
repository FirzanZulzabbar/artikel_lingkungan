<?php require_once 'config.php';?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Artikel</title>
    <link rel="stylesheet" href="src/output.css" />
  </head>
  <body>
    <header class="font-inter tracking-tight leading-tight">
      <nav class="flex justify-between p-4 items-center">
        <a class="flex items-center gap-4 text-lg md:text-2xl lg:hidden" href="index.html" ><span class="font-bold">&larr;</span>Artikel</a>
      </nav>
    </header>
    <main class="font-inter tracking-tight">
      <section class="my-10 lg:grid lg:grid-cols-4 lg:px-8">
        <div class="lg:col-span-2">
          <h1 class="text-3xl px-6 font-light sm:text-4xl md:text-5xl lg:text-7xl lg:font-semibold lg:pt-8">Kamu lagi pengen baca apa hari ini?</h1>
          <p class="px-6 py-2 leading-tight text-stone-600 text-sm sm:text-base md:text-lg lg:text-xl">
            Dapatkan inspirasi dan solusi seputar cara menjaga kelestarian alam,
            serta dampak positifnya bagi kehidupan.
          </p>
        </div>
        <div class="hidden lg:visible lg:col-span-2 lg:flex lg:mx-auto">
          <img src="assets/img/peep-17.svg" alt="peesp!">
          <img src="assets/img/peep-7.svg" alt="peesp!" class="lg:scale-x-[-1]">
        </div>
      </section>
      <div class="lg:px-8">
        <h3 class="text-xl px-6 font-medium sm:text-lg md:px-6 lg:px-8 lg:text-2xl">Artikel untuk kamu</h3>
        <?php
        $sql = "SELECT id, judul, penulis, deskripsi_sampul, isi_deskripsi FROM Artikel";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $deskripsi_sampul = $row['deskripsi_sampul'];
            $jumlah_kata = str_word_count($deskripsi_sampul);
        ?>
        <a href="detail-artikel.php?id=<?= $row['id']; ?>">
          <div class="grid grid-cols-1 gap-2 mx-4 p-4">
            <div
              class="col-span-1 grid grid-cols-4 ring-1 ring-stone-200 rounded-xl p-4"
            >
              <img
                src="assets/img/peep-7.svg"
                alt="article-picture"
                class="md:w-full md:h-full col-span-1 mx-auto m-6 md:my-auto rounded-lg md:rounded:xl"
              />
              <figcaption class="col-span-3 p-4 md:p-6">
                <h4 class="text-lg leading-tight font-medium sm:text-xl lg:text-2xl"><?= $row['judul']; ?></h4>
                <p class="text-stone-500 text-sm italic sm:text-base"><?= $row['penulis']; ?></p>
                <p class=" leading-tight text-stone-500 text-sm mt-4 sm:text-base lg:text-xl">
                <?= $deskripsi_sampul; ?>
                </p>
              </figcaption>
            </div>
          </div>
        </a>
        <?php
          }
        } else {
          echo '<p>Tidak ada artikel yang tersedia.</p>';
        }
        ?>
      </div>
    </main>
  </body>
</html>
