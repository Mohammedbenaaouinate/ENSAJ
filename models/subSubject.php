<?php
            // Function To get All Specialization
            function obtenirFilieres(){
                        $conn=ConnectToDB();
                        $stm=$conn->prepare("SELECT * FROM specialization");
                        $stm->execute();
                        $result=$stm->fetchAll(PDO::FETCH_ASSOC);
                        return $result;
            }
            // Function To get All Semestres
            function obtenirSemestres(){
                        $conn=ConnectToDB();
                        $stm=$conn->prepare("SELECT * FROM semester");
                        $stm->execute();
                        $result=$stm->fetchAll(PDO::FETCH_ASSOC);
                        return $result;
            }
            // Function Pour Insérer Les Modules Qui Contient des éléments

            function ajouterModule($modul_code,$modul_name,$class_id,$semester_id){
                            $conn=ConnectToDB();
                            $stm=$conn->prepare("INSERT INTO modul_info(`modul_code`,`modul_name`,`class_id`,`semester_id`)
                            VALUES (:modul_code,:modul_name,:class_id,:semester_id)");
                            $stm->bindParam(":modul_code",$modul_code);
                            $stm->bindParam(":modul_name",$modul_name);
                            $stm->bindParam(":class_id",$class_id);
                            $stm->bindParam(":semester_id",$semester_id);
                            $stm->execute();
                            return $stm->rowCount()>0;
            }
            // Fonction Pour Obtenir Tous Les informations pour les modules et sous Modules
            function obtenirmodulesElements(){
                        $conn=ConnectToDB();
                        $stm=$conn->prepare("SELECT sub_module.sub_module_code, sub_module.sub_module_name,
                         professeur.firstname, professeur.lastname, modul_info.modul_code,modul_info.modul_name 
                        FROM sub_module INNER JOIN modul_info ON modul_info.modul_code = sub_module.modul_code 
                        INNER JOIN professeur ON professeur.prof_id = sub_module.prof_id
                        WHERE sub_module.modul_code=modul_info.modul_code ORDER BY modul_info.modul_code");
                        $stm->execute();
                        $result=$stm->fetchAll(PDO::FETCH_ASSOC);
                        return $result;
            }
            // Fonction pour Obtenir Les informations unique Sur Un Module
            function obtenirmodulesInformation(){
                        $conn=ConnectToDB();
                        $stm=$conn->prepare("SELECT modul_info.modul_code,modul_info.modul_name,semester.semester_name,
                        classe.class_name FROM modul_info INNER JOIN semester ON semester.semester_id=modul_info.semester_id 
                        INNER JOIN classe ON classe.class_id=modul_info.class_id");
                        $stm->execute();
                        $result=$stm->fetchAll(PDO::FETCH_ASSOC);
                        return $result;
            }
            //  Function Pour Supprimer Un élément A partir de Son Code

            function supprimerElement($sub_module_code){
                        $conn=ConnectToDB();
                        $stm=$conn->prepare("DELETE FROM sub_module WHERE sub_module_code=:sub_module_code");
                        $stm->bindParam(":sub_module_code",$sub_module_code);
                        $stm->execute();
                        return $stm->rowCount();
            }
            // Function Pour Obtenir Tous Les Professeur et les Administrateur
            function obtenirProffesseurs(){
                    $prof_id=1;
                    $admin_id=2;
                    $conn=ConnectToDB();
                    $stm=$conn->prepare("SELECT * FROM professeur WHERE role_prof=:prof_id OR role_prof=:admin_id");
                    $stm->bindParam(":prof_id",$prof_id);
                    $stm->bindParam(":admin_id",$admin_id);
                    $stm->execute();
                    $result=$stm->fetchAll(PDO::FETCH_ASSOC);
                    return $result;
            }
            // Fonction Pour Ajouter un élément a la base de données 
            function ajouterelementAction($sub_module_code,$sub_module_name,$prof_id,$modul_code){
                                $conn=ConnectToDB();
                                $stm=$conn->prepare("INSERT INTO sub_module(`sub_module_code`,`sub_module_name`,
                                `prof_id`,`modul_code`) VALUES(:sub_module_code,:sub_module_name,:prof_id,:modul_code)");
                                $stm->bindParam(":sub_module_code",$sub_module_code);
                                $stm->bindParam(":sub_module_name",$sub_module_name);
                                $stm->bindParam(":prof_id",$prof_id);
                                $stm->bindParam(":modul_code",$modul_code);
                                $stm->execute();
                                return $stm->rowCount() >0;
            }
            // Fonction Pour Supprimer Un Modèle A partir de la base de données 
            function sumpprimermoduleaction($modul_code){
                                $conn=ConnectToDB();
                                $stm=$conn->prepare("DELETE FROM modul_info WHERE modul_code=:modul_code");
                                $stm->bindParam(":modul_code",$modul_code);
                                $stm->execute();
                                return $stm->rowCount()>0;
            }
            // Fonction Pour obtenir Les informations Associée a un Module Spécifique
           function obetenirinformationmodule($modul_code){
                         $conn=ConnectToDB();
                         $stm=$conn->prepare("SELECT modul_info.modul_code,modul_info.modul_name,semester.semester_name,semester.semester_id, 
                         classe.class_id, classe.class_name,specialization.specialization_id 
                         FROM modul_info INNER JOIN semester ON semester.semester_id=modul_info.semester_id
                         INNER JOIN classe ON classe.class_id=modul_info.class_id 
                         INNER JOIN specialization ON classe.specialization_id=specialization.specialization_id 
                         WHERE modul_info.modul_code=:modul_code LIMIT 1");
                        $stm->bindParam(":modul_code",$modul_code);
                        $stm->execute();
                        $result=$stm->fetch(PDO::FETCH_ASSOC);
                        return $result;
           }
           // Fonction pour obtenir les différent classes Assoicié une filière

           function obtenirClasses($specialization_id){
                        $conn=ConnectToDB();
                        $stm=$conn->prepare("SELECT * FROM classe WHERE specialization_id=:specialization_id");
                        $stm->bindParam(":specialization_id",$specialization_id);
                        $stm->execute();
                        $result=$stm->fetchAll(PDO::FETCH_ASSOC);
                        return $result;
           }

           // Fonction pour obtenir les différentes filières

           function obtenirSpecialization(){
                        $conn =ConnectToDB();
                        $stm=$conn->prepare("SELECT * FROM specialization");
                        $stm->execute();
                        $result=$stm->fetchAll(PDO::FETCH_ASSOC);
                        return $result;
           }


           //Fonction pour fait la mise à jour des informations concernant un Module

           function miseajourmoduleaction($modul_code,$modul_name,$class_id,$semester_id){
                        $conn=ConnectToDB();
                        $stm=$conn->prepare("UPDATE modul_info SET `modul_name`=:modul_name,`class_id`=:class_id,`semester_id`=:semester_id
                                WHERE `modul_code`=:modul_code
                        ");
                        $stm->bindParam(":modul_name",$modul_name);
                        $stm->bindParam(":class_id",$class_id);
                        $stm->bindParam(":semester_id",$semester_id);
                        $stm->bindParam(":modul_code",$modul_code);
                        $stm->execute();
                        return $stm->rowCount() >0;
           }
?>    
