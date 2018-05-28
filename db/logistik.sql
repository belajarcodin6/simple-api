/*
Navicat MySQL Data Transfer

Source Server         : xampp_php7
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : logistik

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-05-29 01:16:06
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `kategori`
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES ('2', 'Bahan Pangan', 'Logistik bahan makanan dan minuman');
INSERT INTO `kategori` VALUES ('3', 'Bahan Non Pangan', 'Logistik bahan non pangan');
INSERT INTO `kategori` VALUES ('4', 'Peralatan', 'peralatan');
INSERT INTO `kategori` VALUES ('5', 'Perlengkapan', 'perlengkapan');
