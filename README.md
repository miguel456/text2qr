# Text2QR 0.1.0
Simple and quick command line QR code generator (automation tool). Argument names were inspired by the `dd` tool, just thought they were nice sounding.

# What is Text2QR?

Text2QR is a quick command line QR code generator. Give it some text, a file name, and hit enter, and a brand new QR code derived from your input will be placed at the destination.

This is especially useful in server environments where you can't really open a QR code generation website, or when you don't want to go through the trouble of googling for one.
It can also be used from other scripts and from web apps, as it was written with no human interaction in mind, so wherever you need a QR code, this simple script is here to save you from writing extra code.

# Requirements

- Latest version of ImageMagick (php-imagick)

# Install

Text2QR uses [https://github.com/Bacon/BaconQrCode9](BaconQrCode) for generating images. Run ``composer install`` to install it and it's dependencies. The script won't work without it.

Composer is a dependency manager for PHP scripts and web apps. Make sure to have it installed!

# Usage

Using Text2QR is simple. Here are the arguments:

`text2qr [(o) -h(elp)] [--if[your text here]] [--of[your filename here]]`

Example: `php text2qr --if "Hello World!" --of "hello-world.png"` would create an hello-world.png image with a QR code saying "Hello World!".


# Contributions and Suggestions

If you have any contributions or suggestions, feel free to post them in the Issues section and I'll take a look.


# Licensing

Covered by the MIT license. See the [TL;DR](https://tldrlegal.com/license/mit-license) for details.
  
