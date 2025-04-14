<x-layouts.about title="About">

    <!-- Hero Section -->
    <section class="hero">
        <h1>About Us</h1>
    </section>

    <div class="container about-section">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="about-image-container">
                    <img src="{{ asset('app/image/About/about-us.png') }}" alt="Students studying" class="about-image-main">
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="mb-4">ABOUT US</h2>
                <h3 class="mb-4">Bangun Masa Depan Dengan Skill Teknologi</h3>
                <p class="mb-4">
                    CodePath Menyediakan Platform Pembelajaran Pemrograman Yang Terstruktur, Mudah Diakses, Dan Relevan
                    Dengan Kebutuhan Industri Saat Ini. CodePath Membantu Individu, Baik Pelajar, Mahasiswa, Maupun
                    Profesional, Dalam Menguasai Keterampilan Teknologi Dasar Dan Lanjutan, Seperti HTML, CSS, Dan
                    Python.
                </p>

                <div class="features-container mb-5">
                    <div class="feature">
                        <div class="row">
                            <div class="col">
                                <div class="feature-item">
                                    <svg viewBox="0 0 24 24">
                                        <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z" />
                                    </svg>
                                    <span>Terstruktur dan Mudah Diakses</span>
                                </div>
                                <div class="feature-item">
                                    <svg viewBox="0 0 24 24">
                                        <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z" />
                                    </svg>
                                    <span>Mentor Berpengalaman</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="feature-item">
                                    <svg viewBox="0 0 24 24">
                                        <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z" />
                                    </svg>
                                    <span>Belajar Kapan Saja, di Mana Saja</span>
                                </div>
                                <div class="feature-item">
                                    <svg viewBox="0 0 24 24">
                                        <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z" />
                                    </svg>
                                    <span>Cocok untuk Pelajar</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="stats-container">
                    <div class="stat-item">
                        <div class="stat-number">5K+</div>
                        <div class="stat-text">Ulasan Positif</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">98%</div>
                        <div class="stat-text">Kepuasan Siswa</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">10K+</div>
                        <div class="stat-text">Siswa Terdaftar</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h3 class="text-center mt-5 mb-5">
            What People Said About CodePath
        </h3>
        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="d-flex justify-content-center gap-4">
                        <div class="testimonial-card">
                            <div class="quote-mark mb-3">
                                <img src="{{ asset('app/image/About/quote-mark.png') }}" alt="">
                            </div>
                            <div class="testimonial-content">
                                <div class="testimonial-name">Elio Nathaniel</div>
                                <div class="testimonial-title">Mahasiswa Informatika</div>
                                <div class="testimonial-text">
                                    Belajar pemrograman di CodePath sangat menyenangkan! Materinya relevan dengan
                                    kebutuhan industri dan membantu saya menguasai Python dengan lebih mudah.
                                </div>
                                <div class="star-rating">
                                    ★ ★ ★ ★ ★
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-card">
                            <div class="quote-mark mb-3">
                                <img src="{{ asset('app/image/About/quote-mark.png') }}" alt="">
                            </div>
                            <div class="testimonial-content">
                                <div class="testimonial-name">Sarah Amanda</div>
                                <div class="testimonial-title">UI/UX Designer</div>
                                <div class="testimonial-text">
                                    Platform yang sangat membantu untuk belajar coding dari dasar. Mentornya sangat
                                    supportif dan materi yang diberikan sangat terstruktur.
                                </div>
                                <div class="star-rating">
                                    ★ ★ ★ ★ ★
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-card">
                            <div class="quote-mark mb-3">
                                <img src="{{ asset('app/image/About/quote-mark.png') }}" alt="">
                            </div>
                            <div class="testimonial-content">
                                <div class="testimonial-name">Michael Chen</div>
                                <div class="testimonial-title">Web Developer</div>
                                <div class="testimonial-text">
                                    CodePath memberikan fondasi yang kuat untuk karir saya di bidang web development.
                                    Sangat direkomendasikan untuk pemula!
                                </div>
                                <div class="star-rating">
                                    ★ ★ ★ ★ ★
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex justify-content-center gap-4">
                        <div class="testimonial-card">
                            <div class="quote-mark mb-3">
                                <img src="{{ asset('app/image/About/quote-mark.png') }}" alt="">
                            </div>
                            <div class="testimonial-content">
                                <div class="testimonial-name">Jessica Lee</div>
                                <div class="testimonial-title">Data Scientist</div>
                                <div class="testimonial-text">
                                    Kursus data science di CodePath membuka banyak peluang karir baru. Materinya
                                    komprehensif dan praktis.
                                </div>
                                <div class="star-rating">
                                    ★ ★ ★ ★ ★
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-card">
                            <div class="quote-mark mb-3">
                                <img src="{{ asset('app/image/About/quote-mark.png') }}" alt="">
                            </div>
                            <div class="testimonial-content">
                                <div class="testimonial-name">Budi Santoso</div>
                                <div class="testimonial-title">Mobile Developer</div>
                                <div class="testimonial-text">
                                    Pembelajaran yang fleksibel dan materi yang up-to-date membuat saya bisa belajar
                                    sambil bekerja. Sangat worth it!
                                </div>
                                <div class="star-rating">
                                    ★ ★ ★ ★ ★
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-card">
                            <div class="quote-mark mb-3">
                                <img src="{{ asset('app/image/About/quote-mark.png') }}" alt="">
                            </div>
                            <div class="testimonial-content">
                                <div class="testimonial-name">Linda Wijaya</div>
                                <div class="testimonial-title">Front-end Developer</div>
                                <div class="testimonial-text">
                                    CodePath membantu saya memahami konsep-konsep rumit dengan cara yang sederhana.
                                    Komunitas belajarnya juga sangat supportif.
                                </div>
                                <div class="star-rating">
                                    ★ ★ ★ ★ ★
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-4 mb-5">
                <button class="btn btn-custom mx-2" type="button" data-bs-target="#testimonialCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="btn btn-custom mx-2" type="button" data-bs-target="#testimonialCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</x-layouts.about>
