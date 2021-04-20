
const options = {
	name: "product-name",
	priceOne: "product-one-price",
	btnAdd: "card-add"
};

  const optionsCard = {
  name: "name-card",
  minus: "minus",
  plus: "plus",
  num: "inp_price",
  delete: "del-product",
  price: "price-per-piece",
  totalPrice: "total-price_one",
  PriceT: "total-cost",
  btnDel: "del-product"
 }

 const optionsOrder = {
    name: "name-card",
    minus: "minus",
    plus: "plus",
    num: "inp_price",
    delete: "del-product",
    price: "price-per-piece",
    totalPrice: "total-price_one",
    PriceT: "total-cost",
    btnDel: "del-product"
   }
const itemCard = "cartItems";
const itemsProd = "prodItems";

//! /////////////////////////////// Работа с карточкой товара
class CalcPrice {
	constructor(id, options, items) {
		this.options = options;
		this.id = id;
		this.block = document.querySelector('#' + this.id);
		if (this.options != undefined) {
			this.cardItem = items;
			this.name = this.block.querySelector('.' + this.options.name).textContent;
			this.price = this.block.querySelector('.' + this.options.priceOne);
			this.add = this.block.querySelector('.' + this.options.btnAdd);
			this.num = 1;
			this.listener();
		}
	}

	addStorage() {
		let data = [{
			name: this.name,
			nums: this.num,
			price: this.price.textContent.replace(/[^a-zA-Z0-9]/g, '')
		}];
		if (localStorage.getItem(this.cardItem) != undefined) {
			let card = JSON.parse(localStorage.getItem(this.cardItem));
			let p = 1;
			let out = card.map(e => {
				if (e.name == this.name) {
					p = 0;
					return {
						name: this.name,
						nums: e.nums + this.num,
						price: this.price.textContent.replace(/[^a-zA-Z0-9]/g, ''),
					}
				} else {
					return e;
				}
			});
			if (p == 1) out.push(data[0]);
			localStorage.setItem(this.cardItem, JSON.stringify(out));
		} else {
			localStorage.setItem(this.cardItem, JSON.stringify(data));
		}
	}
	listener() {
		this.add.addEventListener('click', () => {
            this.addStorage();
            new RenderCartItems(options, "dff", itemCard, itemsProd).renderOut();
            
		});
	}
}

//! //////////// Отрисовка карточек товара

class RenderProdCard {
	constructor(options, putToPlace, cartName, getName, cardsId) {
		this.options = options;
		this.cartName = cartName ? cartName : "cartItemsC"
		this.getName = getName ? getName : "listOfMyProdsC";
		this.cardsId = cardsId ? cardsId : "p-i-nuM";
		this.putToPlace = putToPlace;
		this.itemclass = "a-g-y8p";
	}

	getProd(url) {
		return new Promise((res, rej) => {
			let request = new XMLHttpRequest();
			request.open('GET', url);
			request.setRequestHeader('Content-type', 'aplication/json; charset=utf-8');
			request.addEventListener('readystatechange', () => {
				if (request.readyState === 4 && request.status === 200) {
					res(request.response);
				}
			})
			request.send();
		})
	}


	renderOut() {

		let card = JSON.parse(localStorage.getItem(this.getName));
		let out = '';
		let i = 1;

		card.forEach(e => {
			let id = this.cardsId + i;
			let name = e.name;
			let price = e.price;
			let img = e.image;
			let weight = e.weight;
			

			out += `<div id="${id}" class="col ${this.itemclass}">
				  <div class="card">
				  <a href="product/${e.id}">
					  <div class="card-body">
						  <div class="img-wrapper">
							  <!-- <div class="mask"></div> -->
							  <img class="img-fluid" src="/${img}" alt="">
						  </div>
						  <div class="weight">
							  <i class="icon icon-weight"></i>
							 ${weight} гр.
						  </div>
						  <h5 class="product-name">${name}</h5>
					  </div>
					  </a>
					  <div class="row card-footer">
						  <div class="col-auto price-value"> <span class="product-one-price">${price}</span><span> руб.</span></div>
						  <div class="col-auto cart card-add"">
							  <a href="javascript:void(0);">
								  <i class="icon icon-cart"></i>
							  </a>
						  </div>
					  </div>
				  </div>
			  </div>`
			i++;
		})

		if (document.querySelector('.' + this.putToPlace)) {
			document.querySelector('.' + this.putToPlace).innerHTML = out;
        }
       /*  if (document.querySelector('.img-wrapper')) {
			document.querySelector('.img-wrapper').addEventListener("click", (e) => {
                e.preventDefault();
                // localStorage.setItem("productId", JSON.stringify(this.cardsId)); 
                window.location.pathname = "/products";
                        
			})
		} */
	}


