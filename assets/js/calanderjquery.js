$(document).ready(function () {
  var calendar = $("#Admin_calender").fullCalendar({
    header: {
      left: "month,agendaWeek,agendaDay,list",
      center: "title",
      right: "prev,today,next",
    },
    events: "index.php?action=displayEvents",
    selectable: true,
    selectHelper: true,
    // Add Color To The Current Date
    dayRender: function (date, cell) {
      var today = $.fullCalendar.moment();
      if (date.get("date") == today.get("date")) {
        cell.css("background", "#00a8ff");
      }
    },
    eventMouseover: function (calEvent, jsEvent) {
      var tooltip =
        '<div class="tooltipevent" style="width:400px;height:auto;background:#ccc;position:absolute;padding:10px;z-index:10001;">' +
        calEvent.description +
        "</div>";
      var $tooltip = $(tooltip).appendTo("body");

      $(this)
        .mouseover(function (e) {
          $(this).css("z-index", 10000);
          $tooltip.fadeIn("500");
          $tooltip.fadeTo("10", 1.9);
        })
        .mousemove(function (e) {
          $tooltip.css("top", e.pageY + 10);
          $tooltip.css("left", e.pageX + 20);
        });
    },

    eventMouseout: function (calEvent, jsEvent) {
      $(this).css("z-index", 8);
      $(".tooltipevent").remove();
    },
    // EventClick Pour Supprimer un évenment From Data BASE
    eventClick: function (event) {
      $("#editEvent").modal("toggle");
      var id = event.id;
      // Ajax Request For Desplaying Information IN Edit Modal
      $.ajax({
        url: "index.php?action=edit_event",
        type: "POST",
        data: { event_id: id },
        success: function (result) {
          event = JSON.parse(result);
          $("#event_id").val(event.event_id);
          $("#event_title").val(event.event_title);
          $("#start_date").val(event.start_date);
          $("#end_date").val(event.end_date);
          $("#description").val(event.description);
          $("#color").val(event.color);
        },
      });
    },
  });
  $("#delete_event_button").on("click", function () {
    if (confirm("Êtes-vous sûr de vouloir supprimer cet événement ?")) {
      let id = $("#event_id").val();
      $.ajax({
        url: "index.php?action=delete_event",
        type: "POST",
        data: { event_id: id },
        success: function () {
          calendar.fullCalendar("refetchEvents");
          $("#editEvent").modal("toggle");
        },
      });
    }
  });
});
