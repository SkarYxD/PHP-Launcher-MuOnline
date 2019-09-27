<?php
header("Refresh: 180; URL='left.php'");
//////////////////////////////////////////////////////////////
@$conection = mssql_connect('127.0.0.1','sa','PASSQL');
$fans = "https://www.facebook.com/";
$grupo = "https://www.facebook.com/";
$exp = "1000x";
$drop = "70%";
///////////////////////////////////////////////////////////////
@mssql_select_db('MuOnline',$conection);
$Cantidad_Online = mssql_fetch_row(mssql_query("SELECT count(*) FROM MEMB_STAT WHERE ConnectStat = 1")); 
$SiegeInfo = mssql_fetch_row(mssql_query("SELECT OWNER_GUILD FROM MuCastle_DATA"));
$GuildCS_ = mssql_num_rows(mssql_query("SELECT G_Name FROM Guild where G_Name='".$SiegeInfo[0]."'"));
$character_top = mssql_fetch_row(mssql_query("Select Name,ResetCount from Character where ctlcode !='32' and ctlcode !='8' order by Grand_Resets desc ,ResetCount desc ,clevel desc"));
$guild_top = mssql_fetch_row(mssql_query("SELECT * from guild order by G_score desc"));
if($GuildCS_ <=0){	
	$castlesiege = '<font color=#ff0000>N/A</font>';
}else{	
	$castlesiege = ''.$SiegeInfo[0].'';
}
if($Cantidad_Online[0]==0)
	$online = '<font color=#ff0000>'.$Cantidad_Online[0].'</font>';
else 
	$online = '<font color=#00ff00>'.$Cantidad_Online[0].'</font>';
?>
<style type="text/css">
body {
	background-color: #000000;
	background-image: url();
	margin-left: 6px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}

#contenedor{
	margin:0 auto;
	padding:0;
	padding-top: 10px;
	width:545px;
	text-align:center;
	height:auto;
	background:transparent;
}

#espacio1{
	padding:0;
	width:460px;
	float:left;
	height:auto;
	margin-right:10px;
	border-top-width: thin;
	border-right-width: thin;
	border-bottom-width: thin;
	border-left-width: thin;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
}

.Estilo6 {
	font-family: Verdana, Arial, Helvetica, sans-serif; 
	font-size: 8pt; 
}

.Estilo9 {
	color: #FFFFFF
}

a:link {
	color: #FFFFFF;
	text-decoration: none;
}

a:visited {
	text-decoration: none;
	color: #FFFFFF;
}

a:hover {
	text-decoration: underline;
}

a:active {
	text-decoration: none;
}

.Estilo1 {
	font-family: Verdana, Arial, Helvetica, sans-serif; 
	color: #FFFFFF;
}

.Estilo12 {
	font-weight: bold;
	color: #FFFFFF;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}

</style>
<div id="contenedor">
	<div id="espacio1">
		<table width="530" height="33" border="2" cellpadding="4" cellspacing="0" bordercolor="#000000" bgcolor="#333399">
			<tr>
				<td width="100%" align="center" bgcolor="#0101DF" class="Estilo1">
					<strong>Informaci&oacute;n General </strong>
				</td>
			</tr>
		</table>
		<table width="530" height="33" border="2" cellpadding="4" cellspacing="0" bordercolor="#000000" bgcolor="#333399">
			<tr>
				<td width="50%" bgcolor="#333333">
					<div align="center" class="Estilo9">
						<span class="Estilo6">Exp: <?php echo $exp; ?></span>
					</div>
				</td>
				<td width="50%" bgcolor="#333333">
					<div align="center" class="Estilo9">
						<span class="Estilo6">Drop: <?php echo $drop; ?></span>
					</div>
				</td>
			</tr>
		</table>
		<table width="530" height="74" border="2" cellpadding="4" cellspacing="0" bordercolor="#000000" bgcolor="#333399">
			<tr>
				<td width="100%" bgcolor="#333333">
					<div align="center" class="Estilo9">
						<span class="Estilo6">
							<span class="Estilo12">Usuarios Jugando:</span>
						</span>
						<strong>
							<span class="Estilo12">
								<?php echo $online; ?>
							</span>
						</strong>
					</div>
				</td>
			</tr>
			<tr>
				<td bgcolor="#666666">
					<div align="center" class="Estilo9">
						<div align="center" class="Estilo9">
							<span class="Estilo12">Ganador Castle Siege: <?php echo $castlesiege; ?></span>
						</div>
					</div>
				</td>
			</tr>
		</table>
		<table width="530" height="33" border="2" cellpadding="4" cellspacing="0" bordercolor="#000000" bgcolor="#333399">
			<tr>
				<td width="50%" bgcolor="#333333">
					<div align="center" class="Estilo9">
						<span class="Estilo6">
							<a href="<?php echo $fans; ?>" target="_blank">Fan Page de Facebook</a> 
						</span>
					</div>
				</td>
				<td width="50%" bgcolor="#333333">
					<div align="center" class="Estilo9">
						<span class="Estilo6">
							<a href="<?php echo $grupo; ?>" target="_blank01">Grupo de Facebook</a> 
						</span>
					</div>
				</td>
			</tr>
		</table>
		<table width="530" height="33" border="2" cellpadding="4" cellspacing="0" bordercolor="#000000" bgcolor="#333399">
			<tr>
				<td width="50%" bgcolor="#333333">
					<div align="center" class="Estilo9">
						<span class="Estilo6">
							Top Jugador: <?php echo $character_top[0]; ?>
						</span>
					</div>
				</td>
				<td width="50%" bgcolor="#333333">
					<div align="center" class="Estilo9">
						<span class="Estilo6">
							Top Clan: <?php echo $guild_top[0]; ?>
						</span>
					</div>
				</td>
			</tr>
		</table>
	</div>
</div>
