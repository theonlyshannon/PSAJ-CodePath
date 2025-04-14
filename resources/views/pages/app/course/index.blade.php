<x-layouts.course title="Kelas">
    <!-- Hero Section -->
    <section class="hero">
        <h1>CodePath Course</h1>
    </section>

    <section class="course-section">
        @if($courses->isEmpty())
            <p class="text-center">Belum ada kelas yang tersedia.</p>
        @else
            @foreach ($courses as $course)
                <div class="course-card my-5" data-aos="fade-up">
                    <div class="course-image">
                        <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="{{ $course->title }}">
                    </div>
                    <div class="course-content">
                        <h2 class="course-title">{{ $course->title }}</h2>
                        <div class="course-info">
                            <div class="info-item">
                                <i class="fa-solid fa-circle-user"></i>
                                <span>{{ $course->mentor->name }}</span>
                            </div>
                            <div class="info-item">
                                <i class="fa-solid fa-graduation-cap"></i>
                                <span>Jumlah Materi : {{ $course->syllabus->count() }}</span>
                            </div>
                        </div>

                        <p class="course-description">
                            {{ \Illuminate\Support\Str::limit(strip_tags($course->description), 100, '...') }}
                        </p>

                        <a href="{{ route('app.course.show', $course->slug) }}" class="course-link">Link Ke Materinya</a>
                    </div>
                </div>
            @endforeach

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-5">
                {{ $courses->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </section>
</x-layouts.course>
