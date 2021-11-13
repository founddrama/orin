(function() {
  const resizeObserver = new ResizeObserver((entries) => {
    entries.forEach((entry) => {
      const { target } = entry;
      const { naturalHeight, naturalWidth } = target.dataset;
      const aspectRatio = parseInt(naturalHeight) / parseInt(naturalWidth);
  
      target.style.height = `${Math.floor(entry.contentRect.width * aspectRatio)}px`;
    });
  });
  
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
  
  Array.from(document.querySelectorAll('article')).forEach((article) => {
    if (article.querySelectorAll('a[data-flickr-embed]').length > 0) {
      mutationObserver.observe(article, { childList: true });
    }
  });
}());
