#!/bin/sh
# This is a sample deploy script for the Orin WordPress blog theme
# @requires {sass} and {haml}
#     <http://sass-lang.com/>

# configure as needed:
BLOG_ROOT=${HOME}/blog.founddrama.net/
WP_THEMES=${BLOG_ROOT}wp-content/themes

# get into the right dir
cd ${WP_THEMES}

if [ ! -d orin ]; then
  echo "[WARNING] Missing local repository!"
  echo "Attempting to clone Orin theme from github:"
  git clone --verbose -- ssh://git@github.com:founddrama/orin.git
fi

cd ${WP_THEMES}/orin

# update to the latest
echo "[git] Updating Orin theme from the latest in the github master branch:"
git pull --verbose  

# .css from .scss
if [ ! -d css ]; then
  echo "[WARNING] Missing css directory!"
  echo "[bash] Attempting to create orin/css:"
  mkdir css
fi
if ! command -v compass &> /dev/null
then
  gem install compass
fi
echo "[compass] Compiling CSS from Sass/SCSS sources..."
compass compile --sass-dir src/scss --css-dir css -e production -s compressed --no-line-comments

# in the event that config.rb goes missing...
if [ -e css/style.css ]; then
  echo "[bash] Moving style.css to Orin theme's root..."
  mv css/style.css style.css
fi

exit 0;
