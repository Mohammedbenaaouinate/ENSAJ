$(document).ready(function () {
  $("#rowsContainer").on("change", ".select_professeur", function () {
    let val = $(this).val();

    if (val != 0) {
      $.ajax({
        method: "POST",
        url: "index.php?action=get_list_module",
        data: { prof_id: val },
        success: function (result) {
          let row = $(this).closest(".row");
          let module_element = row.find(".select_module_element");

          module_element.html("");
          module_element.append(
            "<option value=''>Sélectionnez le module/element</option>"
          );
          let modules = JSON.parse(result);

          $.each(modules, function (index, module) {
            module_element.append(
              '<option value="' +
                module.modul_name +
                '">' +
                module.modul_name +
                "</option>"
            );
          });
        }.bind(this),
      });
    }
  });
  $("#print_button_head").on("click", function () {
    $("#student_list").print({
      addGlobalStyles: true,
      stylesheet: null,
      rejectWindow: true,
      noPrintSelector: ".hide_on_print",
      iframe: true,
      append: null,
      prepend: null,
    });
  });

  // $("#select_professeur").change(function(){
  //         let val=$(this).val();
  //         console.log(val);

  //         if(val!=0){
  //                 $.ajax({
  //                     method:"POST",
  //                     url:"index.php?action=get_list_module",
  //                     data:{prof_id:val},
  //                     success:function(result){
  //                             let module_element=$("#select_module_element");
  //                             module_element.html("");
  //                             module_element.append("<option value=''>Sélectionnez le module/element</option>");
  //                             let modules=JSON.parse(result);
  //                             $.each(modules,function(index,module){
  //                                 module_element.append('<option value="'+module.modul_id+'">'+module.modul_name+'</option>');
  //                             });

  //                     }
  //                 });
  //         }

  // });
  // SELECT ALL PROFFESUER IN THE SAME DEPARTAMENT ON CHANGE DEPARTEMENT (ON ADD DEPARTEMENT)
  // $("#select_departement").change(function(){
  //         let val=$(this).val();
  //         if(val!=0){
  //                     $.ajax({
  //                             method:"POST",
  //                             url:"index.php?action=get_professeurs_of_same_departement",
  //                             data:{departement_id:val},
  //                             success:function(result){
  //                                 let coordonnateur=$("#select_coordonnateur");
  //                                 coordonnateur.html("");
  //                                 coordonnateur.append("<option value=''>Sélectionnez le coordonnateur </option>");
  //                                 let professeurs=JSON.parse(result);
  //                                 $.each(professeurs,function(index,Professeur){
  //                                     coordonnateur.append('<option value="'+Professeur.prof_id+'">'+Professeur.firstname+ "  "+ Professeur.lastname +'</option>');
  //                                 });

  //                             }

  //                     })
  //         }else{
  //             console.log("No Value");
  //         }

  // })

  // console.log("gggg");
});
