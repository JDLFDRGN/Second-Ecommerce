let container = document.querySelector('.container');
let addProductForm = document.querySelector('#add-product-form');
let addFileImage = document.querySelector('#add-file-image');
let addImagePreview = document.querySelector('.add-image-preview');
let navigationLogin = document.querySelector('#navigation-login');
let navigationSignup = document.querySelector('#navigation-signup');
let adminProductContainer = document.querySelectorAll('.admin-product-container');
let addSubmitButton = document.querySelector('.add-submit-button');
let addCancelButton = document.querySelector('.add-cancel-button');
let editButton = document.querySelector('.edit-button');
let deleteButton = document.querySelector('.delete-button');
let productID = document.querySelector('#product-id');
let homeBuy = document.querySelector('.home-buy');
let homeProductContainer = document.querySelectorAll('.home-product-container');
let homeBuyImage = document.querySelector('.home-buy-image');
let homeBuyDescription = document.querySelector('.home-buy-description');
let substituteLogin = document.querySelector('#substitute-login');
let selectedProduct = document.querySelector('#selected-product');

function navigate(link){location.href = link;};
function showAddForm(mode){
    addProductForm.style.left = '50%';
    container.style.filter='blur(8px)';
    
    if(mode == 'mode1'){
        editButton.classList.add('hide-button');
        deleteButton.classList.add('hide-button');
        addSubmitButton.classList.remove('hide-button');
        productID.value = null;
    }else{
        addSubmitButton.classList.add('hide-button');
        editButton.classList.remove('hide-button');
        deleteButton.classList.remove('hide-button');
    }
}   
function hideAddForm(){
    addProductForm.style.left = '-50%';
    container.style.filter = 'none';
}
function showBuyForm(){
    homeBuy.style.transform = 'translate(-50%, -50%) scale(1,1)';
}
function hideBuyForm(){
    homeBuy.style.transform = 'translate(-50%, -50%) scale(0,0)';
}
function showPassword(e){
    let signupPassword = document.querySelector('#signup-password');
    let signupReenterPassword = document.querySelector('#signup-reenter-password');
    if(e.checked){
        signupPassword.type = 'text';
        signupReenterPassword.type = 'text';
    }else{
        signupPassword.type = 'password';
        signupReenterPassword.type = 'password';
    }
}

addEventListener('load',()=>{
    if(location.href.includes("index.php") && navigationLogin != null && navigationSignup != null){
        navigationLogin.addEventListener('click', ()=>{navigate('login.php');});
        substituteLogin.addEventListener('click',()=>{navigate('login.php')});
        navigationSignup.addEventListener('click', ()=>{navigate('signup.php');});
    }else if(location.href.includes("admin.php")){
        addFileImage.addEventListener('change',()=>{
            let file = new FileReader();
            file.addEventListener('load',()=>{
                addImagePreview.src=`${file.result}`;
            })
            file.readAsDataURL(addFileImage.files[0]);
        });
    }
});

adminProductContainer.forEach((e)=>{
    e.addEventListener('click',()=>{
        showAddForm('mode2');
        productID.value = e.id;
    });
})

homeProductContainer.forEach(e=>{
    e.addEventListener('click',()=>{
        showBuyForm();
        let tempImg = e.querySelector('img');
        let tempDescription = e.querySelector('pre');
        sessionStorage.setItem('selected-product',e.id);
        selectedProduct.value = sessionStorage.getItem('selected-product');
        homeBuyImage.src = tempImg.src;
        homeBuyDescription.innerHTML = tempDescription.innerHTML;
    });
});