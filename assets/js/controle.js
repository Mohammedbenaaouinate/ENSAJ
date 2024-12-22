$(document).ready(function(){
    //  Button Of Confirmation For Delete Student
        $(".delete_button").on("click", function(event){
            let firstname=$(this).data("firstname");
            let lastname=$(this).data("lastname");
            let decision = confirm(`Voulez-vous vraiment supprimer l'étudiant ${firstname} ${lastname} ?`);
            if (decision === false) {
                event.preventDefault();
            }
        });
    // Button Of Confirmation For Delete Teacher
        $(".delete_button_teacher").on("click", function(event){
            let firstname=$(this).data("firstname");
            let lastname=$(this).data("lastname");
            let decision = confirm(`Voulez-vous vraiment supprimer le Professeur ${firstname} ${lastname} ?`);
            if (decision === false) {
                event.preventDefault();
            }
        });
    // Button Of Confirmation For Delete admin

        $(".delete_button_admin").on("click", function(event){
            let firstname=$(this).data("firstname");
            let lastname=$(this).data("lastname");
            let decision = confirm(`Voulez-vous vraiment supprimer l'administrateur ${firstname} ${lastname} ?`);
            if (decision === false) {
                event.preventDefault();
            }
        });
    // Button Of Confirmation For Delete librarian

        $(".delete_button_librarian").on("click", function(event){
            let firstname=$(this).data("firstname");
            let lastname=$(this).data("lastname");
            let decision = confirm(`Voulez-vous vraiment supprimer le bibliothécaire ${firstname} ${lastname} ?`);
            if (decision === false) {
                event.preventDefault();
            }
        });
    // Buttton Of Confirmation For DELETE Scolarité Members

    $(".delete_button_scolarite").on("click", function(event){
            let firstname=$(this).data("firstname");
            let lastname=$(this).data("lastname");
            let decision = confirm(`Voulez-vous vraiment supprimer le membres de Scolarité:  ${firstname} ${lastname} ?`);
            if (decision === false) {
                event.preventDefault();
            }
    });

    // Button Of Confirmation For Delete Specialization

         $(".delete_button_specialization").on("click", function(event){
            let specialization=$(this).data("specialization");
            let decision = confirm(`Voulez-vous vraiment supprimer la filière : ${specialization} ?`);
            if (decision === false) {
                event.preventDefault();
            }
        });
        
    // Button Of Confirmation For Delete  Subject
        $(".delete_button_subject").on("click", function(event){
            let subjectname=$(this).data("subjectname");
            let decision = confirm(`Voulez-vous vraiment supprimer le Module ${subjectname} ?`);
            if (decision === false) {
                event.preventDefault();
            }
        });
    // Botton de Confirmation Pour la Suppresions d'un élément de module
        $(".delete_element_button").on("click", function(event){
            let elementname =$(this).data("elementname");
            let decision = confirm(`Voulez-vous vraiment supprimer L'élement ${elementname} ?`);
            if (decision === false) {
                event.preventDefault();
            }
        });
        
        // Button pour la confirmation de la suppression du module avec élément
        $(".delete_module_avec_element").on("click", function(event){
            let modulename =$(this).data("modulename");
            let decision = confirm(`Voulez-vous vraiment supprimer Le module ${modulename} ?`);
            if (decision === false) {
                event.preventDefault();
            }
        });
        // Select Classe on Select Firstly  Specialization
        $("#select_sepecialization").change(function(){
                let val=$(this).val();
                if(val!=0){
                        $.ajax({
                            method:"POST",
                            url:"index.php?action=get_classes_of_one_specification",
                            data:{specialization_id:val},
                            success:function(result){
                                    let specialization=$("#select_class");
                                    specialization.html("");
                                    specialization.append("<option value=''>Sélectionnez la Classe</option>");
                                    let classes=JSON.parse(result);
                                    $.each(classes,function(index,classe){
                                        specialization.append('<option value="'+classe.class_id+'">'+classe.class_name+'</option>');
                                    });
                                
                            }
                        });
                }
                   
        });
        // SELECT ALL PROFFESUER IN THE SAME DEPARTAMENT ON CHANGE DEPARTEMENT (ON ADD DEPARTEMENT)
        $("#select_departement").change(function(){
                let val=$(this).val();
                if(val!=0){
                            $.ajax({
                                    method:"POST",
                                    url:"index.php?action=get_professeurs_of_same_departement",
                                    data:{departement_id:val},
                                    success:function(result){
                                        let coordonnateur=$("#select_coordonnateur");
                                        coordonnateur.html("");
                                        coordonnateur.append("<option value=''>Sélectionnez le coordonnateur </option>");
                                        let professeurs=JSON.parse(result);
                                        $.each(professeurs,function(index,Professeur){
                                            coordonnateur.append('<option value="'+Professeur.prof_id+'">'+Professeur.firstname+ "  "+ Professeur.lastname +'</option>');
                                        });

                                    }
                                    
                            })
                }else{
                    console.log("No Value");
                }
               
        })
        // Function To Prevent retrasmission of Form When The Page Refreched
        // if (window.history.replaceState) {
        //     window.history.replaceState(null, null, window.location.href);
        // }
        // Print Planning With
        $("#print_button").on("click",function(){
                    $("#print_planning").print({
                        addGlobalStyles : true,
                        stylesheet : null,
                        rejectWindow : true,
                        noPrintSelector : ".no-print",
                        iframe : true,
                        append : null,
                        prepend : null
                    });

        });
        // Print The Student Classe On click In This button
        $("#print_student_button").on("click",function(){
                    var table=$("#print_student_classe");
                    $(".dataTables_filter").css("display","none");
                    $(".dataTables_length").css("display","none");
                    $(".text-end").css("display","none");
                    $(".dataTables_paginate").css("display","none");
                    $(".dataTables_info").css("display","none");
                    if ($('.datatable').length > 0) { $('.datatable').DataTable({"destroy": true,"ordering": false,"searching":false, "paging": false, "info": false,}); };
                    $("th").removeClass("sorting_asc");
                    table.print({
                                addGlobalStyles : true,
                                stylesheet : null,
                                rejectWindow : true,
                                noPrintSelector : ".no-print",
                                iframe : true,
                                append : null,
                                prepend : null,
                    });
                    $(".dataTables_filter").css("display","block");
                    $(".dataTables_length").css("display","block");
                    $(".text-end").css("display","block");
                    $(".dataTables_paginate").css("display","block");
                    $(".dataTables_info").css("display","block");
                    console.log("Hello Friends Code Executed Correctly");
        });

      
        console.log("Hello Friend");
});
    
