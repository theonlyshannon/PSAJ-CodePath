<x-layouts.class title="kelas">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <button class="hamburger-menu bg-transparent border-0">
                    <i class="fas fa-bars"></i>
                </button>
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="{{ asset('app/image/logo-codepath.png') }}" alt="Logo">
                </a>
                <div class="d-flex align-items-center">
                    <a href="{{ route('app.course.show', $course->slug) }}" class="back-button me-4">
                        <i class="fas fa-arrow-left me-2"></i>Back
                    </a>
                    <div class="profile-section">
                        <span>Halo, {{ Auth::user()->email }}</span>
                        <img src="{{ asset('app/image/Index/image.png') }}" alt="User Avatar" class="user-avatar">
                    </div>
                </div>
            </div>
        </nav>

        <div class="page-content">
            <!-- Fixed Sidebar -->
            <div class="sidebar-container" id="sidebar-container">
                <div class="sidebar" id="sidebar">
                    <ul class="course-menu">
                        <li class="section-item">
                            <div class="section-title" data-bs-toggle="collapse" data-bs-target="#courseContent">
                                <div>Konten Kursus</div>
                                <div class="d-flex align-items-center">
                                    <span class="module-duration me-2">{{ $syllabus->count() }} video</span>
                                    <i class="fas fa-chevron-down dropdown-icon"></i>
                                </div>
                            </div>
                            <div id="courseContent" class="section-content show">
                                <ul class="ps-0">
                                    @foreach($syllabus as $item)
                                    <li class="module-item">
                                        <a href="#" class="module-info video-link" data-video-url="{{ $item->video }}" data-video-title="{{ $item->title }}">
                                            <div>
                                                <h6 class="module-title">{{ $item->title }}</h6>
                                                <span class="module-duration">Video {{ $item->sort }}</span>
                                            </div>
                                            <span class="completed-icon">
                                                <i class="fas fa-check"></i>
                                            </span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Scrollable Content -->
            <div class="content-container">
                <div class="container">
                    <h1 class="course-title" id="currentVideoTitle">{{ $syllabus->first()->title }}</h1>

                    <!-- Video Player -->
                    <div class="video-container mb-4">
                        <iframe id="videoPlayer" src="{{ $syllabus->first()->video ?? 'https://www.youtube.com/embed/rhdClLhEl4k' }}" frameborder="0" allowfullscreen></iframe>
                    </div>

                    <!-- Extra content to demonstrate scrolling -->
                    <div class="mt-5">
                        <h3>Detail Course</h3>
                        <p>{{ $course->description }}</p>
                    </div>
                </div>
            </div>
        </div>
</x-layouts.class>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const videoLinks = document.querySelectorAll('.video-link');
    const videoPlayer = document.getElementById('videoPlayer');
    const videoTitle = document.getElementById('currentVideoTitle');

    videoLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const videoUrl = this.getAttribute('data-video-url');
            const title = this.getAttribute('data-video-title');

            videoPlayer.src = videoUrl;
            videoTitle.textContent = title;

            // Menandai video yang sedang aktif
            videoLinks.forEach(vl => vl.classList.remove('active'));
            this.classList.add('active');
        });
    });
});
</script>

<style>
.module-info {
    text-decoration: none;
    color: inherit;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.module-info:hover {
    background-color: rgba(0, 0, 0, 0.05);
}

.video-link.active {
    background-color: rgba(0, 0, 0, 0.1);
}

.module-info.active .module-title {
    color: #2F4157;
    font-weight: bold;
}
</style>
