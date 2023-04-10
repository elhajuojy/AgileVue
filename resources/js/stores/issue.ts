import { defineStore } from "pinia";

export const useIssueStore = defineStore('issue',{
    state:()=>{
        return {
            showIssueDetails : false,
            issue:Object,
            todos:Array,
            doing:Array,
            done:Array,
            backlog:[Object]
        }
    },
    actions:{
        fromArrayToAnotherOne(){
        },
        delete(){

        },
        add(){

        },
        update(){

        },
        log(){
            console.log("Todos=>")
            console.log(this.todos)
            console.log("============================")
            console.log("doing=>")
            console.log(this.doing)
            console.log("============================")
            console.log("done=>")
            console.log(this.done)
            console.log("============================")

        }
    }
})
