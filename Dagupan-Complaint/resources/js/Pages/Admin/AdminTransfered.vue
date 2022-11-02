<template>
    <AppLayout>
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">Transfered Complaints</h1>
        </template>
            <div class="flex mr-10  m-auto ml-10 h-full w-100 justify-center">
                <div v-if="this.Complaint != Object" class=" border-4 border-[#005176] mt-10 w-full  h-full rounded-lg">
                    <div >
                        <div class="flex justify-between">
                    <p class="m-2.5 mx-5 mt-5 text-[#005176] font-[arial]">{{this.Complaint.name}}</p>
                    <div>
                        <button @click="solved(Complaint)" class="m-5 bg-green-500 p-2 rounded-lg text-white">Solved</button>
                        </div>
                    </div>
                            <p class="m-2.5 ml-5 text-[#005176] font-[arial]">{{this.Complaint.address}}</p>
                            <p class="m-2.5 ml-5 font-bold text-[#005176] font-[arial] mt-5">Complaints:</p>
                            <p  class="p-5  border-2 border-[#005176] w-11/12 h-100 ml-5 mr-5 mb-5 rounded-lg" >{{this.Complaint.value}}</p>
                    </div>
                    <div v-if="this.Complaint.image !=null">
                        <div class="w-fit m-auto " v-for="image in this.Complaint.image" v-bind:key="image.id">
                            <img class="p-5" :src="image.images !=null ? image.images :''"/>
                        </div>
                    </div>
                </div>
      <div v-else  class=" mt-10 w-full py-20 text-center  h-full rounded-lg">
        <div class="font-bold">
             <h1>Please Select a Complaint</h1>
      </div>
    </div>
            <!--Complaint Left-side-->
        <div class="relative border-4 mb-5 border-[#005176] mt-10 w-full h-full max-h-max ml-8 rounded-lg bg-[#fdfff] ">

            <div v-for="complaints in TransferedComplaints.data" v-bind:key="complaints.id" class="p-3">
                <div @click="this.Complaint = complaints" class="border-b-2  border-[#005176] rounded-t-lg w-auto mt-1 p-3 hover:bg-gray-300  transition duration-300 cursor-pointer">
                   <div class="flex text-lg  font-semibold">
                    <p class=" font-[arial]">From:</p>
                    <p class="ml-2  font-[arial]">{{complaints.name}}</p>
                   </div>
                  <div class="flex text-lg  font-semibold">
                    <p class="  font-[arial]">Location:</p>
                    <p class="ml-2  font-[arial]">{{complaints.address}}</p>
                   </div>
                    <div class="ml-2.5 h-20 ">
                    <p class=" overflow-hidden border-2 w-11/12 h-4/5  m-2.5 ml-1 p-3 rounded-lg font-[arial]">
                        {{complaints.value}}
                    </p>
                    </div>
                </div>
                
                
            </div>
                <Pagination :links="TransferedComplaints.links"></Pagination>
        </div>
            <!--end of left-complaint-->
    </div>
    </AppLayout>
</template>
<script>
    import AppLayout from '@/Layouts/AppLayout.vue';
import { data } from 'browserslist';
    import Pagination from '../../Components/Pagination.vue';
export default {
    setup() {
        
    },
    props:{
        TransferedComplaints:Object,
        
    },
    components:{
        AppLayout,
        Pagination
    },
    data(){
        return{
            Complaint:Object,
            formSolvedComplaint:this.$inertia.form({
                id:Number,
                status:''
            })
        }
    },
    methods:{
        solved(Complaint){
            this.formSolvedComplaint.id = Complaint.id
            this.formSolvedComplaint.status = 'Solved'
            this.formSolvedComplaint.post(route('SolvedComplaintAdminRequest'))
            console.log(this.formSolvedComplaint)
        }
    }

}
</script>