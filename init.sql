USE dvach;

CREATE TABLE IF NOT EXISTS applicants(
          id INT NOT NULL  AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
         sex VARCHAR(1) NOT NULL,
   group_num VARCHAR(5) NOT NULL,
       email VARCHAR(255) UNIQUE NOT NULL,
      points INT NOT NULL,
   birthyear VARCHAR(4) NOT NULL,
    is_local BOOLEAN NOT NULL,
       token VARCHAR(32) NOT NULL UNIQUE
);