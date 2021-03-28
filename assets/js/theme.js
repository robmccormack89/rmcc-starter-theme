// things that i want to do everywhere, or that i want to be available everywhere

// the default inf scroll pagination; will be called on relevant archives & in quickloads etc
window.themePaginationScroll = function() {
  var paginationEle = document.getElementById("ThemePagination");
  if (paginationEle) {
    new InfiniteScroll( '.archive-posts', {
      path: '.next',
      append: '.item',
      button: '.view-more-button',
      scrollThreshold: false,
      history: false,
      status: '.page-load-status',
      hideNav: '.pagination-block'
    });
  };
};

// on page load, get the darklightswitch cookie
var darklightIsSet = getCookie("darklightswitch");
// if darklightswitch cookie exists
if (darklightIsSet) {
  // set the dark style
  setDarkStyle('dark-style', 'uk-light');
  setDarkLightSwitch('MoonLink', 'SunLink');
} else {
  // else set the light style(remove the dark style)
  setLightStyle('dark-style', 'uk-light');
  setDarkLightSwitch('SunLink', 'MoonLink');
}

// onclick function for dark/light switch; sets the cookie & style/s onclick
function cookieMeTimbers() {
  
  var darklightswitch = getCookie("darklightswitch");
  
  if (darklightswitch != "" && darklightswitch != null) {
    document.cookie = "darklightswitch=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    setLightStyle('dark-style', 'uk-light');
    setDarkLightSwitch('SunLink', 'MoonLink');
  } else {
    setCookie("darklightswitch", "dark", 7);
    setDarkStyle('dark-style', 'uk-light');
    setDarkLightSwitch('MoonLink', 'SunLink');
  }
}

function successFunction() {
  alert('It went well!')
};
function failFunction() {
  alert('It didnt go well...')
};
// listen for click event in the main, & if target of click has data-link attr, do the shop filtering
document.querySelector('main').addEventListener('click', function(event) {
  if (event.target.hasAttribute('data-link'))
    quickLoadTest('#SiteHeader', 'data-link', successFunction, failFunction);
});

// listen for click event in the main, & if target of click has data-link attr, do the shop filtering
// document.querySelector('main').addEventListener('click', function(event) {
// 	if (event.target.hasAttribute('data-link'))
// 		quickLoad('#PrimaryHeader', '.filters-container', 'quickloader', 'data-link', "ContentSection", '.index-archive', myFunction);
// });