<?php

	if(isset($_FILES['files'])) {
        $uploaddir = '../../storage/app/transfert/';
        $uploadfile = $uploaddir . basename($_FILES['files']['name'][0]);

        $files_length = count($_FILES['files']['tmp_name']);
        for ($i=0;$i<$files_length;$i++){

            $uploadfile = $uploaddir . basename($_FILES['files']['name'][$i]);
            if(move_uploaded_file($_FILES['files']['tmp_name'][$i], $uploadfile)) {



            } else {

                return "c'est pas bon";

            }
        }
        return 'nickel';

    }
?>