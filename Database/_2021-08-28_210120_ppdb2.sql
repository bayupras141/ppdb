/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/ ppdb2 /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE ppdb2;

DROP TABLE IF EXISTS alur;
CREATE TABLE `alur` (
  `alur_id` int(11) NOT NULL AUTO_INCREMENT,
  `alur_nama` text NOT NULL,
  `alur_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `alur_update` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`alur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS daftar;
CREATE TABLE `daftar` (
  `dfr_no` varchar(20) NOT NULL,
  `dfr_tanggal` date DEFAULT NULL,
  `dfr_password` varchar(50) NOT NULL,
  `dfr_nama` varchar(50) NOT NULL,
  `dfr_jekel` enum('1','2') DEFAULT NULL,
  `dfr_tmp_lahir` varchar(20) DEFAULT NULL,
  `dfr_tgl_lahir` date DEFAULT NULL,
  `dfr_agama` enum('1','2','3','4','5') DEFAULT NULL,
  `dfr_anak_dr` enum('1','2','3','4') DEFAULT NULL,
  `dfr_nisn` varchar(50) DEFAULT NULL,
  `dfr_asal_sekolah` text DEFAULT NULL,
  `dfr_almt_sekolah` text DEFAULT NULL,
  `dfr_pas_photo` text DEFAULT NULL,
  `dfr_nilai_mm` int(11) DEFAULT NULL,
  `dfr_nilai_indo` int(11) DEFAULT NULL,
  `dfr_nilai_eng` int(11) DEFAULT NULL,
  `dfr_nilai_ipa` int(11) DEFAULT NULL,
  `dfr_nilai_ips` int(11) DEFAULT NULL,
  `dfr_ayah` varchar(20) DEFAULT NULL,
  `dfr_ibu` varchar(20) DEFAULT NULL,
  `dfr_alamat` text DEFAULT NULL,
  `dfr_hp_ortu` varchar(12) DEFAULT NULL,
  `status` enum('R','S') DEFAULT NULL,
  `filetf` text DEFAULT NULL,
  PRIMARY KEY (`dfr_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS waktu;
CREATE TABLE `waktu` (
  `waktu_id` int(11) NOT NULL AUTO_INCREMENT,
  `waktu_nama` text NOT NULL,
  `waktu_mulai` date NOT NULL,
  `waktu_akhir` date NOT NULL,
  `waktu_create` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`waktu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2022 DEFAULT CHARSET=utf8mb4;

INSERT INTO alur(alur_id,alur_nama,alur_create,alur_update) VALUES(1,X'6c6c75725f707064625f6d6f64656c5f635f706c75732e6a7067','2021-08-28 11:53:49','2021-08-28 13:13:56');

INSERT INTO daftar(dfr_no,dfr_tanggal,dfr_password,dfr_nama,dfr_jekel,dfr_tmp_lahir,dfr_tgl_lahir,dfr_agama,dfr_anak_dr,dfr_nisn,dfr_asal_sekolah,dfr_almt_sekolah,dfr_pas_photo,dfr_nilai_mm,dfr_nilai_indo,dfr_nilai_eng,dfr_nilai_ipa,dfr_nilai_ips,dfr_ayah,dfr_ibu,dfr_alamat,dfr_hp_ortu,status,filetf) VALUES('admin','2021-08-23','123','Admin','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'S',NULL),('REG20210828001','2021-08-28','123456','Bayu Prasetyo','1','Ponorogo','2001-06-24','1','1','24151253',X'534d504e203220506f6e6f726f676f',X'4a6c2e20426173756b69205261686d6164204e6f2e34342c20506573616e7472656e2c20507572626f73756d616e2c204b65632e20506f6e6f726f676f2c204b616275706174656e20506f6e6f726f676f2c204a6177612054696d7572203633343139',X'70686f746f5f323032312d30382d32385f31332d33352d32332e6a7067',82,90,92,100,78,'Supriadi','Maryuni',X'4a6c2e2053656d616e676b61204e6f2e34204b656e6974656e20506f6e6f726f676f','085132415123','R',X'70686f746f5f323032312d30382d32385f31332d33362d33352e6a7067'),('REG20210828002','2021-08-28','123456','Dinda Dwi Magfiro','2','Ponorogo','2001-04-25','1','1','2515125131',X'534d504e203220506f6e6f726f676f',X'4a6c2e20426173756b69205261686d6164204e6f2e34342c20506573616e7472656e2c20507572626f73756d616e2c204b65632e20506f6e6f726f676f2c204b616275706174656e20506f6e6f726f676f2c204a6177612054696d7572203633343139',X'70686f746f5f323032312d30382d32385f31332d33352d32332e6a7067',90,90,90,90,90,'Soekarno','Yunani',X'4a4c2052617961204a656e616e67616e','0812512512','R',X'3833312d6d657267655f66726f6d5f6f666f63742e6a7067');
INSERT INTO waktu(waktu_id,waktu_nama,waktu_mulai,waktu_akhir,waktu_create) VALUES(2021,X'323032312f32303232','2021-08-28','2021-08-29','2021-08-28 10:55:00');