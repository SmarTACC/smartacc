/* general */
/* global google */
/* global $ */

var map;
var marker;
var markers = [];
var infowindow;
var markerToClose;

var categories = [];
var categoriesArray;
var tags = [];
var tagsArray;
var ingredients = [];
var ingredientsArray;


/* places */

function decodeEntities(encodedString) {
  var textArea = document.createElement('textarea');
  textArea.innerHTML = encodedString;
  return textArea.value;
}

function setLocation(places) {
  var place;
  places = $.parseJSON(decodeEntities(places));
  for (var i = 0; i < places.length; i++) {
    place = places[i];
    var rating = '';
    for (var j = 1; j <= 5; j++) {
      rating += '<i id="star' + j + '" class="material-icons rating-star rating-star-maps" onmouseover="hoverStar(' + j + ')" onmouseout="outStar(' + j + ')" onclick="location.href=\'mapa/' + place.id + '/' + j + '\'">star_border</i>';
    }
    marker = [{
      position: {
        lat: place.lat,
        lon: place.lon
      },
      rating: place.rating,
      category: place.category_id,
      content: "Nombre: " + place.name + "<br>Dirección: " + place.address + "<br>Descripción: " + place.description //+ "<br>Puntuación: " + place.rating
    }]
    markers.push(marker);
    if (i + 1 == places.length) {
      initialize();
    }
  }
}

function initialize() {
  var myLatlng = new google.maps.LatLng(-34.5573429, -58.4594648);
  var options = {
    zoom: 14,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById('canvas-map'), options);

  var height = $(document).height() - 134;
  $('#canvas-map').css('height', height + 'px');

  for (var i = 0, j = markers.length; i < j; i++) {
    var content = markers[i][0].content;
    var lat = markers[i][0].position.lat;
    var lon = markers[i][0].position.lon;
    var category = markers[i][0].category;
    var rating = markers[i][0].rating;

    var image = {
      url: 'img/categories/' + category + '.png',
      scaledSize: new google.maps.Size(38, 38),
    };

    marker = new google.maps.Marker({
      position: new google.maps.LatLng(lat, lon),
      map: map,
      icon: image
    });

    marker.infowindow = new google.maps.InfoWindow({
      content: content
    });

    (function(marker, content) {
      google.maps.event.addListener(marker, 'click', function() {
        if (markerToClose != undefined)
          markerToClose.infowindow.close();
        markerToClose = marker;
        marker.infowindow.open(map, marker);
        hoverStar(5);
      });
    })
    (marker, content);
  }
}

function initializeSelect(selectedCategories) {
  selectedCategories = $.parseJSON(decodeEntities(selectedCategories)).map(String);
  $(document).ready(function() {
    $('select').material_select();
    $('.categories-container > .select-wrapper > input').val('Filtrar por categorías');

    for (var i = 0; i < $('#categories-array').val(); i++) {
      categories.push(selectedCategories[i]);
    }

    $('.multiple-select-dropdown li span').on('click', function() {
      var categoryId = $('#place-' + $(this).text()).val();
      if (categoryId != undefined) {
        if ($.inArray(categoryId, categories) !== -1) {// If the selected category already exists
          categories.splice($.inArray(categoryId, categories), 1);// Then remove the category
        }
        else {// If the selected category doesn't exists
          categories.push(categoryId);// Then push the cateogry
        }
      }
    });

    $('ul > li:last-child').click(function() {
      submitUploadPlaces();
    });
  });
}

function submitUploadPlaces() {
  $('#categories-array').val('');
  for (var i = 0; i < categories.length; i++) {
    if (i == 0) {
      categoriesArray = categories[i];
    }
    else {
      categoriesArray += ' ' + categories[i];
    }
  }
  $('#categories-array').val(categoriesArray);
  $('#categories-form').submit();
}


/* recipes */

function loadMultipleSelectSearch() {
  $(document).ready(function() {
    $('select').material_select();
    $('.multiple-select-dropdown li span').on('click', function() {
      var container = $(this).parent().parent().parent().parent().get(0).className;
      if (container.indexOf('tags-container') > -1) {
        var tagId = $('[id="tag-' + $(this).text() + '"]').val();
        if (tagId != undefined) {
          if ($.inArray(tagId, tags) !== -1) {
            tags.splice($.inArray(tagId, tags), 1);
          }
          else {
            tags.push(tagId);
          }
        }
        console.log(tags);
      }
      else {
        var ingredientId = $('[id="ingredient-' + $(this).text() + '"]').val();
        if (ingredientId != 0) {
          if ($.inArray(ingredientId, ingredients) !== -1) {
            ingredients.splice($.inArray(ingredientId, ingredients), 1);
          }
          else {
            ingredients.push(ingredientId);
          }
        }
        console.log(ingredients);
      }
    });
  });
}

function submitUploadRecipes() {
  $('#tags-array').val('');
  $('#ingredients-array').val('');

  for (var i = 0; i < tags.length; i++) {
    if (i == 0) {
      tagsArray = tags[i];
    }
    else {
      tagsArray += ' ' + tags[i];
    }
  }

  for (var i = 0; i < ingredients.length; i++) {
    if (i == 0) {
      ingredientsArray = ingredients[i];
    }
    else {
      ingredientsArray += ' ' + ingredients[i];
    }
  }

  $('#tags-array').val(tagsArray);
  $('#ingredients-array').val(ingredientsArray);
  $('#search-recipe-form').submit();
}


/* rating */

function changeStarAspect(starNumber) {
  $("#star" + starNumber).empty();
  $("#star" + starNumber).append("star");
  if (starNumber != 1)
    changeStarAspect(starNumber - 1);
}

function outStar(starNumber) {
  starMessage('')
  $("#star" + starNumber).empty();
  $("#star" + starNumber).append("star_border");
  if (starNumber != 1)
    outStar(starNumber - 1);
}

function hoverStar(starNumber) {
  outStar(5);
  switch (parseInt(starNumber)) {
    case 1:
      starMessage('La receta no me gustó para nada');
      break;
    case 2:
      starMessage('La receta no me gustó');
      break;
    case 3:
      starMessage('La receta está OK');
      break;
    case 4:
      starMessage('La receta me gustó');
      break;
    case 5:
      starMessage('La receta me encantó');
      break;
  }
  changeStarAspect(starNumber);
}

function starMessage(message) {
  $('#starMessage')
    .empty()
    .append(message + '<br><br>');
}