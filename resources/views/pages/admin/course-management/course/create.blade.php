<x-layouts.admin title="Tambah Kelas">
    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.course.index') }}">Manajemen Kelas</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Kelas</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h6>Tambah Kelas</h6>
                </x-slot>
                <form action="{{ route('admin.course.store') }}" method="POST" enctype="multipart/form-data"
                    id="form">
                    @csrf

                    <x-forms.select label="Mentor" name="mentor_id" id="mentor_id" :options="$mentors" key="id"
                        value="name" :selected="old('mentor_id')" />

                    <x-forms.select label="Kategori Kelas" name="course_category_id" id="course_category_id"
                        :options="$categories" key="id" value="name" :selected="old('course_category_id')" />

                    <x-forms.input label="Judul" name="title" id="title" value="{{ old('title') }}" />

                    <x-forms.input label="Slug" name="slug" id="slug" value="{{ old('slug') }}" />

                    <x-forms.textarea label="Deskripsi" name="description" id="description"
                        value="{{ old('description') }}" editor="true" />

                    <img id="thumbnail-preview" src="#" alt="Thumbnail Preview"
                        style="display:none; max-width: 500px; margin-top: 10px; margin-bottom: 10px;" />

                    <x-forms.input label="Thumbnail" name="thumbnail" id="thumbnail" type="file"
                        value="{{ old('thumbnail') }}" />

                    <div id="trailer-preview" class="mb-3" style="display: none;">
                        <label for="trailer-preview">Preview Trailer</label>
                        <div class="video-container mb-45" id="player">
                            <iframe width="560" height="315" src="" frameborder="0" allowfullscreen
                                id="trailer-iframe"></iframe>
                        </div>
                    </div>

                    <x-forms.input label="Trailer" name="trailer" id="trailer" value="{{ old('trailer') }}" />

                    <div class="mb-3" id="price-container">
                        <x-forms.input label="Harga Kelas" name="price_display" id="price_display" type="text"
                            value="{{ old('price') }}" />
                        <input type="hidden" name="price" id="price_numeric" value="{{ old('price') }}">

                    </div>

                    <div class="mb-3">
                        <input type="hidden" name="is_free" value="0">
                        <x-forms.checkbox label="Kelas Gratis" id="is_free" name="is_free" :checked="old('is_free')" />
                    </div>

                    <div id="syllabus" class="mb-3">
                        <p>Silabus</p>
                        <button class="btn btn-primary mt-3" type="button" id="add-syllabus">+</button>

                        <div id="syllabus-container">

                        </div>
                    </div>

                    <x-ui.base-button color="danger" href="{{ route('admin.course.index') }}">Kembali</x-ui.base-button>
                    <x-ui.base-button color="primary" type="submit">Tambah Kelas</x-ui.base-button>
                </form>
            </x-ui.base-card>
        </div>
    </div>

    @push('plugin-scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const elements = {
                    title: document.querySelector('#title'),
                    slug: document.querySelector('#slug'),
                    trailer: document.querySelector('#trailer'),
                    trailerPreview: document.querySelector('#trailer-preview'),
                    trailerIframe: document.querySelector('#trailer-iframe'),
                    thumbnail: document.querySelector('#thumbnail'),
                    thumbnailPreview: document.querySelector('#thumbnail-preview'),
                    syllabusContainer: document.querySelector('#syllabus-container'),
                    addSyllabusButton: document.querySelector('#add-syllabus')
                };

                const createSlug = (text) => {
                    return text.trim().toLowerCase().split(' ').join('-');
                };

                const extractYouTubeId = (url) => {
                    if (url.includes('youtu.be/')) {
                        return url.split('youtu.be/')[1].split(/[?&]/)[0];
                    } else if (url.includes('youtube.com/watch?v=')) {
                        return url.split('youtube.com/watch?v=')[1].split(/[?&]/)[0];
                    } else if (url.includes('youtube.com/embed/')) {
                        return url.split('youtube.com/embed/')[1].split(/[?&]/)[0];
                    }
                    return '';
                };

                const convertToEmbedLink = (youtubeId) => {
                    return `https://www.youtube.com/embed/${youtubeId}`;
                };

                const updateTrailerPreview = (youtubeId) => {
                    if (youtubeId) {
                        const embedLink = convertToEmbedLink(youtubeId);
                        elements.trailerIframe.src = embedLink;
                        elements.trailerPreview.style.display = 'block';
                        elements.trailer.value = embedLink;
                    } else {
                        elements.trailerIframe.src = '';
                        elements.trailerPreview.style.display = 'none';
                    }
                };

                const updateThumbnailPreview = (file) => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        elements.thumbnailPreview.src = e.target.result;
                        elements.thumbnailPreview.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                };

                const addSyllabusItem = (index) => {
                    const syllabusHtml = `
                    <div class="card mt-3" id="syllabus-${index}">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="syllabus-sort-${index}" class="mb-1">Urutan</label>
                                <input type="number" class="form-control" name="syllabus[${index}][sort]" id="syllabus-sort-${index}">
                            </div>
                            <div class="mb-3">
                                <label for="syllabus-title-${index}" class="mb-1">Materi</label>
                                <input type="text" class="form-control" name="syllabus[${index}][title]" id="syllabus-title-${index}">
                            </div>
                            <div id="syllabus-video-preview-${index}" class="mb-3" style="display: none;">
                                <label for="syllabus-video-preview-${index}" class="mb-1">Preview Video</label>
                                <div class="video-container mb-45">
                                    <iframe width="560" height="315" src="" frameborder="0" allowfullscreen id="syllabus-video-iframe-${index}"></iframe>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="syllabus-video-${index}" class="mb-1">Link Video (YouTube)</label>
                                <input type="text" class="form-control" name="syllabus[${index}][video]" id="syllabus-video-${index}">
                            </div>
                            <button class="btn btn-danger remove-syllabus" type="button" data-index="${index}">Hapus</button>
                        </div>
                    </div>`;
                    elements.syllabusContainer.insertAdjacentHTML('beforeend', syllabusHtml);
                };

                elements.title.addEventListener('keyup', function() {
                    elements.slug.value = createSlug(elements.title.value);
                });

                elements.trailer.addEventListener('input', function() {
                    const youtubeId = extractYouTubeId(elements.trailer.value);
                    updateTrailerPreview(youtubeId);
                });

                let syllabusIndex = {{ count(old('syllabus', [])) }};

                elements.addSyllabusButton.addEventListener('click', function() {
                    addSyllabusItem(syllabusIndex);
                    syllabusIndex++;
                });

                elements.syllabusContainer.addEventListener('input', function(e) {
                    if (e.target && e.target.id.startsWith('syllabus-video-')) {
                        const index = e.target.id.split('-')[2];
                        const youtubeId = extractYouTubeId(e.target.value);
                        const videoPreview = document.querySelector(`#syllabus-video-preview-${index}`);
                        const videoIframe = document.querySelector(`#syllabus-video-iframe-${index}`);
                        if (youtubeId) {
                            const embedLink = convertToEmbedLink(youtubeId);
                            videoIframe.src = embedLink;
                            videoPreview.style.display = 'block';
                            e.target.value = embedLink;
                        } else {
                            videoIframe.src = '';
                            videoPreview.style.display = 'none';
                        }
                    }
                });

                elements.syllabusContainer.addEventListener('click', function(e) {
                    if (e.target.classList.contains('remove-syllabus')) {
                        const index = e.target.getAttribute('data-index');
                        document.querySelector(`#syllabus-${index}`).remove();
                    }
                });

                elements.thumbnail.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        updateThumbnailPreview(file);
                    } else {
                        elements.thumbnailPreview.src = '';
                        elements.thumbnailPreview.style.display = 'none';
                    }
                });
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const priceDisplay = document.getElementById('price_display');
                const priceNumeric = document.getElementById('price_numeric');
                const isFreeCheckbox = document.getElementById('is_free');
                const isFavouriteCheckbox = document.getElementById('is_favourite');
                const form = document.querySelector('form'); // Ambil form utama

                priceDisplay.addEventListener('keyup', function(e) {
                    let value = e.target.value.replace(/\D/g, ''); // Hanya ambil angka
                    value = value.replace(/\B(?=(\d{3})+(?!\d))/g, "."); // Tambah titik pemisah ribuan
                    e.target.value = value;
                    priceNumeric.value = value.replace(/\./g, ''); // Update nilai numeric
                });

                // Ubah checkbox isFavourite value
                if (isFavouriteCheckbox) {
                    isFavouriteCheckbox.addEventListener('change', function() {
                        this.value = this.checked ? 1 : 0;
                    });
                }

                // Ubah checkbox isFree dan sembunyikan harga jika gratis
                if (isFreeCheckbox) {
                    isFreeCheckbox.addEventListener('change', function() {
                        this.value = this.checked ? 1 : 0;

                        if (this.checked) {
                            priceDisplay.value = '0';
                            priceNumeric.value = '0';
                            document.getElementById('price-container').style.display = 'none';
                        } else {
                            document.getElementById('price-container').style.display = 'block';
                        }
                    });

                    // Jika isFree sudah diceklis saat halaman dimuat
                    if (isFreeCheckbox.checked) {
                        priceDisplay.value = '0';
                        priceNumeric.value = '0';
                        document.getElementById('price-container').style.display = 'none';
                    }
                }

                // Pastikan harga dikirim tanpa format pemisah ribuan saat submit
                if (form) {
                    form.addEventListener('submit', function() {
                        priceInput.value = priceInput.value.replace(/\./g, '');
                    });
                }
            });
        </script>

        <script src="https://cdn.tiny.cloud/1/3fwzm799wa7ksr848sl1hk39p48msamo7ejrsdgdpykd7tze/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
        </script>
        <script>
            tinymce.init({
                selector: 'textarea.tinymce',
                width: '100%',
                height: 300,
                plugins: [
                    'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
                    'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen',
                    'insertdatetime',
                    'media', 'table', 'emoticons', 'template', 'help'
                ],
                toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
                    'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
                    'forecolor backcolor emoticons | help',
                menu: {
                    favs: {
                        title: 'My Favorites',
                        items: 'code visualaid | searchreplace | emoticons'
                    }
                },
                menubar: 'favs file edit view insert format tools table help',
            });
        </script>
    @endpush
</x-layouts.admin>
