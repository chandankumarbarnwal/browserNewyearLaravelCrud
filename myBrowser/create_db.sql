create database doodle;

	create table sites(
		id int(11) not null auto_increment,
		url varchar(512),
		sites varchar(512),
		description varchar(512),
		keywords varchar(512),
		clicks int(11) default 0,
		primary key(id)
		);


	create table images(
		id int(11) not null auto_increment,
		siteUrl varchar(512),
		imageUrl varchar(512),
		alt varchar(512),
		title varchar(512),
		clicks int(11) default 0,
		broken tinyint() default 0,

		primary key(id)
		);
