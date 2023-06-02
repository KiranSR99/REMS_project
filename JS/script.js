document.addEventListener('DOMContentLoaded', function() {
    const bannerContainer = document.querySelector('.banner-container');
    const banners = document.querySelectorAll('.banner');
    const prevButton = document.querySelector('.carousel-prev');
    const nextButton = document.querySelector('.carousel-next');
    const bannerWidth = banners[0].offsetWidth;
    const cloneFirstBanner = banners[0].cloneNode(true);
    let currentIndex = 0;

    bannerContainer.appendChild(cloneFirstBanner);

    function slideToIndex(index) {
        bannerContainer.style.transform = `translateX(-${index * bannerWidth}px)`;
    }

    function slideNext() {
        currentIndex++;
        bannerContainer.style.transition = 'transform 0.5s ease';
        slideToIndex(currentIndex);

        if (currentIndex === banners.length) {
            setTimeout(function() {
                bannerContainer.style.transition = 'none';
                currentIndex = 0;
                slideToIndex(currentIndex);
            }, 500);
        }
    }

    function slidePrev() {
        if (currentIndex === 0) {
            currentIndex = banners.length;
            bannerContainer.style.transition = 'none';
            slideToIndex(currentIndex);
        }

        setTimeout(function() {
            currentIndex--;
            bannerContainer.style.transition = 'transform 0.5s ease';
            slideToIndex(currentIndex);
        }, 50);
    }

    function startAutoSlide() {
        setInterval(slideNext, 3000);
    }

    prevButton.addEventListener('click', slidePrev);
    nextButton.addEventListener('click', slideNext);
    startAutoSlide();
});
