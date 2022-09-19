import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

window.addEventListener('DOMContentLoaded',()=>{
    ClassicEditor
        .create(document.querySelector('#content'))
        .catch(error => {
            console.error(error);
        });
})

