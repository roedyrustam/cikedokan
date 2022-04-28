<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

ERROR - 2021-09-08 20:34:54 --> 404 Page Not Found: Desa/upload
ERROR - 2021-09-08 20:34:54 --> 404 Page Not Found: Desa/upload
ERROR - 2021-09-08 20:34:54 --> 404 Page Not Found: Desa/upload
ERROR - 2021-09-08 20:42:15 --> 404 Page Not Found: Desa/upload
ERROR - 2021-09-08 20:42:15 --> 404 Page Not Found: Desa/upload
ERROR - 2021-09-08 20:42:15 --> 404 Page Not Found: Desa/upload
ERROR - 2021-09-08 21:45:51 --> Query error: Table 'sidepeco_demo.mutasi_inventaris_peralatan' doesn't exist - Invalid query: SHOW CREATE TABLE `sidepeco_demo`.`mutasi_inventaris_peralatan`
ERROR - 2021-09-08 21:46:02 --> Query error: Duplicate column name 'slug' - Invalid query: ALTER TABLE `artikel` ADD `slug` VARCHAR(100) NOT NULL AFTER `judul`
ERROR - 2021-09-08 21:46:02 --> Query error: Duplicate column name 'kategori_slug' - Invalid query: ALTER TABLE `kategori` ADD `kategori_slug` VARCHAR(100) NOT NULL AFTER `kategori`
ERROR - 2021-09-08 21:46:02 --> Query error: Duplicate column name 'petugas' - Invalid query: ALTER TABLE `analisis_master` ADD `petugas` VARCHAR(100) NOT NULL AFTER `subjek_tipe`
ERROR - 2021-09-08 21:46:02 --> Query error: Duplicate column name 'tentang' - Invalid query: ALTER TABLE `config` ADD `tentang` TEXT
ERROR - 2021-09-08 21:46:02 --> Query error: Can't create table `sidepeco_demo`.`agenda` (errno: 121 "Duplicate key on write or update") - Invalid query: ALTER TABLE `agenda` ADD CONSTRAINT `agenda_fk1` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
ERROR - 2021-09-08 21:46:02 --> Query error: Can't create table `sidepeco_demo`.`apbdes` (errno: 121 "Duplicate key on write or update") - Invalid query: ALTER TABLE `apbdes` ADD CONSTRAINT `FK_apbdes` FOREIGN KEY (`id_kategori`) REFERENCES `apbdes_kategori` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
ERROR - 2021-09-08 21:46:02 --> Query error: Can't create table `sidepeco_demo`.`poll_pilihan` (errno: 121 "Duplicate key on write or update") - Invalid query: ALTER TABLE `poll_pilihan` ADD CONSTRAINT `poll_pilihan_ibfk_1` FOREIGN KEY (`id_poll`) REFERENCES `polling` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
ERROR - 2021-09-08 21:46:02 --> Query error: Can't create table `sidepeco_demo`.`poll_vote` (errno: 121 "Duplicate key on write or update") - Invalid query: ALTER TABLE `poll_vote` ADD CONSTRAINT `poll_vote_ibfk_1` FOREIGN KEY (`id_poll`) REFERENCES `polling` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
ERROR - 2021-09-08 21:46:02 --> Query error: Can't create table `sidepeco_demo`.`poll_vote` (errno: 121 "Duplicate key on write or update") - Invalid query: ALTER TABLE `poll_vote` ADD CONSTRAINT `poll_vote_ibfk_2` FOREIGN KEY (`id_pil`) REFERENCES `poll_pilihan` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
ERROR - 2021-09-08 21:46:02 --> Query error: Can't create table `sidepeco_demo`.`mutasi_inventaris_elektronik` (errno: 121 "Duplicate key on write or update") - Invalid query: ALTER TABLE `mutasi_inventaris_elektronik`
ADD CONSTRAINT `FK_mutasi_inventaris_elektronik` FOREIGN KEY (`id_inventaris_elektronik`) REFERENCES `inventaris_elektronik` (`id`)
ERROR - 2021-09-08 21:46:02 --> Query error: Table 'inventaris_mesin' already exists - Invalid query: RENAME TABLE `inventaris_peralatan` TO `inventaris_mesin`
ERROR - 2021-09-08 21:46:02 --> Query error: Unknown column 'id_inventaris_peralatan' in 'inventaris_mesin' - Invalid query: ALTER TABLE `inventaris_mesin` CHANGE `id_inventaris_peralatan` `id_inventaris_mesin` INT(11) NULL DEFAULT NULL
ERROR - 2021-09-08 21:46:02 --> Query error: Can't DROP FOREIGN KEY `FK_mutasi_inventaris_peralatan`; check that it exists - Invalid query: ALTER TABLE `mutasi_inventaris_mesin` DROP FOREIGN KEY `FK_mutasi_inventaris_peralatan`
ERROR - 2021-09-08 21:46:02 --> Query error: Key column 'id_inventaris_mesin' doesn't exist in table - Invalid query: ALTER TABLE `mutasi_inventaris_mesin` ADD CONSTRAINT `FK_mutasi_inventaris_mesin` FOREIGN KEY (`id_inventaris_mesin`) REFERENCES `inventaris_mesin` (`id`)
ERROR - 2021-09-08 21:46:02 --> Query error: Table 'mutasi_inventaris_mesin' already exists - Invalid query: RENAME TABLE `mutasi_inventaris_peralatan` TO `mutasi_inventaris_mesin`
ERROR - 2021-09-08 21:46:02 --> Query error: Duplicate column name 'pamong_ttd' - Invalid query: ALTER TABLE `tweb_desa_pamong` ADD `pamong_ttd` TINYINT(1) NULL DEFAULT NULL
ERROR - 2021-09-08 21:46:02 --> Query error: Duplicate column name 'pamong_ub' - Invalid query: ALTER TABLE `tweb_desa_pamong` ADD `pamong_ub` TINYINT(1) NULL DEFAULT NULL
ERROR - 2021-09-08 21:46:02 --> Query error: Duplicate column name 'tag_id_card' - Invalid query: ALTER TABLE `tweb_penduduk` ADD `tag_id_card` VARCHAR(15) NULL DEFAULT NULL
ERROR - 2021-09-08 21:46:02 --> Query error: Duplicate column name 'tabel4_length' - Invalid query: ALTER TABLE `tweb_penduduk` ADD `tabel4_length` VARCHAR(15) NULL DEFAULT NULL
ERROR - 2021-09-08 21:46:02 --> Query error: Duplicate column name 'judul' - Invalid query: ALTER TABLE `komentar` ADD `judul` VARCHAR(100) NOT NULL AFTER `id_artikel`
ERROR - 2021-09-08 21:46:02 --> Query error: Duplicate column name 'jenis' - Invalid query: ALTER TABLE `komentar` ADD `jenis` INT(1) NOT NULL AFTER `no_hp`;
ERROR - 2021-09-08 21:46:02 --> Query error: Duplicate column name 'gambar1' - Invalid query: ALTER TABLE `komentar` ADD `gambar1` TEXT NULL AFTER `jenis`, ADD `gambar2` TEXT NULL AFTER `gambar1`, ADD `gambar3` TEXT NULL AFTER `gambar2`;
ERROR - 2021-09-08 21:46:02 --> Query error: Duplicate column name 'status' - Invalid query: ALTER TABLE `komentar` ADD `status` VARCHAR(255) NULL AFTER `enabled`;
ERROR - 2021-09-08 21:46:02 --> Query error: Duplicate column name 'tupoksi' - Invalid query: ALTER TABLE `tweb_desa_pamong` ADD `tupoksi` TEXT NOT NULL AFTER `jabatan`
ERROR - 2021-09-08 21:46:02 --> Query error: Duplicate column name 'link_embed' - Invalid query: ALTER TABLE `artikel` ADD `link_embed` TEXT NULL DEFAULT NULL AFTER `gambar3`
ERROR - 2021-09-08 21:46:02 --> Query error: Duplicate column name 'sumber_berita' - Invalid query: ALTER TABLE `artikel` ADD `sumber_berita` VARCHAR(100) NULL DEFAULT NULL AFTER `link_embed`
ERROR - 2021-09-08 21:46:02 --> Query error: Duplicate column name 'link_sumber_berita' - Invalid query: ALTER TABLE `artikel` ADD `link_sumber_berita` VARCHAR(100) NULL DEFAULT NULL AFTER `sumber_berita`
ERROR - 2021-09-08 21:46:02 --> Query error: Duplicate column name 'hit' - Invalid query: ALTER TABLE `artikel` ADD `hit` INT(1) NOT NULL DEFAULT '0' AFTER `boleh_komentar`
ERROR - 2021-09-08 21:46:02 --> Query error: Duplicate column name 'by_warga' - Invalid query: ALTER TABLE `artikel` ADD `by_warga` INT(1) NOT NULL DEFAULT '0' AFTER `hit`
ERROR - 2021-09-08 21:46:02 --> Query error: Unknown column 'gambar' in 'media_sosial' - Invalid query: ALTER TABLE `media_sosial` CHANGE COLUMN `gambar` `icon` TEXT NOT NULL AFTER `id`;
ERROR - 2021-09-08 21:46:02 --> Query error: Unknown column 'gambar' in 'media_sosial' - Invalid query:
ERROR - 2021-09-08 21:46:02 --> Query error: - Invalid query:
ERROR - 2021-09-08 21:46:02 --> Severity: error --> Exception: Call to undefined method Database_model::migrasi_103_ke_104_beta() /home/sidepeco/demo.sidepe.com/sidepeapps/models/Database_model.php 116
ERROR - 2021-09-08 20:46:03 --> 404 Page Not Found: Faviconico/index
ERROR - 2021-09-08 22:51:33 --> 404 Page Not Found: Robotstxt/index
ERROR - 2021-09-08 22:51:34 --> 404 Page Not Found: Well-known/assetlinks.json
ERROR - 2021-09-08 23:23:31 --> 404 Page Not Found: Desa/upload
ERROR - 2021-09-08 23:23:31 --> 404 Page Not Found: Desa/upload
ERROR - 2021-09-08 23:23:31 --> 404 Page Not Found: Desa/upload