(function() {
  /**
   * Attached to `iframe.flickr-embed-frame`, observe when the element is resized
   * and re-scale the explicitly set height to match the dynamic width based on
   * the original aspect ratio.
   *
   * It's stupid that we have to do this at all... but here we are.
   */
  const resizeObserver = new ResizeObserver((entries) => {
    entries.forEach((entry) => {
      const { target } = entry;
      const { naturalHeight, naturalWidth } = target.dataset;
      const aspectRatio = parseInt(naturalHeight) / parseInt(naturalWidth);
  
      target.style.height = `${Math.floor(entry.contentRect.width * aspectRatio)}px`;
    });
  });

  /**
   * Embedded Flickr images start their lifecycle as a `a[data-flickr-embed] > img`
   * until the accompanying <script> replaces them with an `iframe.flickr-embed-frame`.
   * When those are inserted, the script applies explicit height/width with the
   * [style] attr -- very high CSS specificity! We can amend the width easily
   * enough with some CSS (max-height: 100% !important) BUT! not so much the
   * height, which leaves unsightly gaps in the layout.
   *
   * How to resolve that? Attach the ResizeObserver.
   */
  const mutationObserver = new MutationObserver((mutationsList) => {
    mutationsList.forEach((mutation) => {
      const addedNodes = Array.from(mutation.addedNodes);
  
      const isFlickrIframe = (el) => {
        return el.tagName === 'IFRAME' &&
            el.className.indexOf('flickr-embed-frame') > -1;
      }
  
      if (
        mutation.type === 'childList' &&
        addedNodes.some(isFlickrIframe)
      ) {
        addedNodes.forEach((el) => {
          if (isFlickrIframe(el)) {
            resizeObserver.observe(el);
          }
        });
      }
    });
  });

  /**
   * Get every <article> -- does it have embedded images from Flickr?
   * If so: set the MutationObserver on them.
   */
  Array.from(document.querySelectorAll('article')).forEach((article) => {
    if (article.querySelectorAll('a[data-flickr-embed]').length > 0) {
      mutationObserver.observe(article, { childList: true });
    }
  });
}());
