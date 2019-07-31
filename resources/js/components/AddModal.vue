<template>
<div>
    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <label>Manufactures</label>
            <select v-model="data.manufacture_id">
                <option selected disabled value>Attach Manufacture</option>
                <option v-for="manufacture in manufactures" :key="manufacture.id" :value="manufacture.id">{{manufacture.name}}</option>
            </select>
            <br>
            <br>
            <div class="input-group">
                <label for="Color">Color</label>
                <input type="text" class="form-control" v-model="data.color" name="" id="">
            </div>
            <br>
            <br>

            <div class="input-group">
                <label for="Color">Year</label>
                <input type="text" class="form-control" v-model="data.year" name="" id="">
            </div>
            <br>
            <br>

            <div class="input-group">
                <label for="Color">Registration Number</label>
                <input type="text" class="form-control" v-model="data.registration" name="" id="">
            </div>
            <br>
            <br>

            <button :disabled="disableSubmit" @click="submitModel()" class="text-primary">{{disableSubmit?'Submitting..':'Submit'}}</button>
        </div>
    </div>        
</div>
</template>
<script>
import swal from "sweetalert2";    
    export default {
        mounted() {
            this.getManufactures();
        },
        data:function(){
            return{
                manufactures:[],  
                disableSubmit:false,
                data:{
                    name:'',
                    year:'',
                    color:'',
                    registration:''

                }
            }
        },
        methods:{
            getManufactures()
            {
                axios.get('/get/manufacture/list').then(response=>{
                this.manufactures= response.data;
                })
            },

            onDocChange(e, index)
            {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length) return;
                let reader = new FileReader();
                let vm = this.allData.attachments[index];
                vm.file_name = e.srcElement.value.split("fakepath\\")[1];
                vm.file_ext = e.srcElement.value.split(".").reverse()[0];
                reader.onload = e => {
                    vm.attachment_file = e.target.result;
                };
                reader.readAsDataURL(files[0]);
            },

            submitModel()
            {
               this.disableSubmit = true;
               axios.post('/add/model',this.data).then(response=>{
                   this.disableSubmit = false;
                    window.location.href="/manufatcure/list";
                }).catch(errors=>{
                    swal('Warning',errors.response.data,'error');
                })
            }
        }
    }
</script>