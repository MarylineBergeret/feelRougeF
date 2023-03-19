<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="pics" src="..\assets\image\vibration1.jpg" class="d-block w-100" alt="Aérosmith">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="pics" src="..\assets\image\vibration4.JPG" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="pics" src="..\assets\image\vibration2.JPG" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>






    
    
<div class="presents">
<h2>Mais c'est qui elle ?</h2>
<br>
<p>ok, je me présente vite fait, avec du son... </p>
</div>
<div id="fest">
    <img src="..\assets/image/h2007.png" alt="Hellfest2007">
    <img src="..\assets/image/H2009.png" alt="Hellfest2009">
    <img src="..\assets/image/H2010.png" alt="Hellfest2010">
    <img src="..\assets/image/H2012.png" alt="Hellfest2012">
    <img src="..\assets/image/H2014.png" alt="Hellfest2014">
    <img src="..\assets/image/H2022.png" alt="Hellfest2022">
    <img src="..\assets/image/point.png" alt="pointInterrogation" title="Vas donc voter !">
</div>

<div class="dreams">
    <p class="balise"><</p><img src="..\assets\image\finger-crossed.png" class="finger"><h2>MY DREAMS ?</h2><img src="..\assets\image\finger-crossed.png" class="finger"><p class="balise">></p>
</div>
  
<div class="dreams1">
  <div class="dream-card">
    <img src="..\assets\image\symphonyX.png" title="suivre Russel Allen sur une tournée" id="imgDream1">
    <div class="text">
      <p>Texte à afficher après clic sur SymphonyX</p>
    </div>
  </div>
  <div class="dream-card">
    <img src="..\assets\image\tso.jpg" title="Transiberian-Orchestra" id="imgDream2">
    <div class="text">
      <p>Texte à afficher après clic sur TSO</p>
    </div>
  </div>
  <div class="dream-card">
    <img src="..\assets\image\croisiere.png" title="70 000 TONS OF METAL" id="imgDream3">
    <div class="text">
      <p>Texte à afficher après clic sur la croisière</p>
    </div>
  </div>
</div>


<script>
const cards = document.querySelectorAll('.dream-card');
cards.forEach((card) => {
  const img = card.querySelector('img');
  const text = card.querySelector('.text');
  img.addEventListener('click', () => {
    console.log('image clicked');
    card.classList.toggle('is-flipped');
  });
  text.addEventListener('click', () => {
    card.classList.toggle('is-flipped');
  });
});

</script>


