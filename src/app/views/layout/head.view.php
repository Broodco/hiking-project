<!doctype html>
<html lang="en"  class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/style/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="icon" type="image/x-icon" href="/images/logo_compass.svg">
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Hiking Project</title>
</head>
<body class="h-full">
    <div class="min-h-full flex flex-col">
        <div class="bg-gray-800 pb-32">
            <nav class="bg-gray-800" x-data="{ menu_open: false }">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

<?php require 'app/views/layout/nav.view.php' ?>