	classCalc() {

		let products = document.querySelectorAll('.' + this.itemclass);
		products.forEach((e) => new CalcPrice(e.id, this.options, this.cartName))
	}

	renders() {
		let url = 'items';
		this.getProd(url)
			.then((data) => {
				localStorage.setItem(this.getName, data)
			})
			.then(() => {
				this.renderOut()
			})
			.then(() => {
				this.classCalc()
			})
		// .then(() =>{new RenderCartItems(options2, "cart-block", itemCard, itemsProd).renders()})
		//.catch(()=>{alert("Не удалось отобразить товар!")});
	}
}

//! ////////////   Запуск отрисовки карточек

 if (document.querySelector('.product-items')) {
 	new RenderProdCard(options, "product-items", itemCard, itemsProd, "i-kw").renders();
 }



 class CartEdit {
	constructor(id, options, items, putToPlace){
		this.options = options;
		if (this.options != undefined) {
			this.putToPlace = putToPlace;
			this.id = id;
			this.cardItem = items;
			this.block = document.querySelector('#'+this.id);
			this.name = this.block.querySelector('.'+this.options.name).textContent;
			this.price = this.block.querySelector('.'+this.options.price);
			this.btnDel = this.block.querySelector('.' +this.options.btnDel);
			this.numBody = this.block.querySelector('.'+this.options.num);
            this.out = this.block.querySelector('.'+this.options.totalPrice);
            console.log(this.out);
			this.plusBody = this.block.querySelector('.'+this.options.plus);
			this.minusBody = this.block.querySelector('.'+this.options.minus);
            this.empty == false;
            this.basket_sum= document.querySelector('.total-price-cost');
            //this.order=document.querySelector('.order');
			this.num;
			this.start();
			this.listener();
			this.fullPrice = document.querySelector('.'+this.options.PriceT);
			//this.fullCounts = document.querySelector('.'+this.options.fullCounts);
			this.total();
		}
	}

	setNum(){
		let card = JSON.parse(localStorage.getItem(this.cardItem));
		card.forEach((e) => {if(e.name == this.name) this.num = e.nums})
	}

	checkInput(){
		return !isNaN(+this.numBody.value) && +this.numBody.value != 0 ? +this.numBody.value : 1
	}

	start() {
		this.setNum();
		this.numBody.value = this.num;
		this.out.innerHTML = this.calcPrice();
	}

	calcPrice() {
        let priceOne =this.price.textContent.replace(/[^a-zA-Z0-9]/g, '');
        console.log(priceOne);
        let znach=priceOne * this.checkInput()+'<span>руб</span>';
        console.log(znach);
		return (znach);
	}

	plus(){
		this.num++;
		this.numBody.value = this.num;
		this.out.innerHTML = this.calcPrice();
		this.addStorage();
		this.total();
	}

	minus(){
		if (this.num != 1) {
			this.num--;
			this.numBody.value = this.num;
			this.out.innerHTML = this.calcPrice();
			this.addStorage();
			this.total();
		}
		
	}

	input() {
		this.num = this.checkInput();
		this.numBody.value = this.num;
		this.out.innerHTML = this.calcPrice();
		this.addStorage();
		this.total();
	}

	
	
	addStorage(){
		if((localStorage.getItem(this.cardItem) != undefined) && (localStorage.getItem(this.cardItem) != null)){
			let card = JSON.parse(localStorage.getItem(this.cardItem));
			let out = card.map((e) => {
				if(e.name == this.name){
					return{
						name :this.name,
						nums :  this.num,
						price : this.price.textContent.replace(/[^a-zA-Z0-9]/g, ''),
					}
				}else{
					return e;
				}});
			localStorage.setItem(this.cardItem, JSON.stringify(out));	
		}else{
			if(localStorage.getItem(this.cardItem) == null) localStorage.removeItem(this.cardItem);
		}
	}

	total(){
		let cart = JSON.parse(localStorage.getItem(this.cardItem));
        let priceT = 0;
        if(cart!=null)
        {
          cart.forEach(e => {
			priceT += e.nums*e.price;
			
		})  
        }
        //this.fullCounts.innerHTML = num;
        console.log(1111111111111111);
    this.fullPrice.innerHTML = priceT+'<span>руб</span>';
    this.basket_sum.innerHTML=priceT+'<span>р</span>';
	
	}

	deleteCard(){
        let card = JSON.parse(localStorage.getItem(this.cardItem));
        let mass=[];
        card.forEach(e => {
          if(e.name!=this.name)
          {
            mass.push(e);
          }
        })
        console.log(mass);
        this.block.remove();
        if(mass.length==0)
      {
          localStorage.removeItem(this.cardItem); 
        this.total();
        new RenderCartItems(this.options, "dff", itemCard, itemsProd).renderOut();
       
      }else
      {
        localStorage.setItem(this.cardItem, JSON.stringify(mass));
        this.total();
      }   
      }

	listener(){
		this.plusBody.addEventListener('click', () => {	this.plus()});
		this.minusBody.addEventListener('click', () => { this.minus() });
		this.numBody.addEventListener('input', () => { this.input()	});
        this.btnDel.addEventListener('click', ()=>{ this.deleteCard() });
	}
}

 class RenderCartItems{
	constructor(options, putToPlace, cartName, getName){
		this.options = options;
		this.cartName = cartName ? cartName : "cartItemsC";
		this.getName = getName ? getName : "listOfMyProdsC";
		///this.cardsId = cardsId ? cardsId : "c-i-nuM";
		this.putToPlace = putToPlace;
		this.itemclass ="a-g-y8p";
		this.clearAll = options.clearAll;
	}
	/* clear(){
		localStorage.removeItem(this.cartName);
		document.querySelector("."+this.putToPlace).innerHTML =`<h1  class="title">Корзина</h1> Корзина пуста`;
	} */

	 renderOut() {
	 	let card = JSON.parse(localStorage.getItem(this.cartName));
	 	let out = '';
	 	if (card == null) {
	 		out += `<div class="cart-empty"><span class="cart-empty__title">Корзина пуста</span></div>`;
	 	} else {
	 		let prod = JSON.parse(localStorage.getItem(this.getName));
	 		let i = 1;
	 		card.forEach(e => {
             let img = prod.find(el => e.name === el.name).image;
	 			out += `<div class="cart-block-body-item" id="cardItem${i}">
                 <div class="container">
                     <div class="row">
                         <div class="col-md-4 space-between pr-0">
                             <picture><source srcset="img/card-img.webp" type="image/webp"><img class="img-fluid" src="${img}" alt=""></picture>
                         </div>
                         <div class="col-md-8">
                             <div class="row">
                                 <div class="col-sm-12 product-name">
                                     <h5 class="name-card">${e.name}</h5>
                                     <a class="del-product" href="#">
                                         <span>+</span>
                                     </a>
                                     <div class="weight">
                                     
                                         <i class="icon icon-weight"></i>
                                         250<span>гр</span>
                                     </div>
                                 </div>
                                 <div class="col-md-2">
                                     <a href="#"><span class="del-prod"></span></a>
                                 </div>
                             </div>
                             <div class="row price">
  
                                 <div class="col-4 col-md-3">
                                     <div class="price-per-piece">
                                         ${e.price}<span>руб</span>
                                     </div>
                                 </div>
  
                                 <div class="col-4 col-md-4">
                                     <div class="count_box">
                                         <div class="minus"><span>-</span></div>
                                         <input class="inp_price" type="text" value=" ${e.nums}" id="total-price">
                                         <div class="plus"><span>+</span></div>
                                     </div>
                                 </div>
  
                                 <div class="col-4 col-md-3">
                                     <label for="total-price" class="total-price_one">
                                     <span>руб.</span>
                                     </label>
                                 </div>
                             </div>
  
                         </div>
                     </div>
                 </div>
             </div> `;
	 			i++;
	 		})
	    out += `<div class="cart-block-footer">
            <div class="row total">
                <div class="col-5 col-md-3">
                    Итого:
                </div>
                <div class="col-5 col-md-3">
                    <div class="total-cost"><span>руб.</span></div>
                </div>
            </div>
            <button type="submit" class="order">Оформить заказ</button>
        </div>`;

	 	}
         document.querySelector('.' + this.putToPlace).innerHTML = out;
         if (document.querySelector('.order')) {
			document.querySelector('.order').addEventListener("click", (e) => {
				e.preventDefault()
				window.location.pathname = "/cart"
			})
		}
         this.classCart();
	 }

	 classCart() {
        let products = document.querySelectorAll('.'+this.itemclass);
        let i=1;
		products.forEach(e => {
            new CartEdit("cardItem"+i, optionsCard, this.cartName, this.putToPlace)              
                i++;
            })
    }
    
}
if (document.querySelector('.top-cart-btnn')) {
     let cart = JSON.parse(localStorage.getItem(itemCard));
		console.log(cart);
		let priceT = 0;
		if(cart!=null)
        {
          cart.forEach(e => {
			priceT += e.nums*e.price;
			
        })  
        }
       let basket_sum= document.querySelector('.total-price-cost');
       basket_sum.innerHTML=priceT+'<span>р</span>'; 
    
};
	document.querySelector('.top-cart-btnn').addEventListener("click", el=>{
		el.preventDefault();
		new RenderCartItems(options, "dff", itemCard, itemsProd).renderOut();
    });
    class RenderCartOrder extends RenderCartItems {
        classCart() {
        let products = document.querySelectorAll('.'+this.itemclass);
        console.log(products);
        let i=1;
		products.forEach(e => {
            new CartEdit("cardItem"+i, optionsCard, this.cartName, "dff1");              
                i++;
                console.log(1345);
            })
            
        } 
        renderOut() {
         
            let card = JSON.parse(localStorage.getItem(this.cartName));
         let out = ''; 
           console.log(card );
	 	if (card == null) {
	 		out += `<div class="cart-empty"><span class="cart-empty__title">Корзина пуста</span></div>`;
	 	} else {
	 		let prod = JSON.parse(localStorage.getItem(this.getName));
	 		let i = 1;
	 		card.forEach(e => {
             let img = prod.find(el => e.name === el.name).image;
                 out += `
                 <div class="cart-block-body-item ${this.itemclass}" id="cardItem${i}">
						<div class="container">
							<div class="row">

								<div class="col-md-4 space-between pr-0">
									<picture><source srcset="img/card-img.webp" type="image/webp"><img class="img-fluid" src="img/card-img.jpg" alt=""></picture>
								</div>

								<div class="col-md-8 info">
									<div class="row">
										<div class="col-sm-12 product-name">
											<h5 class="name-card">${e.name}</h5>
											<a class="del-product" href="#">
												<span>+</span>
											</a>
											<div class="weight">
												<i class="icon icon-weight"></i>
												55 гр.
											</div>
										</div>
										<div class="col-md-2">
											<a href="#"><span class="del-prod"></span></a>
										</div>
									</div>
									<div class="row price">

										<div class="col-4 col-md-3">
											<div class="price-per-piece">
                                            ${e.price}
											</div>
										</div>

										<div class="col-4 col-md-4">
											<div class="count_box">
												<div class="minus"><span>-</span></div>
												<input class="inp_price" type="text" value="${e.nums}" id="total-price">
												<div class="plus"><span>+</span></div>
											</div>
										</div>

										<div class="col-4 col-md-3">
											<label for="total-price" class="total-price_one">
												110 <span>руб.</span>
											</label>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div> `;
	 			i++;
	 		})
	    out += `<div class="cart-block-footer">
        <div class="row total">
            <div class="col-5 col-md-3">
                Итого:
            </div>
            <div class="col-5 col-md-3">
                <div class="total-cost">220 <span>руб.</span></div>
            </div>
        </div>
    </div>`;

         }
         document.querySelector('.' + this.putToPlace).innerHTML = out;
         this.classCart();
     }
     
};


