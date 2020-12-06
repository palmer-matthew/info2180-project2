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

INSERT INTO Users(`firstname`, `lastname`, `password`, `email`) VALUES ('John', 'Doe', '$2y$10$BcWohldgqfoKGUsftid3YOonfOwqtnW..O.TZ9.3tru6lAsCQWUJC', 'admin@project2.com'),
('Jaun-Luc', 'Brown', '$2y$10$NbZ2XCQvosg4bk7GI4R.fOlJGfxYalHcBOX0iyBoUS5MnAgjE.13y', 'jaunlucbrown15@gmail.com');
('Ashley', 'Perkins', '$2y$10$3JVkKfiB49TgRs543NgwTeVI.U4HKFBveH6Rx73E0E3eWBoVDngLy', 'ashperkins@gmail.com');

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


INSERT INTO Issue (`title`, `description`, `type`, `priority`, `status`, `assigned_to`, `created_by`) VALUES
('No Colours','Table Colours not Showing','bug', 'minor', 'open', 2 , 3),
('Aside Does Not Show', 'The Aside Setion does not appear in the page','bug', 'major', 'in Progress', 3 , 2),
('Add User Profile', 'We should add a section that allows a user to see their profile','proposal', 'critical', 'closed', 3 , 2);