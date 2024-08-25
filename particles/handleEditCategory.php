<?php
echo 'hah';
if (isset($_GET['action']) && $_GET['action'] == 'edit') {
    echo 'edit';
} elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
    echo 'delete';
}
