/*
 Navicat Premium Dump SQL

 Source Server         : mariaDB
 Source Server Type    : MySQL
 Source Server Version : 110502 (11.5.2-MariaDB)
 Source Host           : localhost:3307
 Source Schema         : db_mahasiswa

 Target Server Type    : MySQL
 Target Server Version : 110502 (11.5.2-MariaDB)
 File Encoding         : 65001

 Date: 06/02/2026 22:33:12
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for mahasiswa
-- ----------------------------
DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa`  (
  `npm` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `nama` varchar(35) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT NULL,
  `tempatlahir` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT '',
  `tanggallahir` date NULL DEFAULT '0000-00-00',
  `agama` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT '',
  `kelamin` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT '',
  `alamat1` varchar(400) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT '',
  `alamat2` varchar(400) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT '',
  `tlprumah` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT '',
  `hp` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT '',
  `asalsekolah` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT '',
  `namaortu` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT '',
  `pekerjaanortu` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT '',
  `namakantor` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT '',
  `jabatan` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT '',
  `alamatkantor` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT '',
  `program` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT NULL,
  `jurusan` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT '',
  `jenisprog` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT '',
  `kelas` char(20) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT NULL,
  `status` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT 'c',
  `userid` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT NULL,
  `pass` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`npm`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
