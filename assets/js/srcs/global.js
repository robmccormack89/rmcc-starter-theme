// load infinite scroll
window.InfiniteScroll = require('infinite-scroll');

// global theme functions

// setting & getting cookies
window.setCookie = function(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
};
window.getCookie = function(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
  else return null;
};

// sets the dark style by adding the provided classes to the body
window.setDarkStyle = function(firstClass, secondClass) {
  document.body.classList.add(firstClass);
  document.body.classList.add(secondClass);
};

// removes the dark style, which reverts back to the light style, by removing the provided classes from the body
window.setLightStyle = function(firstClass, secondClass) {
  document.body.classList.remove(firstClass);
  document.body.classList.remove(secondClass);
};

// set the dark/light style switch; hides & unhides the elements respectivley with the provided IDs
window.setDarkLightSwitch = function(firstID, secondID) {
  document.getElementById(firstID).setAttribute("hidden", "");
  document.getElementById(secondID).removeAttribute("hidden");
};

// function quickLoad(scrollToID, containerClass, quickloadClass, linkAttr, parentCont, childCont, refreshCallback) {
// 
//   // scroll to top
// 	UIkit.scroll('', {
// 		offset: 90
// 	}).scrollTo(scrollToID);
// 
//   // add the quickloader anim to the content container
// 	document.querySelector(containerClass).classList.add(quickloadClass);
// 
//   // get the value of the event target's defined attribute
// 	var data_link = event.target.getAttribute(linkAttr);
// 
// 	fetch(data_link).then(function(response) {
// 
// 		return response.text();
// 
// 	}).then(function(html) {
// 
// 		var parser = new DOMParser();
// 		var main_container = document.getElementById(parentCont);
// 		var current_content = document.querySelector(childCont);
// 		var doc_obj = parser.parseFromString(html, 'text/html');
// 		var new_content = doc_obj.querySelector(childCont);
// 		main_container.replaceChild(new_content, current_content);
// 
//     refreshCallback();
// 
// 	}).catch(function(error) {
// 
// 		// There was an error
// 		console.warn('Something went wrong.', error);
// 
// 	});
// };

window.quickLoadTest = function(scrollToID, linkAttr, successFn, failFn) {
  
  // scroll to top
	UIkit.scroll('', {
		offset: 90
	}).scrollTo(scrollToID);
  
  // get the value of the event target's defined attribute
	var data_link = event.target.getAttribute(linkAttr);
  
	fetch(data_link).then(function(response) {
    
		return response.text();
    
	}).then(function() {
    
    successFn();
    
	}).catch(function(error) {
    
    failFn();
    
		// There was an error
		console.warn('Something went wrong.', error);
    
	});
  
};