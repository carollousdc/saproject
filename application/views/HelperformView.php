<?php

echo form_open('/');
echo form_label('Nama : ')."<br />";
echo form_input('Nama')."<br /><br />";
echo form_textarea('Komentar : ')."<br />";
echo form_submit('submit', 'send')."<br />";

?>