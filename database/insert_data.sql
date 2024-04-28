INSERT INTO role(name) VALUES
	('admin'),
    ('user');
    
INSERT INTO user(role_id,fullname,account,password,deleted) VALUES
    (1,	'Nguyễn Tiến Hiệp',	'hiepnt',	'admin',	0),
    (1,	'Nguyễn Tiến Đức',	'ducnt',	'admin',	1),
    (2,	'Trần Đức Anh',		'anhtd',	'user',		0),
    (2,	'Lê Hồng Nhung',	'nhunglh',	'user',		0),
    (2,	'Lê Quang Đạt',		'datlq',	'user',		0);

INSERT INTO category (name) VALUES
    ('Solo Show'),
    ('Band Show'),
    ('Music Festival');

INSERT INTO products (category_id,	title,	price,	thumbnail,	description,locations,	even_date,	deleted) VALUES
    (1,
     'Show Của Đen',
     990000,
     './img/show của đen.png',
     'Show của Đen là liveshow đầu tiên trong sự nghiệp, đánh dấu cột mốc 10 năm theo đuổi con đường âm nhạc của Đen. Đây cũng là lời cảm ơn chân thành nhất mà Đen muốn dành tặng đến những Đồng âm đã luôn theo dõi và ủng hộ mình suốt thời gian qua. Hãy đến để cùng Đen nhìn lại chặng đường 10 năm đã qua, và chờ đón những điều thật đặc biệt!',	
     'Nhà thi đấu Quân khu 7, 202 Hoàng Văn Thụ, Phường 9, Huyện Phú Nhuận, Thành phố Hồ Chí Minh', 	
     '2024-11-09',
     0),
     
	(1,
     'Liveshow Hà Nhi | She In Shine',
     600000,
     './img/hà nhi.png',
     'Lululola Show - Hơn cả âm nhạc, không gian lãng mạn đậm chất thơ Đà Lạt bao trọn hình ảnh thung lũng Đà Lạt, được ngắm nhìn khoảng khắc hoàng hôn thơ mộng đến khi Đà Lạt về đêm siêu lãng mạn, được giao lưu với thần tượng một cách chân thật và gần gũi nhất trong không gian ấm áp và không khí se lạnh của Đà Lạt. Tất cả sẽ mang đến một đêm nhạc ấn tượng mà bạn không thể quên khi đến với Đà Lạt.',	
     'Đường 3/4, Đồi Cà Ri Dê, Phường 3, Thành phố Đà Lạt',
     '2024-09-11',
     0),
     
	(1,
     'Tuấn Hưng : Show GỬI NGÀN LỜI YÊU - DeloDeloShow',
     500000,
     './img/tuấn hưng.png',
     'Ngày 14.04 back valentine, cùng chào đón sự xuất hiện của ca sĩ Tuấn Hưng tại Show “Gửi ngàn lời yêu”. Anh là một trong những tên tuổi hàng đầu của làng nhạc Việt Nam, với sự nghiệp vô cùng ấn tượng. Sở hữu một chất giọng khàn trầm đặc trưng nhưng cũng không kém phần lãng tử, khiến cho mỗi ca khúc của anh tình nhưng cũng rất đời. 
	Đến với DeloDelo Show, Tuấn Hưng sẽ đưa khán giả bước vào thế giới tình yêu mãnh liệt, hoang dã, hứa hẹn sẽ là một đêm nhạc không thể quên.
	Đừng bỏ lỡ cơ hội gặp gỡ Me-Xừ Phán Tuấn Hưng từ màn ảnh rộng đến ngoài đời, hứa hẹn là một trải nghiệm đa chiều đầy thú vị và đáng nhớ. Đặt vé ngay để không bỏ lỡ cơ hội thưởng thức một đêm nhạc tuyệt vời cùng Tuấn Hưng và DeloDelo Show!',
     'Khu Phim trường Thiên đường Bảo Sơn, Hà Nội',
     '2024-11-20',
     0),
     
	(1,
     'Hà Nội - Trung Quân : Show TRÓT YÊU - DeloDeloShow',
     1550000,
     './img/trung quân.png',
     'Hãy cùng nhau lắng nghe những giai điệu của tình yêu, đắm chìm trong không gian ngập tràn cảm xúc cùng Show ca nhạc đặc biệt của “hoàng tử tình ca” – Trung Quân Idol với giọng hát đầy cảm xúc và nội lực .
	Với những giai điệu ngọt ngào về những rung động khi mới yêu “Người nói yêu anh đi, người nói thương anh đi để cho con tim này đừng ngóng trông hao gầy…”, Live Concert “Trót Yêu”  mong muốn chạm được đến tận trái tim người nghe nhạc & sẽ là món quà đầy ý nghĩa dành cho tất cả các cặp đôi, đặc biệt là các bạn đang lưỡng lự chưa biết bày tỏ như thế nào để thay đó như lời tỏ tình đầy lãng mạn, khích lệ những bạn trẻ mạnh dạn nói tiếng yêu đến người mà mình đã thầm thương trộm nhớ.
	Nhớ  nhé, chúng ta hẹn gặp nhau tại đêm diễn, để cùng tận hưởng tình yêu và âm nhạc đắm say trong trái tim…
	Hãy nhanh tay đặt vé để có cho mình vị trí ngồi đẹp nhất các bạn nhé! ',
     'Khu phim trường Thiên Đường Bảo Sơn, Hà Nội',
     '2024-08-13',
     0),
     
	(1,
     'Liveshow VĂN MAI HƯƠNG',
     450000,
     './img/Văn Mai Hương.png',
     'Lululola Show - Hơn cả âm nhạc, không gian lãng mạn đậm chất thơ Đà Lạt bao trọn hình ảnh thung lũng Đà Lạt, được ngắm nhìn khoảng khắc hoàng hôn thơ mộng đến khi Đà Lạt về đêm siêu lãng mạn, được giao lưu với thần tượng một cách chân thật và gần gũi nhất trong không gian ấm áp và không khí se lạnh của Đà Lạt. Tất cả sẽ  mang đến một đêm nhạc ấn tượng mà bạn không thể quên khi đến với Đà Lạt.',
     'Đường 3/4, Đồi Cà Ri Dê, Phường 3, Thành phố Đà Lạt',
     '2024-12-28',
     0),
     
	(2,	
     'HARMONY SHOW | SÓNG TÌNH | MTV BAND',
     600000,
     './img/mvp band.png',
     'Một mùa hè rực rỡ của năm 2024 với những chuỗi kì nghỉ hè cho bạn bè, người thân và gia đình đã đang trên con đường đến với chúng ta. Hòa mình cùng với nhịp độ sôi nổi ấy, Harmony Show xin gửi tới những làn sóng giai điệu vui tươi qua sự góp mặt của band nhạc MTV và ca sĩ Phan Đình Tùng với những bản hit vượt thời gian.',
     'Harmony Hill – khu đồi thông tại đảo Tuần Châu, Hạ Long.',
     '2026-04-30',
     1),
     
	(2,
     'LÊ HIẾU & QUỐC THIÊN FT. MR BOTT BAND | NGÀY MAI CHIA CÁCH',
     650000,
     './img/mr bott band.png',
     'Lululola Show - Hơn cả âm nhạc, không gian lãng mạn đậm chất thơ Đà Lạt bao trọn hình ảnh thung lũng Đà Lạt, được ngắm nhìn khoảng khắc hoàng hôn thơ mộng đến khi Đà Lạt về đêm siêu lãng mạn, được giao lưu với thần tượng một cách chân thật và gần gũi nhất trong không gian ấm áp và không khí se lạnh của Đà Lạt. Tất cả sẽ  mang đến một đêm nhạc ấn tượng mà bạn không thể quên khi đến với Đà Lạt.',
     'Đường 3/4, Đồi Cà Ri Dê, Phường 3, Thành phố Đà Lạt',
     '2024-12-28',
     0),
     
	(3,
     'Những Thành Phố Mơ Màng Summer Tour 2024',
     699000,
     './img/NTPMM.png',
     'Cư dân đã sẵn sàng chuẩn bị cho chuyến hành trình với "Những Thành Phố Mơ Màng Summer" chưa! Đón nhận không khí trẻ trung, năng động của mùa hè, sự lung linh của thành phố, và những bản hit âm nhạc sôi động. Hãy mua ngay vé để trải nghiệm cuộc phiêu lưu âm nhạc độc đáo này và tận hưởng một mùa hè đầy ý nghĩa cùng NTPMM nhé.',
     'Công Viên Yên Sở, Hoàng Mai, Hà Nội',
     '2024-04-20',
     1),
     
	(3,
     'THE FOUNTAIN FESTIVAL',
     350000,
     './img/the fountain festival.png',
     'Tháng lễ hội sẽ tràn đầy bất ngờ khi đến với The Global City. Chuỗi Lễ Hội Nhạc Nước The Fountain Festival sẽ diễn ra liên tục với 3 chủ đề không thể “cháy” hơn: 
	18.04: Đêm nhạc GREATEST HITS 
	Phiêu cùng những bản Top Hits “đã tai” nhất của NOO PHƯỚC THỊNH, ANH TÚ, ORANGE, AMEE & DJ 2PILLZ 
	30.04: Đêm nhạc FREE FLOW
	Bùng nổ cảm xúc trong âm nhạc cực chất của SUBOI, GDUCKY, PHÁO, WEAN & HURRYKNG 
	01.05: Đêm nhạc ROCK THE GLOBAL
	Cuồng nhiệt cùng “bão rock” rực lửa từ BỨC TƯỜNG & PHẠM ANH KHOA, MICROWAVE, CHILLIES, 7UPPERCUTS & THE FLOB
	Và tất nhiên không thể thiếu những hoạt động lễ hội rực sắc trong không gian thoáng đãng tại The Global City, vui chơi giải trí tại City Park, màn trình diễn nhạc nước lớn nhất Đông Nam Á,...',
     'THE GLOBAL CITY, Đỗ Xuân Hợp, P.An Phú, Quận 2, TP. Thủ Đức, TP.HCM',
     '2026-08-18',
     0),
     
	(1,
     '2024 BAEKHYUN [Lonsdaleite] IN HO CHI MINH',
     2500000,
     './img/beakhyun.png',
     'Baekhyun lần đầu tiên ra mắt khán giả vào năm 2012. Anh là một trong ba giọng ca chính của EXO, là một mẩu của nhóm nhỏ EXO-CBX và đảm nhận vai trò trưởng nhóm của nhóm nhạc dự án SuperM. Chủ nhân hit Candy còn tham gia sáng tác, viết lời cho một số ca khúc của nhóm. Bên cạnh ngoại hình nổi bật, Baekhyun còn được biết đến với giọng hát đầy truyền cảm và nội lực.
     Mỹ nam sinh năm 1992 từng lập nhiều kỷ lục khi hoạt động solo. Ngôi sao Kpop 32 tuổi nổi tiếng cùng loạt hit Beautiful, Dream, Candy, UN Village, Bambi… Baekhyun cũng thường xuyên hát cho các phim Bầu trời rực đỏ, Ký sự thanh xuân, Người thầy y đức 2…',
     '4 Đ. Lê Đại Hành, Phường 15, Quận 11, Thành Phố Hồ Chí Minh',
     '2026-09-26',
     0);

