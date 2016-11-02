@include('media::admin.grid.partials.content')
<script>
    $(document).ready(function () {
        $('.jsInsertImage').on('click', function (e) {
            e.preventDefault();
            var mediaId = $(this).data('id');
            var img_path = $(this).data('file');
            window.opener.includeMedia(mediaId,img_path);
            window.close();
        });
    });
</script>
</body>
</html>
