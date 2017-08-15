<?php 

echo $error;

echo form_open_multipart("test/do_upload_foto/");

echo form_upload('foto');

echo form_submit('name', 'value');

echo form_close();