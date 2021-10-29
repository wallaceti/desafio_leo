CREATE TABLE `courses` (
   `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
   `title` varchar(100) NOT NULL,
   `description` longtext NOT NULL,
   `link` longtext NOT NULL,
   `image` varchar(255) NOT NULL,
   `created_at` datetime NULL,
   `updated_at` datetime NULL
) ENGINE='InnoDB' COLLATE 'utf8_general_ci';