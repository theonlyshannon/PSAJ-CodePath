<x-layouts.course-show title="{{ $course->title }}">
        <!-- Hero Section -->
        <section class="hero">
            <h1>{{ $course->title }}</h1>
        </section>

        <!-- Course Info Section -->
        <section class="course-info container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="course-title">
                        <h2 class="my-5">{{ $course->title }}</h2>
                    </div>
                    <div class="instructor">
                        <span>{{ $course->mentor->name }}</span>
                        <div class="classes-info">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-calendar" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                            </svg>
                            <span>{{ $course->syllabus->count() }} Materi</span>
                        </div>
                    </div>
                    <div class="course-img">
                        <iframe width="100%" height="500" src="{{ $course->trailer }}" title="HTML Course" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="img-fluid"></iframe>
                    </div>
                </div>
            </div>
        </section>

        <!-- Description Section -->
        <section class="description">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 mx-auto">
                        {!! $course->description !!}
                    </div>
                </div>
            </div>
        </section>

            <!-- card include -->
            <section class="course-includes py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 mx-auto">
                            <div class="card border rounded-3 shadow-sm">
                                <div class="card-body p-4">
                                    <h3 class="fs-4 mb-4 fw-bold">Course Includes</h3>

                                    <div
                                        class="course-info-item d-flex justify-content-between align-items-center py-3 border-bottom">
                                        <div class="d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                                class="bi bi-journal-text text-primary me-3" viewBox="0 0 16 16">
                                                <path
                                                    d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                                                <path
                                                    d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3z" />
                                            </svg>
                                            <span>Materi :</span>
                                        </div>
                                        <div class="text-muted">{{ $course->syllabus->count() }}</div>
                                    </div>

                                    <div
                                        class="course-info-item d-flex justify-content-between align-items-center py-3 border-bottom">
                                        <div class="d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                                class="bi bi-people text-primary me-3" viewBox="0 0 16 16">
                                                <path
                                                    d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z" />
                                            </svg>
                                            <span>Favourite Class : </span>
                                        </div>
                                        <div class="text-muted">
                                            {{ $course->is_favourite == 1 ? 'Yes' : 'No' }}
                                        </div>
                                    </div>

                                    <div
                                        class="course-info-item d-flex justify-content-between align-items-center py-3 border-bottom">
                                        <div class="d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                                class="bi bi-award text-primary me-3" viewBox="0 0 16 16">
                                                <path
                                                    d="M9.669.864 8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68L9.669.864zm1.196 1.193.684 1.365 1.086 1.072L12.387 6l.248 1.506-1.086 1.072-.684 1.365-1.51.229L8 10.874l-1.355-.702-1.51-.229-.684-1.365-1.086-1.072L3.614 6l-.25-1.506 1.087-1.072.684-1.365 1.51-.229L8 1.126l1.356.702 1.509.229z" />
                                                <path
                                                    d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z" />
                                            </svg>
                                            <span>Certifications:</span>
                                        </div>
                                        <div class="text-muted">Yes</div>
                                    </div>

                                    <div
                                        class="course-info-item d-flex justify-content-between align-items-center py-3 border-bottom">
                                        <div class="d-flex align-items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                                class="bi bi-globe text-primary me-3" viewBox="0 0 16 16">
                                                <path
                                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z" />
                                            </svg>
                                            <span>Language:</span>
                                        </div>
                                        <div class="text-muted">Indonesian</div>
                                    </div>
                                    @if (!Auth::check())
                                        <!-- Belum login -->
                                        <div class="d-grid my-3">
                                            <a href="{{ route('login') }}" class="btn btn-lg btn-primary rounded-3 w-100">
                                                Login Untuk Bergabung
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                    class="bi bi-arrow-right ms-2" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                                </svg>
                                            </a>
                                        </div>
                                    @elseif (!$hasAccess)
                                        <!-- Sudah login tapi belum beli -->
                                        <div class="d-grid my-3">
                                            <form action="{{ route('app.cart.add', $course->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-lg btn-primary rounded-3 w-100">
                                                    Checkout Kelas Ini - Rp.{{ number_format($course->price, 0, ',', '.') }}
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                        class="bi bi-arrow-right ms-2" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        <div class="d-grid my-3">
                                            <a href="{{ route('app.course.course', $course->slug) }}" class="btn btn-lg btn-success rounded-3 w-100">
                                                Masuk ke Kelas
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                    class="bi bi-arrow-right ms-2" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                                </svg>
                                            </a>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <!-- Reviews Section -->
        <section class="reviews-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 mx-auto">
                        <h2 class="mb-4">Course Reviews</h2>
                        <!-- Reviews List -->
                        <div class="reviews-container  mb-5">
                            <h3 class="h5 mb-4">Student Reviews</h3>
                            <div class="reviews-list">
                                <!-- Review Card 1 -->
                                <div class="review-card">
                                    <div class="review-header">
                                        <h4 class="reviewer-name">Ahmad Syafiq</h4>
                                        <div class="rating">⭐⭐⭐⭐⭐</div>
                                    </div>
                                    <p class="review-text">Kursus yang sangat bagus dan informatif. Materi dijelaskan dengan sangat detail dan mudah dipahami. Instruktur sangat membantu dalam proses pembelajaran.</p>
                                    <div class="review-date">Posted on: 15 Mar 2024</div>
                                </div>

                                <!-- Review Card 2 -->
                                <div class="review-card">
                                    <div class="review-header">
                                        <h4 class="reviewer-name">Siti Nurhaliza</h4>
                                        <div class="rating">⭐⭐⭐⭐</div>
                                    </div>
                                    <p class="review-text">Materi yang diberikan sangat terstruktur dan mudah diikuti. Saya belajar banyak hal baru tentang HTML dari kursus ini.</p>
                                    <div class="review-date">Posted on: 14 Mar 2024</div>
                                </div>

                                <!-- Review Card 3 -->
                                <div class="review-card">
                                    <div class="review-header">
                                        <h4 class="reviewer-name">Budi Santoso</h4>
                                        <div class="rating">⭐⭐⭐⭐⭐</div>
                                    </div>
                                    <p class="review-text">Kursus yang luar biasa! Saya yang awalnya pemula dalam HTML sekarang sudah bisa membuat website sendiri. Terima kasih CodePath!</p>
                                    <div class="review-date">Posted on: 13 Mar 2024</div>
                                </div>
                                <!-- Review Card 3 -->
                                <div class="review-card">
                                    <div class="review-header">
                                        <h4 class="reviewer-name">Budi Santoso</h4>
                                        <div class="rating">⭐⭐⭐⭐⭐</div>
                                    </div>
                                    <p class="review-text">Kursus yang luar biasa! Saya yang awalnya pemula dalam HTML sekarang sudah bisa membuat website sendiri. Terima kasih CodePath!</p>
                                    <div class="review-date">Posted on: 13 Mar 2024</div>
                                </div>
                                <!-- Review Card 3 -->
                                <div class="review-card">
                                    <div class="review-header">
                                        <h4 class="reviewer-name">Budi Santoso</h4>
                                        <div class="rating">⭐⭐⭐⭐⭐</div>
                                    </div>
                                    <p class="review-text">Kursus yang luar biasa! Saya yang awalnya pemula dalam HTML sekarang sudah bisa membuat website sendiri. Terima kasih CodePath!</p>
                                    <div class="review-date">Posted on: 13 Mar 2024</div>
                                </div>
                            </div>
                        </div>
                        <!-- Review Form -->
                        <div class="review-form">
                            <h3 class="h5 mb-3">Add Your Review</h3>
                            <form>
                                <div class="mb-3">
                                    <label for="reviewerName" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="reviewerName" required>
                                </div>
                                <div class="mb-3">
                                    <label for="rating" class="form-label">Rating</label>
                                    <select class="form-select" id="rating" required>
                                        <option value="">Pilih rating</option>
                                        <option value="5">⭐⭐⭐⭐⭐ (5)</option>
                                        <option value="4">⭐⭐⭐⭐ (4)</option>
                                        <option value="3">⭐⭐⭐ (3)</option>
                                        <option value="2">⭐⭐ (2)</option>
                                        <option value="1">⭐ (1)</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="reviewText" class="form-label">Review</label>
                                    <textarea class="form-control" id="reviewText" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit Review</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</x-layouts.course-show>
