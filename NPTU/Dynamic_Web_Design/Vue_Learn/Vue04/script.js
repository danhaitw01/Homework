var vm=new Vue({
      el:"#app",
      data:{
            //建立一個容器,讓外部的資料可以先放在這裡
            smartphone:[],
            cart:[],
            currentBook:null,
            isCartOpen:false,
      },
      methods:{
            bgcss(url){
                  return{
                        'background-image':'url('+url+')',
                        'background-position':'center center',
                        'background-size':"cover"      
                  }
            },
            wheel(evt){
                  TweenMax.to(".cards",0.8,{
                        left: "-=" + evt.deltaY*5+"px"
                  })
                  if($(".cards").css("left").slice(0,-2)>=1){
                        TweenMax.to(".cards",0.8,{
                              left: "0px"
                        })
                  }
                  if($(".cards").css("left").slice(0,-2)<=-3501){
                        TweenMax.to(".cards",0.8,{
                              left: "-3500px"
                        })
                  }
            },
            addCart(book,evt){
                  this.currentBook= book;
                  let target = evt.target
                  this.$nextTick(()=>{
                        TweenMax.from(".buybox",0.6,{
                              left: $(evt.target).offset().left,
                              top: $(evt.target).offset().top,
                              opacity:1
                        })
                        setTimeout(()=>{
                              this.cart.push(book)     
                        },600)
                  })     
                  
                }

      },
      //use axios 
      created(){
            let apiUrl="./smartphone.json" //資料讀取來源
            
            axios.get(apiUrl).then(res=>{
                  this.smartphone=res.data
            })
      },
      watch: {
            cart(){
              TweenMax.from(".fa-shopping-cart",0.3,{
                scale: 0.5
              })
            }
          },
      computed:{
            totalPrice(){
                  return this.cart
                  .map(book=>book.price)
                  .reduce((total,p)=>total+p,0)
    }
  },

})