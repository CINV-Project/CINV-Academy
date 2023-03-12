<?php
header('Content-Type: application/json; charset=utf-8');
echo isset($body_content) && $body_content  ? $body_content : '[]';
