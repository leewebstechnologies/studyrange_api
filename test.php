<?php
$fields = DB::select('DESCRIBE videos');
foreach($fields as $f) {
    echo $f->Field . "\n";
}
