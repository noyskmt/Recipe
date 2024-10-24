<template>
    <FullCalendar 
        :options='calendarOptions'
    />
    <DayModal
        v-if="modal" 
        :date = "selectedEvent.date"
        :recipeTitle="selectedEvent.title"
        @close="closeModal()" 
        @update="getHistories()"
    />
</template>

<script>
import FullCalendar from '@fullcalendar/vue3';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from "@fullcalendar/interaction";
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
                events: [],
                headerToolbar: {
                    left: "myCustomButton",
                    center: "title",
                    right: "prev,next today"
                },
                dateClick: this.handleDateClick,
                eventClick: this.handleEventClick,
                // eventClick: this.handleEventClick,
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
            selectedEvent: {
                date: '',
                title: '',
            },
        };
    },

    methods: {
        handleDateClick(info) {
            this.selectedEvent = {
                date: info.dateStr, // クリックした日付
                title: '', // 料理名は空
            };
            this.openModal();
        },
        async handleEventClick(info) {
            info.jsEvent.preventDefault();
            if (info.event.url === "null") {
                this.selectedEvent = {
                    date: info.event.startStr,
                    title: info.event.title,
                };
                this.openModal();
            } else {
                window.open(info.event.url);
            }
        },
        openModal() {
            this.modal = true
        },
        closeModal() {
            this.modal = false
        },
        async getHistories() {
            const res = await axios.post('/calendar/history')
            if (res.status === 200) {
                this.calendarOptions.events = res.data.map(item => ({
                    title: item.recipe_title,
                    date: item.created_at.split('T')[0],
                    url: item.recipe_url
                }));
            }
        }
    },
    mounted() {
        this.getHistories();
    }
}
</script>
