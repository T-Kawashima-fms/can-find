window.onload = function() {
  var target = document.getElementById('form-add');
  var mark = document.getElementById('-star-');
  var help = document.getElementById('helpmenu');

  document.getElementById('img-a').addEventListener("click", function(event) {
    var clickX = event.pageX;
    var clickY = event.pageY;

    var clientRect = this.getBoundingClientRect();
    var positionX = clientRect.left + window.pageXOffset;
    var positionY = clientRect.top + window.pageYOffset;

    var x = clickX - positionX;
    var y = clickY - positionY;

    document.addForm.selectArea1.selectedIndex = 1;
    document.getElementById('item-x').value = x;
    document.getElementById('item-y').value = y;

    target.style.left = clickX + 'px';
    target.style.top = clickY + 'px';
    target.style.visibility = 'visible';
    mark.style.left = clickX - 7 + 'px';
    mark.style.top = clickY - 30 + 'px';
    mark.style.visibility = 'visible';
  });

  document.getElementById('img-b').addEventListener("click", function(event) {
    var clickX = event.pageX;
    var clickY = event.pageY;

    var clientRect = this.getBoundingClientRect();
    var positionX = clientRect.left + window.pageXOffset;
    var positionY = clientRect.top + window.pageYOffset;

    var x = clickX - positionX;
    var y = clickY - positionY;

    document.addForm.selectArea1.selectedIndex = 2;
    document.getElementById('item-x').value = x;
    document.getElementById('item-y').value = y;

    target.style.left = clickX + 'px';
    target.style.top = clickY + 'px';
    target.style.visibility = 'visible';
    mark.style.left = clickX - 7 + 'px';
    mark.style.top = clickY - 30 + 'px';
    mark.style.visibility = 'visible';
  });

  document.getElementById('img-c').addEventListener("click", function(event) {
    var clickX = event.pageX;
    var clickY = event.pageY;

    var clientRect = this.getBoundingClientRect();
    var positionX = clientRect.left + window.pageXOffset;
    var positionY = clientRect.top + window.pageYOffset;

    var x = clickX - positionX;
    var y = clickY - positionY;

    document.addForm.selectArea1.selectedIndex = 3;
    document.getElementById('item-x').value = x;
    document.getElementById('item-y').value = y;

    target.style.left = clickX + 'px';
    target.style.top = clickY + 'px';
    target.style.visibility = 'visible';
    mark.style.left = clickX - 7 + 'px';
    mark.style.top = clickY - 30 + 'px';
    mark.style.visibility = 'visible';
  });

  document.getElementById('img-d').addEventListener("click", function(event) {
    var clickX = event.pageX;
    var clickY = event.pageY;

    var clientRect = this.getBoundingClientRect();
    var positionX = clientRect.left + window.pageXOffset;
    var positionY = clientRect.top + window.pageYOffset;

    var x = clickX - positionX;
    var y = clickY - positionY;

    document.addForm.selectArea1.selectedIndex = 4;
    document.getElementById('item-x').value = x;
    document.getElementById('item-y').value = y;

    target.style.left = clickX + 'px';
    target.style.top = clickY + 'px';
    target.style.visibility = 'visible';
    mark.style.left = clickX - 7 + 'px';
    mark.style.top = clickY - 30 + 'px';
    mark.style.visibility = 'visible';
  });

  document.getElementById('img-e').addEventListener("click", function(event) {
    var clickX = event.pageX;
    var clickY = event.pageY;

    var clientRect = this.getBoundingClientRect();
    var positionX = clientRect.left + window.pageXOffset;
    var positionY = clientRect.top + window.pageYOffset;

    var x = clickX - positionX;
    var y = clickY - positionY;

    document.addForm.selectArea1.selectedIndex = 5;
    document.getElementById('item-x').value = x;
    document.getElementById('item-y').value = y;

    target.style.left = clickX + 'px';
    target.style.top = clickY + 'px';
    target.style.visibility = 'visible';
    mark.style.left = clickX - 7 + 'px';
    mark.style.top = clickY - 30 + 'px';
    mark.style.visibility = 'visible';
  });

  document.getElementById('img-f').addEventListener("click", function(event) {
    var clickX = event.pageX;
    var clickY = event.pageY;

    var clientRect = this.getBoundingClientRect();
    var positionX = clientRect.left + window.pageXOffset;
    var positionY = clientRect.top + window.pageYOffset;

    var x = clickX - positionX;
    var y = clickY - positionY;

    document.addForm.selectArea1.selectedIndex = 6;
    document.getElementById('item-x').value = x;
    document.getElementById('item-y').value = y;

    target.style.left = clickX + 'px';
    target.style.top = clickY + 'px';
    target.style.visibility = 'visible';
    mark.style.left = clickX - 7 + 'px';
    mark.style.top = clickY - 30 + 'px';
    mark.style.visibility = 'visible';
  });

  document.getElementById('img-g').addEventListener("click", function(event) {
    var clickX = event.pageX;
    var clickY = event.pageY;

    var clientRect = this.getBoundingClientRect();
    var positionX = clientRect.left + window.pageXOffset;
    var positionY = clientRect.top + window.pageYOffset;

    var x = clickX - positionX;
    var y = clickY - positionY;

    document.addForm.selectArea1.selectedIndex = 7;
    document.getElementById('item-x').value = x;
    document.getElementById('item-y').value = y;

    target.style.left = clickX + 'px';
    target.style.top = clickY + 'px';
    target.style.visibility = 'visible';
    mark.style.left = clickX - 7 + 'px';
    mark.style.top = clickY - 30 + 'px';
    mark.style.visibility = 'visible';
  });

  document.getElementById("form_cancel_button").addEventListener("click", function() {
    target.style.visibility = 'hidden';
    mark.style.visibility = 'hidden';
  });

  document.getElementById("helplink").addEventListener("click", function() {
    if(help.style.visibility=='hidden'){
      help.style.visibility = 'visible';
    }else{
      help.style.visibility = 'hidden';
    }
  });
}
