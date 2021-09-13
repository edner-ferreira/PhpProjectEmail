<?php
   include_once('config.php');
   include_once('sendMail.php');

   date_default_timezone_set('America/Sao_Paulo');
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.hero-image {
  background-image: url("/fotos/PRIZE-DRAW-SAINT-JOHN-2.jpg");
  background-color: #cccccc;
  height: 350px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

.hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}
</style>
    </head>
    <body>
        <div class="hero-image">
            <div class="hero-text">
            </div>
        </div>
        <br>
 <?php
        echo  '<div class="form-container">';           
         //   echo '<div class="topoFormulario">Preencha os campos abaixo para se cadastrar';
        echo  '<form class="formulario" method="post" action="">';

                echo  '<label>Preencha os campos abaixo e cadastrar-se</label><br><br>';

                echo  '<input type="text" id="nome" name="nome" placeholder="Nome *" /><br>';

                echo  '<input type="text" id="telefone" name="telefone" placeholder="WhatsApp *" /><br>';

                echo  '<input type="email" id="email" name="email" placeholder="E-mail *" /><br>';

                echo  '<input type="text" id="end_rua" name="end_rua" placeholder="Endereço: Rua + nº) *" /><br>';

                echo  '<input type="text" id="end_bairro" name="end_bairro" placeholder="Bairro *" /><br>';
                
                echo  '<input type="text" id="end_cep" name="end_cep" placeholder="CEP *" /><br>';

                echo  '<input type="text" id="end_cidade" name="end_cidade" placeholder="Cidade *" /><br>';

                echo  '<select id="end_estado" name="end_estado">
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>';
                echo  '<br>';
                echo  '<input type="submit" name="ideapro_submit_form" value="INSCREVA-SE" />';

        echo  '</form>';
        echo  '</div>';
       // echo  '</div>';
        echo  '<style>
                    .form-container {
                        display: flex;
                        justify-content: center;
                  }
                  .topoFormulario{
                       background: #295c53;
                       color: #fff;
                       padding: 20px 20px 30px;
                       width: 50%;
                  }
                   .formulario{
                       padding: 20px 20px 30px;
                       background: #ece5df;
                       width: 85%;
                       text-align: center;
                   }
                   .formulario label{
                       background: #295c53;
                       color: #fff;
                       width: 95%;
                       border: 1px solid #d9d8d4;
                       margin-bottom: 10px;
                       padding: 10px;
                       border-radius: 5px;

                   }
                   .formulario input{
                        width: 85%;
                        border: 1px solid #d9d8d4;
                        background: #fff;
                        margin-bottom: 10px;
                        padding: 15px;
                        border-radius: 5px;
                    }
                    .formulario input[type="submit"]{
                        background: #51a550;
                        color: #fff;
                    }
                    .formulario input:focus {
                        border-color: #2d3940;
                        color: #3e3e3e;
                    }
                    .formulario select{
                        width: 85%;
                        border: 1px solid #d9d8d4;
                        background: #fff;
                        margin-bottom: 10px;
                        padding: 10px;
                        border-radius: 5px;
                    }
                    .formulario select:focus {
                        border-color: #2d3940;
                        color: #3e3e3e;
                    }
            </style>';
        
        if(array_key_exists('ideapro_submit_form',$_POST)){        
                $nome = $_POST['nome'];
                $telefone = $_POST['telefone'];
                $email = $_POST['email'];
                $end_rua = $_POST['end_rua'];
                $end_bairro = $_POST['end_bairro'];
                $end_cep = $_POST['end_cep'];
                $end_cidade = $_POST['end_cidade'];
                $end_estado = $_POST['end_estado'];
                $numero_sorteio = numberRand();
                $data = date('Y-m-d H:i:s');
                //echo $data, $nome, $telefone, $numero_sorteio, $end_rua, $end_bairro, $end_cep, $end_cidade, $end_estado, $email;
                if($nome=='' || $telefone=='' || $numero_sorteio=='' || $end_rua=='' 
                    || $end_bairro=='' || $end_cep=='' || $end_cidade=='' || $end_estado=='' || $data=='' || $email=='' || $numero_sorteio== -1){
                    echo $numero_sorteio != -1 ? 'Nenhum campo pode estar vazio.' : 'Todos os números para sorteio já foram lançados.';
                } else {
                    $cadastro = mysqli_query($conexao, "INSERT INTO db_sorteio (data, nome, telefone, email, numero_sorteio, end_rua, end_bairro, end_cep, end_cidade, end_estado) VALUES ('$data', '$nome', '$telefone', '$email', '$numero_sorteio', '$end_rua', '$end_bairro', '$end_cep', '$end_cidade', '$end_estado')");
                    if(!$cadastro){
                        echo 'Error';
                    } else {
                        $message = "Ola ".$nome." você esta participando do nosso sorteio, o seu número da sorte é ".$numero_sorteio;
                        sendMessage($nome, $numero_sorteio, $telefone, $message);
                        sendEmail($email, $message);
                        echo 'Cadastro Efetuado.';
                    }
                }
                echo '<div id="setting-error-settings-updated" class="updated_settings_error notice is-dismissible"><strong><?= $mensagem ?></strong></div>';
            }
            
