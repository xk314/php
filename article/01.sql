-- // 文章标题，作者，类型（新闻，八卦，财经，科技），是否立即发布，插图，摘要，内容。

create table article (
	aid int unsigned primary key auto_increment,
	title varchar(30) not null,
	author varchar(30) not null,
	cat_name varchar(20) not null,
	is_show enum("是" ,"否") not null,
	pic varchar(50),
	description varchar(100),
	comment text,
	add_time int not null,
)charset="utf8" engine="innodb";