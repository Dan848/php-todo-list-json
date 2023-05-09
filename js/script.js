const { createApp } = Vue

createApp({
    data(){
        return{
            title: "To Duck List",
            addButton: "Quack!",
            doneListTitle: "Ducked List",
            toDoList: [],
            addText: "",
            apiUrl: "server.php"
        }
    },
    methods: {
        readList() {
            axios.get(this.apiUrl).then((res) =>{
                console.log(res.data)
                this.toDoList = res.data;
            })
        },
        addItem(){
            //Ci assicura
            if (this.addText && this.addText.length > 1 ) {
                const newItem = {
                    text: this.addText,
                    done: false
                }
                this.toDoList.push(newItem);
            }
            this.addText = "";
        },
        removeItem(index){
            this.toDoList.splice(index, 1);
        },
        doneItem(index){
            this.toDoList[index].done ?
            this.toDoList[index].done = false :
            this.toDoList[index].done = true
        }
    },
    mounted(){
        this.readList()
    }
}).mount("#app");