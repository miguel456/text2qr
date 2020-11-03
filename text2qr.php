#!/usr/bin/php
<?php

require 'vendor/autoload.php';

use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

function output($txt)
{
  echo $txt . PHP_EOL;
}

function help()
{
  output("Usage: ");
  output("text2qr [(o) -h ] [--if [text]] [--of[filename]]");
  output("(o) denotes optional parameters.");
  output("Text2QR 0.1.0. Written by miguel456 <miguel456@spacejewel-hosting.com>");
 
  exit(0);
}


if (isset($argv[1]) && $argv[1] == '-h')
{
    help();
}

function validateIncomingArguments()
{
  global $argv;

  foreach($argv as $arg)
  {
    if (is_null($arg))
    {
      output("Invalid argument syntax! Please see the below message for help.");
      help();
    }
  }
}

function validateEnvironment()
{
  if (!extension_loaded('imagick'))
  {
    output('Error: This program requires ImageMagick. Please install the associated PHP extension ("sudo apt install php-imagick" on Ubuntu-like environments).');
    exit(1);
  }
}

validateIncomingArguments();
validateEnvironment();

$arguments = [
   'name' => $argv[0],
   'action' => [
     'name' => $argv[1],
     'value' => $argv[2]
   ],
   'subAction' => [
     'name' => $argv[3],
     'value' => $argv[4]
   ]

];

switch ($arguments['action']['name'])
{

   case '--if':
       
        if ($arguments['subAction']['name'])
        {
           $renderer = new ImageRenderer(new RendererStyle(400), new ImagickImageBackend());
           (new Writer($renderer))->writeFile($arguments['action']['value'], $arguments['subAction']['value']);
           output("Wrote {$arguments['action']['value']} to a QR code @ {$arguments['subAction']['value']}.");
           
           return 0;
        }
        
           output("Unknown parameters!");
           help();
       
        break;


   default:
        echo 'Unknown parameters!';
        help();

}