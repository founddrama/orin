#!/bin/sh

# Assumes Dart Sass was installed via `npm install -g sass`
#
# Compiling for production? Add these flags:
#     --style=compressed --no-source-map 
# This one compiles for local development: 
sass src/scss/style.scss:style.css src/scss/mq.scss:css/mq.css
