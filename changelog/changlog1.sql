
CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `headline` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `content_url` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime DEFAULT NULL DEFAULT CURRENT_TIMESTAMP,
  `catalog_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_post_user_id` (`user_id`),
  KEY `FK_post_catalog_id` (`catalog_id`),
  CONSTRAINT `FK_post_catalog_id` FOREIGN KEY (`catalog_id`) REFERENCES `catalog` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_post_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;
