import { defineStore } from "pinia";
import {usePage} from "@inertiajs/vue3";

// @ts-ignore
export const useGlobalStateStore = defineStore('globalState',{
    state:()=>{
        return {
            //@ts-ignore
            user : usePage().props.auth.user,

        }
    },
    persist: true,
    actions:{
        logOut(){
            console.log("UserlogOut");

        },
        isLogin(){
            console.log("is login ")
        },

    },


})
