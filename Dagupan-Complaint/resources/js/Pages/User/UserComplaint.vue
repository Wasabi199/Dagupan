<template>
    <div class="bg-gray-300 min-h-screen h-full w-full">
    <!-- <div class="h-max w-screen"> -->
        <div class="w-fit h-fit m-auto pt-10">
            <!-- <div class=" text-xl font-bold p-2 rounded-lg text-center"> -->
                <img src="../../../../public/Images/Logo.png"/>
            <!-- </div> -->
        </div>
          <div class=" w-3/4 h-fit m-auto  pt-5">
            <div class="bg-white text-xl font-bold p-5 rounded-lg text-center">
                <h1>Please Select Barangay:</h1>
                <div class=" ml-5 mr-5 mt-5">
                    <select v-model="form.address" class="rounded-lg w-2/4 cursor-pointer">
                        <option class="text-[#005176] font-[arial]" disabled>Please select one</option>
                        <option v-for="barangay in Barangays" v-bind:key="barangay.id"  class="text-[#005176] font-[arial]">{{barangay}}</option>
                    </select>
                </div>
                <div class="flex pt-10 justify-center">
                    <div @click="showComplaintModal = !showComplaintModal" class="border-2 border-black h-fit w-fit p-2 cursor-pointer rounded-lg hover:text-blue-600 hover:border-blue-600">Submit Complaint</div>
                    <div @click="showRateModal = !showRateModal" class="border-2 border-black h-fit w-fit p-2 ml-2 cursor-pointer rounded-lg hover:text-blue-600 hover:border-blue-600">Rate Us</div>
                </div> 
                <div v-if="Complaints != null">
                    <div class="pt-5">Existing Complaint(s)</div>
                    <div v-for="complaint in Complaints.data" v-bind:key="complaint.key" class=" p-5 gap-0 justify-left text-sm text-left overflow-x-auto">
                        <div class="col-span-2 border-2 border-black h-fit w-full p-2 cursor-pointer rounded-lg ">
                            <div class=" p-1">
                                <p>Complaint:</p>
                                <div class="">
                                    <p class="ml-2">{{complaint.value}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <Pagination  :links="Complaints.links" class="font-thin"></Pagination>
            </div>
        </div>
    <!-- </div> -->
    <Modal :show="showRateModal" :closeable="true" @close="showRateModal = !showRateModal">
        <div class="p-5">
            <div class="flex justify-between text-xl font-bold text-gray-900 my-3">
                <span>Rate for the System</span>
                <svg @click="showRateModal = !showRateModal" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
                <div  class="mt-4 shadow-xl p-2 w-2/4 rounded-lg hover:bg-blue-300 cursor-pointer" :class="formRate.rate =='Verry Satisfied' ?'bg-blue-300':null" @click="rating('Verry Satisfied')">
                   <div class="font-bold" >Verry Satisfied</div>
                </div>
                <div class=" mt-4 shadow-xl p-2 w-2/4 rounded-lg  hover:bg-blue-300" :class="formRate.rate =='Satisfied' ?'bg-blue-300':null" @click="rating('Satisfied')">
                   <div class="font-bold">Satisfied</div>
                </div>
                <div class=" mt-4 shadow-xl p-2 w-2/4 rounded-lg hover:bg-blue-300" :class="formRate.rate =='OK' ?'bg-blue-300':null" @click="rating('OK')">
                   <div class="font-bold">OK</div>
                </div>
                <div class=" mt-4 shadow-xl p-2 w-2/4 rounded-lg hover:bg-blue-300" :class="formRate.rate =='Dissatisfied' ?'bg-blue-300':null" @click="rating('Dissatisfied')">
                   <div class="font-bold">Dissatisfied</div>
                </div>
                <div class=" mt-4 shadow-xl p-2 w-2/4 rounded-lg hover:bg-blue-300" :class="formRate.rate =='Very Dissatisfied' ?'bg-blue-300':null" @click="rating('Very Dissatisfied')">
                   <div class="font-bold">Very Dissatisfied</div>
                </div>
            <div class="flex justify-end text-xl font-bold dark:text-gray-200 my-3">
                <div @click="ratingSubmit()" class="flex space-x-2 px-4 py-1 border text-sm leading-snug font-semibold text-blue-600 dark:text-blue-600 dark:border-blue-600 border-blue-600 uppercase rounded-full dark:hover:text-gray-200 hover:bg-blue-500 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                    <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                    </svg>
                    <span>Submit</span>
                </div>
            </div>
        </div>
    </Modal>
    <Modal :show="showComplaintModal" :closeable="true" @close="showComplaintModal = !showComplaintModal">
        <div class="p-5">
            <div class="flex justify-between text-xl font-bold text-gray-900 my-3">
                <span>Create Complaint</span>
                <svg @click="showComplaintModal = !showComplaintModal" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
                <form method="POST" enctype="multipart/form-date">
                    <div class="grid grid-cols-2 gap-4 ">
                        <div class="">
                            <Jet-label for="name" value="Name"></Jet-label>
                            <input type="text" class="w-full rounded-lg" placeholder="Optional " v-model="formComplaint.name" />
                        </div>
                        <div class="">
                            <Jet-label for="email" value="Email"></Jet-label>
                            <input type="text" class="w-full rounded-lg" placeholder="Email " v-model="formComplaint.email"/>
                        </div>
                        <div class="">
                            <Jet-label for="address" value="Address"></Jet-label>
                            <input type="text" class="w-full rounded-lg" placeholder="Address " v-model="formComplaint.complainant_address"/>
                        </div>
                        <div class="">
                            <Jet-label for="age" value="Age"></Jet-label>
                            <input type="number" class="w-full rounded-lg" placeholder="Age" v-model="formComplaint.age"/>
                        </div>
                        <div class="col-span-2">
                            <Jet-label for="complaint_address" value="Barangay to Complaint"></Jet-label>
                            <select v-model="formComplaint.address" class="rounded-lg w-full cursor-pointer">
                                <option class="text-[#005176] font-[arial]" disabled>Please select one</option>
                                <option v-for="barangay in Barangays" v-bind:key="barangay.id"  class="text-[#005176] font-[arial]">{{barangay}}</option>
                            </select>
                        </div>
                        <div class="col-span-2">
                            <Jet-label for="Problem_Complaint" value="Problem to Complaint"></Jet-label>
                            <select v-model="formComplaint.issue" class="rounded-lg w-full cursor-pointer">
                                <option class="text-[#005176] font-[arial]" disabled>Please select one</option>
                                <option v-for="issue in issues" v-bind:key="issue.id"  class="text-[#005176] font-[arial]">{{issue}}</option>
                            </select>
                        </div>
                        <div class="col-span-2">
                            <Jet-label for="image" value="Image"></Jet-label>
                            <input type="file" class=" w-full rounded-lg" placeholder="Image" @change="onFileSelected" multiple/>
                        </div>
                        <div class="col-span-2 h-fit">
                            <Jet-label for="complaint" value="Complaint"></Jet-label>
                            <textarea type="text" class="h-64  shadow-xl w-full rounded-lg" placeholder="Complaint " v-model="formComplaint.value"/>
                        </div>
                    </div>
                </form>
            <div class="flex justify-end text-xl font-bold dark:text-gray-200 mt-3">
                <div @click="submit()" class="flex space-x-2 px-4 py-1 border text-sm leading-snug font-semibold text-blue-600 dark:text-blue-600 dark:border-blue-600 border-blue-600 uppercase rounded-full dark:hover:text-gray-200 hover:bg-blue-500 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                    <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                    </svg>
                    <span>Update</span>
                </div>
            </div>
        </div>
    </Modal>
</div>
</template>
<script>
import JetLabel from '@/Components/InputLabel.vue';
import Modal from '@/Components/Modal.vue'
import route from '../../../../vendor/tightenco/ziggy/src/js';
import {pickBy, throttle} from 'lodash';
import Pagination from '../../Components/Pagination.vue';
import { Link } from '@inertiajs/inertia-vue3'
export default {
    setup() {
        
    },
    props:{
        filters:Object,
        Complaints:Object,
        Barangays:Array,
        
    },
    components:{
        JetLabel,
        Modal,
        Pagination,
        Link
        // pickBy,
        // throttle,
    },
   data(){
    return{

        // showComplaint: false,
        showComplaintModal:false,
        showRateModal:false,

        form:{
            address: this.$props.filters.address == null ? '': this.$props.filters.address
            },
      
        formComplaint:this.$inertia.form({
            name:'',
            email:'',
            age:'',
            address: '',
            complainant_address:'',
            value:'',
            issue:'',
            status:'',
            files:null,
        }),
        formRate:this.$inertia.form({
            rate:'',
        }),
        issues:[
            'Making Trouble',
            'Noisy Neigbors',
            'Animal Issue',
            'Waste Problem',
        ]
     
    }
   },

    watch: {
        form: {
            deep: true,
            handler:
                throttle(
                    function () {
                        this.$inertia.get(route('complaint'), pickBy(this.form), {
                            preserveState: true,
                            preserveScroll: true,
                        });
                    },
                    600
                ),
        },
    },
    methods:{
        onFileSelected(file){
            this.formComplaint.files = file.target.files
        },
        submit(){
            this.formComplaint.name == ''?'Anonymous': this.form.name
            this.formComplaint.status='Pending'
            // this.formComplaint.address ==''?'':this.form.address
            this.formComplaint.post(route('submitComplaint'))
            console.log('clicked')
            this.showComplaintModal = false
        },
        rating(picked){
            console.log(picked);
            this.formRate.rate = picked   
        },
        
        ratingSubmit(){
            console.log('Rated')
            this.formRate.post(route('submitRate'))
            this.showRateModal = false
        }
    }
}
</script>