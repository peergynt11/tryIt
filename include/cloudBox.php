<?PHP

function cloudBox( $tags, $cssfields, $target) {

    $cloudTags = '';

    foreach ($tags as $key => $value) {

        shuffle($cssfields);
        $tag = $cssfields[0];

        $cloudTags .= '<a href="'.$value['url'].'" target="' .
                    $target.'" class="iframe '.$tag.'" >'.$value['tag'].'</a> ';
    }

    return $cloudTags;

}

?>