var images = ['https://imagename.ru/imgbig/imagename_ru_24009.jpg',
'https://imagename.ru/imgbig/imagename_ru_23975.jpg',
'https://imagename.ru/imgbig/imagename_ru_24346.jpg',
'https://imagename.ru/imgbig/imagename_ru_32317.jpg',
'https://imagename.ru/imgbig/imagename_ru_32612.jpg',
'https://imagename.ru/imgbig/imagename_ru_32731.jpg']; 

document.addEventListener("DOMContentLoaded", function() {
  var gallery = document.getElementById('gallery');
  images.forEach(function(imageSrc) {
    var img = document.createElement('img');
    img.src = imageSrc;
    img.alt = 'Изображение';
    img.className = 'image';
    img.onclick = function() { showModal(imageSrc); };
    gallery.appendChild(img);
  });
});


function showModal(imageSrc) {
  var modal = document.getElementById("modal");
  var modalImg = document.getElementById("modal-image");
  modal.style.display = "flex";
  modalImg.src = imageSrc;
  currentImageIndex = images.indexOf(imageSrc);
  updateButtons();
}



    // Закрыть модальное окно при клике за его пределами
    window.onclick = function(event) {
      var modal = document.getElementById("modal");
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }

    function prevImage() {
      if (currentImageIndex > 0) {
        currentImageIndex--;
        document.getElementById("modal-image").src = images[currentImageIndex];
        updateButtons();
      }
    }

    function nextImage() {
      if (currentImageIndex < images.length - 1) {
        currentImageIndex++;
        document.getElementById("modal-image").src = images[currentImageIndex];
        updateButtons();
      }
    }

    function updateButtons() {
      var prevBtn = document.getElementById("prevBtn");
      var nextBtn = document.getElementById("nextBtn");

      if (currentImageIndex === 0) {
        prevBtn.style.display = "none";
      } else {
        prevBtn.style.display = "block";
      }

      if (currentImageIndex === images.length - 1) {
        nextBtn.style.display = "none";
      } else {
        nextBtn.style.display = "block";
      }
    }