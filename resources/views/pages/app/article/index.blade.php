<x-layouts.article title="Artikel">

    <!-- Hero Section -->
    <section class="hero">
        <h1>Article</h1>
    </section>

    <!-- Article Section -->
    <div class="article-section">
        <div class="container">
            <div class="row">
                <!-- Article Cards -->
                <div class="col-lg-8">
                    <div class="row">
                        <!-- Check if articles are available -->
                        @if($articles->isEmpty())
                            <p class="text-center">Tidak ada artikel yang tersedia.</p>
                        @else
                            @foreach ($articles as $article)
                                <div class="col-md-6 mb-4">
                                    <div class="card h-100" data-aos="fade-up">
                                        <img src="{{ asset($article->thumbnail) }}" alt="{{ $article->title }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $article->title }}</h5>
                                            <p class="card-text text-muted">
                                                {{ \Illuminate\Support\Str::limit($article->content, 100, '...') }}
                                            </p>
                                            <a href="{{ route('app.article.show', $article->slug) }}"
                                                class="btn btn-outline-primary">
                                                Read Now
                                            </a>

                                            <!-- Writer Information -->
                                            <div class="writer-info">
                                                <img src="{{ asset('app/image/Index/image.png') }}" class="writer-avatar"
                                                    alt="Writer Avatar">
                                                <div class="writer-details mt-3">
                                                    <p class="writer-name">{{ $article->writer->name }}</p>
                                                    <p class="writer-role">{{ $article->created_at }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <!-- Pagination -->
                    <div class="col-12 mt-4">
                        <nav aria-label="Page navigation">
                            {{ $articles->links('pagination::bootstrap-5') }}
                        </nav>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="article-sidebar">
                        <!-- Article Categories -->
                        <div class="mb-4">
                            <h5>Categories</h5>
                            @php
                                $colors = ['primary', 'secondary', 'success', 'danger', 'warning', 'info'];
                            @endphp
                            @foreach ($categories as $index => $category)
                                <div>
                                    <span class="badge bg-{{ $colors[$index % count($colors)] }} category-badge">
                                        <a href="{{ route('app.article.index', ['category' => $category->slug]) }}" class="text-white">
                                            {{ $category->name }}
                                        </a>
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="article-sidebar mt-4">
                        <!-- Article Tags -->
                        <div>
                            <h5>Popular Tags</h5>
                            @php
                                $colors = ['primary', 'secondary', 'success', 'danger', 'warning', 'info'];
                            @endphp
                            @foreach ($tags as $index => $tag)
                                <span class="badge bg-{{ $colors[$index % count($colors)] }} tag-badge">
                                    <a href="{{ route('app.article.index', ['tag' => $tag->slug]) }}" class="text-white">
                                        {{ $tag->name }}
                                    </a>
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layouts.article>
