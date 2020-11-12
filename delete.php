<?php

//
// Rinominare il file in >> delete.php <<
// Copiare questo file all'interno del sito o directory dove eliminare i file.
// Questo file elimina il contenuto della cartella indicata alla fine del listato.
// Richiamare il file php
//
 
function remove($dirname = '.')
{
        if (is_dir($dirname))
        {
                echo "$dirname is a directory.<br />";
 
                if ($handle = @opendir($dirname))
                {
                        while (($file = readdir($handle)) !== false)
                        {
                                if ($file != "." && $file != "..")
                                {
                                        echo "$file<br />";
 
                                        $fullpath = $dirname . '/' . $file;
 
                                        if (is_dir($fullpath))
                                        {
                                                remove($fullpath);
                                                @rmdir($fullpath);
                                        }
                                        else
                                        {
                                                @unlink($fullpath);
                                        }
                                }
                        }
                        closedir($handle);
                }
        }
}
 
remove('.'); // Questa e' la directory che verrà svuotata. Usare '.' per eliminare l'intero sito dall'FTP, oppure inserire tra gli apici il nome della cartella da svuotare
 
?>