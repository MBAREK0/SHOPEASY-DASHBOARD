import './bootstrap';
document.getElementById('image_path_input').addEventListener('change', function() {
    console.log('helo');
    var fileName = this.files[0].name;
    document.querySelector('.custom-file-label').textContent = fileName;
});
