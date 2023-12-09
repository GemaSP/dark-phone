<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'protocol' => 'smtp', // or 'mail'
    'smtp_host' => 'ssl://smtp.gmail.com',
    'smtp_port' => 465, // Change port based on your SMTP settings
    'smtp_user' => '12220015@bsi.ac.id',
    'smtp_pass' => '2002-09-14',
    'mailtype' => 'html',
    'charset' => 'utf-8',
    'newline' => "\r\n"
    // Other email configurations as needed
);