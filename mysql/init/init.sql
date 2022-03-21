
CREATE TABLE IF NOT EXISTS users (
    id int(11) UNSIGNED AUTO_INCREMENT,
    username varchar(255) NOT NULL,
    email varchar(255) NOT NULL UNIQUE,
    password varchar(255) NOT NULL,
    age int(11),
    tel varchar(255) unique,
    zip int(11),
    address varchar(255),
    login_time datetime DEFAULT CURRENT_TIMESTAMP,
    created datetime DEFAULT CURRENT_TIMESTAMP,
    modified datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    delete_flg bool DEFAULT false,
    PRIMARY KEY(id),
    INDEX index_username (username),
    INDEX index_email (email)
) ENGINE = InnoDB DEFAULT CHARSET=utf8;

insert into users (username, email, password ) values ('takaya', 'test@gootl.com', 'aaaaaaa');


CREATE TABLE IF NOT EXISTS categorys(
    id int(11) UNSIGNED AUTO_INCREMENT,
    category_name varchar(255) NOT NULL,
    created datetime DEFAULT CURRENT_TIMESTAMP,
    modified datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    delete_flg bool DEFAULT false,
    PRIMARY KEY(id)
    ) ENGINE = InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS products(
    id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    user_id int(11) UNSIGNED NOT NULL,
    category_id int(11) UNSIGNED NOT NULL,
    product_name varchar(255) NOT NULL,
    comment varchar(255),
    price int(11) NOT NULL,
    created datetime DEFAULT CURRENT_TIMESTAMP,
    modified datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    delete_flg bool DEFAULT false,
    PRIMARY KEY(id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (category_id) REFERENCES categorys(id)
) ENGINE = InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS products_images(
    id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    product_id int(11) UNSIGNED NOT NULL,
    image_url varchar(255) NOT NULL,
    created datetime DEFAULT CURRENT_TIMESTAMP,
    modified datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(id),
    INDEX product_id (product_id),
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
    ) ENGINE = InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS messages(
    id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    message varchar(255) NOT NULL,
    from_user_id int(11) UNSIGNED ,
    to_user_id int(11) UNSIGNED ,
    send_date datetime DEFAULT CURRENT_TIMESTAMP,
    created datetime DEFAULT CURRENT_TIMESTAMP,
    modified datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    delete_flg bool DEFAULT false,
    index message_users (from_user_id, to_user_id),
    FOREIGN KEY (from_user_id) REFERENCES users(id) ON DELETE SET NULL,
    FOREIGN KEY (to_user_id) REFERENCES users(id) ON DELETE SET NULL,
    PRIMARY KEY(id)
    ) ENGINE = InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS favorite_products(
    id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    user_id int(11) UNSIGNED NOT NULL,
    product_id int(11) UNSIGNED NOT NULL,
    delete_flg bool DEFAULT false,
    INDEX user_product(user_id, product_id),
    PRIMARY KEY(id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
    ) ENGINE = InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS bords(
    id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    sale_user_id int(11) UNSIGNED NOT NULL,
    buy_user_id int(11) UNSIGNED NOT NULL,
    created datetime DEFAULT CURRENT_TIMESTAMP,
    modified datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(id),
    index bord_users (sale_user_id, buy_user_id),
    FOREIGN KEY (sale_user_id) REFERENCES users(id),
    FOREIGN KEY (buy_user_id) REFERENCES users(id)
    ) ENGINE = InnoDB DEFAULT CHARSET=utf8;