<?php

require_once('tools.php');

//preg_match_all('@<a rel="bookmark">(.*?)</a>@si', tools::getPageContent(), $result);
$dom = new DOMDocument;
// Load HTML from a string
$internalErrors = libxml_use_internal_errors(true);
$dom->loadHTML(tools::getPageContent('https://tr.euronews.com/'));

libxml_use_internal_errors($internalErrors);
//print_r($dom->textContent);

$idx = 1;
foreach ($dom->getElementsByTagName('a') as $element) {
    $idx++;
    if ($idx > 7) {
        if ($idx % 2 == 1) {
            if ($element->tagName == "a") {
                if ($element->getAttribute('title') !== " " && !empty($element->getAttribute('title'))) {
                    tools::sendToTelegramChannel($element->getAttribute('title'));
                    sleep(3);
                }
            }
        }
    }


}
/*
print_r($dom->getElementsByTagName('p'));
$xpath = new DOMXpath($dom);

$res = $xpath->query('//h3[contains(@class, "m-object__title qa-article-title")]');
print_r($res);
exit();
foreach($result[0] as $news){
    preg_match_all('@<a class="m-object__title__link ">(.*?)</a>@si', $news, $result2);
    /*
    tools::sendToTelegramChannel($news);
        sleep(10);
}
*/