<?php
$this->set('channel',  array (
            'title'         => '温泉ナビ',
            'link'          => 'http://www.onsen-navi.net/',
            'description'   => '温泉ナビ'));

echo $rss->items($contents, 'transformRSS');

function transformRSS($contents) {
    return array(
    'title'       => $contents['Content']['subject'],
    'link'        => array('action' => 'index'),
    'guid'        => array('action' => 'index'),
    'description' => $contents['Content']['body'],
    'pubDate'     => $contents['Content']['created']
    );
}
?>