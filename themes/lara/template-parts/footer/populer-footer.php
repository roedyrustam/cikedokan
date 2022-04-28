<div class="footer-title">Berita Populer</div>
							<?php
								$query_populer = 'SELECT kategori, artikel.* FROM `artikel` JOIN kategori ON kategori.id = artikel.id_kategori WHERE hit > 0 ORDER BY hit DESC LIMIT 6';
								$populer = $this->db->query($query_populer)->result_array();
							?>
							<?php if ($populer): ?>
							<div class="widget-arsip">
								<ul class="arsip-footer">
									<?php foreach ($populer as $data): ?>
									<li>										
										<div class="list">
											<div class="judul-arsip"><a href="<?php echo get_artikel_url( $data['id'], $data['id_kategori'] ); ?>"><?= character_limiter( $data['judul'], 27 ); ?></a></div>
											<div class="dlab-post-meta">
												<ul>
													<li class="post-date">Dibaca <?php echo ( $data['hit'] ); ?> Kali</li>
													<li class="post-cat">
												<?php if ( trim($data['kategori'] ) != ''): ?>
													<a href="<?php echo get_kategori_url( $data['id_kategori'] ); ?>" class="cat-label"><?php echo ucwords( $data['kategori'] ); ?></a>
												<?php endif; ?>
													</li>
												</ul>
											</div>
										</div>
									</li>
									<?php endforeach; ?>
								</ul>
							</div>
							<?php endif; ?>