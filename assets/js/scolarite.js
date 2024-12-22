$(document).ready(function () {
  // Print Planning With
  $("#imprimer_certificat").on("click", function () {
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
  });

  // Print temporarily_withdrawn
  $("#imprimer_temporarily").on("click", function () {
    $("#temporarily_withdrawn").width("650px");
    $("#temporarily_withdrawn").height("980px");
    $("#temporarily_withdrawn").print({
      addGlobalStyles: true,
      stylesheet: null,
      rejectWindow: true,
      noPrintSelector: ".no-print",
      iframe: true,
      append: null,
      prepend: null,
    });
  });

  // Print The Agreement Internship

  $("#imprimer_convention").on("click", function () {
    $("#internship-agreement").print({
      addGlobalStyles: true,
      stylesheet: null,
      rejectWindow: true,
      noPrintSelector: ".no-print",
      iframe: true,
      append: null,
      prepend: null,
    });
  });

  // Print Absence List
  $("#print_absence_list").on("click", function () {
    $("#absence_list").print({
      addGlobalStyles: true,
      stylesheet: null,
      rejectWindow: true,
      noPrintSelector: ".no-print",
      iframe: true,
      append: null,
      prepend: null,
    });
  });

  // Select Classe on Select Firstly  Specialization
  $("#select_sepecialization").change(function () {
    let val = $(this).val();
    if (val != 0) {
      $.ajax({
        method: "POST",
        url: "index.php?action=get_classes_of_one_specification",
        data: { specialization_id: val },
        success: function (result) {
          let specialization = $("#select_class");
          specialization.html("");
          specialization.append(
            "<option value=''>Sélectionnez la Classe</option>"
          );
          let classes = JSON.parse(result);
          $.each(classes, function (index, classe) {
            specialization.append(
              '<option value="' +
                classe.class_id +
                '">' +
                classe.class_name +
                "</option>"
            );
          });
        },
      });
    }
  });
  //After Select Semester Display the Module And The Module Element Specific For cette classe
  $("#select_semester").change(function () {
    let semester_id_val = $(this).val();
    let class_id_val = $("#class_id_value").val();
    if (semester_id_val != 0) {
      // Display All Module Without Element
      $.ajax({
        method: "POST",
        url: "index.php?action=get_all_module_without_element",
        data: { semester_id: semester_id_val, class_id: class_id_val },
        success: function (result) {
          let moduleSelect = $("#select_module");
          moduleSelect.html("");
          moduleSelect.append(
            "<option value=''>Sélectionnez le module</option>"
          );
          let modules = JSON.parse(result);
          $.each(modules, function (index, module) {
            moduleSelect.append(
              '<option value="' +
                module.modul_id +
                '">' +
                module.modul_name +
                "</option>"
            );
          });
        },
      });
      // Dispalay des Module With Element
      $.ajax({
        method: "POST",
        url: "index.php?action=get_all_module_with_element",
        data: { semester_id: semester_id_val, class_id: class_id_val },
        success: function (result) {
          let Modules_Elements = $("#select_module_with_element");
          Modules_Elements.html("");
          Modules_Elements.append(
            "<option value=''>Sélectionnez le module</option>"
          );
          let Modules = JSON.parse(result);
          $.each(Modules, function (index, Module) {
            Modules_Elements.append(
              '<option value="' +
                Module.module_id +
                '">' +
                Module.module_name +
                "</option>"
            );
          });
        },
      });
    }
  });
});
