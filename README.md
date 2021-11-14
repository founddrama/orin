# ORIN - a theme for WordPress

Named for a character in David Foster Wallace's _Infinite Jest_, **Orin** is a
[WordPress](http://wordpress.org/) theme based on the "naked"
[Starkers](http://starkerstheme.com/) theme. It is an experiment in HTML5, CSS3,
and responsive design. The author's target for this theme's deployment is his
own [found_drama blog](https://blog.founddrama.net); but he hopes that you enjoy
it, too and choose fork it for your own experiments.


## Details

**Theme URI:** <https://blog.founddrama.net/orin>

**Author:** Rob Friesel

**Author URI:** <https://blog.founddrama.net/>

**Version:** 1.2.2


## Notes

CSS is developed and managed using [Sass](http://sass-lang.com/) and
[Compass](http://compass-style.org/); the author recommends that you work it
into your deploy script.


## Your Homework

The site references minified versions of certain resources (_e.g._, `css` and
`js` files); the author recommends a build script to handle creating these
minified files and putting them in the right place

* A sample deploy script is included at [`bin/deploy.sh`](bin/deploy.sh)
* A sample deploy workflow is included at [`.github/workflows/deploy-orin.yml`](.github/workflows/deploy-orin.yml)
