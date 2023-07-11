<template>
    <FullCalendar 
        :options='calendarOptions'
        @dateClick="handleDateClick()"
    />
</template>

<script>
import FullCalendar from '@fullcalendar/vue3';
import dayGridPlugin from '@fullcalendar/daygrid';
// import jaLocale from "@fullcalendar/core/locales/ja"; 日本語化

export default {
    components: {
        FullCalendar // make the <FullCalendar> tag available
    },
    
    data: function() {
        return {
            calendarOptions: {
                plugins: [dayGridPlugin],
                initialView: 'dayGridMonth',
                events: [],
                // locale: jaLocale, 日本語化
                headerToolbar: {
                    left: "myCustomButton",
                    center: "title",
                    right: "prev,next today"
                },
                default: true,
                height: '100vh',
                customButtons: {
                    myCustomButton: {
                        text: 'HOME',
                        // click: function() クリックした時の挙動
                    },
                }
            }
        }            
    },

    methods: {
        handleDateClick(arg) {
            if (confirm("新しいスケジュールを" + arg.dateStr + "に追加しますか ?")) {
                this.events.push({
                    // add new event data
                    title: "新規スケジュール",
                    start: arg.date,
                    allDay: arg.allDay
                });
            }
        }
    },
}
</script>
