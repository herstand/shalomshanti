var utilities = {
    toArray : function(nodeList) {
          return Array.prototype.slice.call(nodeList);
    },
    ajaxJson : function(url, callback, method, data) {
      var request = new XMLHttpRequest();
      request.onload = function(){
        if (request.status === 200) {
          callback(request.responseText);
        } else if (request.status === 401) {
          if (JSON.parse(request.responseText).message == "Too many login attempts.") {
            alert("Too many login attempts. Please contact wedding@shalomshanti.com to unlock your IP address. Or wait 5 minutes.");
          } else {
            alert("Sorry, that code does not correspond with a guest for our wedding. Please email wedding@shalomshanti.com if you are having trouble logging in.");
          }
        }
      };
      request.open(method, url, true);
      if (data) {
        request.setRequestHeader("Content-type", "application/json");
        request.send(data);
      } else {
        request.send();
      }
    },
    ajax : function(url, callback, method, data) {
      var request = new XMLHttpRequest();
      request.onload = function(){
        if (request.status === 200) {
          callback(request.responseText);
        }
      };
      request.open(method, url, true);
      request.setRequestHeader("SS_EDIT_TIMESTAMP", Date.now());
      if (data) {
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send(data);
      } else {
        request.send();
      }
    },
    getText : function(el) {
        if (el.innerText) {
            return el.innerText;
        } else {
            return el.textContent;
        }
    },
    setText : function(el, text) {
        if (el.innerText) {
            return el.innerText = text;
        } else {
            return el.textContent = text;
        }
    },
    deepEquals : function(obj1, obj2) {
        for (var key in obj1) {
            if (
                obj1.hasOwnProperty(key) &&
                (!obj1.hasOwnProperty(key) || obj1[key] !== obj2[key])
            ) {
                return false
            }
        }
        return true;
    },
    convertJsonToFormData : function(obj) {
        var formData = "";
        for (var key in obj) {
            formData += key + "=" + obj[key] + "&";
        }
        return formData.substring(0, formData.length - 1);
    },
    isAlphaNumeric : function (e) {
        return (
                e.which > 47 &&
                e.which < 58
            )
            ||
            (
                e.which > 64 &&
                e.which < 91 &&
                !e.metaKey &&
                !e.ctrlKey

            )
            ||
            (
                e.which > 95 &&
                e.which < 106
            );
    }
}