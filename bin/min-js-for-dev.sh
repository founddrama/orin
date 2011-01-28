#!/bin/sh
# This is a sample deploy script for the Orin WordPress blog theme
# @requires {com.yahoo.platform.yui.compressor.YUICompressor}
# 			<http://developer.yahoo.com/yui/compressor/>
# @requires {sass} and {haml}
#			<http://sass-lang.com/>

# configure as needed:
BLOG_ROOT=~/Sites/wordpress
ORIN=${BLOG_ROOT}/wp-content/themes/orin
YUI_COMPRESSOR=~/Applications/yuicompressor-2.4.2/build/yuicompressor-2.4.2.jar

function ymin {
	java -jar ${YUI_COMPRESSOR} ${1} >> ${ORIN}/js/orin.min.js
}

# get into the right dir
cd ${ORIN}

# minify the .js files
#	for j in `find . -name *[^min].js` ; do
#		minName=${j/%\.js/.min.js}
#		echo "Compressing '${j}' to '${minName}':"
#		java -jar ${YUI_COMPRESSOR} -o ${minName} ${j}
#	done

touch ${ORIN}/js/orin.min.js
echo '/*! orin namespaced JS */' > ${ORIN}/js/orin.min.js

ymin ${ORIN}/src/js/orin-base.js
ymin ${ORIN}/src/js/orin-ready.js

exit 0;
