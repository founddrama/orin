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
if ! command -v sass &> /dev/null
then
  npm install -g sass
fi
echo "[sass] Compiling CSS from SCSS sources..."
sass --style=compressed --no-source-map  src/scss/style.scss:style.css src/scss/mq.scss:css/mq.css

exit 0;
