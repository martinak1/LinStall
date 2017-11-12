CREATE TABLE MembershipApps (
    MAId int(10) unsigned NOT NULL AUTO_INCREMENT,
    fName varchar(30) DEFAULT NULL,
    lName varchar(30) DEFAULT NULL,
    uname varchar(30) DEFAULT NULL,
    email varchar(50) DEFAULT NULL,
    street varchar(100) DEFAULT NULL,
    city varchar(50) DEFAULT NULL,
    state varchar(20) DEFAULT NULL,
    zip int(10) DEFAULT NULL,
    pass1 varchar(50) DEFAULT NULL,
    favDistro varchar(50) DEFAULT NULL,
    distroUsed text,
    hatedDist varchar(50) DEFAULT NULL,
    bio text,
    languagesKnown text,
    PRIMARY KEY(MAId)
) ENGINE=MyISAM AUTO_INCREMENT=1224 DEFAULT CHARSET=latin1;
