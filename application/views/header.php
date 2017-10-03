<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <!-- Page Title -->
    <title>GuessChan</title>

    <!-- Google please read this -->
    <meta name="description" content="A site for guessing which 4chan board a post came from">

    <!-- For Mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">

    <!-- Thumbnail -->
    <meta property="og:image" content="<?=base_url()?>resources/img/placeholder.jpg" />

    <!-- Link to Favicon -->
    <link rel="icon" href="<?=base_url()?>resources/img/favicon.ico">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->

    <link href="<?=base_url()?>resources/chan/burichan.css" rel="stylesheet" type="text/css">
    <!-- Blue -->
    <!-- <link href="<?=base_url()?>resources/chan/yotsubluenew.css" rel="stylesheet" type="text/css"> -->
    <!-- Classic -->
    <link href="<?=base_url()?>resources/chan/yotsubanew.css" rel="stylesheet" type="text/css">

    <!-- Local Style -->
    <link href="<?=base_url()?>resources/style.css?<?php echo time(); ?>" rel="stylesheet" type="text/css">

  </head>
  <body>