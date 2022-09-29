<template>
    <div class="bg-slate-100 w-full min-h-screen px-5">
        <div class="w-full text-center text-3xl py-10 font-bold">{{this.$attrs.user.name}}</div>
        <div class="flex w-full gap-x-10">
            <div class="w-1/2">
                <img class="w-full" :src="this.Profile.barangay.barangay_profile !=null ? this.Profile.barangay.barangay_profile :''"/>
            </div>
            <div class="w-1/2 h-fit my-auto bg-white p-10 rounded-xl shadow-xl">
                <div class="flex gap-x-3 my-auto font-bold text-xl">
                   <p>Population:</p> 
                   <p>{{this.Profile.barangay.population}}</p>
                </div>
                <div class="mt-10 text-lg">
                    {{this.Profile.barangay.history}}
                </div>
            </div>
        </div>
        <Link :href="route('newComplaint')">
            <div class="mt-10 border-2 w-fit px-10 py-2 rounded-lg cursor-pointer hover:border-slate-800 m-auto bg-slate-800 text-white hover:bg-slate-200 hover:text-slate-800">Next</div>
        </Link>
    </div>
</template>
<script>
import { Link } from '@inertiajs/inertia-vue3'
export default {
    setup() {
        
    },
    props:{
        Profile:Object,
        
    },
    components:{
        Link
    }
}
</script>