<template tittle="Dashboard">
    <AppLayout>
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h1>
        </template>
        <div class="bg-slate-200 w-full min-h-screen h-fit">
            <div class="w-11/12 h-fit m-auto pt-10">
                <div class="bg-white h-fit w-full shadow-lg m-auto rounded-lg">
                    <div class="flex justify-between p-10">
                        <div class="shadow-lg w-1/4  h-32  border-2 rounded-lg ">
                            <Jet-Label class="p-2 font-semibold">New Complaints</Jet-Label>
                            <div class="text-end p-5 text-6xl font-semibold">
                                <span>{{this.newComplaint}}</span>
                            </div>
                        </div>
                        <div class="shadow-lg w-1/4 h-32 border-2 rounded-lg">
                            <Jet-Label class="p-2 font-semibold">Percent of Complaints</Jet-Label>
                            <div class="text-end p-5 text-6xl font-semibold">
                                <span>0%</span>
                            </div>
                        </div>
                        <div class="shadow-lg w-1/4 h-32 border-2 rounded-lg">
                            <Jet-Label class="p-2 font-semibold">Total Complaints</Jet-Label>
                            <div class="text-end p-5 text-6xl font-semibold">
                                <span>{{this.complaintCount}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="w-11/12 h-fit m-auto p-5 shadow-xl ">
                        <div class="text-center  text-2xl font-semibold">Complaints</div>
                        <div >
                            <Bar class="font-bold" height="20%" :chart-data="chartData"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import JetLabel from '@/Components/InputLabel.vue';
    import  Bar  from '@/Components/Bar.vue'
    export default {
        setup() {
            
        },
        components:{
            AppLayout,
            JetLabel,
            Bar

        },
        props:{
            complaints:Object,
            complaintCount:Number,
            newComplaint:Number,
            month:Array
        },
        data(){
            return{
              
            }
        },
        computed:{
            chartData(){
                return{
                    
                    labels: [ 'January', 'February', 'March','April', 'May', 'June','July', 'August', 'September','October', 'November', 'December' ],
                    datasets: [ { 
                        label:['Complaints'],
                        data: this.month,
                        backgroundColor: 'rgb(85, 110, 252)',
                        
                    } ],
                   
                }
            },
         
    }
}
</script>