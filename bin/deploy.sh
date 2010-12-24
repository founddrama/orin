#!/bin/sh
# This is a sample deploy script for the Orin WordPress blog theme
# @requires {com.yahoo.platform.yui.compressor.YUICompressor}
# 			<http://developer.yahoo.com/yui/compressor/>
# @requires {sass} and {haml}
#			<http://sass-lang.com/>

# configure as needed:
BLOG_ROOT=~/blog.founddrama.net/
WP_THEMES=${BLOG_ROOT}wp-content/themes/
YUI_COMPRESSOR=~/build/bin/yuicompressor-2.4.2.jar

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
echo "Updating Orin theme from the latest in the github master branch:"
git pull --verbose	

# minify the .js files
for j in `find . -name *[^min].js` ; do
	minName=${j/%\.js/.min.js}
	echo "Compressing '${j}' to '${minName}':"
	java -jar ${YUI_COMPRESSOR} -o ${minName} ${j}
done

# .css from .scss
sass --style compressed src/scss/style.scss:style.css
sass --style compressed src/scss/ie.scss:css/ie.css

exit 0;
