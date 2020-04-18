jQuery(document).ready($ =>{
  $('.site-header .main-menu ul').slicknav({
    'label': '',
    'appendTo': '.site-header'
  });

  //Mapa de leaftletCSS
  const lat = document.querySelector('#lat').value,
        lng = document.querySelector('#lng').value,
        direccion = document.querySelector('#direccion').value;

  if (lat && lng && direccion) {
    var map = L.map('map').setView([lat, lng], 20);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([lat, lng]).addTo(map)
        .bindPopup(direccion)
        .openPopup();
  }

});
