import { defineStore } from "pinia";

export const useProjectStore = defineStore('projectStore',{
    state:()=>{
        return {
            //@ts-ignore
            project:Object,
            users:[]

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
        },
        findUser(id:Number){
             // @ts-ignore
            return  this.users.filter((e)=>e.user_id = id)
        }

    }
})
