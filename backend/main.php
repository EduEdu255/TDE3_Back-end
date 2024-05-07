<?php

class Pessoa{

  public $name;
  public $age;
  public $CPF;

  public function __construct($name,$age,$CPF){
    $this->name = $name;
    $this->age = $age;
    $this->CPF = $CPF;
  }
  public function setName($name){
      $this->name = $name;
    }

    public function getName(){
      return $this->name;
    }

    public function setAge($age){
      $this->age = $age;
    }

    public function getAge(){
      return $this->age;
    }


    public function setCpf($CPF){
      $this->CPF = $CPF;
    }


    public function getCpf(){
      return $this->CPF;
    }
}

class Paciente extends Pessoa{
  public function __construct($name,$age,$CPF){
    parent::__construct($name,$age,$CPF); 

   //echo "Nome do paciente: " .$this->getName(). "\n";
    //echo "Idade do paciente: " .$this->getAge(). "\n";
    //echo "CPF do paciente: " .$this->getCpf(). "\n";
  }
}

class Medico extends Pessoa{
  public function __construct($name,$age,$CPF){
    parent::__construct($name,$age,$CPF);

    //echo "Nome do Medico: ".$this->getName(). "\n";
    //echo "idade do Medico: ".$this->getAge(). "\n";
    //echo "Cpf do Medico: ".$this->getCpf(). "\n";
  }
}

function getInput($message){
  echo $message;
  return trim(fgets(STDIN));
}

$namePaciente = getInput("Paciente digite seu nome: ");
$agePaciente = getInput("Paciente informe sua idade: ");
$cpfPaciente = getInput("paciente informe o seu CPF: ");

$nameMedico = getInput("Medico digite seu nome: ");
$ageMedico = getInput("Medico informe sua idade: ");
$cpfMedico = getInput("Medico informe o seu cpf: ");

$Paciente = new Paciente($namePaciente,$agePaciente,$cpfPaciente);
echo "\n";
$Medico = new Medico($nameMedico,$ageMedico,$cpfMedico);

class Sintomas{
  public function verificarSintomas(){

    echo "O que você está sentindo?"."\n";

    echo "(1) Dores musculares e de cabeça, calafrios, sensação de calor intenso, tremedeira e sudorese, uma transpiração excessiva."."\n";

    echo "(2) Febre 38°C, Dor de garganta, Tosse, Dor no corpo, Dor de cabeça."."\n";

    echo "(3) dor nos olhos, pescoço, rosto ou testa"."\n";

    echo "(4) Gases, cólica, urgência em defecar, náusea e vômito."."\n";

    echo "(5) Diarreia, febre, vômito, enjoo, falta de apetite, dor muscular, dor na barriga, dor de cabeça, secreção nasal e tosse"."\n";

    $sintomas = getInput("Digite de 1 a 5: \n");
    return $sintomas;
      }
    }

    class Atestado {
      public function emitirAtestado($paciente, $medico, $sintoma) {
        
        echo "ATESTATO MÉDICO\n";
        echo "Nome do médico: " . $medico->name . "\n";
        echo "idade do Medico: ". $medico->age. "\n";
        echo "Cpf do Medico: ". $medico->CPF. "\n";
        echo "Nome do paciente: " . $paciente->name . "\n";
        echo "Idade: " . $paciente->age . "\n";
        echo "Cpf do paciente: " . $paciente->CPF . "\n";
        echo "Doença: ";
        
        switch ($sintoma) {
          case 1:
            echo "Febre.";
            break;
          case 2:
            echo "Gripe.";
            break;
          case 3:
            echo "Enxaqueca.";
            break;
          case 4:
            echo "Diarreia.";
            break;
          case 5:
            echo "Virose.";
            break;
          default:
            echo "Opção inválida. Por favor, digite um número de 1 a 5.";
        }
      }
    }

    $sintomas = new Sintomas();
    $sintomaSelecionado = $sintomas->verificarSintomas();

    $atestado = new Atestado();
    $atestado->emitirAtestado($Paciente, $Medico,$sintomaSelecionado);
?>