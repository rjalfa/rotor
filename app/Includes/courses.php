<?php

use Curl\Curl;

if (@filemtime(STORAGE."/temp/courses.dat") < time()-3600 || @filesize(STORAGE."/temp/courses.dat") == 0) {

    $curl = new Curl();

    if ($xml = $curl->get('http://www.cbr.ru/scripts/XML_daily.asp')){

        $courses = [];
        $courses['Date'] = strval($xml->attributes()->Date);
        foreach ($xml->Valute as $item) {

            $courses[strval($item->CharCode)] = [
                'name' => strval($item->Name),
                'value' => strval($item->Value),
                'nominal' => strval($item->Nominal)
            ];
        }

        file_put_contents(STORAGE."/temp/courses.dat", serialize($courses), LOCK_EX);
    }
}

$courses = @unserialize(file_get_contents(STORAGE."/temp/courses.dat"));

if (! empty($courses['USD'])){

    echo '<b>Курсы валют</b> ('.$courses['Date'].')<br>';
    echo '<b>'.$courses['USD']['nominal'].' '.$courses['USD']['name'].'</b> - '.$courses['USD']['value'].'<br>';
    echo '<b>'.$courses['EUR']['nominal'].' '.$courses['EUR']['name'].'</b> - '.$courses['EUR']['value'].'<br>';
    echo '<b>'.$courses['UAH']['nominal'].' '.$courses['UAH']['name'].'</b> - '.$courses['UAH']['value'].'<br>';

} else {
    showError('Ошибка! Не удалось загрузить последние курсы валют!');
}
