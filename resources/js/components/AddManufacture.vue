<template>
<div>
    <div class="row">
        <div class="col-md-4">
            <label>Add Manufacture</label>
            <input type="text" v-model="data.name" placeholder="Enter Manufacture Name" class="form-group" name="name">
            <button :disabled="disableSubmit || !data.name" @click="submitManufacture()" class="text-primary">{{disableSubmit?'Submitting..':'Submit'}}</button>
        </div>
    </div>        
</div>
</template>
<script>
import swal from "sweetalert2";    
    export default {
        mounted() {

        },
        data:function(){
            return{
                disableSubmit:false,
                data:{
                    name:''
                }
            }
        },
        methods:{
            submitManufacture()
            {
               this.disableSubmit = true;
               axios.post('/add/manufacture',this.data).then(response=>{
                   this.disableSubmit = false;
                    window.location.href="/manufatcure/list";
                }).catch(errors=>{
                    swal('Warning',errors.response.data,'error');
                })
            }
        }
    }
</script>