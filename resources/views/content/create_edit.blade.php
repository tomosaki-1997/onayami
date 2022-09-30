<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

    



    <title>投稿編集</title>
</head>

<body>
    @include('includes.header')
    <div class="container">
        <div class="create">
            <form method="POST" action="/create_edit_conf/{{ $content->id}}" enctype="multipart/form-data">
                @csrf
                <div class="title">
                    <h1>タイトル</h1>
                    <input name="title" value="{{ old('title',$content->title)}}" type="text">
                    @if ($errors->has('title'))
                    <p class="error-message">{{ $errors->first('title') }}</p>
                    @endif
                </div>
                <div class="create-detail">
                    <h1>本文</h1>
                    <textarea id="summernote" name="content">
                    {{ old('content',$content->content) }}
                    </textarea>
                    @if ($errors->has('content'))
                    <p class="error-message">{{ $errors->first('content') }}</p>
                    @endif
                </div>
                <div class="create-submit">
                    <button type="submit">投稿</button>
                </div>
            </form>
        </div>
    </div>
    @include('includes.footer')
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(() => {
            jQuery(document).ready(function($) {
                $('#summernote').summernote({
                    placeholder: 'Hello Bootstrap 4',
                    tabsize: 2,
                    height: 100,
                    
                    
                    callbacks: {
                        onImageUpload : function(files, editor, welEditable) {
                            for(var i = files.length - 1; i >= 0; i--) {
                                sendFile(files[i], this);
                            }
                        }   
                    } 
                });
            });
            $('#summernote').summernote({
                minHeight: 500,
                lang: 'ja-JP'
            });
            

            function sendFile(file, el) {
                var form_data = new FormData();
                form_data.append('file', file);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: form_data,
                    type: "POST",
                    contentType: 'multipart/form-data',
                    // 画像保存用のルート設定
                    url: 'summernote_images',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(url) {
                        $(el).summernote('editor.insertImage', url);
                    }
                });
            }

        });
    </script>
    
</body>

</html>