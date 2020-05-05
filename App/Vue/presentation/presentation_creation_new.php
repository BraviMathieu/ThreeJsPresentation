<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="Cache-Control" content="max-age=0">
		<meta http-equiv="Cache-Control" content="no-cache">
		<meta http-equiv="expires" content="0">
		<meta http-equiv="Expires" content="Tue, 01 Jan 1980 1:00:00 GMT">
		<meta http-equiv="Pragma" content="no-cache">
		<link rel="stylesheet" href="styles/main.css">

		<link rel="stylesheet" href="preview_export/reveal/css/theme/default.css">

		<link rel="stylesheet" type="text/css" href="styles/built.css">
		<script type="text/javascript" src="preview_export/download_assist/swfobject.js"></script>
		<script>
  	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  	})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  	ga('create', 'UA-42322531-1', 'strut.io');
  	ga('send', 'pageview');
	</script>
	</head>
	<body class="bg-default">
		<!--[IF IE]>
			<div class="container">
			<div class="alert alert-success">
				Internet Explorer does not support the 3-D transitions required by <strong>Strut</strong>.
				<br/>
				<br/>
				<strong>Strut</strong> currenly only works in <a href="http://www.mozilla.org/en-US/firefox/new/">Firefox</a>, <a href="https://www.google.com/intl/en/chrome/browser/">Chrome</a> and <a href="http://support.apple.com/kb/DL1531">Safari</a>.
				<br/>
				We do hope to support IE 10 sometime in the future.
				<br/><br/>
				Sorry for the inconvenience.
			</div>
			</div>
		<![endif]-->
		<script>
		window.isOptimized = true;
		if (!Function.prototype.bind) {
		  Function.prototype.bind = function (oThis) {
		    if (typeof this !== "function") {
		      // closest thing possible to the ECMAScript 5 internal IsCallable function
		      throw new TypeError("Function.prototype.bind - what is trying to be bound is not callable");
		    }

		    var aArgs = Array.prototype.slice.call(arguments, 1), 
		        fToBind = this, 
		        fNOP = function () {},
		        fBound = function () {
		          return fToBind.apply(this instanceof fNOP && oThis
		                                 ? this
		                                 : oThis,
		                               aArgs.concat(Array.prototype.slice.call(arguments)));
		        };

		    fNOP.prototype = this.prototype;
		    fBound.prototype = new fNOP();

		    return fBound;
		  };
		}

		if (!Array.prototype.some) {
		  Array.prototype.some = function(fun /*, thisp */) {
		    'use strict';

		    if (this == null) {
		      throw new TypeError();
		    }

		    var thisp, i,
		        t = Object(this),
		        len = t.length >>> 0;
		    if (typeof fun !== 'function') {
		      throw new TypeError();
		    }

		    thisp = arguments[1];
		    for (i = 0; i < len; i++) {
		      if (i in t && fun.call(thisp, t[i], i, t)) {
		        return true;
		      }
		    }

		    return false;
		  };
		}

		if (!Array.prototype.forEach) {
		    Array.prototype.forEach = function (fn, scope) {
		        'use strict';
		        var i, len;
		        for (i = 0, len = this.length; i < len; ++i) {
		            if (i in this) {
		                fn.call(scope, this[i], i, this);
		            }
		        }
		    };
		}

		var head = document.getElementsByTagName('head')[0];
		function appendScript(src) {
			var s = document.createElement("script");
    		s.type = "text/javascript";
    		s.src = src;
    		head.appendChild(s);
		}

		if (window.location.href.indexOf("preview=true") == -1) {
			window.dlSupported = 'download' in document.createElement('a');
			window.hasFlash = swfobject.hasFlashPlayerVersion(9);
			if (!dlSupported && window.hasFlash) {
				appendScript('preview_export/download_assist/downloadify.min.js');
			}
		}
		</script>
		<script data-main="scripts/amd-app" src="scripts/libs/require.js"></script>
		<div id="modals">
		</div>
	</body>
</html>
