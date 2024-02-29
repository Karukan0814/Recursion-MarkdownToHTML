<?php



spl_autoload_extensions(".php");
spl_autoload_register();

// composerの依存関係のオートロード
require_once 'vendor/autoload.php';


function previewHtml(string $markdown)
{
    // マークダウンの内容をHTMLに変換
    // Parsedown インスタンスを作成
    $parsedown = new Parsedown();

    // Markdown を HTML に変換
    $html = $parsedown->text($markdown);
    return $html;
};


?>



<!DOCTYPE html>
<html>

<head>
    <!-- Monaco Editorのスタイルシートを読み込む -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.35.0/min/vs/editor/editor.main.css">
</head>

<body>
    <!-- エディターを表示するためのコンテナー -->
    <div style="width: 100%; display: flex;">
        <div id="editor" style="width: 50%; height: 600px;"></div>
        <div id="preview" style="width: 50%; height: 600px;"></div>
    </div>


    <form id="editorForm" action="submit.php" method="post">
        <input type="hidden" id="editorContent" name="editorContent">
        
        <button type="submit">Download</button>
    </form>


    <!-- Monaco Editorのスクリプトを読み込む -->
    <script src="https://cdn.jsdelivr.net/npm/marked@3.0.7/marked.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs/loader.min.js"></script>

    <script>
        require.config({
            paths: {
                'vs': 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs'
            }
        });
        require(['vs/editor/editor.main'], function() {
            var editor = monaco.editor.create(document.getElementById('editor'), {
                value: '',
                language: 'markdown'
            });

            editor.onDidChangeModelContent(function() {
                document.getElementById('editorContent').value = editor.getValue();
                // document.getElementById('preview').innerHTML = editor.getValue();

                let markdown = editor.getValue();
                console.log(markdown)
                let html = marked(markdown);
                document.getElementById('preview').innerHTML = html;


            });
        });
    </script>
</body>

</html>