function  RenderProduct(id){
    let prod= JSON.parse(localStorage.getItem("prodItems"));
     cart=prod.find(el => id === el.id);
    out=`<div class="row" id="item${cart.id}">
    <div class="col-lg-6 container-fluid">
        <div class="product-info-img">
            <picture><source srcset="img/card-img2.webp" type="image/webp"><img class="img-fluid" src="img/card-img2.jpg" alt=""></picture>
        </div>
    </div>
    <div class="col-lg-6">
        <a class="back" href="/">
            <i class="icon icon-back"></i>
            Назад
        </a>
        <div class="card">
            <div class="card-header">
                <h1 class="name-card">${cart.name}</h1>
                <div class="weight">
                    <i class="icon icon-weight"></i>
                    ${cart.weight}
                </div>
            </div>
            <div class="card-body">
                <div class="description">
                    <p>
                    ${cart.description}
                    </p>
                    <div class="composition">
                        <p><span>Состав:</span>${cart.gradients} </p>
                    </div>
                </div>
            </div>
            <div class="row card-footer price">
                <div class="col-4 col-md-4 col-xl-3 col-xxl-2 pr-0">
                    <div class="price-per-piece">
                    ${cart.price}
                    </div>
                </div>

                <div class="col-4 col-md-5 col-xl-4 center">
                    <div class="count_box">
                        <div class="minus"><span>-</span></div>
                        <input class="inp_price" type="text" value="1" id="total-price">
                        <div class="plus"><span>+</span></div>
                    </div>
                </div>

                <div class="col-4 col-md-2 col-xl-4">
                    <!-- <label for="total-price">
                        110 <span>руб.</span>
                    </label> -->
                    <button>
                        <i class="icon icon-cart"></i>
                        <span>В корзину</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--noindex-->
    <!-- <div class="container descrClone"></div> -->
    <!--/noindex-->
</div>`;
if(document.querySelector("#product-info"))
 {
    document.querySelector("#product-info").innerHTML = out;
 }
 new CartEdit("item"+id, optionsCard, itemsProd, "dff")

}

/* if (document.querySelector('.img-wrapper')) {
    document.querySelector('.img-wrapper').addEventListener("click", (e) => {
        e.preventDefault()
        window.location.pathname = "/product"
    })
} */

    if(document.querySelector('.dff1')) {
        console.log(9);
         new RenderCartOrder(options, "dff1", itemCard, itemsProd).renderOut();
}

/* if (document.querySelector('#product-info')) {
  let url=window.location.href; 
  let id=url.split("/");
  console.log(id);
  RenderProduct(id[id.length-1]);
};  */

window.addEventListener("load", e => {
	let url = window.location.pathname.split("/");
	e.preventDefault();

	if (url[1] === "product") {
		RenderProduct(url[2]);
	}
})
 //! ///////////////////////////////// Отрисовка количества денег в шапке сайта

/*  if (document.querySelector(".top-cart-btnn")) {
	document.querySelector(".top-cart-btnn").addEventListener("click", e => {
		e.preventDefault()
		adbr()
	})
} */

//! ////////////  Функция отрисовки мини-корзины
/* 
function adbr(){
	new TopCart(optionsOrder, "dff1", itemCard, itemsProd, "n-hj").renders()

} */