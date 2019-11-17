<template>
    <span>
        <button class="btn btn-outline-secondary" @click="approveUser" >Approve</button>
    </span>
</template>
<script>
export default {
    props:['loanId','currentStatus'],
    data() {
        return {
            loans:[],

            value:{
                approved: '2', cancelled:'1'
            }


        }
    },
    methods: {
        getData(){

        },
        approveUser(){
            axios.put(`/admin1/approve/${this.loanId}`,this.value).then(response =>{
                if (this.currentStatus == 0) {
                     console.log(this.value.approved)
                } else if(this.currentStatus == 1) {


                }else{
                    alert("Already Approved")

                }

            }).catch((error)=>{
                console.log(error);
            });
        }
    },

}
</script>
<style>

</style>
