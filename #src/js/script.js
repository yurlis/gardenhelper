
function fullPath(path) {
	path = path.substring(0, path.lastIndexOf("/"));
	return (path.match(/[^.]+(\.[^?#]+)?/) || [])[0];
}

// // let webSiteUrl = "http://" + document.domain;
let webSiteUrl = fullPath(location.href) + "/";

// console.log(webSiteUrl);

// str1 = window.location.pathname // /account/search
// // For reference:
// str2 = window.location.host     // www.somedomain.com (includes port if there is one)
// str3 = window.location.hostname // www.somedomain.com
// str4 = window.location.hash     // #top
// str5 = window.location.href     // http://www.somedomain.com/account/search?filter=a#top
// str6 = window.location.port     // (empty string)
// str7 = window.location.protocol // http:
// str8 = window.location.search   // ?filter=a  

@@include('iswebp.js')
@@include('help.js')
@@include('userblock.js')
@@include('pagination.js')