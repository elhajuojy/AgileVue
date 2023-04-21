import { defineStore } from "pinia";
import axios from "axios";

export const useIssueStore = defineStore('issue',{
    state:()=>{
        return {
            showIssueDetails : false,
            issue:Object,
            attachments : Array,
            comments : Array,
            issues : [
            ],
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
        fetchComments  () {
            // @ts-ignore
            const url  = `/api/issues/${ this.issue.id }/comments`
            axios.get(url).then((data)=>{
                this.comments = data.data
            }).catch((error)=>{
                console.error(error)
            })
        },
        fetchAttaches () {
            // @ts-ignore
            const url  = `/api/issues/${ this.issue.id }/attaches`
            axios.get(url).then((data)=>{
                this.attachments = data.data
                console.log("attachements",this.attachments)
            }).catch((error)=>{
                console.error(error)
            })
        },
        add(){

        },
        update(){

        },
        log(){
        },

    }
})
