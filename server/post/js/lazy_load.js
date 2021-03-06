// Generated by CoffeeScript 1.6.3
(function() {
  var makePageSpinner;

  makePageSpinner = function() {
    var opts, spinner, target;
    opts = {
      lines: 10,
      length: 10,
      width: 5,
      radius: 10,
      corners: 1,
      rotate: 0,
      direction: 1,
      color: '#000',
      speed: 1,
      trail: 60,
      shadow: false,
      hwaccel: false,
      className: 'spinner',
      zIndex: 2e9,
      top: 'auto',
      left: 'auto'
    };
    target = document.getElementById('lazy_content_spinner');
    return spinner = new Spinner(opts).spin(target);
  };

  $(document).ready(function() {
    var $lazy_info, host, http, mobiloudLazyLoadContent, post_id, relative_url, slashes, url;
    $lazy_info = $('#mobiloud_lazy_load');
    relative_url = $lazy_info.data('url');
	
    post_id = $lazy_info.data('post_id');
    http = location.protocol;
    slashes = http.concat("//");
    host = slashes.concat(window.location.hostname);
    // url = "" + host + ":" + location.port + "/" + relative_url;
    url = relative_url;
	
    makePageSpinner();
    mobiloudLazyLoadContent = function(data) {
      $('#lazy_body').hide().html(data).show();
      return mobiloud_mobile_init();
    };
    return $.ajax({
      type: 'GET',
      url: url,
      dataType: 'html',
      data: {
        post_id: post_id
      },
      error: function(data, status, error) {
        return console.log(error);
      },
      success: function(data) {
        console.log("lazy_load: success");
        return mobiloudLazyLoadContent(data);
      },
      complete: function(jqXHR) {
        console.log("lazy_load: complete (status " + jqXHR.status + ")");
        if (jqXHR.status !== 200) {
          mobiloudLazyLoadContent(jqXHR.responseText);
          // return alert(url);
        }
      }
    });
  });

}).call(this);
