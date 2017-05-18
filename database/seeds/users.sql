# Dump of table users
# ------------------------------------------------------------

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Twelve23 Admin','admin@twelve23.com','','','',''),
	(2,'Brent Ellis','ellisbrent@gmail.com','','','',''),
	(3,'Buck Nasty','buck@mail.com','$2y$10$27pghInBqGl7XluNi6HwFOVwGqE8bZBSKL3b1nlCB6whCOLnYlfPS','','','');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
