<?php

echo 'Coucou je suis là';

print('<pre>');
print_r($_REQUEST);
print('<pre>');

// print('pre');
// print_r($_GET);
// print('</pre>');

print('<pre>');
print_r($_POST);
print('</pre>');

print('<pre>');
print_r($_FILES)['chAvatar'];
move_upload_file($_FILES['chAvatar']['tmp_name'], './'.$_FILES['name']);
print('</pre>');