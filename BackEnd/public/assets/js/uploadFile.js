let files = [],
    form = document.querySelector('form'),
    container = document.querySelector('.container_image'),
    text = document.querySelector('.inner'),
    browses = document.querySelector('.select'),
    inputs = document.querySelector('.form_input input');
    // alert('vào đây chưa vậy');
browses.addEventListener('click', () => inputs.click());
inputs.addEventListener('change', () => {
    // alert('vào đây chưa vậy');
    console.log(1);
    let file = inputs.files;
    for (let i = 0; i < file.length; i++) {
        if (files.every(e => e.name !== file[i].name)) {
            files.push(file[i]);
        }
    }
    form.reset();
    showImages();
})
const showImages = () => {
    let images = '';
    console.log(1);
    files.forEach((e, i) => {
        console.log(e);
        images += `
        <img style="width:90px; height:90px" src=" ${URL.createObjectURL(e)}" alt="image">
        <span onclick="delImage(${i})">&times;</span>`
    })
    container.innerHTML = images;
}

const delImage = index => {
    files.splice(index, 1)
    showImages()
}

function changeImage(element) {
    var main_prodcut_image = document.getElementById('main_product_image');
    main_prodcut_image.src = element.src;
}
