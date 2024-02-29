<!DOCTYPE html>
<html>

<head>
    <!-- Monaco Editorのスタイルシートを読み込む -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.35.0/min/vs/editor/editor.main.css">
</head>

<body>
    <!-- エディターを表示するためのコンテナー -->
    <div id="editor" style="width:800px;height:600px;"></div>
    
    <form id="editorForm" action="submit.php" method="post">
    <input type="hidden" id="editorContent" name="editorContent">
    <label for="format">Download Format:</label>
        <select id="format" name="format">
            <option value="html">ページ上に表示</option>
            <option value="file">ファイルとしてダウンロード</option>
        </select>
    <button type="submit">Generate</button>
</form>


    <!-- Monaco Editorのスクリプトを読み込む -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs/loader.min.js"></script>
<script>
    require.config({ paths: { 'vs': 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs' }});
    require(['vs/editor/editor.main'], function() {
        var editor = monaco.editor.create(document.getElementById('editor'), {
            value: '',
            language: 'javascript'
        });

        editor.onDidChangeModelContent(function () {
            document.getElementById('editorContent').value = editor.getValue();
        });
    });
</script>
</body>

</html>