<template>
    <FullCalendar 
        :options='calendarOptions'
    />
</template>

<script>
import FullCalendar from '@fullcalendar/vue3';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from "@fullcalendar/interaction";
// import jaLocale from "@fullcalendar/core/locales/ja"; 日本語化

export default {
    components: {
        FullCalendar // make the <FullCalendar> tag available
    },
    
    data: function() {
        return {
            calendarOptions: {
                plugins: [ dayGridPlugin, interactionPlugin ],
                initialView: 'dayGridMonth',
                events: [
                    { title: 'event 1', date: '2023-07-11' },
                    { title: 'event 2', date: '2023-07-12' }
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
                        // click: function() クリックした時の挙動
                    },
                }
            }
        }            
    },

    methods: {
        handleDateClick(arg) {
            // if (confirm("新しいスケジュールを" + arg.dateStr + "に追加しますか ?")) {
            //     console.log(arg);
            //     this.events.push({
            //         // add new event data
            //         title: "新規スケジュール",
            //         start: arg.date,
            //         allDay: arg.allDay
            //     });
            // }
        }
    },
}
</script>
