/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 50553
 Source Host           : localhost:3306
 Source Schema         : tp

 Target Server Type    : MySQL
 Target Server Version : 50553
 File Encoding         : 65001

 Date: 06/01/2019 18:44:14
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for action
-- ----------------------------
DROP TABLE IF EXISTS `action`;
CREATE TABLE `action`  (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`aid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of action
-- ----------------------------
INSERT INTO `action` VALUES (1, 'app_update');
INSERT INTO `action` VALUES (2, 'app_publish');
INSERT INTO `action` VALUES (3, 'get_appVersion');
INSERT INTO `action` VALUES (4, 'app_delete');
INSERT INTO `action` VALUES (5, 'app_view');

-- ----------------------------
-- Table structure for app_analysis
-- ----------------------------
DROP TABLE IF EXISTS `app_analysis`;
CREATE TABLE `app_analysis`  (
  `anid` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) NULL DEFAULT NULL,
  `data` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`anid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of app_analysis
-- ----------------------------
INSERT INTO `app_analysis` VALUES (1, 2, '10', 'use', '2019-01-03 00:00:00');
INSERT INTO `app_analysis` VALUES (2, 2, '30', 'use', '2019-01-02 13:14:55');
INSERT INTO `app_analysis` VALUES (3, 2, '20', 'use', '2019-01-04 00:00:00');
INSERT INTO `app_analysis` VALUES (4, 2, '90', 'use', '2019-01-05 19:35:09');
INSERT INTO `app_analysis` VALUES (5, 2, '200', 'use', '2019-01-01 21:09:23');
INSERT INTO `app_analysis` VALUES (6, 2, '900', 'use', '2018-12-01 21:10:02');

-- ----------------------------
-- Table structure for apps
-- ----------------------------
DROP TABLE IF EXISTS `apps`;
CREATE TABLE `apps`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `appname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `appkey` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `version` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of apps
-- ----------------------------
INSERT INTO `apps` VALUES (1, 'test', 'test_description', 'dhwuqid124', 'bigsoup', '1.0', '1');
INSERT INTO `apps` VALUES (2, '大汤应用市场', '', 'OA6h2TYZ4puR0XwPlxJmizdDk5ebUFEco8LjK7at9IygrNQHnC3BM1GsqfSvVW', 'bigsoup', 'beta1.0', '1');
INSERT INTO `apps` VALUES (3, 'XCS', '213213213213213211321321321314124321321321321777777777777777777777777777777777777777777777', 'w8zMPCXQbFSAZUIeqo2HknOrG5vif1VuyN69BKmTlcxjLtp7YsEJ0Rgah43W', 'bigsoup', '1.0', '1');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role`  (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `action` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`rid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES (1, 'visitor', 'get_appVersion');
INSERT INTO `role` VALUES (2, 'owner', 'app_update');
INSERT INTO `role` VALUES (3, 'owner', 'app_delete');
INSERT INTO `role` VALUES (4, 'owner', 'get_appVersion');
INSERT INTO `role` VALUES (5, 'user', 'app_publish');
INSERT INTO `role` VALUES (6, 'user', 'app_view');

-- ----------------------------
-- Table structure for update
-- ----------------------------
DROP TABLE IF EXISTS `update`;
CREATE TABLE `update`  (
  `vid` int(11) NOT NULL AUTO_INCREMENT,
  `version` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `appkey` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`vid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `age` int(11) NULL DEFAULT NULL,
  `validate_code` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 21 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (15, 'admin2', 'bf3b2290e229da2ba272a81c602ea88d', NULL, NULL, NULL, 'admin');
INSERT INTO `user` VALUES (16, 'bigsoup', 'bf3b2290e229da2ba272a81c602ea88d', '2279688462@qq.com', 20, NULL, 'user');
INSERT INTO `user` VALUES (17, 'zhoubigsoup', 'bf3b2290e229da2ba272a81c602ea88d', 'bigsoupzhou@gmail.com', 20, NULL, 'user');
INSERT INTO `user` VALUES (20, '&lt;script&gt;alert(\'test\')&lt;/script&gt;', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 0, NULL, 'user');
INSERT INTO `user` VALUES (19, ';and user&gt;0', 'bf3b2290e229da2ba272a81c602ea88d', '2279389@q.com', 123, NULL, 'user');

SET FOREIGN_KEY_CHECKS = 1;
