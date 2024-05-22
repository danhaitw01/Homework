var vm = new Vue({
    el: "#app",
    data: {
      gather: false,
      state: "Start the Game!",
      symbols: [
        { label: "spades", symbol: "♠" },
        { label: "hearts", symbol: "♥" },
        { label: "diamonds", symbol: "♦" },
        { label: "clubs", symbol: "♣" }
      ],
      cards: [
        { id: 1, label: "spades", open: false },
        { id: 2, label: "hearts", open: false },
        { id: 3, label: "clubs", open: false },
        { id: 4, label: "diamonds", open: false }
      ],
      question: null, //隨機的選取一個花色作為問題
      mode: "", //決定是否是使用者回答的狀態 空:遊戲模式, answer:使用者輸入模式
      count: 0 //洗牌的次數
    },
    methods: {
      turnAll(state) {
        this.cards.forEach((card) => (card.open = state));
      },
      shuffle() {
        let newOrder = [1, 2, 3, 4].sort((a, b) =>
          Math.random() > 0.5 ? 1 : -1
        );
        this.cards.forEach((card, cid) => (card.id = newOrder[cid]));
      },
      getSymbol(label) {
        let result = this.symbols.find((s) => s.label == label);
        return result ? result.symbol : label;
      },
      startGame() {
        this.mode = "";
        this.question = this.symbols[parseInt(Math.random() * 4)];
        //蓋上牌卡
        this.turnAll(false);
  
        //先綁定遊戲之後再加入 收起所有的排堆
        this.gather = true;
  
        //告知所有的使用者我們要開始遊戲了
        this.state = "Ready to Play";
  
        //1. 告知使用者, 發牌
        setTimeout(() => {
          //發牌
          this.gather = false;
          //告知下一個動作
          this.state = "接下來的任務:";
        }, 2000);
  
        //2.公布題目:
        setTimeout(() => {
          //翻牌
          this.turnAll(true);
          //告訴他花色
          this.state =
            "Find: " + this.question.label + " " + this.question.symbol;
        }, 3000);
  
        //3.準備開始
        setTimeout(() => {
          //蓋牌
          this.turnAll(false);
          //告訴他準備開始遊戲
          this.state = "Get Ready....";
        }, 4000);
  
        //4. 洗牌:
        this.count = 0;
        setTimeout(() => {
          let startShuffle = () => {
            this.shuffle();
  
            if (this.count++ < 5) {
              setTimeout(startShuffle, 400);
            } else {
              //切到使用者的模式, 讓使用者點選花色
              this.state =
                "Pick up " + this.question.label + " " + this.question.symbol;
              this.mode = "answer";
            }
          };
          startShuffle();
        }, 5000);
      },
      // 使用者可以翻牌     this.mode="answer";
      openCard(card) {
        if (this.mode == "answer") {
          card.open = !card.open;
          //檢查 使用者點選 == 題目
          if(card.label== this.question.label){
            this.state="OK! You find "+this.question.symbol+"!!";
          }else{
            this.state="LOOser..";
            setTimeout(()=>{
              let card = this.getCard(this.question.label);
              card.open=true;
            },2000)
          }
          
          //重啟遊戲 
          setTimeout(()=>{
            this.startGame();
          },3000)
          
        }
      },
      getCard(label){
        return this.cards.find(card=>card.label==label)     }
      
    },
    mounted() {
      //this.startGame();
    }
  });