INSERT INTO feedback (first_name,	last_name,	email,	phone_number,	subject_name,	note) VALUES
('Nguyễn', 	'Mạnh Cường',	'cuongnm@gmail.com',	'0123456789',	'Đánh giá chất lượng',	'Chất lượng tốt'),
('Lê', 		'Quốc Dương',	'duonglq@gmail.com',	'0223456789',	'Đánh giá chất lượng',	'Chất lượng tốt'),
('Trần',	'Quốc Vinh',	'vinhtq@gmail.com',		'0323456789',	'Đánh giá chất lượng',	'Chất lượng tốt'),
('Trần', 	'Phương Lam',	'lamtp@gmail.com',		'0423456789',	'Đánh giá chất lượng',	'Chất lượng tốt'),
('Nguyễn', 	'Việt Thành',	'thanhnv@gmail.com',	'0523456789',	'Đánh giá chất lượng',	'Chất lượng tốt');

INSERT INTO orders (user_id,fullname,email,phone_number,address,order_date,status,total_money) VALUES
    (3,	'Trần Đức Anh',		'tranducanh@gmail.com',		'0338948581','772 Kim Giang , Thanh Trì, Hà Nội',	'2024-01-15',0,	550000),
    (4,	'Lê Hồng Nhung',	'lehongnhung@gmail.com',	'0987662013','123 Trần Phú, Hà Đông, Hà Nội',		'2024-02-20',0,	1100000),
    (5,	'Lê Quang Đạt',		'lequangdat@gmail.com',		'0987552413','161 Khương Trung, Thanh Xuân, Hà Nội','2023-04-23',1,	550000);

INSERT INTO detail_order (order_id,	product_id,	price,	number, total_money) VALUES
    (1,	1,	550000,	1,	550000),
    (2,	2,	550000,	1,	550000),
    (2,	3,	550000,	1,	550000),
    (3,	5,	550000,	1,	550000);
