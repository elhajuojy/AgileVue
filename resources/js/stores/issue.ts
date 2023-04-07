import { defineStore } from "pinia";

export const useIssueStore = defineStore('issue',{
    state:()=>{
        return {
            showIssueDetails : false,
            issue:Object
        }
    },
    actions:{
        update:{

        },
        delete:{

        },
        add:{

        }
    }
})
