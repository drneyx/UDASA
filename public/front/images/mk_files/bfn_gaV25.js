(function(d,e,j,h,f,c,b){d.GoogleAnalyticsObject=f;d[f]=d[f]||function(){(d[f].q=d[f].q||[]).push(arguments)},d[f].l=1*new Date();c=e.createElement(j),b=e.getElementsByTagName(j)[0];c.async=1;c.src=h;b.parentNode.insertBefore(c,b)})(window,document,"script","//www.google-analytics.com/analytics.js","ga");window.initialUserStatus.then(function(c){var d=c.data;var b="Anonymous";if(d){b=d.pl==="1"?(d.subscription_status=="trialing"?"Trialing":"Plus"):"Free"}var e=BeFunky.Params.isBeta?"UA-1183085-17":"UA-1183085-2";ga("create",e,"auto");ga("set","dimension1",b);a(function(){var f=BeFunky.isUseHTML5?"HTML5":"FLASH";if(BeFunky.isInstalled()){f="PWA"}ga("set","dimension2",f);ga("send","pageview");window.trackUpgradeData=[];window.bf_eventTrack=function(k,m,i,l,n){var j=["WEBGL_GRAPHIC","DEVICE_MEMORY","APPMODE","AD_BLOCK","FLASH_DETECT"];if(j.includes(m)){ga("send","event",k,m,i,{nonInteraction:true})}else{ga("send","event",k,m,i,l)}if(n&&n.href){setTimeout(function(){window.location.href=n.href},500)}else{if(k==="CREATE"&&(m.indexOf("SAVE")>-1||m.indexOf("SHARE")>-1)&&i!=="SavePanelEmailRegister"){}else{if((k==="CREATE"||k==="EXTERNAL")&&typeof i==="string"&&(i.indexOf("UPGRADE")>-1||m.indexOf("WATERMARK")>-1)){var h=m+" "+i;var g=[];if(window.trackUpgradeData.length>1){g[0]=window.trackUpgradeData[1];g[1]=h}else{if(window.trackUpgradeData.length>0){g[0]=window.trackUpgradeData[0];g[1]=h}else{g[0]=h}}window.trackUpgradeData=g}else{if(k==="CONVERSION"){(function(){var o="";if(window.trackUpgradeData.length>0){o=window.trackUpgradeData[0];if(window.trackUpgradeData.length>1){o+=", "+window.trackUpgradeData[1]}}setTimeout(function(){try{ga("send","event","CREATE","FUNNEL",o)}catch(p){}},222)})()}}}}};window.scriptHasLoaded("ga")});function a(f){if(BeFunky.webGLDetectionComplete){return f()}setTimeout(function(){a(f)},200)}});