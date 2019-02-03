<div id="app">
    <div class="container">
        @include('includes.messages')
        @yield('content')
    </div>
</div>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'article-ckeditor1' );
    CKEDITOR.replace( 'article-ckeditor2' );
    CKEDITOR.replace( 'article-ckeditor3' );
    CKEDITOR.replace( 'article-ckeditor4' );
</script>
