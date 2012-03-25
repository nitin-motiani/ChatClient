DROP TABLE IF EXISTS messages;

CREATE TABLE messages (
            message_id INTEGER NOT NULL AUTO_INCREMENT,
            username VARCHAR(255) NOT NULL, 
            message TEXT,
            PRIMARY KEY (message_id)
         );
