										<div class="tab-pane <?php if ($act_tab==1): ?>active<?php endif ?>">
											<div class="row">
												<div class="col-md-12">
													<div class="box-header with-border">
														<h3 class="box-title"><strong>Ekspor Data Desa</strong></h3>
													</div>
													<div class="box-body">
														<div class="row">
															<div class="col-md-12">
																<table class="table table-striped table-hover">
																	<tr>
																		<td class="col-sm-11">Ekspor Data Keluarga (Format .xls untuk di impor ke database SID melalui menu Impor Database)</td>
																		<td class="col-sm-1" style="padding:5px 0">
																			<a href="<?= site_url("database")?>/export_excel" class="btn btn-radius btn-info btn-sm" style="box-shadow:unset">Unduh</a>
																		</td>
																	</tr>
																	<tr>
																		<td>Ekspor Data Dasar Kependudukan (.sid)</td>
																		<td  style="padding:5px 0">
																			<a href="<?= site_url("database")?>/export_dasar" class="btn btn-radius btn-info btn-sm" style="box-shadow:unset">Unduh</a>
																		</td>
																	</tr>
																	<tr>
																		<td>Ekspor Data CSV (.csv)</td>
																		<td  style="padding:5px 0">
																			<a href="<?= site_url("database")?>/export_csv" class="btn btn-radius btn-info btn-sm" style="box-shadow:unset">Unduh</a>
																		</td>
																	</tr>
																</table>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>