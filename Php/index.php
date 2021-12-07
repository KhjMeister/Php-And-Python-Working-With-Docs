<?php
$striped_content = '';
        $content = '';

        $zip = zip_open("kj.docx");

        

        while ($zip_entry = zip_read($zip)) {

            if (zip_entry_open($zip, $zip_entry) == FALSE) continue;

            if (zip_entry_name($zip_entry) != "word/document.xml") continue;

            $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

            zip_entry_close($zip_entry);
        }// end while

        zip_close($zip);

        $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
        $content = str_replace('</w:r></w:p>', "\r\n", $content);
        $striped_content = strip_tags($content);

        

?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<body>
<?php 
// echo str_replace("world", "Dolly", "Hello world!"); // outputs Hello Dolly!
 // printf( $striped_content ); 
// echo str_word_count($striped_content);

// for ($i=0; $i < str_word_count($striped_content) ; $i++) { 
    
// }
$pieces = explode("؟",$striped_content);

$qst = explode("12-",$pieces[0],2);

$temp =   explode("1)",$pieces[1],2);

$ans1 = explode("2)",$temp[1],2);

$ans2 = explode("3)",$ans1[1],2);

$ans3 = explode("4)",$ans2[1],2);

$ans4 = $ans3[1];

// print_r($qst);


echo $qst[1]."<br>".$ans1[0]."<br>".$ans2[0]."<br>".$ans3[0]."<br>".$ans4."<br>";

?>
</body>
</html>
