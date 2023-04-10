import { defineStore } from "pinia";

export const useBacklogStore = defineStore('BacklogStore',{
    state:()=>{
        return {
            //@ts-ignore
            project:Object

        }
    },
    actions:{
        delete(){

        },
        add(){

        },
        find(){

        },
        remove(){

        },
         async fetchProject(){
            return "nothing now"
        }

    }
})
