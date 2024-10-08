<template>
    <FullCalendar 
        :options='calendarOptions'
    />
    <DayModal @close="closeModal" v-if="modal" :date ="date" ></DayModal>
</template>

<script>
import FullCalendar from '@fullcalendar/vue3';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from "@fullcalendar/interaction";
// import jaLocale from "@fullcalendar/core/locales/ja"; 日本語化

import DayModal from './DayModal.vue';

export default {
    components: {
        FullCalendar,
        DayModal,
    },
    
    data() {
        return {
            calendarOptions: {
                plugins: [ dayGridPlugin, interactionPlugin],
                initialView: 'dayGridMonth',
                events: [
                    {
                        title: '',
                        date: ''
                    }
                ],
                // locale: jaLocale, 日本語化
                headerToolbar: {
                    left: "myCustomButton",
                    center: "title",
                    right: "prev,next today"
                },
                dateClick: this.handleDateClick, // 必要
                default: true,
                height: '100vh',
                customButtons: {
                    myCustomButton: {
                        text: 'HOME',
                        click: function() {
                            location.href = '/top';
                        }
                    },
                }
            },
            modal: false,
            date: '',

        }            
    },

    methods: {
        handleDateClick(arg) {
            this.openModal(arg);
            this.date = arg.dateStr;
        },

        openModal() {
            this.modal = true
        },

        closeModal() {
            this.modal = false
        },

        async getHistories() {
            const res = await axios.post('/calendar/history')
            console.log(res.data);
            if (res.status === 200) {
                this.calendarOptions.events = res.data.map(item => ({
                    title: item.recipeTitle,
                    date: item.created_at.split('T')[0]
                }));
            }
        }

    },

    mounted() {
        this.getHistories();
    }

}
</script>