//            function criar_banco(){
//            global $wpdb;
//            $wpdb->query('CREATE TABLE IF NOT EXISTS `'.$wpdb->prefix.'whatsapp` (
//                  `id` int(11) NOT NULL AUTO_INCREMENT,
//                  `data` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
//                  `nome` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
//                  `numero_sorteio` int(11) NOT NULL,
//                  `telefone` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
//                  `end_rua` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
//                  `end_bairro` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
//                  `end_cep` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
//                  `end_cidade` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
//                  `end_estado` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
//                  PRIMARY KEY (`id`),
//                ) ENGINE=InnoDB '.$wpdb->get_charset_collate().';');
//            //echo $wpdb->last_error;
//            }
//        add_action('admin_init','criar_banco');

    ?>

    <!--        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

        <script>
            jQuery(document).ready(function(){
                jQuery("#telefone").mask("(99) 9 9999-9999");
            })
            jQuery(document).ready(function(){
                jQuery("#formCEP").mask("99999-999");
            });
        </script>-->
    </body>
    
</html>

<?php
    function numberRand(){
        $min = 0;
        $max = 999;
        $condNumber = true;
        $numberAux = null;
        $number_sort = 0;
        global $conexao;

        $registros = mysqli_query($conexao, "SELECT numero_sorteio FROM db_sorteio");
        //echo $registros->num_rows;
        if($registros->num_rows >= 1 && $registros->num_rows < 1000){
            while($condNumber){
                $number_sort = rand($min, $max);
                while ($registro = $registros->fetch_assoc()) {
//                        echo $registro["numero_sorteio"];
                    if($registro['numero_sorteio'] == $number_sort){
                        $numberAux = $registro["numero_sorteio"];
                    }       
                }
//                $numberAux = $numberAux != null ? $numberAux : -1;
                if($numberAux == $number_sort){
                    $condNumber = true;
                 }else{
                    $condNumber = false;
                 }
            }
            return $number_sort;
        }else if($registros->num_rows >= 1000){
            $number_sort = -1;
            return $number_sort;
        }else{
            $number_sort = rand($min, $max);
            return $number_sort;
        }
    }

    function sendMessage($nome, $numero_sorteio, $telefone, $message){

        $messageAux = utf8_decode (str_replace(" ", "%20", $message));

        $url = "http://18.229.132.45:3000/sendText?sessionName=one&number=55".$telefone."&text=".$messageAux;
       // echo $url;

        $cURLConnection = curl_init();

        curl_setopt($cURLConnection, CURLOPT_URL, $url);
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

        curl_exec($cURLConnection);
        curl_close($cURLConnection);
    }
    
?>


