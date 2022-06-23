function darkmode(){const e=window.matchMedia("(prefers-color-scheme: darka)");e.matches?document.body.classList.add("dark-mode"):document.body.classList.remove("dark-mode"),e.addEventListener("change",(function(){e.matches?document.body.classList.add("dark-mode"):document.body.classList.remove("dark-mode")}));document.querySelector(".dark-mode-boton").addEventListener("click",(function(){document.body.classList.toggle("dark-mode")}))}function eventListeners(){document.querySelector(".mobile-menu").addEventListener("click",navegacionResponsive);document.querySelectorAll('input[name="contacto[contacto]"] ').forEach(e=>e.addEventListener("click",mostrarMetodosContacto))}function navegacionResponsive(){document.querySelector(".navegacion").classList.toggle("mostrar")}function mostrarMetodosContacto(e){const n=document.querySelector("#contacto");"telefono"===e.target.value?n.innerHTML='\n            \n            <label for="telefono"></label>\n            <input data-cy="input-telefono" type="tel" placeholder="Tu telefono" id="telefono" name="contacto[telefono]" >\n\n            <p>Elija la fecha y la hora para la llamada</p>\n\n            <label for="fecha">Fecha</label>\n            <input data-cy="input-fecha" type="date"  id="fecha" name="contacto[fecha]">\n\n            <label for="hora">Hora</label>\n            <input data-cy="input-hora" type="time"  id="hora" min="9:00" max="18:00" name="contacto[hora]">\n        ':n.innerHTML='\n            <label  for="email">E-mail</label>\n            <input data-cy="input-email" type="email" placeholder="Tu email" id="email" name="contacto[email]" required>\n        '}
/*! modernizr 3.6.0 (Custom Build) | MIT *
 * https://modernizr.com/download/?-webp-setclasses !*/document.addEventListener("DOMContentLoaded",(function(){eventListeners(),darkmode()})),function(e,n,o){function a(e,n){return typeof e===n}function t(e){var n=d.className,o=r._config.classPrefix||"";if(u&&(n=n.baseVal),r._config.enableJSClass){var a=new RegExp("(^|\\s)"+o+"no-js(\\s|$)");n=n.replace(a,"$1"+o+"js$2")}r._config.enableClasses&&(n+=" "+o+e.join(" "+o),u?d.className.baseVal=n:d.className=n)}function i(e,n){if("object"==typeof e)for(var o in e)c(e,o)&&i(o,e[o]);else{var a=(e=e.toLowerCase()).split("."),A=r[a[0]];if(2==a.length&&(A=A[a[1]]),void 0!==A)return r;n="function"==typeof n?n():n,1==a.length?r[a[0]]=n:(!r[a[0]]||r[a[0]]instanceof Boolean||(r[a[0]]=new Boolean(r[a[0]])),r[a[0]][a[1]]=n),t([(n&&0!=n?"":"no-")+a.join("-")]),r._trigger(e,n)}return r}var A=[],s=[],l={_version:"3.6.0",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,n){var o=this;setTimeout((function(){n(o[e])}),0)},addTest:function(e,n,o){s.push({name:e,fn:n,options:o})},addAsyncTest:function(e){s.push({name:null,fn:e})}},r=function(){};r.prototype=l,r=new r;var c,d=n.documentElement,u="svg"===d.nodeName.toLowerCase();!function(){var e={}.hasOwnProperty;c=a(e,"undefined")||a(e.call,"undefined")?function(e,n){return n in e&&a(e.constructor.prototype[n],"undefined")}:function(n,o){return e.call(n,o)}}(),l._l={},l.on=function(e,n){this._l[e]||(this._l[e]=[]),this._l[e].push(n),r.hasOwnProperty(e)&&setTimeout((function(){r._trigger(e,r[e])}),0)},l._trigger=function(e,n){if(this._l[e]){var o=this._l[e];setTimeout((function(){var e;for(e=0;e<o.length;e++)(0,o[e])(n)}),0),delete this._l[e]}},r._q.push((function(){l.addTest=i})),r.addAsyncTest((function(){function e(e,n,o){function a(n){var a=!(!n||"load"!==n.type)&&1==t.width;i(e,"webp"===e&&a?new Boolean(a):a),o&&o(n)}var t=new Image;t.onerror=a,t.onload=a,t.src=n}var n=[{uri:"data:image/webp;base64,UklGRiQAAABXRUJQVlA4IBgAAAAwAQCdASoBAAEAAwA0JaQAA3AA/vuUAAA=",name:"webp"},{uri:"data:image/webp;base64,UklGRkoAAABXRUJQVlA4WAoAAAAQAAAAAAAAAAAAQUxQSAwAAAABBxAR/Q9ERP8DAABWUDggGAAAADABAJ0BKgEAAQADADQlpAADcAD++/1QAA==",name:"webp.alpha"},{uri:"data:image/webp;base64,UklGRlIAAABXRUJQVlA4WAoAAAASAAAAAAAAAAAAQU5JTQYAAAD/////AABBTk1GJgAAAAAAAAAAAAAAAAAAAGQAAABWUDhMDQAAAC8AAAAQBxAREYiI/gcA",name:"webp.animation"},{uri:"data:image/webp;base64,UklGRh4AAABXRUJQVlA4TBEAAAAvAAAAAAfQ//73v/+BiOh/AAA=",name:"webp.lossless"}],o=n.shift();e(o.name,o.uri,(function(o){if(o&&"load"===o.type)for(var a=0;a<n.length;a++)e(n[a].name,n[a].uri)}))})),function(){var e,n,o,t,i,l;for(var c in s)if(s.hasOwnProperty(c)){if(e=[],(n=s[c]).name&&(e.push(n.name.toLowerCase()),n.options&&n.options.aliases&&n.options.aliases.length))for(o=0;o<n.options.aliases.length;o++)e.push(n.options.aliases[o].toLowerCase());for(t=a(n.fn,"function")?n.fn():n.fn,i=0;i<e.length;i++)1===(l=e[i].split(".")).length?r[l[0]]=t:(!r[l[0]]||r[l[0]]instanceof Boolean||(r[l[0]]=new Boolean(r[l[0]])),r[l[0]][l[1]]=t),A.push((t?"":"no-")+l.join("-"))}}(),t(A),delete l.addTest,delete l.addAsyncTest;for(var f=0;f<r._q.length;f++)r._q[f]();e.Modernizr=r}(window,document);
//# sourceMappingURL=bundle.js.map
