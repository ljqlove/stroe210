/*
Navicat MySQL Data Transfer

Source Server         : bnedi
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : demo

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-12-18 15:55:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for address
-- ----------------------------
DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `aname` varchar(255) DEFAULT NULL,
  `aphone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `postcode` varchar(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0' COMMENT '0:普通地址;1:默认地址',
  `inputtime` datetime DEFAULT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of address
-- ----------------------------
INSERT INTO `address` VALUES ('1', '3', '李佳奇1', '15210559014', '北京市昌平区回龙观文化西路育人教育园区', '102200', '0', '0000-00-00 00:00:00');
INSERT INTO `address` VALUES ('3', '3', '王军达', '15210559014', '河北省邢台市桥东区邢台学院', '54001', '0', '0000-00-00 00:00:00');
INSERT INTO `address` VALUES ('4', '3', '王军达', '15210559014', '北京市平谷区谷丰路3号（老年公寓）', '1012002', '0', '0000-00-00 00:00:00');
INSERT INTO `address` VALUES ('5', '20', '李佳奇', '15210559014', '北京市昌平区回龙观文化西路育荣教育园区', '100110', '0', '2018-12-10 19:52:05');
INSERT INTO `address` VALUES ('6', '21', '王军达', '18839316924', '北京兄弟连', '10010', '0', '2018-12-11 13:15:21');
INSERT INTO `address` VALUES ('7', '21', '王军达', '18839316924', '北京七燕路一号院', '1001001', '0', '2018-12-11 13:16:21');
INSERT INTO `address` VALUES ('8', '21', '王军达', '18839316924', '天津', '10010', '0', '2018-12-13 20:22:53');
INSERT INTO `address` VALUES ('9', '2', '王军达', '18839316924', '北京市昌平区兄弟连', '10010', '0', '2018-12-15 18:44:54');
INSERT INTO `address` VALUES ('10', '2', '范立兵', '18839316924', '北京市昌平区兄弟连分部', '10010', '0', '2018-12-15 18:46:28');
INSERT INTO `address` VALUES ('11', '2', '赵亚宁', '18839316924', '北京市昌平区七里渠公寓', '10019', '0', '2018-12-15 18:50:10');
INSERT INTO `address` VALUES ('13', '5', '李佳奇', '15210559014', '北京市昌平区回龙观文化西路育荣教育园区', '100100', '0', '2018-12-16 15:27:29');
INSERT INTO `address` VALUES ('14', '5', '王军达', '14312312323', '北京市昌平区文化西路老年人公寓', '232312', '0', '2018-12-16 15:28:15');
INSERT INTO `address` VALUES ('15', '6', '范立兵', '14443212312', '北京市昌平区养老院', '100100', '0', '2018-12-17 14:22:49');
INSERT INTO `address` VALUES ('16', '6', '王军达', '13232323243', '北京市顺义郭家务寸白花钱理发馆741', '120000', '0', '2018-12-17 14:24:43');
INSERT INTO `address` VALUES ('17', '6', '王晓大', '18924143563', '北京市朝阳区来广营乡红军营村53号', '123123', '0', '2018-12-17 16:58:12');
INSERT INTO `address` VALUES ('18', '1', '赵', '17633119565', '北京市昌平区回龙观', '000000', '1', '2018-12-17 20:02:24');

-- ----------------------------
-- Table structure for advert
-- ----------------------------
DROP TABLE IF EXISTS `advert`;
CREATE TABLE `advert` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` int(2) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of advert
-- ----------------------------
INSERT INTO `advert` VALUES ('1', '/advert/friend-5c173537465d8.jpg', '啦啦啦', '1');
INSERT INTO `advert` VALUES ('2', '/advert/friend-5c173588c1546.jpg', '性感亚宁', '1');

-- ----------------------------
-- Table structure for blog_permissions
-- ----------------------------
DROP TABLE IF EXISTS `blog_permissions`;
CREATE TABLE `blog_permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '角色表 id	',
  `name` varchar(255) NOT NULL COMMENT '路由名称	',
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT '添加时间',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间	',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_permissions
-- ----------------------------
INSERT INTO `blog_permissions` VALUES ('1', 'App\\Http\\Controllers\\Admin\\Blog_userController', '管理员', '2018-12-10 09:10:36', '2018-12-10 09:10:36');
INSERT INTO `blog_permissions` VALUES ('2', 'App\\Http\\Controllers\\Admin\\CategoryController\"App\\Http\\Controllers\\Admin\\CategoryController', '分类管理', '2018-12-13 15:11:00', '2018-12-13 15:11:04');
INSERT INTO `blog_permissions` VALUES ('3', 'App\\Http\\Controllers\\Admin\\GoodsController', '商品管理', '2018-12-09 22:58:13', '2018-12-09 22:58:13');
INSERT INTO `blog_permissions` VALUES ('5', 'App\\Http\\Controllers\\Admin\\FriendController', '友情链接管理', '2018-12-09 22:55:32', '2018-12-09 22:55:32');
INSERT INTO `blog_permissions` VALUES ('6', 'App\\Http\\Controllers\\Admin\\Blog_rolesController', '角色管理', '2018-12-10 09:12:12', null);
INSERT INTO `blog_permissions` VALUES ('7', 'App\\Http\\Controllers\\Admin\\Blog_permissionsController', '权限管理', '2018-12-10 09:13:03', null);
INSERT INTO `blog_permissions` VALUES ('8', 'App\\Http\\Controllers\\Admin\\CommentController', '评价管理', '2018-12-10 09:13:58', null);
INSERT INTO `blog_permissions` VALUES ('9', 'App\\Http\\Controllers\\Admin\\OrderController', '评价管理', '2018-12-10 09:14:24', null);
INSERT INTO `blog_permissions` VALUES ('10', 'App\\Http\\Controllers\\Admin\\FlashController', '快讯管理', '2018-12-10 09:14:54', null);
INSERT INTO `blog_permissions` VALUES ('11', 'App\\Http\\Controllers\\Admin\\LunboController', '轮播图管理', '2018-12-10 09:15:34', null);
INSERT INTO `blog_permissions` VALUES ('12', 'App\\Http\\Controllers\\Admin\\SiteController', '系统站点设置', '2018-12-10 09:16:04', null);
INSERT INTO `blog_permissions` VALUES ('13', 'App\\Http\\Controllers\\Admin\\SystemController', '系统日志', '2018-12-10 09:16:26', null);
INSERT INTO `blog_permissions` VALUES ('14', 'App\\Http\\Controllers\\Admin\\IndexController', '后台主页', '2018-12-10 09:41:01', null);
INSERT INTO `blog_permissions` VALUES ('15', 'App\\Http\\Controllers\\Admin\\StroeController', '商家店铺管理', '2018-12-10 20:11:34', null);

-- ----------------------------
-- Table structure for blog_permission_role
-- ----------------------------
DROP TABLE IF EXISTS `blog_permission_role`;
CREATE TABLE `blog_permission_role` (
  `permission_id` int(11) NOT NULL COMMENT '权限id',
  `role_id` int(11) NOT NULL COMMENT '角色ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_permission_role
-- ----------------------------
INSERT INTO `blog_permission_role` VALUES ('2', '2');
INSERT INTO `blog_permission_role` VALUES ('3', '2');
INSERT INTO `blog_permission_role` VALUES ('5', '2');
INSERT INTO `blog_permission_role` VALUES ('8', '2');
INSERT INTO `blog_permission_role` VALUES ('9', '2');
INSERT INTO `blog_permission_role` VALUES ('10', '2');
INSERT INTO `blog_permission_role` VALUES ('11', '2');
INSERT INTO `blog_permission_role` VALUES ('14', '2');
INSERT INTO `blog_permission_role` VALUES ('5', '4');
INSERT INTO `blog_permission_role` VALUES ('11', '4');
INSERT INTO `blog_permission_role` VALUES ('14', '4');
INSERT INTO `blog_permission_role` VALUES ('5', '5');
INSERT INTO `blog_permission_role` VALUES ('14', '5');
INSERT INTO `blog_permission_role` VALUES ('2', '1');
INSERT INTO `blog_permission_role` VALUES ('3', '1');
INSERT INTO `blog_permission_role` VALUES ('5', '1');
INSERT INTO `blog_permission_role` VALUES ('8', '1');
INSERT INTO `blog_permission_role` VALUES ('9', '1');
INSERT INTO `blog_permission_role` VALUES ('10', '1');
INSERT INTO `blog_permission_role` VALUES ('11', '1');
INSERT INTO `blog_permission_role` VALUES ('13', '1');
INSERT INTO `blog_permission_role` VALUES ('14', '1');
INSERT INTO `blog_permission_role` VALUES ('15', '1');
INSERT INTO `blog_permission_role` VALUES ('5', '3');
INSERT INTO `blog_permission_role` VALUES ('9', '3');
INSERT INTO `blog_permission_role` VALUES ('10', '3');
INSERT INTO `blog_permission_role` VALUES ('11', '3');
INSERT INTO `blog_permission_role` VALUES ('12', '3');
INSERT INTO `blog_permission_role` VALUES ('14', '3');

-- ----------------------------
-- Table structure for blog_roles
-- ----------------------------
DROP TABLE IF EXISTS `blog_roles`;
CREATE TABLE `blog_roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '角色表 id	',
  `name` varchar(255) NOT NULL COMMENT '角色名称	',
  `description` varchar(255) NOT NULL COMMENT '角色描述	',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT '添加时间',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_roles
-- ----------------------------
INSERT INTO `blog_roles` VALUES ('1', 'CEO', '仅次于admin', '2018-12-13 14:57:36', '2018-12-13 14:57:40');
INSERT INTO `blog_roles` VALUES ('2', '管理员', '仅次于CEO', '2018-12-13 15:09:27', '2018-12-13 15:09:27');
INSERT INTO `blog_roles` VALUES ('3', '经理', '好像用处不大', '2018-11-28 14:18:31', '2018-11-28 14:18:34');
INSERT INTO `blog_roles` VALUES ('4', '主管', '看门的', '2018-11-28 00:14:00', null);
INSERT INTO `blog_roles` VALUES ('5', '组长', '没什么用', '2018-11-28 14:18:09', '2018-11-28 14:18:12');

-- ----------------------------
-- Table structure for blog_role_user
-- ----------------------------
DROP TABLE IF EXISTS `blog_role_user`;
CREATE TABLE `blog_role_user` (
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `role_id` int(11) NOT NULL DEFAULT '5' COMMENT '角色ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_role_user
-- ----------------------------
INSERT INTO `blog_role_user` VALUES ('1', '1');
INSERT INTO `blog_role_user` VALUES ('4', '5');
INSERT INTO `blog_role_user` VALUES ('4', '5');
INSERT INTO `blog_role_user` VALUES ('4', '5');
INSERT INTO `blog_role_user` VALUES ('4', '5');
INSERT INTO `blog_role_user` VALUES ('4', '5');
INSERT INTO `blog_role_user` VALUES ('4', '5');
INSERT INTO `blog_role_user` VALUES ('4', '5');
INSERT INTO `blog_role_user` VALUES ('4', '5');
INSERT INTO `blog_role_user` VALUES ('4', '5');
INSERT INTO `blog_role_user` VALUES ('4', '5');
INSERT INTO `blog_role_user` VALUES ('4', '5');
INSERT INTO `blog_role_user` VALUES ('4', '5');
INSERT INTO `blog_role_user` VALUES ('4', '5');
INSERT INTO `blog_role_user` VALUES ('3', '5');
INSERT INTO `blog_role_user` VALUES ('3', '5');
INSERT INTO `blog_role_user` VALUES ('2', '2');
INSERT INTO `blog_role_user` VALUES ('5', '2');
INSERT INTO `blog_role_user` VALUES ('6', '5');
INSERT INTO `blog_role_user` VALUES ('6', '5');
INSERT INTO `blog_role_user` VALUES ('6', '5');
INSERT INTO `blog_role_user` VALUES ('6', '5');
INSERT INTO `blog_role_user` VALUES ('6', '5');
INSERT INTO `blog_role_user` VALUES ('6', '5');
INSERT INTO `blog_role_user` VALUES ('6', '5');
INSERT INTO `blog_role_user` VALUES ('6', '5');
INSERT INTO `blog_role_user` VALUES ('6', '5');
INSERT INTO `blog_role_user` VALUES ('7', '1');
INSERT INTO `blog_role_user` VALUES ('7', '5');
INSERT INTO `blog_role_user` VALUES ('7', '5');
INSERT INTO `blog_role_user` VALUES ('7', '5');

-- ----------------------------
-- Table structure for blog_user
-- ----------------------------
DROP TABLE IF EXISTS `blog_user`;
CREATE TABLE `blog_user` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户表ID',
  `user_name` varchar(50) NOT NULL COMMENT '用户名',
  `user_pass` varchar(255) NOT NULL COMMENT '密码',
  `user_pic` varchar(255) NOT NULL DEFAULT '/images/blog_user/uploads/default.jpg',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT '添加时间',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  `delete_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '删除时间',
  `status` enum('1','0') DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_user
-- ----------------------------
INSERT INTO `blog_user` VALUES ('1', 'admin', '$2y$10$9Aw26o8kyo4LW8sOpl7zxu9ApTKZ2eIryOWgHI1Io4ood3Vn0wf3u', '/images/blog_user/uploads/blog_user-5bfd6a16a23f2.jpeg', '2018-11-30 09:13:16', '2018-11-30 09:13:21', '2018-11-30 09:13:16', '1');
INSERT INTO `blog_user` VALUES ('2', 'wjd', '$2y$10$o4kbiTlGd1Rdo7baXrX8l.wHBHOVypkhRjnoBE4RaBtbYJxxFVCCe', '/images/blog_user/uploads/blog_user-5bfd6a23a71a6.jpg', '2018-11-28 00:00:35', '2018-11-28 00:00:35', '2018-11-28 00:00:35', '1');
INSERT INTO `blog_user` VALUES ('5', 'ljq', '$2y$10$7OYUx1H8uXK2FlsRnCRJa.jsie5pFsynhSC7XF8us3DBUsEc6RYzC', '/images/blog_user/uploads/blog_user-5c10d46b5b12e.gif', '2018-12-12 17:27:03', '2018-12-12 17:27:07', '2018-12-12 17:27:03', '1');
INSERT INTO `blog_user` VALUES ('6', 'zyn', '$2y$10$mwf0PnMObtiQPstthN9YEOQCQUaP4eVfWDEzMiHS9kHRsW/2.Jgga', '/images/blog_user/uploads/default.jpg', '2018-12-10 19:31:05', '2018-12-10 19:31:05', '2018-12-10 19:31:05', '0');
INSERT INTO `blog_user` VALUES ('7', 'flb', '$2y$10$1pYazY1yziv4pskDWfhYFOpSI7S7y2evhVwLcrj1ry0iBwoTa5iLK', '/images/blog_user/uploads/blog_user-5c170ec44ac36.jpg', '2018-12-17 10:49:40', '2018-12-17 10:49:40', '2018-12-17 10:49:40', '1');

-- ----------------------------
-- Table structure for cart
-- ----------------------------
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `gname` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `num` int(11) DEFAULT '1',
  `price` decimal(10,0) DEFAULT NULL,
  `gimg` varchar(255) DEFAULT NULL,
  `status` enum('0','1','2') DEFAULT '1' COMMENT '0:失效;1:有货;2;促销',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cart
-- ----------------------------
INSERT INTO `cart` VALUES ('3', '3', '荣耀note10', '1', '1', '1', '2799', '/default.jpg', '1');
INSERT INTO `cart` VALUES ('4', '3', '荣耀note10', '1', '1', '1', '2799', '/default.jpg', '1');
INSERT INTO `cart` VALUES ('6', '17', '加绒打底衫女长袖高领蕾丝上衣女装秋冬季2018新款韩版百搭连衣裙', '7', '9', '1', '79', '/uploads/goods/201812112031158914.jpg', '1');
INSERT INTO `cart` VALUES ('13', '5', '华硕(ASUS) 飞行堡垒6 15.6英寸窄边框游戏笔记本电脑', '43', '45', '1', '7299', '/uploads/goods/201812151805098144.jpg', '1');
INSERT INTO `cart` VALUES ('18', '5', 'Apple iPhone X (A1865) 64GB 深空灰色 移动联通电信4G手机', '74', '93', '1', '6499', '/uploads/goods/201812151830277968.jpg', '1');
INSERT INTO `cart` VALUES ('19', '5', 'Apple iPhone X (A1865) 64GB 深空灰色 移动联通电信4G手机', '74', '93', '1', '6499', '/uploads/goods/201812151830277968.jpg', '1');
INSERT INTO `cart` VALUES ('20', '5', '鲨鱼外套潮牌APE连帽衫猿人头情侣装男士卫衣', '49', '58', '9', '899', '/uploads/goods/201812151906589578.jpg', '1');
INSERT INTO `cart` VALUES ('21', '3', '加绒打底衫女长袖高领蕾丝上衣女装秋冬季2018新款韩版百搭连衣裙123', '18', '23', '1', '79', '/uploads/goods/201812142045101875.jpg', '1');
INSERT INTO `cart` VALUES ('24', '3', '加绒打底衫女长袖高领蕾丝上衣女装秋冬季2018新款韩版百搭连衣裙123', '19', '26', '1', '99', '/uploads/goods/201812142045107809.jpg', '1');
INSERT INTO `cart` VALUES ('26', '2', '加绒打底衫女长袖高领蕾丝上衣女装秋冬季2018新款韩版百搭连衣裙123', '19', '24', '1', '79', '/uploads/goods/201812142045107809.jpg', '1');
INSERT INTO `cart` VALUES ('35', '6', '加绒打底衫女长袖高领蕾丝上衣女装秋冬季2018新款韩版百搭连衣裙123', '17', '25', '1', '99', '/uploads/goods/201812142045106305.jpg', '1');

-- ----------------------------
-- Table structure for collect
-- ----------------------------
DROP TABLE IF EXISTS `collect`;
CREATE TABLE `collect` (
  `uid` int(11) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of collect
-- ----------------------------
INSERT INTO `collect` VALUES ('5', '67', null);
INSERT INTO `collect` VALUES ('5', '82', null);
INSERT INTO `collect` VALUES ('5', '84', null);
INSERT INTO `collect` VALUES ('5', '85', null);
INSERT INTO `collect` VALUES ('5', '72', null);
INSERT INTO `collect` VALUES ('5', null, '1');
INSERT INTO `collect` VALUES ('6', '79', null);
INSERT INTO `collect` VALUES ('6', null, '5');
INSERT INTO `collect` VALUES ('6', null, '1');
INSERT INTO `collect` VALUES ('3', '85', null);
INSERT INTO `collect` VALUES ('3', '75', null);
INSERT INTO `collect` VALUES ('3', '79', null);
INSERT INTO `collect` VALUES ('6', '72', null);

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `star` enum('0','1','2','3','4','5') DEFAULT '0' COMMENT '星级评价',
  `inputtime` datetime DEFAULT NULL COMMENT '评论时间',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('1', '58', '3', '这是内容', '5', '2018-11-25 20:06:16');

-- ----------------------------
-- Table structure for friends
-- ----------------------------
DROP TABLE IF EXISTS `friends`;
CREATE TABLE `friends` (
  `fid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(32) DEFAULT NULL,
  `fpic` varchar(255) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `inputtime` datetime DEFAULT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of friends
-- ----------------------------
INSERT INTO `friends` VALUES ('1', '百度', '/images/friends/uploads/friends-5c0496f063987.png', 'www.baidu.com', '2018-12-03 10:37:36');
INSERT INTO `friends` VALUES ('2', '歪秀购物', '/images/friends/uploads/friends-5c0496ff97e64.png', 'www.stroe.com', '2018-12-03 10:37:51');
INSERT INTO `friends` VALUES ('3', '腾讯', '/images/friends/uploads/friends-5c04970e32d9b.png', 'www.qq.com', '2018-12-13 17:05:58');

-- ----------------------------
-- Table structure for gcolor
-- ----------------------------
DROP TABLE IF EXISTS `gcolor`;
CREATE TABLE `gcolor` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(11) DEFAULT NULL,
  `sid` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `pictrue` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gcolor
-- ----------------------------
INSERT INTO `gcolor` VALUES ('1', '1', '1,2,3,4,5', '黑色', '/defalut.jpg');
INSERT INTO `gcolor` VALUES ('2', '1', '1,2,4', '红色', '/defalut.jpg');
INSERT INTO `gcolor` VALUES ('3', '1', '1,3,5', '土豪金', '/defalut.jpg');
INSERT INTO `gcolor` VALUES ('4', '1', '2,4', '粉色', '/defalut.jpg');
INSERT INTO `gcolor` VALUES ('5', '1', '1,2,3,4,5', '蓝色', '/defalut.jpg');
INSERT INTO `gcolor` VALUES ('6', '58', '7,8,9,10', '红色', '/uploads/goods/201812112031155354.jpg');
INSERT INTO `gcolor` VALUES ('7', '58', '7,9,10', '青色', '/uploads/goods/201812112031158914.jpg');
INSERT INTO `gcolor` VALUES ('8', '58', '6,7,8,9,10', '黑色', '/uploads/goods/201812112031159876.jpg');
INSERT INTO `gcolor` VALUES ('9', '59', '11,12,13,14,15', '红色', '/uploads/goods/201812112049371353.jpg');
INSERT INTO `gcolor` VALUES ('10', '59', '11,13,14,15', '蓝色', '/uploads/goods/201812112049379302.jpg');
INSERT INTO `gcolor` VALUES ('11', '59', '11,13,14,15', '黑色', '/uploads/goods/201812112049371068.jpg');
INSERT INTO `gcolor` VALUES ('12', '59', null, '卡其色', null);
INSERT INTO `gcolor` VALUES ('13', '60', '17,18,19,20', '蓝色', '/uploads/goods/201812112111373980.jpg');
INSERT INTO `gcolor` VALUES ('14', '60', '16,17,19,20', '紫色', '/uploads/goods/201812112111385405.png');
INSERT INTO `gcolor` VALUES ('15', '60', '16,17,19,20', '黑色', '/uploads/goods/201812112111383914.jpg');
INSERT INTO `gcolor` VALUES ('16', '60', '16,17,19,20', '卡其色', '/uploads/goods/201812112111387549.jpg');
INSERT INTO `gcolor` VALUES ('17', '63', '21,23,24,25', '红色', '/uploads/goods/201812142045106305.jpg');
INSERT INTO `gcolor` VALUES ('18', '63', '22,23,24,25,26', '橙色', '/uploads/goods/201812142045101875.jpg');
INSERT INTO `gcolor` VALUES ('19', '63', '22,23,24,25,26', '黄色', '/uploads/goods/201812142045107809.jpg');
INSERT INTO `gcolor` VALUES ('20', '64', '28', '红色', '/uploads/goods/201812151712241308.jpg');
INSERT INTO `gcolor` VALUES ('21', '64', '28', '黑色', '/uploads/goods/201812151712241374.jpg');
INSERT INTO `gcolor` VALUES ('22', '65', null, '蓝色', null);
INSERT INTO `gcolor` VALUES ('23', '66', '31,32', '青色', '/uploads/goods/201812151732128044.jpg');
INSERT INTO `gcolor` VALUES ('24', '66', '31,32', '蓝色', '/uploads/goods/201812151732125767.jpg');
INSERT INTO `gcolor` VALUES ('25', '66', '31,32', '黑色', '/uploads/goods/201812151732138477.jpg');
INSERT INTO `gcolor` VALUES ('26', '67', '33', '绿色', '/uploads/goods/201812151739119501.jpg');
INSERT INTO `gcolor` VALUES ('27', '68', null, '红色', null);
INSERT INTO `gcolor` VALUES ('28', '68', null, '蓝色', null);
INSERT INTO `gcolor` VALUES ('29', '68', null, '紫色', null);
INSERT INTO `gcolor` VALUES ('30', '68', null, '黑色', null);
INSERT INTO `gcolor` VALUES ('31', '69', '35,36,37', '红色', '/uploads/goods/201812151740028208.jpg');
INSERT INTO `gcolor` VALUES ('32', '69', '35,36,37', '蓝色', '/uploads/goods/201812151740027372.jpg');
INSERT INTO `gcolor` VALUES ('33', '69', '35,36,37', '紫色', '/uploads/goods/201812151740023961.jpg');
INSERT INTO `gcolor` VALUES ('34', '69', '35,36,37', '黑色', '/uploads/goods/201812151740026672.jpg');
INSERT INTO `gcolor` VALUES ('35', '71', '38,39,40,41', '红色', '/uploads/goods/201812151747123839.jpg');
INSERT INTO `gcolor` VALUES ('36', '71', '38,39,40,41', '蓝色', '/uploads/goods/201812151747137780.jpg');
INSERT INTO `gcolor` VALUES ('37', '71', '38,39,40,41', '黑色', '/uploads/goods/201812151747134890.jpg');
INSERT INTO `gcolor` VALUES ('38', '71', '38,39,40,41', '土豪金', '/uploads/goods/201812151747134968.jpg');
INSERT INTO `gcolor` VALUES ('39', '72', '42,43,44', '红色', '/uploads/goods/201812151753367890.jpg');
INSERT INTO `gcolor` VALUES ('40', '72', '42,43,44', '蓝色', '/uploads/goods/201812151753362580.jpg');
INSERT INTO `gcolor` VALUES ('41', '72', '42,43,44', '黑色', '/uploads/goods/201812151753368611.jpg');
INSERT INTO `gcolor` VALUES ('42', '73', '45,46,47,48,49', '红色', '/uploads/goods/201812151805096326.jpg');
INSERT INTO `gcolor` VALUES ('43', '73', '46,47,49', '黑色', '/uploads/goods/201812151805098144.jpg');
INSERT INTO `gcolor` VALUES ('44', '73', '46,47,49', '土豪金', '/uploads/goods/201812151805096914.jpg');
INSERT INTO `gcolor` VALUES ('45', '74', '50,51', '橙色', '/uploads/goods/201812151904371224.jpg');
INSERT INTO `gcolor` VALUES ('46', '75', '52,53,54,55,56', '蓝色', '/uploads/goods/201812151759561369.jpg');
INSERT INTO `gcolor` VALUES ('47', '75', '52,53,54,55,56', '卡其色', '/uploads/goods/201812151759564584.jpg');
INSERT INTO `gcolor` VALUES ('48', '75', '52,53,54,55,56', '土豪金', '/uploads/goods/201812151759566826.jpg');
INSERT INTO `gcolor` VALUES ('49', '76', '57,58', '橙色', '/uploads/goods/201812151906589578.jpg');
INSERT INTO `gcolor` VALUES ('50', '77', '59,60,61', '黑色', '/uploads/goods/201812151909025939.png');
INSERT INTO `gcolor` VALUES ('51', '78', '62,63,64', '青色', '/uploads/goods/201812151807117664.jpg');
INSERT INTO `gcolor` VALUES ('52', '78', '62,63,64', '蓝色', '/uploads/goods/201812151807113985.jpg');
INSERT INTO `gcolor` VALUES ('53', '78', '62,63,64', '紫色', '/uploads/goods/201812151807115359.jpg');
INSERT INTO `gcolor` VALUES ('54', '78', '62,63,64', '灰色', '/uploads/goods/201812151807129798.jpg');
INSERT INTO `gcolor` VALUES ('55', '78', '62,63,64', '黑色', '/uploads/goods/201812151807122206.jpg');
INSERT INTO `gcolor` VALUES ('56', '79', '65,66', '蓝色', '/uploads/goods/201812151811264128.jpg');
INSERT INTO `gcolor` VALUES ('57', '79', '65,66', '灰色', '/uploads/goods/201812151811267327.png');
INSERT INTO `gcolor` VALUES ('58', '79', '65,66', '黑色', '/uploads/goods/201812151811262893.jpg');
INSERT INTO `gcolor` VALUES ('59', '79', '65,66', '土豪金', '/uploads/goods/201812151811265653.jpg');
INSERT INTO `gcolor` VALUES ('60', '80', '67', '蓝色', '/uploads/goods/201812151812389068.jpg');
INSERT INTO `gcolor` VALUES ('61', '81', '71,72', '红色', '/uploads/goods/201812151815595410.jpg');
INSERT INTO `gcolor` VALUES ('62', '81', '71,72', '蓝色', '/uploads/goods/201812151815599463.jpg');
INSERT INTO `gcolor` VALUES ('63', '81', '71,72', '紫色', '/uploads/goods/201812151815594064.jpg');
INSERT INTO `gcolor` VALUES ('64', '81', '71,72', '黑色', '/uploads/goods/201812151815598058.jpg');
INSERT INTO `gcolor` VALUES ('65', '81', '71,72', '土豪金', '/uploads/goods/201812151815597599.jpg');
INSERT INTO `gcolor` VALUES ('66', '82', '73,74,75,77', '灰色', '/uploads/goods/201812151816012939.jpg');
INSERT INTO `gcolor` VALUES ('67', '82', '73,74,75', '土豪金', '/uploads/goods/201812151816013120.jpg');
INSERT INTO `gcolor` VALUES ('68', '83', '79,80,81,82', '黑色', '/uploads/goods/201812151913081521.jpg');
INSERT INTO `gcolor` VALUES ('69', '84', '83,84,85,86,87,88,89,90,91,92', '红色', '/uploads/goods/201812151830499614.jpg');
INSERT INTO `gcolor` VALUES ('70', '84', '83,84,85,86,87,88,89,90,91,92', '橙色', '/uploads/goods/201812151830497606.jpg');
INSERT INTO `gcolor` VALUES ('71', '84', '83,84,85,86,87,88,89,90,91,92', '黄色', '/uploads/goods/201812151830498084.jpg');
INSERT INTO `gcolor` VALUES ('72', '84', '83,84,85,86,87,88,89,90,91,92', '绿色', '/uploads/goods/201812151830498887.jpg');
INSERT INTO `gcolor` VALUES ('73', '84', '83,84,85,86,87,88,89,90,91,92', '青色', '/uploads/goods/201812151830493983.jpg');
INSERT INTO `gcolor` VALUES ('74', '85', '93,94', '灰色', '/uploads/goods/201812151830277968.jpg');
INSERT INTO `gcolor` VALUES ('75', '85', '93,94', '黑色', '/uploads/goods/201812151830276471.jpg');
INSERT INTO `gcolor` VALUES ('76', '86', null, '黑色', null);
INSERT INTO `gcolor` VALUES ('77', '86', null, '土豪金', null);
INSERT INTO `gcolor` VALUES ('78', '87', '96,97', '黑色', '/uploads/goods/201812151837527892.jpg');
INSERT INTO `gcolor` VALUES ('79', '87', '96,97', '土豪金', '/uploads/goods/201812151837529345.jpg');
INSERT INTO `gcolor` VALUES ('80', '88', '98,99,100,101', '红色', '/uploads/goods/201812151915271226.jpg');
INSERT INTO `gcolor` VALUES ('81', '89', '102,103,104,105', '红色', '/uploads/goods/201812162042376344.jpg');
INSERT INTO `gcolor` VALUES ('82', '89', '102,103,104,105', '灰色', '/uploads/goods/201812162042376543.jpg');
INSERT INTO `gcolor` VALUES ('83', '89', '103,104,105', '黑色', '/uploads/goods/201812162042371943.jpg');
INSERT INTO `gcolor` VALUES ('84', '90', '107,108,109', '红色', '/uploads/goods/201812162118586875.jpg');
INSERT INTO `gcolor` VALUES ('85', '90', '106,107,108,109', '橙色', '/uploads/goods/201812162118582455.jpg');
INSERT INTO `gcolor` VALUES ('86', '90', '107,108,109', '青色', '/uploads/goods/201812162118582270.jpg');
INSERT INTO `gcolor` VALUES ('87', '90', '106,107,108', '卡其色', '/uploads/goods/201812162118585401.jpg');
INSERT INTO `gcolor` VALUES ('88', '91', '110,111,112', '红色', '/uploads/goods/201812171655541868.png');
INSERT INTO `gcolor` VALUES ('89', '91', '111,112', '蓝色', '/uploads/goods/201812171655549542.png');
INSERT INTO `gcolor` VALUES ('90', '91', '110,111,112', '黑色', '/uploads/goods/201812171655541288.png');

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `gid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL,
  `gname` varchar(64) NOT NULL,
  `company` int(11) DEFAULT NULL,
  `descript` varchar(2550) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `gpic` varchar(255) DEFAULT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '2' COMMENT '0:下架;1:在售;2:新加',
  `stock` int(11) DEFAULT NULL COMMENT '库存量',
  `size` varchar(255) DEFAULT NULL,
  `inputtime` datetime DEFAULT NULL,
  `num` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`gid`),
  UNIQUE KEY `gname` (`gname`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('63', '30', '加绒打底衫女长袖高领蕾丝上衣女装秋冬季2018新款韩版百搭连衣裙123', '2', '<p><img src=\"/uploads/descript/20181214/15447913692-1.jpg\" title=\"15447913692-1.jpg\"/></p><p><img src=\"/uploads/descript/20181214/15447913692-2.jpg\" title=\"15447913692-2.jpg\"/></p><p><img src=\"/uploads/descript/20181214/15447913692-3.jpg\" title=\"15447913692-3.jpg\"/></p><p><br/></p>', '34', '/uploads/goods/201812142040339498.jpg', '1', '38', null, '2018-12-14 20:40:33', '0');
INSERT INTO `goods` VALUES ('64', '31', '神舟战神 战神 T6-X5/ Z6-KP5S 八代酷睿i5 GTX1050游戏独显 学生手提吃鸡游戏本笔记本电脑', '3', '<p>神州神州 风雨同舟</p>', '5599', '/uploads/goods/friend-5c14c54d4f00d.jpg', '1', '100', null, '2018-12-15 17:08:17', '0');
INSERT INTO `goods` VALUES ('66', '33', '荣耀9i 4GB+128GB 幻夜黑 移动联通电信4G全面屏手机 双卡双待', '1', '<p>限时优惠1599！限时赠送移动电源，送完即止！1600万前置感光增强镜头！荣耀爆品特惠，选品质，购荣耀~\r\n选移动，享大流量，不换号购机！<img src=\"/uploads/descript/20181215/15448661935bffa289Na2e85364.jpg\" title=\"15448661935bffa289Na2e85364.jpg\" alt=\"5bffa289Na2e85364.jpg\"/></p>', '1599', '/uploads/goods/201812151728571108.jpg', '1', '22', null, '2018-12-15 17:28:57', '0');
INSERT INTO `goods` VALUES ('67', '31', '神州（HASEE)战神 Z7-KP7GE GTX1060 8G内存 256G SSD 游戏笔记本电脑', '3', '<p><img src=\"/uploads/descript/20181215/15448665544fba817b8cfa4414 (1).jpg\" title=\"15448665544fba817b8cfa4414 (1).jpg\"/></p><p><img src=\"/uploads/descript/20181215/1544866554bc747c622fc58c23.jpg\" title=\"1544866554bc747c622fc58c23.jpg\"/></p><p>神州（HASEE)战神 Z7-KP7GE GTX1060 8G内存 256G SSD 游戏笔记本电脑<br/></p>', '7300', '/uploads/goods/201812151734026997.jpg', '1', '98', null, '2018-12-15 17:34:02', '0');
INSERT INTO `goods` VALUES ('69', '33', '荣耀8X 千元屏霸 91%屏占比 2000万AI双摄 4GB+64GB 幻影蓝 移动联通电信4G全面屏手机 双卡双待', '1', '<p>限时赠送耳机，送完即止！麒麟710！2000万AI双摄！荣耀爆品特惠，选品质，购荣耀~</p><p><img src=\"/uploads/descript/20181215/1544866770a8985cd000c6d4d2.jpg\" title=\"1544866770a8985cd000c6d4d2.jpg\"/></p><p><img src=\"/uploads/descript/20181215/1544866770b3bbe526b3c366fb.jpg\" title=\"1544866770b3bbe526b3c366fb.jpg\"/></p><p><img src=\"/uploads/descript/20181215/15448667705428005007fe03c6.jpg\" title=\"15448667705428005007fe03c6.jpg\"/></p><p><br/></p>', '1399', '/uploads/goods/201812151739181087.jpg', '1', '39', null, '2018-12-15 17:39:18', '0');
INSERT INTO `goods` VALUES ('71', '33', '荣耀 V10 高配版 6GB+64GB 极光蓝 移动联通电信4G全面屏游戏手机 双卡双待', '1', '<p>限时优惠1999，领券立减300，成交价1699！麒麟970！全面屏！荣耀爆品特惠，选品质，购荣耀~</p><p><img src=\"/uploads/descript/20181215/15448671905bee70e9N8576b7d2.jpg\" title=\"15448671905bee70e9N8576b7d2.jpg\"/></p><p><img src=\"/uploads/descript/20181215/15448671905bee70e9N94164d3e.jpg\" title=\"15448671905bee70e9N94164d3e.jpg\"/></p><p><br/></p>', '1999', '/uploads/goods/201812151743239642.jpg', '1', '49', null, '2018-12-15 17:43:23', '0');
INSERT INTO `goods` VALUES ('72', '33', '荣耀Magic2 麒麟980AI智能芯片 超广角AI三摄 6GB+128GB 渐变黑 移动联通电信4G手机 双卡双待', '1', '<p><img src=\"/uploads/descript/20181215/15448675895bff5c03N4b0639f6.jpg\" title=\"15448675895bff5c03N4b0639f6.jpg\"/></p><p><img src=\"/uploads/descript/20181215/154486758953d15b29fe76eb2f.jpg\" title=\"154486758953d15b29fe76eb2f.jpg\"/></p><p><img src=\"/uploads/descript/20181215/15448675895bf8ecf8N2ba04aeb.jpg\" title=\"15448675895bf8ecf8N2ba04aeb.jpg\"/></p><p><img src=\"/uploads/descript/20181215/1544867589543b4f418c666abc.jpg\" title=\"1544867589543b4f418c666abc.jpg\"/></p><p><br/></p>', '3799', '/uploads/goods/201812151752443277.jpg', '1', '50', null, '2018-12-15 17:52:44', '0');
INSERT INTO `goods` VALUES ('73', '36', '华硕(ASUS) 飞行堡垒6 15.6英寸窄边框游戏笔记本电脑', '4', '<p>【周末秒杀开启！华硕年终大促！】256G大容量高速读取！超窄边框视野无阻，强劲散热一键启动！年终促销点此！游戏本6期免息&gt;&gt;</p>', '7299', '/uploads/goods/201812151755216837.jpg', '1', '97', null, '2018-12-15 17:55:21', '0');
INSERT INTO `goods` VALUES ('74', '7', 'Air Jordan 13 low x Clot AJ13 兵马俑 AT3102-200', '2', '<p>作为一个标志性sneakerhead，他的梦想毫无疑问的就是能够被一堆自己喜欢的球鞋所包围着，每天都沉溺于要宠幸哪一双鞋的甜蜜的烦恼之中，而如果要说还有更加终极梦想的话，那一定就是让自己喜欢的品牌为自己打造一款专属的鞋子</p><p><img src=\"/uploads/descript/20181215/1544871862O1CN01g0u1bC1XTEa4u6iZz_!!56152924.jpg\" title=\"1544871862O1CN01g0u1bC1XTEa4u6iZz_!!56152924.jpg\"/></p><p><img src=\"/uploads/descript/20181215/1544871862O1CN01iis3wt1XTEa6i3lcv_!!56152924.jpg\" title=\"1544871862O1CN01iis3wt1XTEa6i3lcv_!!56152924.jpg\"/></p><p><img src=\"/uploads/descript/20181215/1544871862O1CN01OzjnLO1XTEa6zb0ui_!!56152924.jpg\" title=\"1544871862O1CN01OzjnLO1XTEa6zb0ui_!!56152924.jpg\"/></p><p><img src=\"/uploads/descript/20181215/1544871862O1CN011dY0731VE0AsSYDLB_!!0-item_pic.jpg_430x430q90.jpg\" title=\"1544871862O1CN011dY0731VE0AsSYDLB_!!0-item_pic.jpg_430x430q90.jpg\"/></p><p><img src=\"/uploads/descript/20181215/1544871862O1CN013kIJPH1XTEa3x5Xxr_!!56152924.jpg\" title=\"1544871862O1CN013kIJPH1XTEa3x5Xxr_!!56152924.jpg\"/></p><p><br/></p>', '3499', '/uploads/goods/201812151757345882.jpg', '1', '15', null, '2018-12-15 17:57:34', '0');
INSERT INTO `goods` VALUES ('75', '33', '华为 HUAWEI P20 Pro 全面屏徕卡三摄游戏手机 6GB+128GB 极光色 全网通移动联通电信4G手机 双卡双待', '1', '<p>【下单减100+白条6期免息 到手价4888！】4000万徕卡三摄/DxO评分过百！Mate20全新上市，新品不断，详情猛戳》\r\n选移动，享大流量，不换号购机！</p><p><img src=\"/uploads/descript/20181215/15448679675af11113Ne097af68.jpg\" title=\"15448679675af11113Ne097af68.jpg\"/></p><p><img src=\"/uploads/descript/20181215/15448679675af11113N806c7ccb.jpg\" title=\"15448679675af11113N806c7ccb.jpg\"/></p><p><img src=\"/uploads/descript/20181215/15448679675b4ff443N0fecacdf.jpg\" title=\"15448679675b4ff443N0fecacdf.jpg\"/></p><p><br/></p>', '4988', '/uploads/goods/201812151758429015.jpg', '1', '59', null, '2018-12-15 17:58:42', '0');
INSERT INTO `goods` VALUES ('76', '30', '鲨鱼外套潮牌APE连帽衫猿人头情侣装男士卫衣', '2', '<p>潮牌bape你值得拥有</p><p><img src=\"/uploads/descript/20181215/1544871981O1CN01Hghu122GWaBXeddUl_!!282079023.jpg\" title=\"1544871981O1CN01Hghu122GWaBXeddUl_!!282079023.jpg\"/></p><p><img src=\"/uploads/descript/20181215/1544871981O1CN01hn9Lnm2GWaBXecE7b_!!282079023.jpg\" title=\"1544871981O1CN01hn9Lnm2GWaBXecE7b_!!282079023.jpg\"/></p><p><img src=\"/uploads/descript/20181215/1544871981O1CN01iAlTI82GWaBenf6WT_!!282079023.jpg\" title=\"1544871981O1CN01iAlTI82GWaBenf6WT_!!282079023.jpg\"/></p><p><img src=\"/uploads/descript/20181215/1544871981O1CN012eDQAT2GWaBencYWp_!!282079023.jpg\" title=\"1544871981O1CN012eDQAT2GWaBencYWp_!!282079023.jpg\"/></p><p><br/></p>', '899', '/uploads/goods/201812151803179952.jpg', '1', '20', null, '2018-12-15 18:03:17', '0');
INSERT INTO `goods` VALUES ('77', '30', 'off-white', '2', '<p><img src=\"/uploads/descript/20181215/1544872109O1CN01iAlTI82GWaBenf6WT_!!282079023.jpg\" title=\"1544872109O1CN01iAlTI82GWaBenf6WT_!!282079023.jpg\"/></p><p><img src=\"/uploads/descript/20181215/1544872109TB22v3rcIrI8KJjy0FhXXbfnpXa_!!160995144.jpg\" title=\"1544872109TB22v3rcIrI8KJjy0FhXXbfnpXa_!!160995144.jpg\"/></p><p><img src=\"/uploads/descript/20181215/1544872109TB23BB5XwDD8KJjy0FdXXcjvXXa_!!722711913.png\" title=\"1544872109TB23BB5XwDD8KJjy0FdXXcjvXXa_!!722711913.png\"/></p><p>off-whte你值得拥有<br/></p>', '2300', '/uploads/goods/201812151805195961.jpg', '1', '9', null, '2018-12-15 18:05:19', '0');
INSERT INTO `goods` VALUES ('78', '33', '华为（HUAWEI） 荣耀10 GT游戏手机 幻影蓝 全网通6GB+128GB尊享版', '1', '<p><img src=\"/uploads/descript/20181215/15448683952936fc4f85a76bdc.jpg\" title=\"15448683952936fc4f85a76bdc.jpg\"/></p><p><img src=\"/uploads/descript/20181215/15448683956b6100dfb4bd102e.jpg\" title=\"15448683956b6100dfb4bd102e.jpg\"/></p><p><img src=\"/uploads/descript/20181215/1544868395b838c0f761e622d0.jpg\" title=\"1544868395b838c0f761e622d0.jpg\"/></p><p><img src=\"/uploads/descript/20181215/1544868395e60ccae28d59fc99.jpg\" title=\"1544868395e60ccae28d59fc99.jpg\"/></p><p>【限时特惠】送豪华大礼包:音乐耳机+定制鼠标垫+指环扣+全屏膜壳+运费险，真好！<br/></p>', '2599', '/uploads/goods/201812151806228994.jpg', '1', '80', null, '2018-12-15 18:06:22', '0');
INSERT INTO `goods` VALUES ('79', '33', '华为（HUAWEI） P20 全面屏 手机 极光 全网通（6G+128G）', '1', '<p>【今日下单所有版本立减200元，64G版本咨询客服再优惠100元】</p><p><img src=\"/uploads/descript/20181215/15448686531b83663835569816.jpg\" title=\"15448686531b83663835569816.jpg\"/></p><p><img src=\"/uploads/descript/20181215/15448686546c60938510164015 (3).jpg\" title=\"15448686546c60938510164015 (3).jpg\"/></p><p><img src=\"/uploads/descript/20181215/1544868654076797f2e3549ecd.jpg\" title=\"1544868654076797f2e3549ecd.jpg\"/></p><p><br/></p>', '3888', '/uploads/goods/201812151809589545.jpg', '1', '80', null, '2018-12-15 18:09:58', '0');
INSERT INTO `goods` VALUES ('80', '30', 'aape', '2', '<p>aape你值得拥有</p><p><img src=\"/uploads/descript/20181215/1544872229O1CN01Hghu122GWaBXeddUl_!!282079023.jpg\" title=\"1544872229O1CN01Hghu122GWaBXeddUl_!!282079023.jpg\"/></p><p><img src=\"/uploads/descript/20181215/1544872229O1CN011qmRs1cIazyP2xc_!!2119825538.jpg\" title=\"1544872229O1CN011qmRs1cIazyP2xc_!!2119825538.jpg\"/></p><p><img src=\"/uploads/descript/20181215/1544872229TB22v3rcIrI8KJjy0FhXXbfnpXa_!!160995144.jpg\" title=\"1544872229TB22v3rcIrI8KJjy0FhXXbfnpXa_!!160995144.jpg\"/></p><p><br/></p>', '800', '/uploads/goods/201812151811522762.jpg', '1', '700', null, '2018-12-15 18:11:52', '0');
INSERT INTO `goods` VALUES ('81', '33', '华为（HUAWEI） 华为nova3 手机 浅艾蓝 全网通(6G+128G)', '1', '<p><span style=\"color: rgb(228, 57, 60); font-family: tahoma, arial, &quot;Microsoft YaHei&quot;, &quot;Hiragino Sans GB&quot;, u5b8bu4f53, sans-serif; font-size: 12px; background-color: rgb(255, 255, 255);\">好评5500+ 热销15000+台！京、津、冀地区次日达！</span></p><p><img src=\"/uploads/descript/20181215/15448689255bef814bN7c6d4ee9.jpg\" title=\"15448689255bef814bN7c6d4ee9.jpg\"/></p><p><img src=\"/uploads/descript/20181215/1544868926a978367c33bf7fbc.jpg\" title=\"1544868926a978367c33bf7fbc.jpg\"/></p><p><img src=\"/uploads/descript/20181215/1544868926a977634867606f3b.jpg\" title=\"1544868926a977634867606f3b.jpg\"/></p><p><br/></p>', '2399', '/uploads/goods/201812151814391888.jpg', '1', '99', null, '2018-12-15 18:14:39', '0');
INSERT INTO `goods` VALUES ('82', '37', '华硕（ASUS）灵耀S 2代S4300UN窄边框轻薄便携14.0英寸超薄商务办公学习游戏笔记本电脑', '4', '<p><img src=\"/uploads/descript/20181215/1544869216ebb503f22a80b082.jpg\" title=\"1544869216ebb503f22a80b082.jpg\" alt=\"ebb503f22a80b082.jpg\"/></p><p><img src=\"/uploads/descript/20181215/15448692745bc6fecdN5bd6e0a2.jpg\" title=\"15448692745bc6fecdN5bd6e0a2.jpg\"/></p><p><img src=\"/uploads/descript/20181215/15448692745bc6fecdNee1b85e5.jpg\" title=\"15448692745bc6fecdNee1b85e5.jpg\"/></p><p><img src=\"/uploads/descript/20181215/15448692745bc6feceN0d5ef78b.jpg\" title=\"15448692745bc6feceN0d5ef78b.jpg\"/></p><p><img src=\"/uploads/descript/20181215/15448692745bc6feceN5f858e6d.jpg\" title=\"15448692745bc6feceN5f858e6d.jpg\"/></p><p><img src=\"/uploads/descript/20181215/15448692745bc6feceN9993d28b.jpg\" title=\"15448692745bc6feceN9993d28b.jpg\"/></p><p>【12月13日】闪购0点开抢，购机赠多重好礼，晒单送爱神秘礼品！点击查看<br/></p>', '5199', '/uploads/goods/201812151815007240.jpg', '1', '100', null, '2018-12-15 18:15:00', '0');
INSERT INTO `goods` VALUES ('83', '30', 'boy卫衣男欧美潮牌卫衣伦敦男孩长袖T恤男ins超火的情侣正品外套', '2', '<p>来自80年代的英国伦敦</p><p><img src=\"/uploads/descript/20181215/1544872352O1CN01hof7fx2E96eYtbNRc_!!2200570088701.jpg\" title=\"1544872352O1CN01hof7fx2E96eYtbNRc_!!2200570088701.jpg\"/></p><p><img src=\"/uploads/descript/20181215/1544872352O1CN01GtGIDw2E96eWz0f2t_!!2200570088701.jpg\" title=\"1544872352O1CN01GtGIDw2E96eWz0f2t_!!2200570088701.jpg\"/></p><p><br/></p>', '900', '/uploads/goods/201812151825227979.jpg', '1', '13', null, '2018-12-15 18:25:22', '0');
INSERT INTO `goods` VALUES ('84', '40', '华硕顽石(ASUS) 五代FL8000UF 15.6英寸影音笔记本电脑', '4', '<p>【周末秒杀开启！华硕年终大促！】<img src=\"/uploads/descript/20181215/15448700115bfbcbbcNb40eda42.gif\" title=\"15448700115bfbcbbcNb40eda42.gif\" alt=\"5bfbcbbcNb40eda42.gif\"/>高性能i7双硬盘！京东标配8G内存只为更好体验！年终促销专场点此！享3期免息&gt;&gt;</p>', '5188', '/uploads/goods/201812151829229397.jpg', '1', '190', null, '2018-12-15 18:29:22', '0');
INSERT INTO `goods` VALUES ('85', '38', 'Apple iPhone X (A1865) 64GB 深空灰色 移动联通电信4G手机', '1', '<p>【Apple产品年末狂欢特惠，限时限量抢购，券后价6299元】</p><p><img src=\"/uploads/descript/20181215/15448698095a9cfa70N47f9499b.jpg\" title=\"15448698095a9cfa70N47f9499b.jpg\"/></p><p><img src=\"/uploads/descript/20181215/15448698095a9cfa70Nd0637367.jpg\" title=\"15448698095a9cfa70Nd0637367.jpg\"/></p><p><img src=\"/uploads/descript/20181215/15448698095bee7fa4N7edaddfd.jpg\" title=\"15448698095bee7fa4N7edaddfd.jpg\"/></p><p><img src=\"/uploads/descript/20181215/1544869809a18a0144a1e30938.jpg\" title=\"1544869809a18a0144a1e30938.jpg\"/></p><p><img src=\"/uploads/descript/20181215/15448698095a9cfa70N43f7357c.jpg\" title=\"15448698095a9cfa70N43f7357c.jpg\"/></p><p><br/></p>', '6499', '/uploads/goods/201812151829498188.jpg', '1', '99', null, '2018-12-15 18:29:49', '0');
INSERT INTO `goods` VALUES ('87', '33', 'Apple iPhone 6s Plus (A1699) 32G 金色 移动联通电信4G手机', '1', '<table width=\"750\" align=\"center\"><tbody><tr class=\"firstRow\"><td><p><strong style=\"margin: 0px; padding: 0px;\">温馨提示：</strong>&nbsp;<br/>iPhone 6s 意外关机问题计划</p></td></tr></tbody></table><table width=\"750\" align=\"center\"><tbody><tr class=\"firstRow\"><td><p>5.5 英寸（对角线）显示屏，1920 x 1080 分辨率&nbsp;<br/>3D Touch<br/>1200 万像素摄像头<br/>配备集成式 M9 运动协处理器的 A9 芯片<br/>4K 视频拍摄 (30 fps) 以及慢动作视频拍摄 (120 fps, 1080p)<br/>配备 Retina 闪光灯的 500 万像素 FaceTime HD 摄像头<br/>Touch ID 指纹识别传感器&nbsp;<br/>具备 MIMO 技术的 802.11a/b/g/n/ac 无线网络</p><p>法律免责声明<br/>1 4G LTE Advanced 和 4G LTE 功能适用于特定国家或地区的特定运营商。速度依据理论上的数据吞吐量，并基于现场状况和不同运营商而可能有所差异。有关 4G LTE 支持的详情，请联系你的运营商并查看 www.apple.com/iphone/LTE。<br/>2 电池使用时间依使用情况和设置的不同可能有所差异；请参阅 www.apple.com/cn/batteries 进一步了解详情。<br/>3 所有产品信息，以苹果官网为准（apple.com.cn)<br/>技术规格&nbsp;<br/>请前往 www.apple.com/cn/iphone-6s/specs/ 查看完整内容。</p></td></tr></tbody></table><p><img src=\"/uploads/descript/20181215/15448703065a9e43b1Nc37ad959.jpg\" title=\"15448703065a9e43b1Nc37ad959.jpg\" alt=\"5a9e43b1Nc37ad959.jpg\"/><br/></p>', '2799', '/uploads/goods/201812151837198033.jpg', '1', '200', null, '2018-12-15 18:37:19', '0');
INSERT INTO `goods` VALUES ('88', '43', 'aj1', '2', '<p>这是一双很酷的鞋子</p><p><img src=\"/uploads/descript/20181215/1544872509O1CN01rtBoNp1hahBJMdoYu_!!646154294.jpg\" title=\"1544872509O1CN01rtBoNp1hahBJMdoYu_!!646154294.jpg\"/></p><p><img src=\"/uploads/descript/20181215/1544872509O1CN011hahBJMePyCHWlb_!!646154294.jpg\" title=\"1544872509O1CN011hahBJMePyCHWlb_!!646154294.jpg\"/></p><p><br/></p>', '1450', '/uploads/goods/201812151852295232.jpg', '1', '80', null, '2018-12-15 18:52:29', '0');
INSERT INTO `goods` VALUES ('89', '30', '秋冬新款双面毛呢大衣男中长款羊绒呢子双排扣风衣韩版羊毛呢男装', '5', '<p><img src=\"/uploads/descript/20181216/15449642315-1.jpg\" title=\"15449642315-1.jpg\"/></p><p><img src=\"/uploads/descript/20181216/15449642315-2.jpg\" title=\"15449642315-2.jpg\"/></p><p><br/></p>', '1290', '/uploads/goods/201812162039291955.jpg', '1', '199', null, '2018-12-16 20:39:29', '0');
INSERT INTO `goods` VALUES ('90', '30', '冬季羊绒衫男加厚半高领毛衣圆领套头中年保暖针织打底羊毛衫大码男装', '5', '<p><img src=\"/uploads/descript/20181216/15449661996-3.jpg\" title=\"15449661996-3.jpg\"/></p><p><img src=\"/uploads/descript/20181216/15449661996-4.jpg\" title=\"15449661996-4.jpg\"/></p><p><br/></p>', '98', '/uploads/goods/201812162116095452.jpg', '1', '190', null, '2018-12-16 21:16:09', '0');
INSERT INTO `goods` VALUES ('91', '7', 'lv女装has安静的经济d', '6', '<p><img src=\"/uploads/descript/20181217/1545036888428_428_1539569068557mp.png\" title=\"1545036888428_428_1539569068557mp.png\"/></p><p><img src=\"/uploads/descript/20181217/1545036888428_428_1538991773470mp.png\" title=\"1545036888428_428_1538991773470mp.png\"/></p><p><br/></p>', '189', '/uploads/goods/201812171653459627.png', '1', '123', null, '2018-12-17 16:53:45', '0');

-- ----------------------------
-- Table structure for gsize
-- ----------------------------
DROP TABLE IF EXISTS `gsize`;
CREATE TABLE `gsize` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(11) DEFAULT NULL,
  `colorid` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gsize
-- ----------------------------
INSERT INTO `gsize` VALUES ('1', '1', '1,2,3,4,5', '6.9寸', '3198');
INSERT INTO `gsize` VALUES ('2', '1', '1,2,3,4', '5.7寸', '2198');
INSERT INTO `gsize` VALUES ('3', '1', '1,3,5', '5.6寸', '1998');
INSERT INTO `gsize` VALUES ('4', '1', '2,3,4,5', '6.7寸', '2998');
INSERT INTO `gsize` VALUES ('5', '1', '1,2,3,5', '6.0寸', '2798');
INSERT INTO `gsize` VALUES ('6', '58', '6,7,8', 'S', '79');
INSERT INTO `gsize` VALUES ('7', '58', '7,8', 'M', '79');
INSERT INTO `gsize` VALUES ('8', '58', '6,8', 'ML', '79');
INSERT INTO `gsize` VALUES ('9', '58', '6,7,8', 'XL', '79');
INSERT INTO `gsize` VALUES ('10', '58', '6,7,8', 'XXL', '79');
INSERT INTO `gsize` VALUES ('11', '59', '10,11,12', 'S', '79');
INSERT INTO `gsize` VALUES ('12', '59', '10,11,12', 'M', '79');
INSERT INTO `gsize` VALUES ('13', '59', '9,10,11,12', 'ML', '79');
INSERT INTO `gsize` VALUES ('14', '59', '9,10,12', 'XL', '79');
INSERT INTO `gsize` VALUES ('15', '59', '9,10,11,12', 'XXL', '79');
INSERT INTO `gsize` VALUES ('16', '60', '13,15,16', 'S', '79');
INSERT INTO `gsize` VALUES ('17', '60', '13,14,15,16', 'M', '79');
INSERT INTO `gsize` VALUES ('18', '60', '13,14,15', 'ML', '79');
INSERT INTO `gsize` VALUES ('19', '60', '13,14,15,16', 'XL', '79');
INSERT INTO `gsize` VALUES ('20', '60', '14,15,16', 'XXL', '79');
INSERT INTO `gsize` VALUES ('21', '63', '18,19', 'S', '78');
INSERT INTO `gsize` VALUES ('22', '63', '18,19', 'M', '78');
INSERT INTO `gsize` VALUES ('23', '63', '17,18,19', 'ML', '79');
INSERT INTO `gsize` VALUES ('24', '63', '17,18', 'L', '79');
INSERT INTO `gsize` VALUES ('25', '63', '17,18', 'XL', '99');
INSERT INTO `gsize` VALUES ('26', '63', '18,19', 'XXL', '99');
INSERT INTO `gsize` VALUES ('27', '64', null, '15.6', null);
INSERT INTO `gsize` VALUES ('28', '64', null, '14.9', null);
INSERT INTO `gsize` VALUES ('29', '65', '22', '全网通(4GB 64GB)', '1198');
INSERT INTO `gsize` VALUES ('30', '65', '22', '全网通(4GB 128GB)', '1599');
INSERT INTO `gsize` VALUES ('31', '66', '23,24,25', '全网通（4GB 64GB)', '1199');
INSERT INTO `gsize` VALUES ('32', '66', '23,24,25', '全网通（4GB 128GB）', '1599');
INSERT INTO `gsize` VALUES ('33', '67', '26', '15.6', '7299');
INSERT INTO `gsize` VALUES ('34', '68', null, '全网通（4GB 64GB） 全网通（6GB 64GB） 全网通（6GB 128GB）', null);
INSERT INTO `gsize` VALUES ('35', '69', '31,32,33,34', '全网通（4GB 64GB）', '1399');
INSERT INTO `gsize` VALUES ('36', '69', '31,32,33,34', ' 全网通（6GB 64GB） ', '1599');
INSERT INTO `gsize` VALUES ('37', '69', '31,32,33,34', '全网通（6GB 128GB）', '1899');
INSERT INTO `gsize` VALUES ('38', '71', '35,36,37,38', '全网通（4GB 64GB）', '1899');
INSERT INTO `gsize` VALUES ('39', '71', '35,36,37,38', ' 全网通（6GB 64GB） ', '1999');
INSERT INTO `gsize` VALUES ('40', '71', '35,36,37,38', '全网通（6GB 128GB）', '2799');
INSERT INTO `gsize` VALUES ('41', '71', '35,36,37,38', ' 全网通（8GB 128GB）', '3099');
INSERT INTO `gsize` VALUES ('42', '72', '39,40,41', '全网通（6GB 128GB）', '3799');
INSERT INTO `gsize` VALUES ('43', '72', '39,40,41', ' 全网通（8GB 128GB）', '4299');
INSERT INTO `gsize` VALUES ('44', '72', '39,40,41', ' 全网通（8GB 256GB）', '4799');
INSERT INTO `gsize` VALUES ('45', '73', '43,44', 'i5处理器 8G 256G+1T GTX1050Ti ', '7299');
INSERT INTO `gsize` VALUES ('46', '73', '42,43,44', 'i7处理器 8G 256G+1T GTX1050Ti ', '7399');
INSERT INTO `gsize` VALUES ('47', '73', '42,43,44', 'i5处理器 8G 256G+1T GTX1060 ', '7499');
INSERT INTO `gsize` VALUES ('48', '73', '43,44', 'i7处理器 8G 256G+1T GTX1060 ', '7599');
INSERT INTO `gsize` VALUES ('49', '73', '42,43,44', 'i7处理器 16G 256G+1T GTX1060', '7699');
INSERT INTO `gsize` VALUES ('50', '74', '45', '42.5', '3499');
INSERT INTO `gsize` VALUES ('51', '74', '45', '43', '3499');
INSERT INTO `gsize` VALUES ('52', '75', '46,47,48', '6GB+64GB', '4488');
INSERT INTO `gsize` VALUES ('53', '75', '46,47,48', ' 6GB+128GB', '4988');
INSERT INTO `gsize` VALUES ('54', '75', '46,47,48', ' 8GB+128GB', '5288');
INSERT INTO `gsize` VALUES ('55', '75', '46,47,48', ' 6GB+256GB ', '5488');
INSERT INTO `gsize` VALUES ('56', '75', '46,47,48', '8GB+256GB', '5688');
INSERT INTO `gsize` VALUES ('57', '76', '49', 'X', '899');
INSERT INTO `gsize` VALUES ('58', '76', '49', 'XL.XXL', '899');
INSERT INTO `gsize` VALUES ('59', '77', '50', 'X', '2300');
INSERT INTO `gsize` VALUES ('60', '77', '50', 'XL', '2300');
INSERT INTO `gsize` VALUES ('61', '77', '50', 'XXL', '2300');
INSERT INTO `gsize` VALUES ('62', '78', '51,52,53,54,55', '全网通6GB+64GB高配版', '2199');
INSERT INTO `gsize` VALUES ('63', '78', '51,52,53,54,55', ' 全网通6GB+128GB尊享版 ', '2599');
INSERT INTO `gsize` VALUES ('64', '78', '51,52,53,54,55', '全网通8GB+128GB GT版', '3299');
INSERT INTO `gsize` VALUES ('65', '79', '56,57,58,59', '全网通（6G+64G） ', '3388');
INSERT INTO `gsize` VALUES ('66', '79', '56,57,58,59', '全网通（6G+128G）', '3888');
INSERT INTO `gsize` VALUES ('67', '80', '60', 'S', '700');
INSERT INTO `gsize` VALUES ('68', '80', '60', 'M', '700');
INSERT INTO `gsize` VALUES ('69', '80', '60', 'X', '700');
INSERT INTO `gsize` VALUES ('70', '80', '60', 'XL', '700');
INSERT INTO `gsize` VALUES ('71', '81', '61,62,63,64,65', '全网通(6G+64G) ', '2399');
INSERT INTO `gsize` VALUES ('72', '81', '61,62,63,64,65', '全网通(6G+128G)', '2699');
INSERT INTO `gsize` VALUES ('73', '82', '67', '官标i5/8G/256G SSD/MX150 2G ', '4999');
INSERT INTO `gsize` VALUES ('74', '82', '67', '定制i5/8G/256G+1T/MX150 2G', '4899');
INSERT INTO `gsize` VALUES ('75', '82', '67', ' 定制i5/12G/256G+1T/MX150 2G', '4799');
INSERT INTO `gsize` VALUES ('76', '82', '67', ' 官标i7/8G/256G SSD/MX150 2G ', '5199');
INSERT INTO `gsize` VALUES ('77', '82', '67', '定制i7/8G/256G+1T/MX150 2G ', '5099');
INSERT INTO `gsize` VALUES ('78', '82', '67', '定制i7/12G/256G+1T/MX150 2G', '4999');
INSERT INTO `gsize` VALUES ('79', '83', '68', 'S', '900');
INSERT INTO `gsize` VALUES ('80', '83', '68', 'M', '900');
INSERT INTO `gsize` VALUES ('81', '83', '68', 'XL', '900');
INSERT INTO `gsize` VALUES ('82', '83', '68', 'XXL', '900');
INSERT INTO `gsize` VALUES ('83', '84', '69,70,71,72,73', 'i7处理器 8G 128G+1T 独显', '5199');
INSERT INTO `gsize` VALUES ('84', '84', '69,70,71,72,73', 'i7处理器 8G 128G+1T 独显', '5099');
INSERT INTO `gsize` VALUES ('85', '84', '69,70,71,72,73', '  i7处理器 8G 128G+1T 独显', '5089');
INSERT INTO `gsize` VALUES ('86', '84', '69,70,71,72,73', ' i7处理器 8G 128G+1T 独显', '5189');
INSERT INTO `gsize` VALUES ('87', '84', '69,70,71,72,73', '  i5处理器 4G 1T 独显 窄边框', '4999');
INSERT INTO `gsize` VALUES ('88', '84', '69,70,71,72,73', 'i5处理器 4G 1T 独显 窄边框', '4899');
INSERT INTO `gsize` VALUES ('89', '84', '69,70,71,72,73', 'i5处理器 8G 1T 独显 窄边框', '4997');
INSERT INTO `gsize` VALUES ('90', '84', '69,70,71,72,73', 'i5处理器 8G 1T 独显 窄边框', '4899');
INSERT INTO `gsize` VALUES ('91', '84', '69,70,71,72,73', ' i5处理器 4G 256GSSD 独显', '4997');
INSERT INTO `gsize` VALUES ('92', '84', '69,70,71,72,73', 'i5处理器 4G 256GSSD 独显', '4799');
INSERT INTO `gsize` VALUES ('93', '85', '74,75', '64GB ', '6499');
INSERT INTO `gsize` VALUES ('94', '85', '74,75', '256GB', '8299');
INSERT INTO `gsize` VALUES ('95', '86', null, '32GB 128GB', null);
INSERT INTO `gsize` VALUES ('96', '87', '78,79', '32GB', '2799');
INSERT INTO `gsize` VALUES ('97', '87', '78,79', '128GB', '3299');
INSERT INTO `gsize` VALUES ('98', '88', '80', 'S', '1450');
INSERT INTO `gsize` VALUES ('99', '88', '80', 'X', '1450');
INSERT INTO `gsize` VALUES ('100', '88', '80', 'XL', '1450');
INSERT INTO `gsize` VALUES ('101', '88', '80', 'XXL', '1450');
INSERT INTO `gsize` VALUES ('102', '89', '82,83', 'M', '1290');
INSERT INTO `gsize` VALUES ('103', '89', '81,82,83', 'L', '1390');
INSERT INTO `gsize` VALUES ('104', '89', '81,82,83', 'XL', '1490');
INSERT INTO `gsize` VALUES ('105', '89', '82,83', 'XXL', '1590');
INSERT INTO `gsize` VALUES ('106', '90', '85,86,87', '165', '78');
INSERT INTO `gsize` VALUES ('107', '90', '84,85,86', '170', '88');
INSERT INTO `gsize` VALUES ('108', '90', '85,86,87', '180', '98');
INSERT INTO `gsize` VALUES ('109', '90', '84,85,86', '185', '99');
INSERT INTO `gsize` VALUES ('110', '91', '89,90', 'S', '178');
INSERT INTO `gsize` VALUES ('111', '91', '88,89,90', 'L', '188');
INSERT INTO `gsize` VALUES ('112', '91', '88,89,90', 'ML', '199');

-- ----------------------------
-- Table structure for lunbo
-- ----------------------------
DROP TABLE IF EXISTS `lunbo`;
CREATE TABLE `lunbo` (
  `lid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pic` varchar(50) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lunbo
-- ----------------------------
INSERT INTO `lunbo` VALUES ('4', '/images/lunbo/1321543393487.jpg', 'www.baidu.com');
INSERT INTO `lunbo` VALUES ('5', '/images/lunbo/3961543393494.jpg', '/');
INSERT INTO `lunbo` VALUES ('6', '/images/lunbo/9131543393500.jpg', '/');
INSERT INTO `lunbo` VALUES ('7', '/images/lunbo/9901543393507.jpg', '/');
INSERT INTO `lunbo` VALUES ('9', '/images/lunbo/7441543394567.jpg', '/');

-- ----------------------------
-- Table structure for message
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `uname` varchar(32) DEFAULT '西风',
  `mname` varchar(32) DEFAULT '南墙',
  `sex` enum('m','w','b') NOT NULL DEFAULT 'b',
  `email` varchar(32) DEFAULT NULL,
  `headpic` varchar(64) DEFAULT '/images/message/uploads/default.jpg',
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of message
-- ----------------------------
INSERT INTO `message` VALUES ('1', '1', '西风', '南墙', 'b', null, '/images/message/uploads/default.jpg');
INSERT INTO `message` VALUES ('2', '2', '王军达', '南墙', 'm', null, '/images/message/uploads/6861545035669.jpg');
INSERT INTO `message` VALUES ('3', '3', '西风', '南墙', 'b', null, '/images/message/uploads/default.jpg');
INSERT INTO `message` VALUES ('4', '4', '西风', '南墙', 'b', null, '/images/message/uploads/default.jpg');
INSERT INTO `message` VALUES ('5', '5', '西风', '你七哥', 'b', null, '/images/message/uploads/default.jpg');
INSERT INTO `message` VALUES ('6', '6', '张三', '没人信', 'b', null, '/images/message/uploads/default.jpg');
INSERT INTO `message` VALUES ('7', '7', '西风', '南墙', 'b', null, '/images/message/uploads/default.jpg');
INSERT INTO `message` VALUES ('8', '8', '西风', '南墙', 'b', null, '/images/message/uploads/default.jpg');
INSERT INTO `message` VALUES ('9', '9', '西风', '南墙', 'b', null, '/images/message/uploads/default.jpg');
INSERT INTO `message` VALUES ('10', '10', '西风', '南墙', 'b', null, '/images/message/uploads/default.jpg');
INSERT INTO `message` VALUES ('11', '11', '西风', '南墙', 'b', null, '/images/message/uploads/default.jpg');
INSERT INTO `message` VALUES ('12', '12', '西风', '南墙', 'b', null, '/images/message/uploads/default.jpg');
INSERT INTO `message` VALUES ('13', '13', '西风', '南墙', 'b', null, '/images/message/uploads/default.jpg');
INSERT INTO `message` VALUES ('14', '14', '西风', '南墙', 'b', null, '/images/message/uploads/default.jpg');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `oid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `ordernum` varchar(20) DEFAULT '',
  `oname` varchar(255) DEFAULT NULL,
  `addid` int(11) DEFAULT NULL,
  `color` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `inputtime` datetime DEFAULT NULL,
  `opic` varchar(255) DEFAULT 'default.jpg',
  `total` double(11,0) DEFAULT NULL COMMENT '总金额',
  `msg` varchar(255) DEFAULT NULL COMMENT '留言',
  `status` enum('0','1','2','3','4') DEFAULT '1' COMMENT '0:无效订单;1:新订单;2:已支付;3已发货,4已收货',
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('56', '17', 'KPLA1544790825', '加绒打底衫女长袖高领蕾丝上衣女装秋冬季2018新款韩版百搭连衣裙', null, '7', '9', '1', '2018-12-14 20:33:45', '/uploads/goods/201812112031158914.jpg', '79', null, '1');
INSERT INTO `orders` VALUES ('57', '5', 'BRBA1544945159', '加绒打底衫女长袖高领蕾丝上衣女装秋冬季2018新款韩版百搭连衣裙123', '13', '18', '25', '1', '2018-12-16 15:25:59', '/uploads/goods/201812142045101875.jpg', '99', '要个红色的', '2');
INSERT INTO `orders` VALUES ('58', '5', 'WZTZ1544947140', '加绒打底衫女长袖高领蕾丝上衣女装秋冬季2018新款韩版百搭连衣裙123', '14', '18', '24', '1', '2018-12-16 15:59:00', '/uploads/goods/201812142045101875.jpg', '79', '111', '1');
INSERT INTO `orders` VALUES ('59', '5', 'OLLL1544947173', '神舟战神 战神 T6-X5/ Z6-KP5S 八代酷睿i5 GTX1050游戏独显 学生手提吃鸡游戏本笔记本电脑', null, '21', '28', '1', '2018-12-16 15:59:33', '/uploads/goods/201812151712241374.jpg', '0', null, '1');
INSERT INTO `orders` VALUES ('60', '5', 'BKSE1544947217', '荣耀9i 4GB+128GB 幻夜黑 移动联通电信4G全面屏手机 双卡双待', '14', '25', '31', '1', '2018-12-16 16:00:17', '/uploads/goods/201812151732138477.jpg', '1199', '1', '2');
INSERT INTO `orders` VALUES ('61', '5', 'UTMI1544947217', '荣耀9i 4GB+128GB 幻夜黑 移动联通电信4G全面屏手机 双卡双待', '14', '24', '31', '1', '2018-12-16 16:00:17', '/uploads/goods/201812151732125767.jpg', '1199', '2', '2');
INSERT INTO `orders` VALUES ('62', '5', 'BDAO1544947217', '荣耀9i 4GB+128GB 幻夜黑 移动联通电信4G全面屏手机 双卡双待', '14', '23', '31', '1', '2018-12-16 16:00:17', '/uploads/goods/201812151732128044.jpg', '1199', '3', '4');
INSERT INTO `orders` VALUES ('63', '5', 'XHJP1544961086', '华硕(ASUS) 飞行堡垒6 15.6英寸窄边框游戏笔记本电脑', '14', '43', '45', '3', '2018-12-16 19:51:26', '/uploads/goods/201812151805098144.jpg', '21897', null, '2');
INSERT INTO `orders` VALUES ('64', '5', 'AIOI1544969441', 'Apple iPhone X (A1865) 64GB 深空灰色 移动联通电信4G手机', '14', '74', '93', '1', '2018-12-16 22:10:41', '/uploads/goods/201812151830277968.jpg', '6499', '123', '4');
INSERT INTO `orders` VALUES ('65', '5', 'WVLG1545008416', '华为 HUAWEI P20 Pro 全面屏徕卡三摄游戏手机 6GB+128GB 极光色 全网通移动联通电信4G手机 双卡双待', null, '47', '53', '3', '2018-12-17 09:00:16', '/uploads/goods/201812151759564584.jpg', '14964', null, '1');
INSERT INTO `orders` VALUES ('66', '3', 'ROYJ1545024210', '加绒打底衫女长袖高领蕾丝上衣女装秋冬季2018新款韩版百搭连衣裙123', '4', '18', '24', '1', '2018-12-17 13:23:30', '/uploads/goods/201812142045101875.jpg', '79', '去', '2');
INSERT INTO `orders` VALUES ('67', '6', 'OPLV1545030343', '加绒打底衫女长袖高领蕾丝上衣女装秋冬季2018新款韩版百搭连衣裙123', '16', '18', '24', '1', '2018-12-17 15:05:43', '/uploads/goods/201812142045101875.jpg', '79', '切切切', '0');
INSERT INTO `orders` VALUES ('68', '1', 'IKQU1545036029', '加绒打底衫女长袖高领蕾丝上衣女装秋冬季2018新款韩版百搭连衣裙123', null, '17', '22', '1', '2018-12-17 16:40:29', '/uploads/goods/201812142045106305.jpg', '78', null, '1');
INSERT INTO `orders` VALUES ('69', '6', 'SNKE1545036644', '加绒打底衫女长袖高领蕾丝上衣女装秋冬季2018新款韩版百搭连衣裙123', '16', '18', '26', '11', '2018-12-17 16:50:44', '/uploads/goods/201812142045101875.jpg', '1089', null, '2');
INSERT INTO `orders` VALUES ('70', '6', 'FPOG1545036644', '加绒打底衫女长袖高领蕾丝上衣女装秋冬季2018新款韩版百搭连衣裙123', '16', '18', '26', '1', '2018-12-17 16:50:44', '/uploads/goods/201812142045101875.jpg', '99', null, '2');
INSERT INTO `orders` VALUES ('71', '6', 'UKAO1545037060', '华为 HUAWEI P20 Pro 全面屏徕卡三摄游戏手机 6GB+128GB 极光色 全网通移动联通电信4G手机 双卡双待', '16', '47', '53', '1', '2018-12-17 16:57:40', '/uploads/goods/201812151759564584.jpg', '4988', null, '4');
INSERT INTO `orders` VALUES ('72', '6', 'UZWI1545037620', '荣耀9i 4GB+128GB 幻夜黑 移动联通电信4G全面屏手机 双卡双待', '16', '23', '31', '27', '2018-12-17 17:07:00', '/uploads/goods/201812151732128044.jpg', '32373', null, '1');
INSERT INTO `orders` VALUES ('73', '1', 'IZHB1545047734', '荣耀9i 4GB+128GB 幻夜黑 移动联通电信4G全面屏手机 双卡双待', null, '24', '31', '1', '2018-12-17 19:55:34', '/uploads/goods/201812151732125767.jpg', '1199', null, '1');
INSERT INTO `orders` VALUES ('74', '1', 'XAFK1545047739', '荣耀9i 4GB+128GB 幻夜黑 移动联通电信4G全面屏手机 双卡双待', null, '23', '31', '1', '2018-12-17 19:55:39', '/uploads/goods/201812151732128044.jpg', '1199', null, '1');
INSERT INTO `orders` VALUES ('75', '1', 'ZZWR1545048093', '荣耀9i 4GB+128GB 幻夜黑 移动联通电信4G全面屏手机 双卡双待', null, '25', '32', '1', '2018-12-17 20:01:33', '/uploads/goods/201812151732138477.jpg', '1599', null, '1');
INSERT INTO `orders` VALUES ('76', '1', 'VGQS1545048159', '荣耀9i 4GB+128GB 幻夜黑 移动联通电信4G全面屏手机 双卡双待', '18', '25', '32', '1', '2018-12-17 20:02:39', '/uploads/goods/201812151732138477.jpg', '1599', null, '2');
INSERT INTO `orders` VALUES ('77', '1', 'BIQP1545048284', '加绒打底衫女长袖高领蕾丝上衣女装秋冬季2018新款韩版百搭连衣裙123', null, '18', '23', '1', '2018-12-17 20:04:44', '/uploads/goods/201812142045101875.jpg', '79', null, '2');
INSERT INTO `orders` VALUES ('78', '1', 'QRRN1545048284', '荣耀9i 4GB+128GB 幻夜黑 移动联通电信4G全面屏手机 双卡双待', null, '25', '32', '1', '2018-12-17 20:04:44', '/uploads/goods/201812151732138477.jpg', '1599', null, '2');
INSERT INTO `orders` VALUES ('79', '1', 'QWWF1545048284', '荣耀9i 4GB+128GB 幻夜黑 移动联通电信4G全面屏手机 双卡双待', null, '25', '31', '1', '2018-12-17 20:04:44', '/uploads/goods/201812151732138477.jpg', '1199', null, '2');
INSERT INTO `orders` VALUES ('80', '1', 'PZSY1545048284', '加绒打底衫女长袖高领蕾丝上衣女装秋冬季2018新款韩版百搭连衣裙123', null, '18', '24', '1', '2018-12-17 20:04:44', '/uploads/goods/201812142045101875.jpg', '79', null, '2');
INSERT INTO `orders` VALUES ('81', '1', 'HYGW1545048284', '神州（HASEE)战神 Z7-KP7GE GTX1060 8G内存 256G SSD 游戏笔记本电脑', null, '26', '33', '1', '2018-12-17 20:04:44', '/uploads/goods/201812151739119501.jpg', '7299', null, '2');

-- ----------------------------
-- Table structure for propass
-- ----------------------------
DROP TABLE IF EXISTS `propass`;
CREATE TABLE `propass` (
  `id` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `ptitle` varchar(255) DEFAULT NULL,
  `pcontent` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of propass
-- ----------------------------
INSERT INTO `propass` VALUES ('1', '3', '123', '123');
INSERT INTO `propass` VALUES ('10', '22', '123', '456');
INSERT INTO `propass` VALUES ('11', '5', '123456', '123');
INSERT INTO `propass` VALUES ('12', '3', '123', '123');

-- ----------------------------
-- Table structure for shopflash
-- ----------------------------
DROP TABLE IF EXISTS `shopflash`;
CREATE TABLE `shopflash` (
  `id` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) DEFAULT NULL,
  `content` varchar(8000) DEFAULT NULL,
  `ftime` varchar(255) DEFAULT NULL,
  `writer` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shopflash
-- ----------------------------
INSERT INTO `shopflash` VALUES ('1', '无可替代的个性消费潮：人民为什么需要淘宝双12', '<p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\">有人说淘宝是一个连卖拖拉机都能卖出个性的地方，这话不假，逛淘宝双12的感觉跟逛双11截然不同。双12刷了一天淘宝，看着上面千奇百怪的宝贝，什么宠物烘干袋、肉色秋裤、假笑男孩联名款卫衣……乍一看忍俊不禁，仔细一想：“真香！这么有用，为什么不早点买？”</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\">　　</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\">来到淘宝，你就像走进一个热闹的游乐园，这里也想试试，那边也去碰碰，有时候你都不知道自己是什么时候动心、下单的——这就是淘宝的魔力。如果说天猫双11满足了人们对生活品质的标准化追求，那淘宝双12就提供了一个个性化的天地，每一个人都可以在这里探索有趣好玩的新生活方式，满足那些“不足为外人道也”的小癖好、小趣味、小情怀。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\">　<strong>　</strong></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\"><strong>淘宝上个性消费崛起，内容以更有质感的方式连接人与人</strong></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\">　　</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\">在刚刚过去的双12，越来越多的消费者在淘宝上为自己的小众爱好找到了寄托，像一款单价超过4000元的洛丽塔风格服装，开场仅20分钟就被一抢而空……三分妄想、喵屋小铺、Puppets and Doll等七家小众二次元店铺成交过百万。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\">　　</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\">还有无数年轻人正在用“剁手”投票，在淘宝上为自己的品质生活寻找充满特色的打开方式。淘宝双12全天有800多万人在淘宝挑选家具等家居用品，以设计感见长的时尚买手商家“北欧表情Norhor”登顶家具行业第一。淘宝更给年轻人捣鼓自己的小屋提供了个性化的新选择，双12就有人在淘宝上花54万独家定制了套独一无二的家装。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\">　　</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\">一夜灯火通明的淘宝直播间则是“粉丝效应”的最佳体现：双12产业带直播中超过5000万人次边看边买，淘宝上买卖双方早已超越了传统的商家与消费者的关系。正如淘宝家居行业知名主播朵洋Amy所说的，“直播是有温度的，能更直观地将产品传递给人们。”淘宝上，内容正以更有质感、更富个性的方式将人与人连接起来。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\">　　</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\">这一切在淘宝上激发了消费者无穷的个性化消费潜力，汇成了方兴未艾的消费大潮。淘宝诞生了各种想象不到的有趣商品，不管是买家还是卖家，总能在其中找到“发现的乐趣”，或者“创造的乐趣”。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\"><strong>　　</strong></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\"><strong>温暖的创意与不断的创造，淘宝已经融入了人民的生活</strong></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\">　　</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\">今年淘宝双12上火起来很多“神奇宝贝”，像这个宠物烘干袋，就是为了一劳永逸地解决给狗狗洗澡这件小事。当很多人还不太能理解铲屎官们对萌宠特别的爱的时候，淘宝已经在研究如何提升猫狗们的生活品质了。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\"><span style=\"font-family: 楷体, 楷体_GB2312;\"></span>　　</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\">而那个淘宝上专门为女性消费者准备的光腿神器“肉色秋裤”，远看光着腿、近看像丝袜，再仔细看：原来是条秋裤；而翻过来里面就露出厚厚一层绒，看着就暖和。温暖又性感本来就像是“五彩斑斓的黑”一般的存在，但在脑洞大开的淘宝上这一切问题都迎刃而解。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\"><span style=\"font-family: 楷体, 楷体_GB2312;\"></span>　　</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\">这些生活里的小创意，说不到“创新”这么大的词上去，但就是让人特别暖心。江湖上流传已久一句打油诗：淘宝就像小棉袄，美好生活少不了。淘宝早已不仅是一个电商平台，双12也不只是一次促销活动，它已经融入了每个人的生活。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\">　　</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\">15年来，淘宝始终在用创意满足每个人的消费需求，更在用不断的创新把每个人的消费体验推向极致。智能算法的一次次升级，把手淘首页打造成千人千面的舞台，所有人都怀抱好奇心，在此展示和探索。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\">　　</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\">今年双12，淘宝速达业务的推出，更是让消费者享受到了最快两小时达的极致体验。在阿里巴巴生态体系的协同下，淘宝创造性地整合优质的同城商家资源，将他们在各自城市分布的店铺、仓库作为前置仓，共享到整个运力网络中，从而为提高运力提供保障。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\">　　</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\">购物车是一面镜子，不仅映照着我们每个人的个性，更折射淘宝上源源不断、想象不到的创造力。这种持续的创造，把“万能的淘宝”变成了“每个人的淘宝”。淘宝每时每刻都在被赋予新的意义，每个用户也都在定义自己的淘宝，双12则让我们看到了淘宝上个性消费大潮的汹涌澎湃。</p><p><br/></p>', '2018-11-30 13:55:11', '周一');
INSERT INTO `shopflash` VALUES ('2', '测试2', '<p>测试222222222</p>', '2018-12-03 17:26:06', '周二');
INSERT INTO `shopflash` VALUES ('3', '夏洛克------福尔摩斯', '<p><span style=\"background-color: rgb(255, 255, 255); color: rgb(26, 26, 26); font-family: -apple-system, BlinkMacSystemFont, &quot;Helvetica Neue&quot;, &quot;PingFang SC&quot;, &quot;Microsoft YaHei&quot;, &quot;Source Han Sans SC&quot;, &quot;Noto Sans CJK SC&quot;, &quot;WenQuanYi Micro Hei&quot;, sans-serif; font-size: 15px;\">美潮没太多剪裁可拼，大多拼的就是idea。supreme对艺术家，时代的尊敬</span></p>', '2018-12-04 11:26:09', '周三');
INSERT INTO `shopflash` VALUES ('4', '2018年最火爆的单品', '<p>当属CLOT&nbsp; &nbsp;X&nbsp; &nbsp; AJ13</p>', '2018-12-16 22:24:53', '周四');
INSERT INTO `shopflash` VALUES ('5', '个性消费大爆发 网上商城双12投射消费升级新趋势', '<p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\">在刚刚落幕的淘宝双12上，越来越多的消费者为“小众爱好”买单：一款单价超过4000元的洛丽塔风格服装，开场仅20分钟就被一抢而空；灯火通明的淘宝直播间则是“粉丝效应”的最佳体现：双12产业带直播中超5000万人次“边看边买”，一边加购一边为他们心仪的主播默默打call；同时，淘宝双12也为“品质生活”写下生动注脚：800多万人涌入淘宝抢购家居生活用品，有人还壕掷54万给自己定制了一个家……</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\"><br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\">正如创新是淘宝永恒的底色，淘宝双12正是那个不断展示“个性消费需求”的最佳舞台：</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\"><br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\">从特色家居到原创设计再到二次元，消费内容的想象边界不断被突破；从直播到微淘到短视频，创新的玩法不断重塑着我们对于“购物”二字的理解；从韩国东大门的潮流服饰到缅甸的玉石翡翠，淘宝全球购平台上100多个国家的特色商品被剁手党们疯狂抢购。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\"><br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\">依托中国最大最丰富多元的商业平台，淘宝双12的最大价值在于对消费内容、消费形态的潜力挖掘。从中，我们可以窥见中国消费升级新的动力之源，而每一辆购物车背后的“你”，皆是那个成就着消费未来的助推者。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\"><strong><br/></strong></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\"><strong>个性消费需求全面爆发，淘宝双12引领原创IP、定制热</strong></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\"><br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\">以设计感见长的家具店铺“北欧表情Norhor”，既会卖萌也卖口红的“故宫淘宝”， 专注cos服和二次元文化推广的“三分妄想”…..这些对你而言或许还不大熟悉的名字，已经借着今年的淘宝双12登上了属于他们的C位。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\"><br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\">行业成交排名第一的亮眼成绩背后，“原创力”、“设计感”和“特色IP”也成为消费者pick他们的重要理由，诸如假笑男孩和国潮设计师品牌别闹BIZZCUT的这样的联名玩法，更是成为今年双12的一大亮点。&nbsp;</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\"><br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\">在原创力量的驱动下，淘宝软装生活行业也表现抢眼。淘宝双12全天销售额Top 10的商家中，以原创设计、搭配、时尚买手为特色的商家拿下9个席位。其中家具行业拿下第一的正是富有设计感的时尚买手商家“北欧表情Norhor”，今年全天卖了去年的近十倍。在打造温暖舒适小窝这件事上，已有超过14万人在线上选购全屋定制化服务。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\"><br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\">小众特色市场也在双12期间迎来全面爆发。数据显示，今年淘宝二次元行业双12相比去年销售额同比增长近90%，开场仅19分钟，cos服福州店铺三分妄想销售额超过百万，而同样来自福州的喵屋小铺10分钟后也冲破百万销售额大关。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\"><br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: u5faeu8f6fu96c5u9ed1, &quot;Open Sans&quot;, tahoma, arial, sans-serif; color: rgb(66, 66, 66); font-size: 14px; text-indent: 30px; white-space: normal;\">从“非主流”到特色市场的塑造，淘宝对年轻人个性和创造力的尊重、鼓励和赋能，正见证着一个个新物种的诞生和蓬勃发展。以消费者多样化、个性化需求为起点，结合特色商品及特色商户，淘宝将三者紧密联系，形成特色市场，互为促进不断增长。搭建舞台让消费者和商家共同参与创造，这是淘宝独特的生态优势，而淘宝双12正是展现淘宝生态力量的最好契机。</p><p><br/></p>', '2018-12-17 11:05:14', '周六');

-- ----------------------------
-- Table structure for site
-- ----------------------------
DROP TABLE IF EXISTS `site`;
CREATE TABLE `site` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `copyright` varchar(255) DEFAULT NULL,
  `statue` enum('ON','OFF') DEFAULT NULL,
  `LOGO` varchar(255) DEFAULT 'logo.jpg',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of site
-- ----------------------------
INSERT INTO `site` VALUES ('1', '歪秀购物', '歪秀购物|买买买', '©2006-2018 歪秀版权所有 Gzip  azenul.com京ICP备11018177号，京公网安备11011402000177', '让买买买成为一种习惯', 'ON', '/images/site/uploads/site-5c05d45a25531.png');

-- ----------------------------
-- Table structure for stores
-- ----------------------------
DROP TABLE IF EXISTS `stores`;
CREATE TABLE `stores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `uname` varchar(255) DEFAULT NULL,
  `iphone` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT '/default.jpg',
  `status` enum('0','1','2') DEFAULT '0' COMMENT '0:待审核1:审核通过;2:审核未通过',
  `create_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `company` (`company`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stores
-- ----------------------------
INSERT INTO `stores` VALUES ('1', '1', '手机通讯', '赵亚宁', '17633119565', '/default.jpg', '1', '2018-12-15 16:43:16');
INSERT INTO `stores` VALUES ('2', '3', '周一海外代购', '周一', '18233908383', '/default.jpg', '1', '2018-12-15 16:44:25');
INSERT INTO `stores` VALUES ('3', '2', '神舟战神旗舰店', '王军达', '18839316924', '/uploads/images/201812171529529767.jpg', '1', '2018-12-15 16:45:27');
INSERT INTO `stores` VALUES ('4', '4', '华硕自营旗舰店', '王军达', '18839316924', '/default.jpg', '1', '2018-12-15 17:48:37');
INSERT INTO `stores` VALUES ('5', '5', 'uoohe旗舰店', '你七哥', '15210559014', '/default.jpg', '1', '2018-12-16 20:01:15');
INSERT INTO `stores` VALUES ('6', '6', '小涛店铺', '李四', '15210559014', '/uploads/images/201812171648217308.jpg', '1', '2018-12-17 16:47:24');

-- ----------------------------
-- Table structure for system
-- ----------------------------
DROP TABLE IF EXISTS `system`;
CREATE TABLE `system` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '登录成功',
  `uid` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of system
-- ----------------------------
INSERT INTO `system` VALUES ('1', '登录成功', '1', 'admin', '2018-12-15 16:42:23');
INSERT INTO `system` VALUES ('2', '登录成功', '1', 'admin', '2018-12-15 16:42:23');
INSERT INTO `system` VALUES ('3', '登录成功', '1', 'admin', '2018-12-15 16:45:49');
INSERT INTO `system` VALUES ('4', '登录成功', '1', 'admin', '2018-12-16 16:01:41');
INSERT INTO `system` VALUES ('5', '登录成功', '1', 'admin', '2018-12-16 16:01:41');
INSERT INTO `system` VALUES ('6', '登录成功', '1', 'admin', '2018-12-16 22:12:16');
INSERT INTO `system` VALUES ('7', '登录成功', '1', 'admin', '2018-12-16 22:12:16');
INSERT INTO `system` VALUES ('8', '登录成功', '1', 'admin', '2018-12-17 10:13:42');
INSERT INTO `system` VALUES ('9', '登录成功', '1', 'admin', '2018-12-17 10:13:42');
INSERT INTO `system` VALUES ('10', '登录成功', '1', 'admin', '2018-12-17 10:42:14');
INSERT INTO `system` VALUES ('11', '登录成功', '1', 'admin', '2018-12-17 10:42:14');
INSERT INTO `system` VALUES ('12', '登录成功', '1', 'admin', '2018-12-17 13:22:09');
INSERT INTO `system` VALUES ('13', '登录成功', '1', 'admin', '2018-12-17 13:22:09');
INSERT INTO `system` VALUES ('14', '登录成功', '1', 'admin', '2018-12-17 13:32:32');
INSERT INTO `system` VALUES ('15', '登录成功', '1', 'admin', '2018-12-17 13:32:32');
INSERT INTO `system` VALUES ('16', '登录成功', '1', 'admin', '2018-12-17 13:38:30');
INSERT INTO `system` VALUES ('17', '登录成功', '1', 'admin', '2018-12-17 13:38:30');
INSERT INTO `system` VALUES ('18', '登录成功', '1', 'admin', '2018-12-17 13:40:17');
INSERT INTO `system` VALUES ('19', '登录成功', '1', 'admin', '2018-12-17 13:40:17');
INSERT INTO `system` VALUES ('20', '登录成功', '1', 'admin', '2018-12-17 13:42:04');
INSERT INTO `system` VALUES ('21', '登录成功', '1', 'admin', '2018-12-17 13:42:04');
INSERT INTO `system` VALUES ('22', '登录成功', '1', 'admin', '2018-12-17 13:59:01');
INSERT INTO `system` VALUES ('23', '登录成功', '1', 'admin', '2018-12-17 13:59:01');
INSERT INTO `system` VALUES ('24', '登录成功', '7', 'flb', '2018-12-17 14:32:43');
INSERT INTO `system` VALUES ('25', '登录成功', '7', 'flb', '2018-12-17 14:32:43');
INSERT INTO `system` VALUES ('26', '登录成功', '1', 'admin', '2018-12-17 16:29:02');
INSERT INTO `system` VALUES ('27', '登录成功', '1', 'admin', '2018-12-17 16:29:02');
INSERT INTO `system` VALUES ('28', '登录成功', '7', 'flb', '2018-12-17 16:32:32');
INSERT INTO `system` VALUES ('29', '登录成功', '7', 'flb', '2018-12-17 16:32:32');
INSERT INTO `system` VALUES ('30', '登录成功', '1', 'admin', '2018-12-17 16:32:58');
INSERT INTO `system` VALUES ('31', '登录成功', '1', 'admin', '2018-12-17 16:32:58');
INSERT INTO `system` VALUES ('32', '登录成功', '1', 'admin', '2018-12-17 19:45:33');
INSERT INTO `system` VALUES ('33', '登录成功', '1', 'admin', '2018-12-17 19:45:33');
INSERT INTO `system` VALUES ('34', '登录成功', '1', 'admin', '2018-12-17 19:54:44');
INSERT INTO `system` VALUES ('35', '登录成功', '1', 'admin', '2018-12-17 19:54:44');
INSERT INTO `system` VALUES ('36', '登录成功', '1', 'admin', '2018-12-17 20:12:23');
INSERT INTO `system` VALUES ('37', '登录成功', '1', 'admin', '2018-12-17 20:12:23');
INSERT INTO `system` VALUES ('38', '登录成功', '1', 'admin', '2018-12-17 20:29:18');
INSERT INTO `system` VALUES ('39', '登录成功', '1', 'admin', '2018-12-17 20:29:18');
INSERT INTO `system` VALUES ('40', '登录成功', '1', 'admin', '2018-12-17 20:39:28');
INSERT INTO `system` VALUES ('41', '登录成功', '1', 'admin', '2018-12-17 20:39:28');

-- ----------------------------
-- Table structure for type
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tname` varchar(32) DEFAULT NULL,
  `pid` int(11) NOT NULL DEFAULT '0',
  `path` varchar(255) DEFAULT NULL,
  `status` int(20) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of type
-- ----------------------------
INSERT INTO `type` VALUES ('1', '电脑', '0', '0,', '1');
INSERT INTO `type` VALUES ('2', '服装', '0', '0,', '1');
INSERT INTO `type` VALUES ('6', '男装', '2', '0,2,', '1');
INSERT INTO `type` VALUES ('7', '女装', '2', '0,2,', '1');
INSERT INTO `type` VALUES ('16', '珠宝饰品', '0', '0,', '1');
INSERT INTO `type` VALUES ('20', '家用电器', '0', '0,', '1');
INSERT INTO `type` VALUES ('21', '冰箱', '20', '0,20,', '1');
INSERT INTO `type` VALUES ('22', '海尔冰箱', '21', '0,20,21,', '1');
INSERT INTO `type` VALUES ('23', '戒指', '16', '0,16,', '1');
INSERT INTO `type` VALUES ('24', '食品', '0', '0,', '1');
INSERT INTO `type` VALUES ('26', '蔬菜', '24', '0,24,', '1');
INSERT INTO `type` VALUES ('27', 'ig小组', '0', '0,', '1');
INSERT INTO `type` VALUES ('28', '电视', '20', '0,20,', '1');
INSERT INTO `type` VALUES ('29', '乐视', '28', '0,20,28,', '1');
INSERT INTO `type` VALUES ('30', '上衣', '6', '0,2,6,', '1');
INSERT INTO `type` VALUES ('31', '神州战神', '1', '0,1,', '1');
INSERT INTO `type` VALUES ('32', '手机通讯', '0', '0,', '1');
INSERT INTO `type` VALUES ('33', '华为(Hua Wei)', '39', '0,32,39,', '1');
INSERT INTO `type` VALUES ('35', '华硕笔记本', '1', '0,1,', '1');
INSERT INTO `type` VALUES ('36', '华硕飞行堡垒', '35', '0,1,35,', '1');
INSERT INTO `type` VALUES ('37', '华硕灵耀系列', '35', '0,1,35,', '1');
INSERT INTO `type` VALUES ('38', 'Apple', '39', '0,32,39,', '1');
INSERT INTO `type` VALUES ('39', '手机', '32', '0,32,', '1');
INSERT INTO `type` VALUES ('40', '华硕顽石系列', '35', '0,1,35,', '1');
INSERT INTO `type` VALUES ('41', '手机1', '32', '0,32,', '1');
INSERT INTO `type` VALUES ('42', '鞋子', '2', '0,2,', '1');
INSERT INTO `type` VALUES ('43', 'AJ', '42', '0,2,42,', '1');
INSERT INTO `type` VALUES ('44', '喷跑', '42', '0,2,42,', '1');
INSERT INTO `type` VALUES ('45', '小米电视', '28', '0,20,28,', '1');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth` enum('0','1','2') NOT NULL DEFAULT '2' COMMENT '0:超级管理员；1：客户；2：会员',
  `paypwd` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `inputtime` datetime DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `phone` (`phone`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '17633119565', '$2y$10$voTJosSBA7AXLD5l8jggTej0ELqRjHgw6Zr4lHaFF9F8sRbq9XpPW', '2', '4a7d1ed414474e4033ac29ccb8653d9b', '1', '2018-12-15 16:39:31');
INSERT INTO `users` VALUES ('2', '18839316924', '$2y$10$vNK3UMySsgfX1vZh7sBu6uN0wf7Of1CVknD9i3Y6V24a72wcHbNgm', '2', null, '1', '2018-12-15 16:40:10');
INSERT INTO `users` VALUES ('3', '18233908383', '$2y$10$/HVp.xuEnIysdGuLB1agOOeSvc1zh52/J5TRATxAdEm4Ou55kjdWu', '2', '81dc9bdb52d04dc20036dbd8313ed055', '1', '2018-12-15 16:41:14');
INSERT INTO `users` VALUES ('4', '17516729956', '$2y$10$LjyZddf5FEd6fUDbcqMuuepjgRqxWkqLs3z1KklhfZPqTcffkZ0V2', '2', null, '1', '2018-12-15 17:45:27');
INSERT INTO `users` VALUES ('5', '15210559014', '$2y$10$ez.UgQi0Y0e.dNaRQorleerFXxOgRKOfVQOx9d1Nui8uVDIeRLf0m', '2', '81dc9bdb52d04dc20036dbd8313ed055', '1', '2018-12-15 19:29:46');
INSERT INTO `users` VALUES ('6', '15003335362', '$2y$10$TPluZVCUJtzNL9dv6CIgPeByMyqGs3lb0YADoTEMOvGnjT44MnOZW', '2', 'bb7946e7d85c81a9e69fee1cea4a087c', '1', '2018-12-17 09:17:29');
INSERT INTO `users` VALUES ('7', '14312312312', '$2y$10$CJMxeWu5ojah2v91vgTeO.dXCsp/icZctIVddUs7XvY1Rm.038x8.', '2', null, '1', '2018-12-17 09:22:03');
INSERT INTO `users` VALUES ('8', '16523423422', '$2y$10$zCP2eT23eT2VmEiHcl2QAezfQVzJxmHO5abM8RVjZg2U/zuZRpzoO', '2', null, '1', '2018-12-17 09:22:39');
INSERT INTO `users` VALUES ('9', '16756756712', '$2y$10$dEQjM/0o9SMH3CbCcbj6G.iuBMfJIous9ql3X93FCF375uQjF39oi', '2', null, '1', '2018-12-17 09:26:21');
INSERT INTO `users` VALUES ('10', '17777777777', '$2y$10$hBPddOxx381cyNDQ5bqqeuCpSjLmQu71cyjSaXbMrYJo/gwnBMMii', '2', null, '1', '2018-12-17 13:32:50');
INSERT INTO `users` VALUES ('11', '17377777777', '$2y$10$GtHPUlnitctVqHq7bCZsW.klNEBrKyZCrVUgGniVFoE9X6YJZLTL.', '2', null, '1', '2018-12-17 13:33:43');
INSERT INTO `users` VALUES ('12', '18399999999', '$2y$10$QjeL1aIUNpKopoWzlAXNvuSzf9si4dH5LR9f6vJiUJv0azo1zk3m2', '2', null, '1', '2018-12-17 13:35:21');
INSERT INTO `users` VALUES ('13', '17633333333', '$2y$10$RAjhSkCylse54du2ZQDiUeL1C/wpN1tpIntAj2BEfroblWLhGl3sG', '2', null, '1', '2018-12-17 13:36:43');
INSERT INTO `users` VALUES ('14', '17633119566', '$2y$10$wzdKKUbZN97sgEcPc3FJZO8uIKuGO8Av6lYEmsv8LAHgDV0WS6kWa', '2', null, '1', '2018-12-17 16:30:05');
