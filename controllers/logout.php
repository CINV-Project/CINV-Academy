<?php
session_destroy();
session_start();
flash_message()->success('You have been logged out', base_path('home'));
