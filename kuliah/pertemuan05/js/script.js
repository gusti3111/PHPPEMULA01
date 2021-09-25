const tombolCari = document.querySelector('.tombol-cari');
const keyword = document.querySelector('.keyword');
const container = document.querySelector('.container');


// // event 
keyword.addEventListener('keyup', function () {
  //   // ajax
  //   //xmlhttp request
  //   const xhr = new XMLHttpRequest();
  //   xhr.onreadystatechange = function () {
  //     if (xhr.readyState == 4 && xhr.status == 200) {
  //       container.innerHTML = xhr.responseText;
  //     }
  //   };
  //   xhr.open('get', 'ajax/ajax_cari.php?keyword=' + keyword.value);
  //   xhr.send();

  // fetch
  fetch('ajax/ajax_cari.php?keyword=' + keyword.value)
    .then((response) => response.text())
    .then((response) => (container.innerHTML = response));
});

// preview image
function previewImage() {
  const gambar = document.querySelector('.gambar');
  const imgpreview = document.querySelector('.img-preview');
  const oFReader = new FileReader();
  oFReader.readAsDataURL(gambar.files[0]);

  oFReader.onload = function (oFREvent) {
    imgpreview.src = oFREvent.target.result;
  };
}
