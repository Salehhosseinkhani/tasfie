// let arrayProductTasfie = [
//   {id:1 , src:"./image/ecolife.jpg" ,name:"دستگاه اکولایف مدل اکوپلاس", description: "تصفیه آب اکولایف مدل اکوپلاس EcoLife",price:"10,900,000",sellprice:"9,900,000"},
//   {id:2 , src:"./image/tkoman.jpg" ,name:"تصفیه آب تکومن 2023-24", description: "24-2023 Tecomen دستگاه تصفیه آب خانگی تکومن مدل",price:"950,000",sellprice:"870,000"},
//   {id:3 , src:"./image/primiom.jpg" ,name:"تصفیه آب اکولایف", description: "تصفیه آب اکولایف مدل پریمیوم",price:"11,900,000",sellprice:"10,900,000"},
//   {id:4 , src:"./image/akonomi.jpg" ,name:"تصفیه آب اکولایف", description: "تصفیه آب اکولایف مدل اکونومی",price:"9,500,000",sellprice:"8,500,000"},
// ]

// document.addEventListener("DOMContentLoaded", function () {

//   let arrayProductTasfie = [];

//   fetch('/api/products')
//       .then(response => response.json()) 
//       .then(data => {
//           data.forEach(product => {
//             arrayProductTasfie.push({
//                   src: product.src,
//                   price: product.price,
//                   name: product.name,
//                   description: product.description,
//                   sellprice: product.sellprice
//               });
//           });

//           console.log(arrayProductTasfie);
//       })
//       .catch(error => console.error('Error fetching products:', error));
// });






// let divBoxProduct = document.querySelector (".box-product-all")

// arrayProductTasfie.forEach(function(event){

//   let DivProduct = document.createElement("div")
//   DivProduct.className = "box-product-one"

//   divBoxProduct.append(DivProduct)

//   let linkBoxImage = document.createElement("a")
//   linkBoxImage.className = "link-box-image"

//   DivProduct.append(linkBoxImage)

//   let imageBoxImage = document.createElement("img")
//   imageBoxImage.className = "image-box-product"
//   imageBoxImage.src = event.src

//   linkBoxImage.appendChild(imageBoxImage)

//   let paragrafProduct = document.createElement("p")
//   paragrafProduct.className = "paragraf-box-product"
//   paragrafProduct.innerHTML = event.name

//   DivProduct.append(paragrafProduct)  

//   let linkNameBox = document.createElement("a")
//   linkNameBox.className = "link-name-box"

//   DivProduct.append(linkNameBox)


//   let nameBoxProduct = document.createElement("h3")
//   nameBoxProduct.className = "name-box-product"
//   nameBoxProduct.innerHTML = event.description

//   linkNameBox.append(nameBoxProduct)
  
//   let linkBtnProduct = document.createElement("div")
//   linkBtnProduct.className = "link-btn-box-product"

//   DivProduct.append(linkBtnProduct)


//   let btnProduct = document.createElement("button")
//   btnProduct.className = "btn-box-product"
//   btnProduct.innerHTML = "توضیحات بیشتر"

//   linkBtnProduct.append(btnProduct)


//   let divPriceBox = document.createElement("div")
//   divPriceBox.className = "div-price-box"

//   DivProduct.append(divPriceBox)

//   let spanPrice = document.createElement("span")
//   spanPrice.className = "span-price"
//   spanPrice.innerHTML = event.price

//   divPriceBox.append(spanPrice)

//   let titlePrice = document.createElement("span")
//   titlePrice.className = "title-price"
//   titlePrice.innerHTML = "تومان"

//   spanPrice.appendChild(titlePrice)

//   let strongPrice = document.createElement("strong")
//   strongPrice.className = "sell-price"
//   strongPrice.innerHTML = event.sellprice

//   divPriceBox.append(strongPrice)

//   let titleEllPrice = document.createElement("span")
//   titleEllPrice.className = "title-price"
//   titleEllPrice.innerHTML = "تومان"

//   strongPrice.appendChild(titleEllPrice)


// })




// لیست تصاویر پس‌زمینه
let backgrounds = [
    'url("./image/bgiwater.png")',
    'url("./image/bgiwater2.png")',
    'url("./image/5.png")',
    'url("./image/6.png")'
];

let current = 0;

