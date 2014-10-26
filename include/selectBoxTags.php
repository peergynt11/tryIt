<?PHP
function selectBoxTags( $tags, $listName ) {
    $selectTags = '<select name="' .$listName .'">';

    foreach ($tags as $key => $value) {
        $selectTags .= '<option value="'.$value['tag'].'">'.$value['tag'].'</option>';
    }
    $selectTags .= '</select>';

    return $selectTags;
}
?>