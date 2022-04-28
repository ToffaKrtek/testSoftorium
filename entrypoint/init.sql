CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'Имя пользователя',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица пользователей';

CREATE TABLE `predictions` (
  `prediction_id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL COMMENT 'Вопрос',
  `answer` varchar(255) NOT NULL COMMENT 'Ответ',
  `user_id` int(11) NOT NULL COMMENT 'ID Пользователя',
  PRIMARY KEY (`prediction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица с предсказаниями';

ALTER TABLE `predictions` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
