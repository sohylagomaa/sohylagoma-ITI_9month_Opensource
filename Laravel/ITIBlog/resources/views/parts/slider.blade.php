<div id="mainSlider" class="carousel slide mb-5" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#mainSlider" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#mainSlider" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#mainSlider" data-bs-slide-to="2"></button>
    </div>

    <div class="carousel-inner">
        <div class="carousel-item active">
            
            <img src="{{ asset('storage/images/slide1.jpg') }}" class="d-block w-100" style="height: 400px; object-fit: cover;" alt="First Slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>Welcome to ITIBlog</h5>
                <p>Latest software development news.</p>
            </div>
        </div>

        <div class="carousel-item">
            <img src="{{ asset('storage/images/slide2.jpg') }}" class="d-block w-100" style="height: 400px; object-fit: cover;" alt="Second Slide">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('storage/images/slide3.jpg') }}" class="d-block w-100" style="height: 400px; object-fit: cover;" alt="Second Slide">
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#mainSlider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#mainSlider" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>