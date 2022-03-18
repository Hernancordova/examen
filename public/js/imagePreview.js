// CODE SNIPPETS

let fileInput,
  fileImage = document.querySelector('#file_image'),
  letterUpload = document.querySelector('#letter-upload');

if(fileInput = document.querySelector('#file_input')) {
  fileInput.addEventListener('change', function (e) {
    const file = e.target.files[0]
    const reader = new FileReader(file)
    reader.onload = (e) => fileImage.src = reader.result
    reader.readAsDataURL(file)
    letterUpload.style.opacity = '0'
  })
}


