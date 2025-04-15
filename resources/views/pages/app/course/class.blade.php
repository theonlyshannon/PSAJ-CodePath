<x-layouts.class title="kelas">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid">
                <button class="navbar-toggler border-0 d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('app/image/logo-codepath.png') }}" alt="Logo" class="img-fluid">
                </a>

                <div class="navbar-collapse justify-content-end">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item me-3">
                            <a href="{{ route('app.course.show', $course->slug) }}" class="nav-link back-button">
                                <i class="fas fa-arrow-left me-2"></i>Back
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="me-2">Halo, {{ Auth::user()->email }}</span>
                                <img src="{{ asset('app/image/Index/image.png') }}" alt="User Avatar" class="user-avatar">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('app.dashboard') }}">Dashboard</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="page-content">
            <!-- Fixed Sidebar -->
            <div class="sidebar-container d-none d-lg-block">
                <div class="sidebar">
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

            <!-- Mobile Sidebar -->
            <div class="sidebar-container-mobile collapse d-lg-none" id="sidebarMenu">
                <div class="sidebar">
                    <ul class="course-menu">
                        <li class="section-item">
                            <div class="section-title" data-bs-toggle="collapse" data-bs-target="#courseContentMobile">
                                <div>Konten Kursus</div>
                                <div class="d-flex align-items-center">
                                    <span class="module-duration me-2">{{ $syllabus->count() }} video</span>
                                    <i class="fas fa-chevron-down dropdown-icon"></i>
                                </div>
                            </div>
                            <div id="courseContentMobile" class="section-content show">
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

            <!-- Content Container -->
            <div class="content-container">
                <div class="container-fluid">
                    <h1 class="course-title" id="currentVideoTitle">{{ $syllabus->first()->title }}</h1>

                    <!-- Video Player -->
                    <div class="video-container mb-4">
                        <iframe id="videoPlayer" src="{{ $syllabus->first()->video ?? 'https://www.youtube.com/embed/rhdClLhEl4k' }}" frameborder="0" allowfullscreen></iframe>
                    </div>

                    <!-- Extra content to demonstrate scrolling -->
                    <div class="mt-5">
                        <h3>Detail Course</h3>
                        <p>{!! $course->description !!}</p>
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

            // Menutup sidebar mobile jika terbuka
            const sidebarMobile = document.getElementById('sidebarMenu');
            if (sidebarMobile && window.innerWidth < 992) {
                bootstrap.Collapse.getInstance(sidebarMobile).hide();
            }
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
