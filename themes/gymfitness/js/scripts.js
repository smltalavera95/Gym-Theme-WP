jQuery(document).ready($ =>{
  $('.site-header .main-menu ul').slicknav({
    'label': '',
    'appendTo': '.site-header'
  });

  //Agregando el slider a testimoniales
  if($('section.testimoniales').length >0){
    $('.listado-testimoniales').bxSlider({
      auto: true,
      mode: 'fade',
      controls: false
    });
  }


  //Mapa de leaftletCSS
  if($('div.ubicacion').length > 0){
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
  }

});

//Sticky menu
window.onscroll = () =>{
  const scroll = window.scrollY;

  //Seleccionar la barra navegadora
  const headerNav = document.querySelector('.barra-navegadora');
  //Mover el contenido cuando aparezca el Sticky
  const documentBody = document.querySelector('body');

  //Actuar dependiendo de los pixeles de la pantalla en scroll
  if(scroll>300){
    headerNav.classList.add('fixed-top');
    documentBody.classList.add('ft-activo');
  }else{
    headerNav.classList.remove('fixed-top');
    documentBody.classList.remove('ft-activo');
  }
}
