<?php



spl_autoload_extensions(".php");
spl_autoload_register();

// composerの依存関係のオートロード
require_once 'vendor/autoload.php';

// POSTリクエストからパラメータを取得
$markdown = $_POST['editorContent'] ;
// $format = $_POST['format']??"html" ;

// echo($markdown);
// echo($format);


// マークダウンの内容をHTMLに変換
// Parsedown インスタンスを作成
$parsedown = new Parsedown();

// Markdown を HTML に変換
$html = $parsedown->text($markdown);

// 変換された HTML を表示
// if($format==="file"){
    header('Content-Type: text/html');
    header('Content-Disposition: attachment; filename="markdownToHtml.html"');
    echo $html;
// }else{
    
    
//     echo $html;

// }

?>