<?PHP

$array = array ( [0] => array (      'Land1' => 'Deutschland',
                                     'Land2' => 'Italien',
                                     'Land3' => 'Holland' ),
                 [1] => array (           'Land1' => 'Peru',
                                          'Land2' => 'Argentinien',
                                          'Land3' => 'Brasilien' ) );

echo $array[0]['Land1'] . '<br>';
echo $array[1]['Land2'] . '<br>';
echo $array['Europa']['Land3'] . '<br>';
echo $array['Suedamerika']['Land1'] . '<br>';
echo $array['Suedamerika']['Land2'] . '<br>';
echo $array['Suedamerika']['Land3'] . '<br>';

echo(htmlspecialchars('<table>'));


?>
