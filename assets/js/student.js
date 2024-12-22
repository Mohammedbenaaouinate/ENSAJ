$(document).ready(function () {
  // Print Planning With
  // Récupérer l'URL actuelle
  var url = window.location.href;
  // Créer un objet URL pour accéder aux paramètres
  var urlParams = new URL(url);
  // Récupérer la valeur du paramètre 'action'
  var action = urlParams.searchParams.get("action");
  if (action == "printed_school_certicate_by_student") {
    $("#scholl_certificate").width("650px");
    $("#scholl_certificate").height("980px");
    $("#scholl_certificate").print({
      addGlobalStyles: true,
      stylesheet: null,
      rejectWindow: true,
      noPrintSelector: ".no-print",
      iframe: true,
      append: null,
      prepend: null,
    });
  }
});
