 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="//db.onlinewebfonts.com/c/3a47f5f06b5484abfeee9eac90348a9c?family=Gotham" rel="stylesheet" type="text/css"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Registro de nuevo usuario</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<style>
	@import url(//db.onlinewebfonts.com/c/3a47f5f06b5484abfeee9eac90348a9c?family=Gotham);

	@font-face {font-family: "Gotham"; src: url("//db.onlinewebfonts.com/t/3a47f5f06b5484abfeee9eac90348a9c.eot"); src: url("//db.onlinewebfonts.com/t/3a47f5f06b5484abfeee9eac90348a9c.eot?#iefix") format("embedded-opentype"), url("//db.onlinewebfonts.com/t/3a47f5f06b5484abfeee9eac90348a9c.woff2") format("woff2"), url("//db.onlinewebfonts.com/t/3a47f5f06b5484abfeee9eac90348a9c.woff") format("woff"), url("//db.onlinewebfonts.com/t/3a47f5f06b5484abfeee9eac90348a9c.ttf") format("truetype"), url("//db.onlinewebfonts.com/t/3a47f5f06b5484abfeee9eac90348a9c.svg#Gotham") format("svg"); }

	.tk_generado {
	    padding: 12px;
	    font-size: 0.9em;
	    width: 70%;
	    border: 1px #444 dotted;
	    border-radius: 5px;
	    margin: 0 auto;
	    max-width: 300px;
	    font-family: Google Sans;
	}

	.ttlhr {
	    margin-top: 6px
	}

	.ttl_hr,
	.ttl2_hr {
	    display: inline-block;
	    vertical-align: bottom;
	}

	.ttl_hr {
	    font-size: 1.5em;
	    text-align: left;
	}

	.ttl2_hr {
	    float: right;
	}

	.ttl_hipo {
	    font-size: 1.3em;
	}

	.hr_r1 {
	    font-size: 1em;
	}

	.hr_r1 div {
	    display: inline-block;
	}

	.hr_r2 {
	    font-size: 1.4em;
	    padding-left: 15px;
	    text-align: left;
	}

	.hr_r3 {}

	.hr_r3 div {
	    display: inline-block;
	    width: 33.33%;
	    font-size: 1em;
	}

	.separador1_tk {
	    border-bottom: solid 1px #CFCFCF;
	    height: 4px;
	    padding: 4px;
	    margin-bottom: 8px;
	}

	.footer {
		width: 100%;
	}

	.footer tr {
		width: 100%;
	}

	.footer tr td {
		width: 33.33%;
	}
</style>
</head>
<body style="margin: 0; padding: 0;">
	<table border="0" cellpadding="0" cellspacing="0" width="100%">	
		<tr>
			<td style="padding: 10px 0 30px 0;">
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
					<tr>
						<td align="center" bgcolor="#002554" style="padding: 0px 0 0px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Google Sans, sans-serif; background: radial-gradient(ellipse at bottom, #035280 0%, #041e42 77%);">
							<img src="https://i.imgur.com/UMoqKqu.png" alt="Apuestas G Logo" height="50" style=" margin: 25px 0; display: block;" />
						</td>
					</tr>
					<tr>
						<td bgcolor="#ffffff" style="padding: 20px 40px 5px 40px;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td style="padding: 20px 0 20px 0; color: #153643; font-family: Google Sans, sans-serif; font-size: 14px;">Ticket de apuestas generado correctamente.<br>
	                                    
									</td>
								</tr>
								<?php foreach ($ticketes as $key => $ticket): ?>
									<tr>
										<td >
											<div class='tk_generado' *ngFor="let tk of _inicioSesion.ticketes">
							                    <div style="text-align: center;">
							                        <img src="https://i.imgur.com/UMoqKqu.png" height="34px">
							                        <br>
							                    </div>
							                    <div class="ttlhr">
							                        <div class="ttl_hr">Carr. <?php echo $ticket['selecciones']['inscripcion']['carrera']['number'] ?></div>
							                        <div class="ttl2_hr">
							                            <div style="font-size: 0.8em;"><?php echo date("d-m-Y g:i:s a", strtotime($ticket['selecciones']['inscripcion']['carrera']['posttime'])); ?></div>
							                            <div class='ttl_hipo'><?php echo $ticket['selecciones']['inscripcion']['carrera']['racecourse']['name'] ?></div>
							                        </div>
							                    </div>
							                    <div class='separador1_tk'></div>
							                    <div class="hr_r1">
							                        <div style="text-align: left"><?php echo "Bs. " . $ticket['monto'] ?></div>
							                        <div style="float: right; text-align: right;"><?php echo "Bs. " . $ticket['monto'] ?></div>
							                    </div>
							                    <div class="hr_r2">
							                        <?php echo $ticket['selecciones']['inscripcion']['number'] . " - " . $ticket['selecciones']['inscripcion']['horse']['name'] ?>
							                    </div>
							                    <div class='separador1_tk'></div>
							                    <table class="footer" cellspacing="0" cellpadding="0">
							                    	<tr>
							                    		<td style="text-align: left;">1 apuesta</td>
							                    		<td style="text-align: center;">TOTAL</td>
							                    		<td style="text-align: right;"><?php echo "Bs. " . $ticket['monto'] ?></td>
							                    	</tr>
							                    	<tr>
							                    		<td style="text-align: left;"><?php echo strtoupper($ticket['cod_seguridad']) ?></td>
							                    		<td style="text-align: center;"><?php echo date("d-m-Y", strtotime($ticket['fecha_hora'])); ?></td>
							                    		<td style="text-align: right;"><?php echo date("g:i:s a", strtotime($ticket['fecha_hora'])); ?></td>
							                    	</tr>
							                    </table>
							                </div>
										</td>
									</tr>
								<?php endforeach ?>
								<tr>
									<td style="padding: 20px 0 20px 0; color: #153643; font-family: Google Sans, sans-serif; font-size: 14px;">
	                                    Te deseamos buena suerte,<br>
	                                    <a href="https://www.apuestasg.win" style="color:#007cf7 !important; font-size: 16px;">Equipo de Apuestas G</a>
									</td>
								</tr>
								<tr>
									<td>
										<br>
										<table width="100%">
										<tr style="font-size: 12px">
											<td style="color: grey">N.º de asistencia: <?php echo str_pad($assist_id, 8, "0", STR_PAD_LEFT); ?></td>
											<td align="right"><a href="https://www.apuestasg.win" style="color:#007cf7 !important;">¿Has olvidado tu contraseña?</a></td>
										</tr>
									</table>
									</td>								
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td style="background: radial-gradient(ellipse at top, #d51829 0%, #721422 77%); padding: 30px 30px 30px 30px;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td style="font-size:0.8em; color: #ffffff; font-family: Google Sans, sans-serif; font-size: 13px;" width="75%">
										&copy; <?php echo date('Y') ?> Apuestas G de Software G. Todos los derechos reservados<br/>
									</td>
									<td align="right" width="25%">
										<table border="0" cellpadding="0" cellspacing="0">
											<tr>
												<!-- <td style="font-family: Google Sans, sans-serif; font-size: 12px; font-weight: bold;">
													<a href="https://www.apple.com/la/ios/app-store/" style="color: #ffffff;">
														<img src="https://cdn0.iconfinder.com/data/icons/social-flat-rounded-rects/512/appstore-512.png" alt="Twitter" width="38" height="38" style="display: block;" border="0" />
													</a>
												</td>
												<td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
												<td style="font-family: Google Sans, sans-serif; font-size: 12px; font-weight: bold;">
													<a href="https://play.google.com/store?hl=es-419" style="color: #ffffff;">
														<img src="https://cdn0.iconfinder.com/data/icons/social-flat-rounded-rects/512/google_play-512.png" alt="Facebook" width="38" height="38" style="display: block;" border="0" />
													</a>
												</td> -->
											</tr>
										</table>
									</td>
								</tr>
							</table>
							<span style="font-size: 0.85em; color: white; font-family: Google Sans, sans-serif; font-size: 15px;">Para consultas comuníquese e-mail: admin@apuestasg.win</span>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>
