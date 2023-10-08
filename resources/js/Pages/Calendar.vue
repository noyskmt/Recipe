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
        FullCalendar, // make the <FullCalendar> tag available,
        DayModal,
    },
    
    data() {
        return {
            calendarOptions: {
                plugins: [ dayGridPlugin, interactionPlugin],
                initialView: 'dayGridMonth',
                events: [],
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

    },

}
</script>
