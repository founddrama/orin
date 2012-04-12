# need a plan :

* 1024px (iPad ... low res monitors)
  * working out just fine actually

* consider the iPhone
  * 320px wide (portrait)
  * 480px tall
  * (goes both ways)
  * 4 + 4S are double

# changes?

*. masthead
  * height: 8em; [COMMENTED OUT]
* .masthead nav ul
  * right:0;left:0;bottom:0; [CHECK]
* .masthead-widgets
  * display:none; [TENATIVE - netter way?]
* .orin-container [CHECK]
  * (current styles only apply when width > 1023px)
  * margin: 0 1em;
* .orin-chronology [CHECK]
  * width (only applies > 1023px)
* .post-decorator [CHECK]
  * padding : 40px 20px 20px;
  * margin-bottom : 32px;
* article blockquote [CHECK]
  * margin: 1em 0;
* aside [CHECK]
  * (current styles only apply when width > 1023px)

# problems etc. following 1st attempt :
* text still very small on iphone :(
* if you start at the small size (on desktop ... say 320px) then it doesn't
  quite calculate where the right edge is (not well, not exactly)
* if you go from "a big size" down to <=1023px then the aside will properly
  "drop down" under the main content -- but if you go "back" to a window size
  that is 1024px or above then the aside still "sits" under the main content,
  even though it has floated over to where it should be (!?!?)