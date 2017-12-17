<?php
global $nmjson;
if(!isset($nmjson)){
    $nmjson = new nmjson();
}

function nm_format_time( $seconds ) {
    if ( !$seconds ) return '--:--';
    $min = floor($seconds / 60);
    if ( $min < 10 ) $min = '0' . $min;
    $second = floor($seconds % 60);
    if ( $second < 10 ) $second = '0' . $second;

    return $min . ':' . $second;
}

wp_embed_register_handler( 'neteasemusicalbum', '#(http|https):\/\/music\.163\.com\/\#\/(\w+)\?id=(\d+)#i', 'wp_embed_handler_neteasemusicalbum' );

function nm_generate_player( $source = null,$type = null, $id = null){
    $source = $source ? $source : 'netease';
    global $nmjson;
    $html = '';
    $data = nm_get_setting('oversea') ? $nmjson->netease_oversea_song($id) : $nmjson->netease_song($id);
    $html .= '<div id="cm1"></div>';
    $html .= '<style>#cm1 * {box-sizing: content-box}</style>';
    $html .= '<div style="display:none"><script src="/wp-content/plugins/nm-cPlayer/cPlayer-1.1/dist/cPlayer.min.js" id="cmScript"></script>';
    $html .= "<script>
    var cm1 = new cPlayer({
        'element': document.getElementById('cm1'),
        'autoplay': false,
        'mode': 'default',
        'skin': 'default',
        'playlist': [
        {
          'title': '{$data['title']}',
          'artist': '{$data['artist']}',
          'cover': '{$data['cover']}',
          'file': '" . site_url() . "/wp-admin/admin-ajax.php?action=nmjson&type=song_url&id={$data['id']}'
        }]
    })
    </script></div>";
    return $html;
}

function wp_embed_handler_neteasemusicalbum( $matches, $attr, $url, $rawattr ) {
    if(! is_singular() ) return $url;
    $type = $matches[2];
    //wp_enqueue_script('cPlayer');
    $id = $matches[3];
    global $nmjson;
    $html .= nm_generate_player('netease',$type,$id);
    $nminstance++;
    return apply_filters( 'embed_forbes', $html, $matches, $attr, $url, $rawattr );
}