function changeBackground() {
    let slider = document.querySelector('.background-slider');
    slider.style.backgroundImage = backgrounds[current];
    current = (current + 1) % backgrounds.length; // چرخش بین تصاویر
}

// هر ۲ ثانیه پس‌زمینه تغییر می‌کند
setInterval(changeBackground, 2000);

// تنظیم پس‌زمینه اولیه
changeBackground();


window.onscroll = function() {myFunction()};

var menu = document.querySelector(".div-head");
var sticky = menu.offsetTop;

function myFunction() {
  if (window.scrollY > sticky || document.documentElement.scrollTop > sticky) {
    menu.classList.add("fixed-head");
  } else {
    menu.classList.remove("fixed-head");
  }
}

// ////////backgroun////////////////


// آرایه برای نگه‌داری لینک‌های عکس‌ها
// let backgrounds = [];

// لیسنر برای آپلود عکس
document.getElementById('backgroundImageInput').addEventListener('change', function(event) {
    const file = event.target.files[0];

    if (file) {
        const formData = new FormData();
        formData.append('image', file);

        // ارسال درخواست AJAX به سرور لاراول
        saveBackgroundImage(formData);
    }
});

// تابع برای ارسال درخواست به سرور لاراول
function saveBackgroundImage(formData) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); // دریافت توکن CSRF

    fetch('/save-background', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        // بررسی اینکه آیا imageUrl موجود است
        if (data.imageUrl) {
            // اضافه کردن مسیر عکس به آرایه backgrounds
            backgrounds.push(data.imageUrl);
            console.log('Image uploaded successfully:', data.imageUrl);
        } else {
            console.error('Error: No image URL returned from the server');
        }
    })
    .catch(error => {
        console.error('Error saving image:', error);
    });
}

// لیسنر برای دکمه ذخیره پس‌زمینه
document.getElementById('saveBackgroundButton').addEventListener('click', function() {
    // بررسی اینکه آیا آرایه backgrounds خالی نیست
    if (backgrounds.length > 0) {
        // اینجا می‌توانید کدی اضافه کنید که تغییرات را به سرور بفرستید
        console.log('Current backgrounds array:', backgrounds);
        // اینجا می‌توانید کدی برای ذخیره آرایه backgrounds به سرور اضافه کنید
        // برای مثال ارسال به یک روت جدید:
        saveBackgroundsToServer(backgrounds);
    } else {
        alert('No backgrounds to save.');
    }
});

// تابع برای ارسال آرایه backgrounds به سرور
function saveBackgroundsToServer(backgrounds) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); // دریافت توکن CSRF

    fetch('/save-backgrounds', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ backgrounds })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log('Backgrounds saved successfully:', data);
    })
    .catch(error => {
        console.error('Error saving backgrounds:', error);
    });
}


// ///////////////////////////////////






const header = document.getElementById('main-header');
const headerIcon = document.getElementById('header-icon');
const sidePanel = document.getElementById('side-panel');
const closeBtn = document.getElementById('close-btn');

let isHeaderHidden = false;

window.addEventListener('scroll', () => {
  if (window.scrollY > 100 && !isHeaderHidden) {
    header.classList.add('hidden-header');
    headerIcon.classList.remove('hidden');
    isHeaderHidden = true;
  } else if (window.scrollY <= 100 && isHeaderHidden) {
    header.classList.remove('hidden-header');
    headerIcon.classList.add('hidden');
    isHeaderHidden = false;
  }
});

headerIcon.addEventListener('click', () => {
  sidePanel.classList.remove('hidden');
});

closeBtn.addEventListener('click', () => {
  sidePanel.classList.add('hidden');
});



const hoverElement = document.querySelector('.platform-hover-email');
const targetLink = document.querySelector('.link-platfom-email');

hoverElement.addEventListener('mouseover', () => {
    targetLink.style.display = 'block';
});

hoverElement.addEventListener('mouseout', () => {
    targetLink.style.display = 'none';
});

const hoverElementTelegram = document.querySelector('.platform-hover-telegram');
const targetLinkTelegram = document.querySelector('.link-platfom-telegram');

hoverElementTelegram.addEventListener('mouseover', () => {
    targetLinkTelegram.style.display = 'block';
});

hoverElementTelegram.addEventListener('mouseout', () => {
    targetLinkTelegram.style.display = 'none';
});
