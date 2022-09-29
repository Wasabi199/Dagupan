<template>
    <AppLayout>
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">Transfered Complaints</h1>
        </template>
            <div class="flex mr-10  m-auto ml-10 h-full w-100 justify-center">
                <div v-if="this.Complaint != Object" class=" border-4 border-[#005176] mt-10 w-full  h-full rounded-lg">
                    <div >
                        <p class="m-2.5 ml-5 mt-5 text-[#005176] font-[arial]">{{this.Complaint.name}}</p>
                        <p class="m-2.5 ml-5 text-[#005176] font-[arial]">{{this.Complaint.address}}</p>
                        <p class="m-2.5 ml-5 font-bold text-[#005176] font-[arial] mt-5">Complaints:</p>
                        <p  class="p-5  border-2 border-[#005176] w-11/12 h-100 ml-5 mr-5 mb-5 rounded-lg" >{{this.Complaint.value}}</p>
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
                 <!-- <div  class="border-b-2 border-[#005176] rounded-t-lg w-auto mt-1 p-3 hover:bg-gray-300 transition duration-300">
                   <div class="flex text-lg text-black font-semibold">
                    <p class=" text-[#005176] font-[arial]">Name:</p>
                    <p class="ml-2 text-[#005176] font-[arial]"></p>
                   </div>
                  <div class="flex text-lg text-black font-semibold">
                    <p class=" text-[#005176] font-[arial]">Location:</p>
                    <p class="ml-2 text-[#005176] font-[arial]"></p>
                   </div>
                    <div class="ml-2.5 h-20 ">
                    <p class=" overflow-hidden border-2 border-red-700 w-11/12 h-4/5  m-2.5 ml-1 p-3 rounded-lg font-[arial]">
                        
                    </p>
                    </div>
                </div> -->
                
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
            Complaint:Object
        }
    }

}
</script>