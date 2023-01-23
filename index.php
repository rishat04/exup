<?php

    $url = 'https://www.youtube.com/@MixShow_official';

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($ch);
    curl_close($ch);

    $regex = '/(?<=var ytInitialData = )(.*)(?=;\<\/script\>)/m';

    preg_match($regex, $response, $matches);

    $json = $matches[0];
//     data.header?.c4TabbedHeaderRenderer?.subscriberCountText?.simpleText
    $json = json_decode($json);

    $simpleText = $json->header->c4TabbedHeaderRenderer->subscriberCountText->simpleText;

    echo $simpleText;
?>
