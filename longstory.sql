/*
Navicat MySQL Data Transfer

Source Server         : proyecto longstory
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : longstory

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-10-28 22:10:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `idUsuario` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `gender` varchar(1) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'jagai', 'berlinsky', 'jagaiberlinsky@gmail.com', '$2y$10$7Ogyl3f2N5rtiLquSN8wX.0WEwxBrrn.dxNRnpQgqtzSKadz7M5pu', '');
INSERT INTO `usuarios` VALUES ('2', 'ale', 'delia', 'ale@fswd.com', '$2y$10$oLm7F7BDTXaiIvc2cD.18OUOV.2SI3awkcdCdFsHPaJipshQYXrrm', '');
INSERT INTO `usuarios` VALUES ('3', 'Alexis', 'Knack', 'alexis.16715@hotmail.com', '$2y$10$At9YXWXKaoikRxJD89NdN.S2Mb3Rawllsx1P6vP9CCZKgOjAuXy4m', '');
