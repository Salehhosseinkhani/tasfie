let arrayProductTasfieFilter = [
  {id:1 , src:"./image/ecolife.jpg" ,name:"فیلتر", description: "تصفیه آب اکولایف مدل اکوپلاس EcoLife",price:"10,900,000",sellprice:"9,900,000"},
  {id:2 , src:"./image/tkoman.jpg" ,name:"فیلتر", description: "24-2023 Tecomen دستگاه تصفیه آب خانگی تکومن مدل",price:"950,000",sellprice:"870,000"},
  {id:3 , src:"./image/primiom.jpg" ,name:"فیلتر", description: "تصفیه آب اکولایف مدل پریمیوم",price:"11,900,000",sellprice:"10,900,000"},
  {id:4 , src:"./image/akonomi.jpg" ,name:"فیلتر", description: "تصفیه آب اکولایف مدل اکونومی",price:"9,500,000",sellprice:"8,500,000"},
]

let divBoxProduct = document.querySelector (".box-product-all")

arrayProductTasfieFilter.forEach(function(event){
  
    let DivProduct = document.createElement("div")
    DivProduct.className = "box-product-one"
  
    divBoxProduct.append(DivProduct)
  
    let linkBoxImage = document.createElement("a")
    linkBoxImage.className = "link-box-image"
  
    DivProduct.append(linkBoxImage)
  
    let imageBoxImage = document.createElement("img")
    imageBoxImage.className = "image-box-product"
    imageBoxImage.src = event.src
  
    linkBoxImage.appendChild(imageBoxImage)
  
    let paragrafProduct = document.createElement("p")
    paragrafProduct.className = "paragraf-box-product"
    paragrafProduct.innerHTML = event.name
  
    DivProduct.append(paragrafProduct)  
  
    let linkNameBox = document.createElement("a")
    linkNameBox.className = "link-name-box"
  
    DivProduct.append(linkNameBox)
  
  
    let nameBoxProduct = document.createElement("h3")
    nameBoxProduct.className = "name-box-product"
    nameBoxProduct.innerHTML = event.description
  
    linkNameBox.append(nameBoxProduct)
    
    let linkBtnProduct = document.createElement("div")
    linkBtnProduct.className = "link-btn-box-product"
  
    DivProduct.append(linkBtnProduct)
  
  
    let btnProduct = document.createElement("button")
    btnProduct.className = "btn-box-product"
    btnProduct.innerHTML = "توضیحات بیشتر"
  
    linkBtnProduct.append(btnProduct)
  
  
    let divPriceBox = document.createElement("div")
    divPriceBox.className = "div-price-box"
  
    DivProduct.append(divPriceBox)
  
    let spanPrice = document.createElement("span")
    spanPrice.className = "span-price"
    spanPrice.innerHTML = event.price
  
    divPriceBox.append(spanPrice)
    // divPriceBox.append(spanPrice , strongPrice)
  
    let titlePrice = document.createElement("span")
    titlePrice.className = "title-price"
    titlePrice.innerHTML = "تومان"
  
    spanPrice.appendChild(titlePrice)
  
    let strongPrice = document.createElement("strong")
    strongPrice.className = "sell-price"
    strongPrice.innerHTML = event.sellprice
  
    divPriceBox.append(strongPrice)
  
    let titleEllPrice = document.createElement("span")
    titleEllPrice.className = "title-price"
    titleEllPrice.innerHTML = "تومان"
  
    strongPrice.appendChild(titleEllPrice)
  
  
  })