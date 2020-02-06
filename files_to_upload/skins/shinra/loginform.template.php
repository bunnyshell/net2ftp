<?php defined("NET2FTP") or die("Direct access to this location is not allowed."); ?>
<!-- Template /skins/shinra/loginform.php begin -->
						<div id="accordion" class="accordion">
<?php	// The height of the Basic form must be smaller than the height of the Advanced form, ?>
<?php	// for this to be possible, set "autoHeight:false" in /skins/shinra/js/jquery-ui-1.8.13.custom.min.js ?>

							<h6><a href="#"><?php echo __("Basic SSH login"); ?></a></h6>
							<div>
								<form id="LoginForm1" action="<?php echo $net2ftp_globals["action_url"]; ?>" method="post" onsubmit="return CheckInput(this);">
									<fieldset>
<?php /* ----- FTP server ----- */ ?>


<?php /* ----- FTP server ----- */ ?>
										<div>
											<h7><?php echo __("SSH server"); ?></h7>
<?php                                           $ftpserver["list"][1] = '127.0.0.1';
                                                if ($ftpserver["inputType"] == "text") { ?>
												<input type="text" name="ftpserver"  value="<?php echo $ftpserver["list"][1]; ?>" maxlength="254" class="form-poshytip" title="
												<?php echo __("Example"); ?>: ftp.server.com, 192.123.45.67" />
<?php											} elseif ($ftpserver["inputType"] == "select") { ?>
												<select name="ftpserver">
<?php												for ($i=1; $i<=sizeof($ftpserver["list"]); $i=$i+1) { ?>
													<option value="<?php echo $ftpserver["list"][$i]; ?>" <?php echo $ftpserver["list"][$i]["selected"]; ?>><?php echo $ftpserver["list"][$i]; ?></option>
<?php												} // end for ?>
												</select>
<?php											} elseif ($ftpserver["inputType"] == "hidden") { ?>
												<input type="hidden" name="ftpserver" value="<?php echo $ftpserver["list"][1]; ?>" />
												<b><?php echo $ftpserver["list"][1]; ?></b>
<?php											} ?>
<?php /* ----- FTP server port ----- */ ?>
											<h7b>
<?php								if ($ftpserverport["inputType"] == "text") { ?>
												<input type="text" name="ftpserverport" value="<?php echo $ftpserverport["defaultvalue_ssh"]; ?>" maxlength="5" style="width: 45px;" title="<?php echo __("Enter the FTP server port (21 for FTP, 22 for FTP SSH or 990 for FTP SSL) - if you're not sure leave it to 21"); ?>" />
<?php								} else { ?>
											</h7b>
												<input type="hidden" name="ftpserverport" value="<?php echo $ftpserverport["defaultvalue_ssh"]; ?>" />
<?php								} ?>
										</div>

<?php /* ----- Username ----- */ ?>
										<div>
											<h7><?php echo __("Username"); ?></h7>
											<input type="text" name="username" value="<?php echo $username; ?>" maxlength="254" class="form-poshytip" title="<?php echo __("Enter your username"); ?>" />
										</div>

<?php /* ----- Password ----- */ ?>
										<div>
											<h7><?php echo __("Password"); ?></h7>
											<input type="password" name="password" value="<?php echo $password; ?>" class="form-poshytip" title="<?php echo __("Enter your password"); ?>" />
										</div>

<?php /* ----- Check fingerprint ----- */ ?>
										<div>
											<h7><?php echo __("Check the SSH server's public key fingerprint"); ?></h7>
											<input type="text" name="sshfingerprint" value="<?php echo $sshfingerprint; ?>" class="form-poshytip" style="background-color: #f1f1f1;" title="<?php echo __("Get the SSH server's public key fingerprint before logging in to verify the server's identity"); ?>" readonly="readonly" />
											<h7b>
												<input type="button" id="smallbutton" name="<?php echo __("Get fingerprint"); ?>" value="<?php echo __("Get fingerprint"); ?>" alt="<?php echo __("Get fingerprint"); ?>" onclick="GetFingerprint(form);" />
											</h7b>
										</div>

<?php /* ----- Captcha ----- */ ?>
<?php										if ($net2ftp_settings["use_captcha"] == "no") { ?>
											<div style="margin-top: 10px;">
												<div id="recaptcha2"></div>
											</div>
<?php 									} ?>

<?php /* ----- Login button ----- */ ?>
										<input type="submit" id="LoginButton2" name="Login" value="<?php echo __("Login"); ?>" alt="<?php echo __("Login"); ?>" />
									</fieldset>

									<input type="hidden" name="state"     value="browse" />
									<input type="hidden" name="state2"    value="main" />
									<input type="hidden" name="protocol"  value="FTP-SSH" />
									<input type="hidden" name="language"  value="<?php echo $net2ftp_globals["language"]; ?>" />
								</form>
							</div>

                            </div>
<script type="text/javascript"><!--
	document.forms['LoginForm1'].<?php echo $focus; ?>focus();
//--></script>

<!-- Template /skins/shinra/loginform.php end -->
