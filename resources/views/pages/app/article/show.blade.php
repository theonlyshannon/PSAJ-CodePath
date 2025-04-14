<x-layouts.article-show title="{{ $article->title }}" description="{{ $article->excerpt }}" image="{{ asset($article->thumbnail) }}"
    keywords="{{ $article->tags->pluck('name')->join(', ') }}">

        <!-- Article Show Section -->
        <div class="container my-5">
            <div class="row">
                <!-- Main Article Content -->
                <div class="col-lg-8">
                    <!-- Thumbnail -->
                    <img src="{{ $article->thumbnail }}" alt="{{ $article->title }}" class="article-thumbnail">

                    <!-- Article Content -->
                    <div class="article-content">
                        <!-- Writer Info -->
                        <div class="writer-info">
                            <img src="{{ asset('app/image/Index/image.png') }}" alt="{{ $article->writer->name }}" class="writer-avatar">
                            <div class="writer-details">
                                <p class="writer-name">{{ $article->writer->name }}</p>
                                <p class="writer-role">{{ $article->writer->role }}</p>
                            </div>
                        </div>

                        <!-- Article Title -->
                        <h1>{{ $article->title }}</h1>

                        <!-- Article Meta -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <span class="me-3"><i class="far fa-calendar me-2"></i>{{ $article->created_at }}</span>
                                <span><i class="far fa-clock me-2"></i>{{ ceil(str_word_count(strip_tags($article->content)) / 200) }} min read</span>
                            </div>
                            <div>
                                <a href="#" class="text-dark me-2"><i class="fab fa-facebook"></i></a>
                                <a href="#" class="text-dark me-2"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="text-dark"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>

                        <!-- Article Body -->
                        <div class="article-body">
                            {!! $article->content !!}
                        </div>
                    </div>

                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="sidebar mb-4">
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
                    <div class="sidebar mb-4">
                        <!-- Article Tags -->
                        <div class="mb-4">
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
                    <div class="sidebar mb-4">

                        <!-- Recent Articles -->
                        <div>                            <h5>Recent Articles</h5>

                            @foreach ($recentArticles as $article)
                            <div class="recent-article">
                                <img src="{{ asset($article->thumbnail) }}" alt="Recent Article" class="recent-article-thumbnail">
                                <div>
                                    <a href="{{ route('app.article.show', $article->slug) }}" class="mb-1" style="font-size: 17px; text-decoration: none; color: black;">{{ $article->title }}</a>
                                    <small class="text-muted">March 10, 2024</small>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>

</x-layouts.article-show>
