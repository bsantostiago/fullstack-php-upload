<?php
require_once "Banco.php";

class Imagem {
    private int $id;
    private string $nome;
    private string $arquivo;

    private PDO $conexao;

    public function __construct(){
        $this->conexao = Banco::conecta();
    }
    
    public function lerImagens():array {
        $sql = "SELECT * FROM imagens ORDER BY nome";

        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $erro){
            die("Erro: ".$erro->getMessage());
        }

        return $resultado;
    } // fim lerImagens   

    public function inserirImagem(){
        /* arquivo é apenas uma referência ao arquivo da imagem */
        $sql = "INSERT INTO imagens(nome, arquivo) VALUES(:nome, :arquivo)";
        try{
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindParam(':nome', $this->nome, PDO::PARAM_STR);
            $consulta->bindParam(':arquivo', $this->arquivo, PDO::PARAM_STR);
            $consulta->execute();
        } catch(Exception $erro){
            die("Erro: ".$erro->getMessage());
        }
    } // fim inserirImagem


    public function upload($arquivo){
        /* Array contendo os tipos válidos (mime types) */
        $tiposValidos = [
            "image/jpeg",
            "image/png",
            "image/gif",
            "image/svg+xml"
        ];

        /* Validando os tipos
        Se NÃO for um tipo válido existente no array 
        de tipos... */
        if( !in_array($arquivo["type"], $tiposValidos) ){
        // pare o script e exiba a mensagem:
            exit("<p>Formato não permitido - <a href='index.php'>Voltar</a></p>");
        } 

        /* Processo de upload */

        // Acessando propriedades do arquivo
        $nome = $arquivo["name"]; 
        $temporario = $arquivo["tmp_name"];

        // Determinar o local para onde o arquivo será enviado
        $destino = "imagens/".$nome; 

        // Fazendo a transferência
        if(move_uploaded_file($temporario, $destino)){
            return true;
        } else {
            return false;
        }
    }


    /* Getters e Setters para o acesso das propriedades */
    public function getId():int{
        return $this->id;
    }

    public function getNome():string{
        return $this->nome;
    }

    public function getArquivo():string{
        return $this->arquivo;
    }

    public function setId(int $id){
        $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    }

    public function setNome(string $nome){
        $this->nome = filter_var($nome, FILTER_SANITIZE_STRING);
    }

    public function setArquivo(string $arquivo){
        $this->arquivo = filter_var($arquivo, FILTER_SANITIZE_STRING);
    }

} // fim Imagem