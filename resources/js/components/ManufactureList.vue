<template>
    <div>
        <table>
            <thead>
                <th>
                    Sr. No.
                </th>
                <th>
                    Name
                </th>
            </thead>
            <tbody>
                <tr v-for="(list,index) in lists" :key="index">
                    <td>{{index+1}}</td>
                    <td>
                            {{list.name}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    data:function(){
        return{
            lists:[],
        }
    },
    mounted(){
        this.getList();
    },
    methods:{
        getList()
        {
            axios.get('/get/manufacture/list').then(response=>{
                this.lists= response.data;
            })
        }
    }
}
</script>
