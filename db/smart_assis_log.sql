/*
Navicat MySQL Data Transfer

Source Server         : 192.168.0.7_3306
Source Server Version : 50517
Source Host           : 192.168.0.7:3306
Source Database       : hos

Target Server Type    : MYSQL
Target Server Version : 50517
File Encoding         : 65001

Date: 2020-02-07 16:00:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for smart_assis_log
-- ----------------------------
DROP TABLE IF EXISTS `smart_assis_log`;
CREATE TABLE `smart_assis_log` (
  `uuid` varchar(255) NOT NULL COMMENT 'UUID',
  `hn` varchar(255) DEFAULT NULL,
  `view` varchar(255) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`uuid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
