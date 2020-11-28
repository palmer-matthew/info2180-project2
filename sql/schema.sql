--Starter for the schema.sql file--

DROP DATABASE BugIssue IF EXISTS;
CREATE DATABASE BugIssue;
USE BugIssue;

DROP TABLE Users IF EXISTS;
CREATE TABLE Users(
    `id` INT(11) NOT NULL auto_increment,
    `firstname` VARCHAR(35) NOT NULL default '',
    `lastname` VARCHAR(35) NOT NULL default '',
    `password` VARCHAR(35) NOT NULL default '',
    `email` VARCHAR(35) NOT NULL default '',
    `date_joined` DATETIME,
    PRIMARY KEY  (`id`)
);

DROP TABLE Issue IF EXISTS;
CREATE TABLE Issue(
    `id` INT(11) NOT NULL auto_increment,
    `title` VARCHAR(100) NOT NULL default '',
    `description` TEXT NOT NULL default '',
    `type` VARCHAR(35) NOT NULL default '',
    `priority` VARCHAR(35) NOT NULL default '',
    `status` VARCHAR(35) NOT NULL default '',
    `assigned_to` INT(11) NOT NULL,
    `created_by` INT(11) NOT NULL,
    `created` DATETIME,
    `updated` DATETIME,
    PRIMARY KEY  (`id`)
);