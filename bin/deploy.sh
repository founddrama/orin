#!/bin/sh
# This is a sample deploy script for the Orin WordPress blog theme
# @requires {com.yahoo.platform.yui.compressor.YUICompressor}
# 			<http://developer.yahoo.com/yui/compressor/>
# @requires {sass} and {haml}
#			<http://sass-lang.com/>

# configure as needed:
BLOG_ROOT=${HOME}/blog.founddrama.net/
WP_THEMES=${BLOG_ROOT}wp-content/themes/
YUI_COMPRESSOR=${HOME}/build/bin/yuicompressor-2.4.2.jar

# get into the right dir
cd ${WP_THEMES}

if [ ! -d orin ]; then
	echo "Missing local repository!"
	echo "(How do you even have this deploy script?)"
	echo "Attempting to clone Orin theme from github:"
	git clone --verbose -- ssh://git@github.com:founddrama/orin.git
fi

cd orin

# update to the latest
echo "[git] Updating Orin theme from the latest in the github master branch:"
git pull --verbose  

# .css from .scss
if [ ! -d css ]; then
	echo "Missing css directory!"
	echo "[bash] Attempting to create orin/css:"
	mkdir css
fi
echo "[compass] Compiling CSS from Sass/SCSS sources..."
compass compile --sass-dir src/scss --css-dir css -e production -s compressed --no-line-comments
echo "[bash] Moving style.css to Orin theme's root..."
mv css/style.css style.css

exit 0;
