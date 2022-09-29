<template>
    <AppLayout>
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">Barangay</h1>
        </template>
        <div class="h-full w-full pb-10">
            <div class="w-2/3 mt-10  rounded-lg bg-white h-fit m-auto shadow-lg">
               <div class="pt-5 w-full text-center font-[Arial] text-2xl font-bold">Ranking</div>
               <div class="p-3 cursor-pointer" v-for="barangay in Ranking" v-bind:key="barangay.id">
                    <div @click="barangayFunction(barangay)" class="w-full h-fit border-black border-2 rounded-lg">
                        <div class="m-full text-center p-3 text-lg font-bold">{{barangay}} </div>
                    </div>
               </div>
            </div>
        </div>
        <Modal :show="showBarangayModal" :closeable="true" @close="showBarangayModal = !showBarangayModal">
            <div class="p-5">
                <div class="flex justify-between text-xl font-bold text-gray-900 my-3">
                    <span>{{barangayProfile}}</span>
                    <svg @click="showBarangayModal = !showBarangayModal" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
                <div class="flex h-fit w-full">
                        <div class="w-1/3 shadow-lg h-fit px-5">
                            <div class="text-xl text-start">Current Complaint:</div>
                            <div class="text-4xl text-end font-bold">{{this.newComplaint}}</div>
                        </div>
                        <div class="w-1/3 shadow-lg h-fit px-5">
                            <div class="text-xl text-start">Current Complaint:</div>
                            <div class="text-4xl text-end font-bold">0%</div>
                        </div>
                        <div class="w-1/3 shadow-lg h-fit px-5">
                            <div class="text-xl text-start">Total Complaint:</div>
                            <div class="text-4xl text-end font-bold">{{this.Barangay}}</div>
                        </div>
                    </div>
            </div>
        </Modal>
    </AppLayout>
</template>
<script>
    import Modal from '@/Components/Modal.vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import {pickBy, throttle} from 'lodash';

import { data } from 'browserslist';
export default {
    setup() {
        
    },
    components:{
        AppLayout,
        Modal
    },
    props:{
        Ranking:Array,
        filters:Object,
        Barangay:Number,
        newComplaint:Number
    },
    data(){
        return{
            barangayProfile:Object,
            showBarangayModal:false,
            form:{
                address: this.$props.filters.address
            }
        }
    },
    watch: {
        form: {
            deep: true,
            handler:
                throttle(
                    function () {
                        this.$inertia.get(route('Barangay'), pickBy(this.form), {
                            preserveState: true,
                            preserveScroll: true,
                        });
                    },
                    600
                ),
        },
    },
    methods:{
       barangayFunction(barangay){
            console.log(barangay)
            this.form.address = barangay
            this.barangayProfile = barangay
            this.$props.filters.address = barangay
            this.showBarangayModal = true
        }
    }
    
}
</script>