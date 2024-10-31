<template>
    <FullCalendar 
        :options='calendarOptions'
    />
    <DayModal
        v-if="modal" 
        :id = "selectedEvent.id"
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
                eventDidMount: this.handleEventDidMount,
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
                id: null,
                date: '',
                title: '',
            },
        };
    },

    methods: {
        handleDateClick(info) {
            this.selectedEvent = {
                id: null,
                date: info.dateStr, // クリックした日付
                title: '', // 料理名は空
            };
            this.openModal();
        },
        async handleEventClick(info) {
            console.log(info.event.id);
            info.jsEvent.preventDefault();
            if (info.event.url === "null") {
                this.selectedEvent = {
                    id : info.event.id,
                    date: info.event.startStr,
                    title: info.event.title,
                };
                this.openModal();
            } else {
                window.open(info.event.url);
            }
        },
        handleEventDidMount(info) {
            info.el.addEventListener('contextmenu', async (e) => {
                e.preventDefault(); // デフォルトの右クリックメニューを無効化
                
                const confirmDelete = confirm(`イベント「${info.event.title}」を削除しますか？`);
                if (confirmDelete) {
                // サーバーでイベントを削除
                await this.deleteEvent(info.event.id);
                // カレンダーからイベントを削除
                info.event.remove();
                }
            });
        },

        // サーバーからイベントを削除するメソッド
        async deleteEvent(eventId) {
            try {
                const res = await axios.post('/calendar/history/delete', {
                id: eventId, // イベントIDをサーバーに送信
                });
                if (res.status === 200) {
                alert('イベントが削除されました');
                } else {
                alert('削除に失敗しました');
                }
            } catch (error) {
                console.error("削除エラー:", error);
                alert('サーバーとの通信エラーが発生しました');
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
                    id: item.id,
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
