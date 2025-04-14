<x-layouts.app title="CodePath">

    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left Column - Text Content -->
                <div class="col-lg-6">
                    <h1 class="hero-title">Develop Your Skills</h1>
                    <h2 class="hero-subtitle">In A New<br>And Unique Way</h2>
                    <p class="hero-description">
                        CodePath Adalah Platform Pembelajaran Pemrograman Yang Menyediakan Kursus Gratis Dan Terstruktur Untuk
                        Mahasiswa Serta Profesional. Program Mereka Dirancang Agar Relevan Dengan Kebutuhan Industri, Mencakup Topik
                        Seperti Pengembangan Aplikasi, Keamanan Siber, Dan Rekayasa Perangkat Lunak.
                    </p>
                    <div class="hero-buttons">
                        <a href="#" class="btn hero-btn btn-find-course">Find Course <span>&rarr;</span></a>
                        <a href="#" class="btn hero-btn btn-learn-more">Learn More <span>&rarr;</span></a>
                    </div>
                </div>

                <!-- Right Column - Image with Circle and Floating Elements -->
                <div class="col-lg-6">
                    <div class="hero-image-container">
                        <div class="img-circle-container">
                            <div class="hero-circle"></div>
                            <img src="{{ asset('app/image/Index/hero-image.png') }}" alt="Student" class="hero-image">
                        </div>

                        <!-- Floating Elements -->
                        <div class="floating-element google">
                            <img src="{{ asset('app/image/Index/google-icon.png') }}" alt="Google Icon">
                        </div>

                        <div class="floating-element whatsapp">
                            <img src="{{ asset('app/image/Index/whatsapp-icon.png') }}" alt="WhatsApp Icon">
                        </div>

                        <div class="floating-element phone">
                            <div class="floating-box">
                                804<br>
                                Calling 08135825
                            </div>
                        </div>

                        <div class="floating-element team">
                            <div class="floating-box">
                                804<br>
                                Our Teams
                                <div>
                                    <img src="{{ asset('app/image/Index/team-member.png') }}" alt="Team member">
                                </div>
                            </div>
                        </div>

                        <div class="floating-element dev">
                            <div class="floating-box">
                                <img src="{{ asset('app/image/Index/developer.png') }}" alt="Developer" style="border-radius: 50%"><br>
                                Park Chaeyong<br>
                                Front End Developer
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="search-courses-section py-5">
        <div class="container">
            <!-- Search Title -->
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h2 class="search-title fw-bold">Search Courses</h2>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="row justify-content-center mb-5">
                <div class="col-md-8 col-lg-6 d-flex">
                    <div class="search-bar-wrapper">
                        <button class="search-button">
                            <i class="bi bi-search"></i>
                            Search The Courses
                        </button>
                    </div>
                    <div class="ms-3">
                        <button class="learn-more-button">Learn More</button>
                    </div>
                </div>
            </div>

            <!-- Benefits Section -->
            <div class="row align-items-center">
                <!-- Left column with images -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="benefits-image-container">
                        <div class="benefits-image-grid">
                            <div class="image-placeholder top-left"></div>
                            <img src="{{ asset('app/image/Index/course-section.png') }}" alt="" class="img-fluid benefits-image">
                        </div>
                    </div>
                </div>

                <!-- Right column with benefits -->
                <div class="col-lg-6">
                    <div class="benefits-content">
                        <h3 class="mb-4">
                            <span class="benefit-highlight">Benefit</span> From Our Online Learning
                        </h3>

                        <!-- Benefit Item 1 -->
                        <div class="benefit-item d-flex align-items-center mb-4">
                            <div class="benefit-icon">
                                <img src="{{ asset('app/image/Index/progress-5-line.png') }}" alt="" style="width: 40px; height: 40px;">
                            </div>
                            <div class="benefit-text ms-3">
                                <h4 class="mb-1">Online Progress</h4>
                                <p class="mb-0">Tay Updated And Keep Your Work On Track From Anywhere With Real-Time Online Progress</p>
                            </div>
                        </div>

                        <!-- Benefit Item 2 -->
                        <div class="benefit-item d-flex align-items-center mb-4">
                            <div class="benefit-icon">
                                <img src="{{ asset('app/image/Index/publish-course.png') }}" alt="" style="width: 40px; height: 40px;">
                            </div>
                            <div class="benefit-text ms-3">
                                <h4 class="mb-1">About Courses</h4>
                                <p class="mb-0">Tay Updated And Keep Your Work On Track From Anywhere With Real-Time Online Progress</p>
                            </div>
                        </div>

                        <!-- Benefit Item 3 -->
                        <div class="benefit-item d-flex align-items-center">
                            <div class="benefit-icon">
                                <img src="{{ asset('app/image/Index/book-time.png') }}" alt="" style="width: 40px; height: 40px;">
                            </div>
                            <div class="benefit-text ms-3">
                                <h4 class="mb-1">Trial</h4>
                                <p class="mb-0">Tay Updated And Keep Your Work On Track From Anywhere With Real-Time Online Progress</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-5">
        <div class="course-header">
            <h1>Our Popular Course</h1>
            <p>Enhance Your Skills And Expertise With Our Courses,<br>Carefully Designed To Help You Grow And Master Your
                Craft.<br>Start Learning Today!</p>
        </div>

        <div class="row g-4">
            @foreach($popularCourses as $course)
            <div class="col-md-4">
                <div class="card course-card">
                    <img src="{{ asset('storage/' . $course->thumbnail) }}" class="card-img-top" alt="{{ $course->title }}">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="course-rating">
                                <i class="bi bi-star-fill"></i> 4.5 (120)
                            </span>
                            <span class="text-muted">Rp. {{ number_format($course->price, 0, ',', '.') }}</span>
                        </div>
                        <h5 class="card-title">
                            <a href="{{ route('app.course.show', $course->slug) }}">

                                {{ $course->title }}
                            </a>
                        </h5>
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('app/image/Index/image.png') }}" class="course-instructor-img" alt="Instructor">
                            <span>{{ $course->mentor->name }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</x-layouts.app>
