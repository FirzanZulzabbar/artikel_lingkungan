<?php
session_start(); 

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    $error = "Anda harus login terlebih dahulu untuk mengakses artikel.";
} else {
    $error = null;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Readify</title>
    <link rel="icon" href="assets/img/peep-27.svg">
    <link rel="stylesheet" href="src/output.css" />
  </head>
  <body>
    <main>
      <section
        class="py-16 font-inter text-center mx-auto p-2 space-y-4 sm:px-6 sm:py-18 md:p-10 md:py-24 xl:px-12 xl:py-16 lg:mt-20"
      >
        <p class="text-pink-500 text-sm sm:text-base lg:text-xl xl:text-xl">
          * Peduli Lingkungan
        </p>
        <p
          class="text-5xl tracking-tight font-light sm:text-6xl md:text-7xl 2xl:text-8xl"
        > Selamat datang di pusat informasi lingkungan untuk meningkatkan kesadaran dan menginspirasi perubahan!
        </p>
        <p
          class="mt-4 tracking-tight leading-tight text-sm sm:text-base md:text-lg lg:text-xl lg:px-10 xl:text-2xl 2xl:text-2xl"
        >
          Nature speaks in the whispers of the wind, the songs of the birds, and
          the silent beauty of a blooming flower.
        </p>
        <div class="flex justify-center gap-4 sm:mt-4">
          <a
            href="artikel.php"
            class="px-6 py-2 bg-stone-900 text-slate-100 rounded-full md:text-lg lg:mt-8 xl:text-xl xl:px-8"
            >Artikel</a
          >
          <a
            href="admin/masuk.php"
            class="px-6 py-2 ring-1 ring-stone-500 rounded-full md:text-lg lg:mt-8 xl:text-xl xl:px-8"
            >Masuk</a
          >
        </div>
      </section>
      <section
        class="font-inter p-4 sm:p-8 md:p-10 xl:px-12 xl:text-2xl"
        id="about"
      >
        <div class="sm:mt-8">
          <p class="text-3xl tracking-tight sm:text-5xl sm:mt-10 xl:text-6xl">
            Temukan Artikel Inspiratif Tentang Lingkungan
          </p>
          <p
            class="text-sm tracking-tight mt-2 sm:text-base sm:mt-6 md:text-lg md:mt-6 lg:text-xl 2xl:text-2xl"
          >
            Jelajahi berbagai artikel yang didedikasikan untuk kesadaran
            lingkungan dan keberlanjutan. Dari pembahasan mendalam tentang
            pelestarian alam hingga inovasi terbaru dalam gaya hidup ramah
            lingkungan, platform kami menghadirkan wawasan berharga untuk
            menginspirasi aksi nyata demi masa depan yang lebih hijau.
          </p>
        </div>
        <div
          class="grid grid-cols-5 gap-2 mt-8 tracking-tight text-sm sm:text-base md:text-lg md:gap-4 lg:text-xl 2xl:text-2xl"
        >
          <div class="bg-stone-100 col-span-3 rounded-xl p-4">
            <p>
              Artikel lingkungan sering membahas perkembangan terbaru dalam
              keberlanjutan, teknologi hijau, dan kebijakan lingkungan yang bisa
              mempengaruhi kehidupan kita.
            </p>
          </div>
          <div class="bg-stone-100 rounded-xl p-4 col-span-2">
            <p>
              Membaca tentang praktik keberlanjutan membantu kita menemukan cara
              sederhana untuk mengurangi jejak karbon dan menjaga alam
            </p>
          </div>
          <div class="bg-stone-100 col-span-2 rounded-xl p-4">
            <p>
              memahami berbagai isu lingkungan, mengambil langkah-langkah kecil
              yang dilakukan untuk memberikan dampak besar bagi bumi.
            </p>
          </div>
          <div class="bg-stone-100 col-span-3 rounded-xl p-4">
            <p>
              Pengetahuan yang diperoleh bisa memotivasi kita untuk
              berkontribusi dalam upaya pelestarian, seperti menanam pohon,
              mendukung energi terbarukan, atau berpartisipasi dalam gerakan
              lingkungan.
            </p>
          </div>
          <div class="bg-stone-100 col-span-5 rounded-xl p-4">
            <p>
              Dengan memahami pentingnya menjaga lingkungan, kita bisa
              meneruskan informasi ini kepada orang lain, terutama generasi
              muda, agar mereka ikut menjaga bumi untuk masa depan.
            </p>
          </div>
        </div>
      </section>
    </main>
    <footer class="p-4 font-inter mt-16 relative sm:px-8 md:px-10 lg:ml-4" id="team">
      <h1 class="text-3xl tracking-tight sm:text-5xl">
        Meet our <span class="text-pink-500">team!</span>
        <p>Behind Every Great Work, There’s a Great Team.</p>
      </h1>
      <div class="grid grid-cols-3 gap-y-8 my-10 sm:my-14 md:gap-6">
        <div
          class="col-span-3 tracking-tight flex flex-col items-center text-center sm:text-xl sm:space-y-1 md:col-span-1 md:text-lg lg:text-xl"
        >
          <img src="assets/img/peep-17.svg" alt="peeps!" class="sm:w-80" />
          <h1 class="text-2xl sm:text-3xl md:text-2xl">Muhammad Dafa Alvin</h1>
          <p>23091397083</p>
          <p>Universitas Negeri Surabaya</p>
          <div class="flex gap-4 mt-4 sm:gap-6">
            <a href="https://github.com/MuhammadDafaAlvin"
              ><img
                src="assets/img/github-mark.svg"
                alt="github-mark"
                class="w-8 h-8 sm:w-10 sm:h-10 sm:mt-6"
            /></a>
            <a href="https://instagram.com/"
              ><img
                src="assets/img/instagram.svg"
                alt="instagram"
                class="w-8 h-8 sm:w-10 sm:h-10 sm:mt-6"
            /></a>
          </div>
        </div>
        <div
          class="col-span-3 tracking-tight flex flex-col items-center text-center sm:text-xl sm:space-y-1 md:col-span-1 md:text-lg"
        >
          <img src="assets/img/peep-27.svg" alt="peeps!" class="sm:w-80" />
          <h1 class="text-2xl sm:text-3xl md:text-2xl">Nur Aini Setyaputri</h1>
          <p>23091397083</p>
          <p>Universitas Negeri Surabaya</p>
          <div class="flex gap-4 mt-4 sm:gap-6">
            <a href="https://github.com/Nuraini077"
              ><img
                src="assets/img/github-mark.svg"
                alt="github-mark"
                class="w-8 h-8 sm:w-10 sm:h-10 sm:mt-6"
            /></a>
            <a href="https://instagram.com/"
              ><img
                src="assets/img/instagram.svg"
                alt="instagram"
                class="w-8 h-8 sm:w-10 sm:h-10 sm:mt-6"
            /></a>
          </div>
        </div>
        <div
          class="col-span-3 tracking-tight flex flex-col items-center text-center sm:text-xl sm:space-y-1 md:col-span-1 md:text-lg"
        >
          <img
            src="assets/img/peep-7.svg"
            alt="peeps!"
            class="sm:w-80 md:scale-x-[-1]"
          />
          <h1 class="text-2xl sm:text-3xl md:text-2xl">Firzan Zulzabbar</h1>
          <p>23091397083</p>
          <p>Universitas Negeri Surabaya</p>
          <div class="flex gap-4 mt-4 sm:gap-6">
            <a href="https://github.com/FirzanZulzabbar"
              ><img
                src="assets/img/github-mark.svg"
                alt="github-mark"
                class="w-8 h-8 sm:w-10 sm:h-10 sm:mt-6"
            /></a>
            <a href="https://instagram.com/"
              ><img
                src="assets/img/instagram.svg"
                alt="instagram"
                class="w-8 h-8 sm:w-10 sm:h-10 sm:mt-6"
            /></a>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>
