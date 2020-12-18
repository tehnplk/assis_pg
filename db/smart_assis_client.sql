/*
Navicat MySQL Data Transfer

Source Server         : 192.168.0.7_3306
Source Server Version : 50517
Source Host           : 192.168.0.7:3306
Source Database       : hos

Target Server Type    : MYSQL
Target Server Version : 50517
File Encoding         : 65001

Date: 2020-02-07 16:00:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for smart_assis_client
-- ----------------------------
DROP TABLE IF EXISTS `smart_assis_client`;
CREATE TABLE `smart_assis_client` (
  `cid` varchar(13) NOT NULL,
  `token` varchar(255) NOT NULL,
  `hn` varchar(255) DEFAULT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `birth` varchar(255) DEFAULT NULL,
  `hospcode` varchar(255) DEFAULT NULL,
  `approved` enum('yes','no') DEFAULT NULL,
  `dupdate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
