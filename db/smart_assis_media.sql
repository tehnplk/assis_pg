/*
Navicat MySQL Data Transfer

Source Server         : 192.168.0.7_3306
Source Server Version : 50517
Source Host           : 192.168.0.7:3306
Source Database       : hos

Target Server Type    : MYSQL
Target Server Version : 50517
File Encoding         : 65001

Date: 2020-02-07 16:00:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for smart_assis_media
-- ----------------------------
DROP TABLE IF EXISTS `smart_assis_media`;
CREATE TABLE `smart_assis_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` varchar(255) DEFAULT NULL,
  `post_date` varchar(255) DEFAULT NULL,
  `url_youtube` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of smart_assis_media
-- ----------------------------
INSERT INTO `smart_assis_media` VALUES ('1', 'ฝุ่นละออง PM 2.5 ภัยร้ายใกล้ตัว ทำลายสุขภาพ by หมอแอมป์', '30 มิ.ย 62', 'https://www.youtube.com/embed/ORzelkS8jak?control=0');
INSERT INTO `smart_assis_media` VALUES ('2', '[Dr.Amp Podcast] ฝุ่นละออง PM 2.5 ภัยร้ายใกล้ตัว by หมอแอมป์', '11 พ.ย. 2019', 'https://www.youtube.com/embed/zZ82fZp7jhA');
INSERT INTO `smart_assis_media` VALUES ('3', 'อาหารต้านพิษฝุ่น PM 2.5 : รู้สู้โรค', '31 ม.ค.6', 'https://www.youtube.com/embed/WKt8vkhwrmc');
INSERT INTO `smart_assis_media` VALUES ('34', 'This AI Is Beating Doctors At Their Own Game', 'This AI Is Beating Doctors At Their Own Game', 'https://www.youtube.com/embed/xDgkmXAsvL8');
