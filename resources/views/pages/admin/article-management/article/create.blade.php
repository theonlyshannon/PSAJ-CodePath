<x-layouts.admin title="Tambah Artikel">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.article.index') }}">Artikel</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Artikel</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h4 class="card-title">Tambah Artikel</h4>
                </x-slot>
                <form action="{{ route('admin.article.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @role('writer')
                        <input type="hidden" name="writer_id" value="{{ Auth::user()->writer->id }}">
                    @else
                        <div class="mb-3">
                            <label for="writer_id" class="form-label">Penulis</label>
                            <select class="form-control" name="writer_id" id="writer_id">
                                @foreach ($writers as $writer)
                                    <option value="{{ $writer->id }}"
                                        {{ old('writer_id') == $writer->id ? 'selected' : '' }}>
                                        {{ $writer->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endrole
                    <x-forms.input label="Title" name="title" id="title" />

                    <x-forms.input label="Thumbnail" name="thumbnail" id="thumbnail" type="file" />

                    <x-forms.textarea label="Content" name="content" id="content" editor="true" />

                    <x-forms.input label="Slug" name="slug" id="slug" />

                    <div class="mb-3">
                        <label for="categories" class="form-label">Kategori Artikel</label>
                        <select class="js-example-basic-multiple form-control" name="categories[]" multiple="multiple">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ in_array($category->id, old('categories', [])) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tags" class="form-label">Tag Artikel</label>
                        <select class="js-example-basic-multiple form-control" name="tags[]" multiple="multiple">
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}"
                                    {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <x-ui.base-button color="primary" type="submit">Simpan</x-ui.base-button>
                    <x-ui.base-button color="danger" href="{{ route('admin.article.index') }}">
                        Kembali
                    </x-ui.base-button>
                </form>
            </x-ui.base-card>
        </div>
    </div>

    @push('custom-scripts')
        <!-- Inisialisasi Slug Otomatis -->
        <script>
            const title = document.querySelector('#title');
            const slug = document.querySelector('#slug');

            title.addEventListener('keyup', function() {
                const titleValue = title.value;
                slug.value = titleValue.toLowerCase().split(' ').join('-');
            });
        </script>

        <!-- Inisialisasi Select2 -->
        <script>
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
            });
        </script>


<script src="https://cdn.tiny.cloud/1/3fwzm799wa7ksr848sl1hk39p48msamo7ejrsdgdpykd7tze/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
                selector: 'textarea.tinymce',
                width: '100%',
                height: 300,
                plugins: [
                    'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
                    'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen', 'insertdatetime',
                    'media', 'table', 'emoticons', 'template', 'help'
                ],
                toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
                    'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
                    'forecolor backcolor emoticons | help',
                menu: {
                    favs: { title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons' }
                },
                menubar: 'favs file edit view insert format tools table help',
            });
        </script>
    @endpush

</x-layouts.admin>
