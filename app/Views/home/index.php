<?= $this->extend('layouts/default'); ?>

<?= $this->section('content'); ?>

<!--Header NavBar-->
<header id="header" class="header">
  <div class="logo">
    <img src="https://tinyurl.com/bpjs-ks-logo" alt="bpjs-logo" />
    <!-- <img src="https://tinyurl.com/bpjs-ks-logo-white" alt="bpjs-logo" /> -->
  </div>
  <nav>
    <ul>
      <li><a href="#home" class="nav-item">Home</a></li>
      <li><a href="#about" class="nav-item">Tentang</a></li>
      <li class="dropdown">
        <a href="#service" class="nav-item">Layanan</a>
        <ul class="dropdown-menu">
          <?php foreach ($serviceCards as $card) : ?>
            <li><a href="#"><?= $card['title']; ?></a></li>
          <?php endforeach; ?>
        </ul>
      </li>
      <li><a href="#contact" class="nav-item">Kontak</a></li>
      <a href="login.php" class="login-button">Login</a>
    </ul>
  </nav>
</header>

<!--Home Section-->
<section class="home" id="home">
  <div class="left-side">
    <h1 class="title one">BPJS</h1>
    <h1 class="title two">KESEHATAN</h1>
    <h2 class="subtitle">KOTA PALOPO</h2>
    <p class="description">
      <?= $homeTextData['homeText']; ?>
    </p>
    <button class="detail-button">Lihat Selengkapnya</button>
  </div>
  <div class="right-side">
    <img src="<?= $heroImage; ?>" alt="hero-image" />
    <!-- <img src="https://tinyurl.com/lady-circle" alt="hero-image" /> -->
  </div>
</section>

<!---About Section-->
<section class="about" id="about">
  <div class="left-side">
    <div class="image">
      <img class="office-img" src="<?= $aboutImage; ?>" alt="bpjs-picture" />
    </div>
    <div class="card">
      <img src="<?= $aboutCardIcon; ?>" alt="message-icon" />
      <!-- <img src="https://tinyurl.com/fast-response" alt="message-icon" /> -->
      <p class="text"><?= $aboutCardText; ?></p>
    </div>
  </div>
  <div class="right-side">
    <h1 class="title">Deskripsi</h1>
    <p class="description">
      <?= $aboutText; ?>
    </p>
  </div>
</section>

<!--Service Section-->
<section class="service" id="service">
  <h1 class="title">LAYANAN</h1>

  <div class="card-grid">
    <?php foreach ($serviceCards as $card) : ?>
      <div class="card">
        <div class="container">
          <img src="<?= $card['icon_url']; ?>" alt="Service Icon">
        </div>
        <p class="text"><?= $card['title']; ?></p>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!--Contact Section-->
<section class="contact" id="contact">
  <h1 class="title">Kontak</h1>
  <div class="body">
    <div class="left-side">
      <form action="send_email.php" method="POSTS">
        <label class="label" for="name">Name:</label>
        <input class="input" type="text" name="name" id="name" />

        <label class="label" for="email">Email:</label>
        <input class="input" type="email" name="email" id="email" required />

        <label class="label" for="message">Message:</label>
        <textarea class="textarea" rows="5" cols="30" name="message" id="message" required></textarea>

        <input class="button" type="submit" value="Kirim" />
      </form>
    </div>

    <div class="right-side">
      <?php foreach ($contacts as $contact) : ?>
        <div class="sub-cont">
          <p class="text"><?= $contact['title']; ?></p>
          <p class="content"><?= $contact['content']; ?></p>
        </div>
      <?php endforeach; ?>
      <div class="map-box">
        <iframe class="google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158624.81093431353!2d120.19086465180972!3d-2.9972373674133337!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2db227703c8d617b%3A0xf13f24c31f2f8e54!2sSample%20Location!5e0!3m2!1sen!2sus!4v1626871182032!5m2!1sen!2sus&zoom=15" frameborder="0"></iframe>
      </div>
    </div>
  </div>
</section>

<!--Footer Section-->
<footer>
  <p class="title">Support By:</p>
  <img class="logos" src="<?= $footerLogo; ?>" alt="Sponsor Line Up">
  <!-- <img class="logos" src="https://tinyurl.com/logo-white" alt="Sponsor Line Up"> -->
  <p class="rights">&copy Copyright UNCP - Palopo 2023</p>
</footer>

<?= $this->endSection(); ?>