
/*
  Helper functions
*/
function addClass (elementId, className) {
    var element = document.getElementById(elementId);
    element.classList.add(className);
}

function removeClass (elementId, className) {
  var element = document.getElementById(elementId);
  element.classList.remove(className);
}

function replaceElement (elementId, contents) {
	var element = document.getElementById(elementId);

	var newEl = document.createElement(element.tagName);
	newEl.innerHTML = contents;
  newEl.setAttribute("id", elementId);

	element.parentNode.replaceChild(newEl, element);
}

function request (url, data, method, onSuccess) {
	var request = new XMLHttpRequest();
  request.onload = function (e) {
    if (request.readyState === 4) {
      if (request.status === 200) {
        onSuccess(request.responseText)
      } else {

      }
    }
  };
	request.open(method, url, true);
	request.send(data);
}

function sendFormReplace (formId, elementId) {
	var formElement = document.getElementById(formId);
	var data = new FormData(formElement);
	request(formElement.getAttribute('action'), data, formElement.getAttribute('method'), function(response){
    replaceElement(elementId,response);
  })
}
