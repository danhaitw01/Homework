var vm = new Vue({
    el:"#app",
    data:{
      keyword: "",
      minPrice: 0,
  maxPrice:9999,
      Price : 50,
      ServiceFee: 5,
      showSoldOut: false,
      cards: [
        {
          title: "珍珠伯爵紅茶拿鐵",
          cover:          "https://www.milkshoptea.com/upload/product_catalog/2208261101360000001.png",
          price: 75,
          soldOut: true,
          quantity: 0
        },
        {
          title: "娜杯紅茶",
          cover:          "https://www.milkshoptea.com/upload/product_catalog/2208261102050000001.png",
          price: 100,
          soldOut: true,
          quantity: 0
        },
        {
          title: "原片青茶拿鐵",
          cover:
            "https://www.milkshoptea.com/upload/product_catalog/2208261103040000001.png",
          price: 90,
          soldOut:false,
          quantity: 0
        },
        {
          title: "嫩仙草凍奶",
          cover:
            "https://www.milkshoptea.com/upload/product_catalog/2211092213060000001.png",
          price: 50,
          soldOut:false,
          quantity: 0
        },
        {
          title: "冬瓜青茶",
          cover:
            "https://www.milkshoptea.com/upload/product_catalog/2208261103580000001.png",
          price: 65,
          soldOut:false,
          quantity: 0
        },
        {
          title: "琥珀烏龍鮮豆奶",
          cover:
            "https://www.milkshoptea.com/upload/product_catalog/2208261131590000001.png",
          price: 70,
          soldOut:false,
          quantity: 0
        }
      ],
      cart: []
    },
    methods: {
    addToCart(item) {
        if (item.quantity > 0) {
          // 檢查購物車中是否已存在該商品
          const existingItemIndex = this.cart.findIndex(cartItem => cartItem.title === item.title);
          if (existingItemIndex !== -1) {
            // 如果存在，增加數量
            this.cart[existingItemIndex].quantity += item.quantity;
          } else {
            // 如果不存在，添加新項目到購物車
            this.cart.push({
              title: item.title,
              price: item.price,
              quantity: item.quantity
            });
          }
          // 重置數量為0
          item.quantity = 0;
        }
      },
      getTotalAmount() {
        let total = 0;
        this.cart.forEach(item => {
          total += (item.price + item.price * this.ServiceFee / 100) * item.quantity;
        });
        return total;
      }
    }
  });
function Switch_Back(){
    if (document.getElementById("control").classList.contains("has-hidden")){
        document.getElementById("control").classList.remove("has-hidden");
    }
    else{
        document.getElementById("control").classList.add("has-hidden");
    }
    
}