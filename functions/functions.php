<?php
        function Redirect($page){
            header("Location:$page");
            exit();
        }
        function redirectwithPost($page,$status,$message){?>
        <form action="<?=$page?>" method="post" id="redirect_function">
                <input type="hidden" name="status" value="<?= $status ?>">
                <input type="hidden" name="message" value="<?= $message ?>">
        </form>
        <script>
            document.getElementById("redirect_function").submit();
        </script>         
       <?php }
?>