-- Create Database
ALTER DATABASE `txone_target` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Table structure for table `txone_target`.`users`
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
    `id` int unsigned NOT NULL AUTO_INCREMENT,
    `username` varchar(50) NOT NULL,
    `password` varchar(50) NOT NULL,
    `email` varchar(150) NOT NULL,
    `permission` int NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 6 DEFAULT CHARSET = utf8mb4;

-- Records of users
-- BEGIN;
-- INSERT INTO `users` VALUES ('admin', 'baritone', 'admin@txone.com', 1);
-- INSERT INTO `users` VALUES ('manager', 'txone', 'manager@txone.com', 2);
-- INSERT INTO `users` VALUES ('test_user', 'utxone', 'test_user@txone.com', 3);
-- COMMIT;
LOCK TABLES `users` WRITE;
INSERT INTO `users` (`username`, `password`, `email`, `permission`) VALUES
    ('admin', 'baritone', 'admin@txone.com', 1),
    ('manager', 'txone', 'manager@txone.com', 2),
    ('test_user', 'utxone', 'test_user@txone.com', 3);
UNLOCK TABLES;

SET FOREIGN_KEY_CHECKS = 1;
