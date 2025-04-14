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
                            <img src="{{ asset('app/image/Index/image.png0') }}" alt="{{ $article->writer->name }}" class="writer-avatar">
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

                    <!-- Comment Section -->
                    <div class="comment-form mt-4">
                        <h4>Leave a Comment</h4>
                        <form>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" placeholder="Your Name">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" placeholder="Your Email">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Comment</label>
                                <textarea class="form-control" rows="5" placeholder="Your Comment"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Comment</button>
                        </form>
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
                                    <h6 class="mb-1">{{ $article->title }}</h6>
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
