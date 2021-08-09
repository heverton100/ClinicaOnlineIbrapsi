<?php

require_once 'C:/xampp/htdocs/clinica/conf/ConexaoOO.php';

class daoAgendamento{

	public function retornaHorariosDia($id,$dia){

		$conexao = new ConexaoOO;
		$conn = $conexao->connection();

		$query = "SELECT * FROM tbl_horarios WHERE dia_semana = $dia AND ID_PROFISSIONAL = $id";
		$result = mysqli_query($conn, $query);

		$a = array('');
		$range = '+60 minute';

		while($resultado = mysqli_fetch_assoc($result)){

			$horainidb = $resultado['hora_ini'];
			$horafimdb = $resultado['hora_fim'];

			array_push($a,date('H:i', strtotime($resultado['hora_ini'])));
			while ($horainidb < $horafimdb) {
							
				$horainidb = date('H:i', strtotime($range, strtotime($horainidb)));
				array_push($a,$horainidb);
				
			}

				array_pop($a);
		}
		
		return $a;
	}

	public function retornaValor($id){

		$conexao = new ConexaoOO;
		$conn = $conexao->connection();

		$query = "SELECT valor_sessao FROM tbl_profissional where ID_PROFISSIONAL = $id";
		$result = mysqli_query($conn, $query);
		$resultado = mysqli_fetch_assoc($result);
		
		return $resultado;
	}


	public function novoAgendamento($idPac,$idProf,$datahora,$obs,$valor){

		$conexao = new ConexaoOO;
		$conn = $conexao->connection();

		$insert = "INSERT INTO tbl_agendamento
			(ID_PACIENTE,
			ID_PROFISSIONAL,
			data_hora,
			obs,
			valor,
			date_create,
			confirmado)
			VALUES
			($idPac,
			$idProf,
			'$datahora',
			'$obs',
			'$valor',
			NOW(),
			0)";

		if (!mysqli_query($conn, $insert)) {
			echo "Error: " . $insert . "<br>" . mysqli_error($conn);
			exit();
		}

		return "ok";
	}

	public function retornaAgendamentos($id){

		$conexao = new ConexaoOO;
		$conn = $conexao->connection();

		$query = "SELECT data_hora FROM tbl_agendamento where ID_PROFISSIONAL = $id";
		$result = mysqli_query($conn, $query);

		$a = array('');

		while($resultado = mysqli_fetch_assoc($result)){

			$hora = $resultado['data_hora'];
			array_push($a,$hora);

		}
		
		return $a;
		
	}

	public function retornaAgendamentosPaciente($id,$idPac){

		$conexao = new ConexaoOO;
		$conn = $conexao->connection();

		$query = "SELECT data_hora FROM tbl_agendamento where ID_PROFISSIONAL = $id AND ID_PACIENTE = $idPac";
		$result = mysqli_query($conn, $query);

		$a = array('');

		while($resultado = mysqli_fetch_assoc($result)){

			$hora = $resultado['data_hora'];
			array_push($a,$hora);

		}
		
		return $a;
		
	}

	public function excluirAgendamento($idpaciente,$idprofissional,$data_agenda){

		$conexao = new ConexaoOO;
		$conn = $conexao->connection();

		$delete = "DELETE FROM tbl_agendamento WHERE data_hora = '$data_agenda' AND ID_PACIENTE = $idpaciente AND ID_PROFISSIONAL = $idprofissional";

		if (!mysqli_query($conn, $delete)) {
			echo "Error: " . $delete . "<br>" . mysqli_error($conn);
			exit();
		}

		return "ok";
		
	}

	public function retorna_agendamentos($id){

		$conexao = new ConexaoOO;
		$conn = $conexao->connection();

		$query = "SELECT AGE.ID_PACIENTE,
			PAC.nome AS NOMEPAC,
			PAC.url_foto AS FOTO,
			AGE.data_hora AS AGENDAMENTO,
			USU.email AS EMAIL,
			PAC.telefone AS FONE,
			MUNI.nome AS CIDADE,
			EST.nome AS ESTADO FROM tbl_agendamento AGE
			INNER JOIN tbl_paciente PAC ON PAC.ID_PACIENTE = AGE.ID_PACIENTE
			INNER JOIN sis_usuario USU ON USU.ID_USUARIO = PAC.ID_USUARIO
			LEFT JOIN tbl_endereco ENDE ON ENDE.ID_PACIENTE = AGE.ID_PACIENTE AND ENDE.ID_ENDERECO = PAC.ID_ENDERECO
			LEFT JOIN sis_municipios MUNI ON MUNI.ID_IBGE = ENDE.ID_MUNICIPIO
			LEFT JOIN sis_estados EST ON EST.ID_IBGE = ENDE.ID_ESTADO
			WHERE AGE.ID_PROFISSIONAL = $id";
		$result = mysqli_query($conn, $query);

		return $result;
		
	}


}

?>