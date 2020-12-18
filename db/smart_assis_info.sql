/*
Navicat MySQL Data Transfer

Source Server         : 192.168.0.7_3306
Source Server Version : 50517
Source Host           : 192.168.0.7:3306
Source Database       : hos

Target Server Type    : MYSQL
Target Server Version : 50517
File Encoding         : 65001

Date: 2020-02-07 16:00:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for smart_assis_info
-- ----------------------------
DROP TABLE IF EXISTS `smart_assis_info`;
CREATE TABLE `smart_assis_info` (
  `dep` char(3) NOT NULL,
  `text1` varchar(255) DEFAULT NULL,
  `text2` varchar(255) DEFAULT NULL,
  `text3` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`dep`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of smart_assis_info
-- ----------------------------
INSERT INTO `smart_assis_info` VALUES ('010', 'วัดความดันที่เครื่องวัดความดัน', 'นั่งรอเจ้าหน้าที่ซักประวัติเรียกรับบริการ', null);
INSERT INTO `smart_assis_info` VALUES ('021', 'นั่งรอเจ้าหน้าที่เรียกรับบริการ', null, null);
INSERT INTO `smart_assis_info` VALUES ('014', 'นั่งรอเจ้าหน้าที่เรียกรับบริการ', null, null);
INSERT INTO `smart_assis_info` VALUES ('011', 'นั่งรอเจ้าหน้าที่เรียกรับบริการ', null, null);
INSERT INTO `smart_assis_info` VALUES ('005', 'นั่งรอเจ้าหน้าที่เรียกรับบริการ', null, null);
INSERT INTO `smart_assis_info` VALUES ('012', 'นั่งรอเจ้าหน้าที่เรียกรับบริการ', null, null);
INSERT INTO `smart_assis_info` VALUES ('007', 'นั่งรอเจ้าหน้าที่เรียกรับบริการ', null, null);
INSERT INTO `smart_assis_info` VALUES ('016', 'นั่งรอเจ้าหน้าที่เรียกรับบริการ', null, null);
INSERT INTO `smart_assis_info` VALUES ('030', 'นั่งรอเจ้าหน้าที่เรียกรับบริการ', null, null);
