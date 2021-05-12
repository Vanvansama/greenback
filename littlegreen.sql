/*
 Navicat Premium Data Transfer

 Source Server         : 本地mysql
 Source Server Type    : MySQL
 Source Server Version : 100509
 Source Host           : localhost:3306
 Source Schema         : littlegreen

 Target Server Type    : MySQL
 Target Server Version : 100509
 File Encoding         : 65001

 Date: 10/04/2021 10:51:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id` int NOT NULL,
  `username` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `name` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sex` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `create_time` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------

-- ----------------------------
-- Table structure for bike
-- ----------------------------
DROP TABLE IF EXISTS `bike`;
CREATE TABLE `bike`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `state` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `location` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `userId` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bike
-- ----------------------------
INSERT INTO `bike` VALUES (1, 'close', '香洲区政府', NULL);
INSERT INTO `bike` VALUES (2, 'close', ' ', NULL);
INSERT INTO `bike` VALUES (3, 'close', ' ', NULL);

-- ----------------------------
-- Table structure for exception
-- ----------------------------
DROP TABLE IF EXISTS `exception`;
CREATE TABLE `exception`  (
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT '',
  `bikeId` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `errorInfo` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT '',
  `imgList` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT '',
  `userId` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `status` int NULL DEFAULT 0,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of exception
-- ----------------------------
INSERT INTO `exception` VALUES ('香洲区政府(翠景路南)', '1', '123123123', '', 'oUd-C4jeaqBODgqY3nSDyPH4VRzY', 1, 1);

-- ----------------------------
-- Table structure for record
-- ----------------------------
DROP TABLE IF EXISTS `record`;
CREATE TABLE `record`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `begin_addr` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `end_addr` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `date` datetime NULL DEFAULT NULL,
  `bikeId` int NOT NULL,
  `userId` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `state` int NOT NULL DEFAULT 1 COMMENT '默认为1，表示没该路程还没结束，为0表示该路程已经结束\r\n',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of record
-- ----------------------------
INSERT INTO `record` VALUES (5, '香洲区政府(翠景路南)', '华翠豪庭', '2021-04-10 08:30:34', 1, 'oUd-C4jeaqBODgqY3nSDyPH4VRzY', 0);
INSERT INTO `record` VALUES (6, '香洲区政府(翠景路南)', '华翠豪庭', '2021-04-10 08:42:59', 1, 'oUd-C4jeaqBODgqY3nSDyPH4VRzY', 0);
INSERT INTO `record` VALUES (10, '香洲区政府(翠景路南)', '香洲区政府(翠景路南)', '2021-04-10 09:02:33', 1, 'oUd-C4jeaqBODgqY3nSDyPH4VRzY', 0);
INSERT INTO `record` VALUES (11, '香洲区政府(翠景路南)', '香洲区政府(翠景路南)', '2021-04-10 09:05:23', 1, 'oUd-C4jeaqBODgqY3nSDyPH4VRzY', 0);
INSERT INTO `record` VALUES (12, '香洲区政府(翠景路南)', '香洲区政府(翠景路南)', '2021-04-10 09:06:30', 1, 'oUd-C4jeaqBODgqY3nSDyPH4VRzY', 0);
INSERT INTO `record` VALUES (13, '香洲区政府(翠景路南)', '香洲区政府(翠景路南)', '2021-04-10 09:07:17', 1, 'oUd-C4jeaqBODgqY3nSDyPH4VRzY', 0);
INSERT INTO `record` VALUES (14, '香洲区政府(翠景路南)', '香洲区政府', '2021-04-10 09:07:59', 1, 'oUd-C4jeaqBODgqY3nSDyPH4VRzY', 0);

-- ----------------------------
-- Table structure for report
-- ----------------------------
DROP TABLE IF EXISTS `report`;
CREATE TABLE `report`  (
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `bikeId` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `errorInfo` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `imgList` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `userId` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` int NULL DEFAULT 0,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of report
-- ----------------------------
INSERT INTO `report` VALUES ('香洲区政府(翠景路南)', '1', '123123123', 'http://tmp/CCBjZSaDK6vVeea29b5e42100b19161e56144612dcb4.jpg,http://tmp/cvjJiNJGVHPsf20a86bcbb39a8d1d20e54a977b85b75.png', '车把', 'oUd-C4jeaqBODgqY3nSDyPH4VRzY', 1, 1);

-- ----------------------------
-- Table structure for suggestion
-- ----------------------------
DROP TABLE IF EXISTS `suggestion`;
CREATE TABLE `suggestion`  (
  `detail` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `userId` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of suggestion
-- ----------------------------
INSERT INTO `suggestion` VALUES ('123456', NULL);
INSERT INTO `suggestion` VALUES ('123123', NULL);
INSERT INTO `suggestion` VALUES ('2131', NULL);
INSERT INTO `suggestion` VALUES ('12312313', 'oUd-C4jeaqBODgqY3nSDyPH4VRzY');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sex` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `amout` double(255, 1) NULL DEFAULT NULL,
  `id` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `college` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('root', 'root', 'male', '', 0.0, '1', NULL);
INSERT INTO `user` VALUES ('刘凡', '12345', 'male', '13192269125', 0.0, 'oUd-C4jeaqBODgqY3nSDyPH4VRzY', '计算机');

SET FOREIGN_KEY_CHECKS = 1;


alter table exception add COLUMN date datetime;
alter table report add COLUMN date datetime;