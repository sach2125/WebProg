document.addEventListener('DOMContentLoaded', function() {
    const thumbnails = document.querySelector('.thumbnails');

    // Replace this array with your image URLs
    const imageUrls = [
        'https://imagename.ru/imgbig/imagename_ru_24009.jpg',
        'https://imagename.ru/imgbig/imagename_ru_23975.jpg',
        'https://imagename.ru/imgbig/imagename_ru_24346.jpg'
    ];

    // Populate thumbnails
    imageUrls.forEach(function(url) {
        const img = document.createElement('img');
        img.src = url;
        img.addEventListener('click', function() {
            document.querySelector('.full-img').src = url;
            document.querySelector('.full-img').style.display = 'block';
        });
        thumbnails.appendChild(img);
    });
});
