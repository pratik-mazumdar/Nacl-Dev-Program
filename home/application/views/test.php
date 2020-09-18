<form action="filepond_upload" method="post" id="contactForm" novalidate="novalidate" enctype="multipart/form-data">
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                        <input id="game_zip" name="game" type="file" multiple >  
                        <input type="submit">               
</form>
<?php $data = array(1,2,3,4,5,6);
        for($i=0;$i<5;$i++){?>
                <table>

                </table>
<?php
        }
?>
