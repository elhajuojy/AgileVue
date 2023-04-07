import { defineStore } from "pinia";
import {usePage} from "@inertiajs/vue3";

export const useGlobalStateStore = defineStore('globalState',{
    state:()=>{
        return {
            //@ts-ignore
            user : usePage().props.auth.user,

        }
    },
    actions:{
        logOut(){
            console.log("UserlogOut");

        },
        isLogin(){
            console.log("is login ")
        },

    }
})
