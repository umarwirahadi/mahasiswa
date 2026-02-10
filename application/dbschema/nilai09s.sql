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

 Date: 06/02/2026 22:34:02
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for nilai09
-- ----------------------------
DROP TABLE IF EXISTS `nilai09`;
CREATE TABLE `nilai09`  (
  `tahun` char(5) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `npm` char(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `kodematkul` char(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `nilaiuts` char(10) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT NULL,
  `nilaiuas` char(10) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT NULL,
  `nilaiakhir` char(40) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT NULL,
  `smt` char(2) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT NULL,
  INDEX `tahun`(`tahun`) USING BTREE,
  INDEX `npm`(`npm`) USING BTREE,
  INDEX `kodematkul`(`kodematkul`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_general_ci ROW_FORMAT = Fixed;

SET FOREIGN_KEY_CHECKS = 1;
