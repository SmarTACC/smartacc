/* general */
/* global $ */

var totalIngredients = 0;
window.onmousedown = function(e) {
  var el = e.target;
  if (el.tagName.toLowerCase() == 'option' && el.parentNode.hasAttribute('multiple')) {
    e.preventDefault();

    if (el.hasAttribute('selected')) el.removeAttribute('selected');
    else el.setAttribute('selected', '');

    var select = el.parentNode.cloneNode(true);
    el.parentNode.parentNode.replaceChild(select, el.parentNode);
  }
}

function confirmAction() {
  return confirm('¿Estás seguro que querés eliminarlo de forma permanente?');
}

/* places */

function initMapShow(name, address, description, category, lat, lng) {
  var myLatLng = {
    lat: parseFloat(lat),
    lng: parseFloat(lng)
  };

  var content = "Nombre: " + name + "<br>Dirección: " + address + "<br>Descripción: " + description + " ";

  var map = new google.maps.Map(document.getElementById('map'), {
    center: myLatLng,
    zoom: 11
  });

  var image = {
    url: '../../img/categories/' + category + '.png',
    scaledSize: new google.maps.Size(38, 38),
  };

  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    icon: image
  });

  marker.infowindow = new google.maps.InfoWindow({
    content: content
  });

  (function(marker, content) {
    google.maps.event.addListener(marker, 'click', function() {
      marker.infowindow.open(map, marker);
    });
  })
  (marker, content);
}

function setLocationShow() {
  $('#map').removeClass('no-display');
  $('#create-save-button').removeClass('no-display');
  var address = $('#address').val();
  var geocoder = new google.maps.Geocoder();
  geocoder.geocode({
    'address': address
  }, geocodeResult);
}

function geocodeResult(results, status) {
  if (status == 'OK') {
    var mapOptions = {
      center: results[0].geometry.location,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var myCoordsLenght = 6;
    map = new google.maps.Map($("#map").get(0), mapOptions);
    map.fitBounds(results[0].geometry.viewport);
    var markerOptions = {
      position: results[0].geometry.location,
      draggable: true
    }
    var marker = new google.maps.Marker(markerOptions);
    var lat = results[0].geometry.location.lat();
    var lng = results[0].geometry.location.lng();
    writeLocation(lat, lng);
    marker.setMap(map);
    google.maps.event.addListener(marker, 'dragend', function(evt) {
      writeLocation(evt.latLng.lat().toFixed(myCoordsLenght), evt.latLng.lng().toFixed(myCoordsLenght));
    });
  }
  else {
    alert("No se encontró el lugar indicado, intentá cambiar la dirección.");
    $('#map').addClass('no-display');
  }
}

function setLocationEdit(lat, lng) {
  lat = parseFloat(lat);
  lng = parseFloat(lng);
  var myLatLng = {
    lat: lat,
    lng: lng
  };
  var map = new google.maps.Map($("#map").get(0), {
    center: myLatLng,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    zoom: 11
  });
  var myCoordsLenght = 6;
  var markerOptions = {
    position: myLatLng,
    draggable: true
  }
  var marker = new google.maps.Marker(markerOptions);
  writeLocation(lat, lng);
  marker.setMap(map);
  google.maps.event.addListener(marker, 'dragend', function(evt) {
    writeLocation(evt.latLng.lat().toFixed(myCoordsLenght), evt.latLng.lng().toFixed(myCoordsLenght));
  });
}

function writeLocation(lat, lng) {
  $('#lat').val(lat);
  $('#lon').val(lng);
}


/* recipes */

function addIngredient() {
  var amount = $('#amount').val();
  var ingredientId = $('#ingredientTokenize').val();
  var ingredientName = $('.ingredient-tokenize > .TokensContainer > .Token > span').html();
  var unitId = $('#unitTokenize').val().toString().split(",");
  unitId = unitId[0];
  var unitName = $('.unit-tokenize > .TokensContainer > .Token > span').html();

  if (amount != '' && ingredientId != '' && unitId != '') {
    $('#amount-col > .ingredients-text').append('<p id="amount_' + totalIngredients + '">' + amount + '</p>');
    $('#ingredient-col > .ingredients-text').append('<p id="ingredient_' + totalIngredients + '">' + ingredientName + '</p>');
    $('#unit-col > .ingredients-text').append('<p id="unit_' + totalIngredients + '">' + unitName + '</p>');
    $('#action-col > .ingredients-text').append('<p id="button_' + totalIngredients + '" class="ingredient-button"><a class="btn red" onclick="deleteIngredient(' + totalIngredients + ')">Eliminar</a></p>');

    $('#amount').val('');
    $('#ingredientTokenize').tokenize().clear();
    $('#unitTokenize').tokenize().clear();
    addValue(amount, ingredientId, unitId);
  }
}

function addValue(amount, ingredientId, unitId) {
  $('#total_values').attr('value', totalIngredients + 1);
  $('.values').append('<input name="values_' + totalIngredients + '" id="values_' + totalIngredients + '" value="' + amount + '-|-' + ingredientId + '-|-' + unitId + '">');
  totalIngredients++;
}

function deleteIngredient(ingredientNumber) {
  $('#amount_' + ingredientNumber).remove();
  $('#ingredient_' + ingredientNumber).remove();
  $('#unit_' + ingredientNumber).remove();
  $('#button_' + ingredientNumber).remove();
  $('#values_' + ingredientNumber).remove();
}

$(document).ready(function() {
  $('.TokenSearch > input').on('keydown', function(event) {
    if (this.selectionStart == 0 && event.keyCode >= 65 && event.keyCode <= 90 && !(event.shiftKey) && !(event.ctrlKey) && !(event.metaKey) && !(event.altKey)) {
     var $t = $(this);
     event.preventDefault();
     var char = String.fromCharCode(event.keyCode);
     $t.val(char + $t.val().slice(this.selectionEnd));
     this.setSelectionRange(1,1);
    }
  });
});