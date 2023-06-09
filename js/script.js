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
                this.toDoList = res.data;
            })
        },
        addItem(){
            if (this.addText && this.addText.length > 1 ) {
                const addNewItem = {
                    newItem: {
                        text: this.addText,
                        done: "no"
                    }
                };
                axios.post(this.apiUrl, addNewItem, { headers : {"Content-Type": "multipart/form-data"}}).then((res)=> {
                    this.toDoList = res.data;
                })
            }
            this.addText = "";
        },
        removeItem(index){
            const taskIndex = {
                removeIndex: `${index}`
            };
            axios.post(this.apiUrl, taskIndex, { headers : {"Content-Type": "multipart/form-data"}}).then((res)=> {
                this.toDoList = res.data;
            })
        },
        doneItem(index){
            const taskIndex = {
                doneIndex: `${index}`
            };
            axios.post(this.apiUrl, taskIndex, { headers : {"Content-Type": "multipart/form-data"}}).then((res)=> {
                this.toDoList = res.data;
            })
        }
    },
    mounted(){
        this.readList()
    }
}).mount("#app");