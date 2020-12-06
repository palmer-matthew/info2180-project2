DROP DATABASE IF EXISTS BugIssue;
CREATE DATABASE BugIssue;
USE BugIssue;

DROP TABLE IF EXISTS Users;
CREATE TABLE Users(
    `id` INT(11) NOT NULL auto_increment,
    `firstname` VARCHAR(35) NOT NULL default '',
    `lastname` VARCHAR(35) NOT NULL default '',
    `password` VARCHAR(255) NOT NULL default '',
    `email` VARCHAR(155) NOT NULL default '',
    `date_joined` DATETIME default CURRENT_TIMESTAMP,
    PRIMARY KEY  (`id`)
);

INSERT INTO Users(`firstname`, `lastname`, `password`, `email`) VALUES ('John', 'Doe', '$2y$10$BcWohldgqfoKGUsftid3YOonfOwqtnW..O.TZ9.3tru6lAsCQWUJC', 'admin@project2.com');
INSERT INTO Users(`firstname`, `lastname`, `password`, `email`) VALUES ('Jaun-Luc', 'Brown', '$2y$10$NbZ2XCQvosg4bk7GI4R.fOlJGfxYalHcBOX0iyBoUS5MnAgjE.13y', 'jaunlucbrown15@gmail.com');

DROP TABLE IF EXISTS Issue;
CREATE TABLE Issue(
    `id` INT(11) NOT NULL auto_increment,
    `title` VARCHAR(100) NOT NULL default '',
    `description` TEXT NOT NULL default '',
    `type` VARCHAR(35) NOT NULL default '',
    `priority` VARCHAR(35) NOT NULL default '',
    `status` VARCHAR(35) NOT NULL default '',
    `assigned_to` INT(11) NOT NULL,
    `created_by` INT(11) NOT NULL,
    `created` DATETIME default CURRENT_TIMESTAMP,
    `updated` DATETIME default CURRENT_TIMESTAMP,
    PRIMARY KEY  (`id`)
);


