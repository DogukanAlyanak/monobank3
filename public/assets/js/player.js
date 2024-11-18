
$(document).ready(function () {
  createPlayerUuid()
})

$(document).on(`click`, `.change-player-name`, function() {
    $(`#authPlayerModal`).modal(`show`);
})


function createPlayerUuid() {
  let player_uuid = getLocalStorageItem('player_uuid');
  let player_name = getLocalStorageItem('player_name');
  player_name == "undefined" ? player_name = "" : null;

  $.ajax({
    url: document.querySelector('#playerRouteUUID').value,
    data: {
      player_uuid: player_uuid,
      player_name: player_name,
    },
    type: 'POST',
    success: function (response) {
      setLocalStorageItem('player_uuid', response.data.uuid);

      if (player_name.length < 1) {
        $(`#authPlayerModal`).modal('show');

    }
    $(`.player-name`).html(player_name);
    $(`#authPlayerNameInput`).val(player_name);
    },
    error: function (xhr) {
      console.log('Error:', xhr);
      setTimeout(() => {
        createPlayerUuid();
      }, 200);
    }
  });
}

document.getElementById('saveAuthPlayer').addEventListener('submit', function (event) {
  event.preventDefault(); // Formun sayfayı yenilemesini önler

  let player_uuid = getLocalStorageItem('player_uuid');
  let player_name = document.getElementById('authPlayerNameInput').value;

  $.ajax({
    url: document.querySelector('#playerRouteName').value,
    type: 'POST',
    data: {
      player_uuid: player_uuid,
      player_name: player_name,
    },
    success: function (response) {
      setLocalStorageItem('player_name', player_name);
      $(`#authPlayerModal`).modal('hide');
      $(`.player-name`).html(player_name);
      $(`#authPlayerNameInput`).val(player_name);
    },
    error: function (xhr) {
      console.log('Error:', xhr);
    }
  });
});



// functions
function isLocalStorageAvailable() {
  try {
    let test = '__storage_test__';
    localStorage.setItem(test, test);
    localStorage.removeItem(test);
    return true;
  } catch (e) {
    return false;
  }
}

function getLocalStorageItem(key) {
  if (isLocalStorageAvailable()) {
    return localStorage.getItem(key);
  } else {
    return sessionStorage.getItem(key); // Alternatif olarak sessionStorage kullanıyoruz
  }
}

function setLocalStorageItem(key, value) {
  if (isLocalStorageAvailable()) {
    localStorage.setItem(key, value);
  } else {
    sessionStorage.setItem(key, value); // Alternatif olarak sessionStorage kullanıyoruz
  }
}
