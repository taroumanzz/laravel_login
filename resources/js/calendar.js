import { Calendar } from "@fullcalendar/core";
import interactionPlugin from "@fullcalendar/interaction";
import dayGridPlugin from "@fullcalendar/daygrid";

var calendarEl = document.getElementById("calendar");

let calendar = new Calendar(calendarEl, {
    plugins: [interactionPlugin, dayGridPlugin],
    initialView: "dayGridMonth",
    headerToolbar: {
        left: "prev today",
        center: "title",
        right: "next",
    },
    locale: 'ja',

    // 日付をクリック、または範囲を選択したイベント
    selectable: true,
    select: function (info) {
        const eventName = prompt("イベントを入力してください");

        if (eventName) {
            // イベントの追加
            calendar.addEvent({
                title: eventName,
                start: info.start,
                end: info.end,
                allDay: true,
            });
        }
    },
});
calendar.render();
