<?
$query = 'SELECT 	count(computadores.id_so) as qtd, 
					so.te_desc_so 
		  FROM		computadores,
		  			so,
					redes
		  WHERE 	computadores.id_so = so.id_so AND 
		  			computadores.te_nome_computador IS NOT NULL AND 
					computadores.dt_hr_ult_acesso IS NOT NULL AND
					computadores.id_ip_rede = redes.id_ip_rede '.
					$where . ' 
		  GROUP BY 	computadores.id_so 
		  ORDER BY 	qtd DESC';

conecta_bd_cacic();		  
$result = mysql_query($query) or die('Falha na cria��o de consulta por sistema operacional ou sua sess�o expirou!');

$arr_so = array();
while ($row_result = mysql_fetch_assoc($result))		
	{ 
	$v_row_result = str_pad($row_result['te_desc_so'],28,'.',STR_PAD_RIGHT);
	$arr_so[$v_row_result] = $row_result['qtd'];			
	} 
		  
?>