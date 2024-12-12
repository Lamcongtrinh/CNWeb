CREATE DATABASE QuanLySinhVien
ON PRIMARY 
(
    NAME = QuanLySinhVien_Data,
    FILENAME = 'C:\Users\bachh\OneDrive - edumail365\Học Tập\Đại Học\3.Năm Ba\Học Kỳ 1\Hệ quản trị cơ sở dữ liệu\BT\HQTCSDL\TongQuangBach\QuanLySinhVien_Data.mdf',
    SIZE = 10MB,
    MAXSIZE = 50MB,
    FILEGROWTH = 2MB
)
LOG ON
(
    NAME = QuanLySinhVien_Log,
    FILENAME = 'C:\Users\bachh\OneDrive - edumail365\Học Tập\Đại Học\3.Năm Ba\Học Kỳ 1\Hệ quản trị cơ sở dữ liệu\BT\HQTCSDL\TongQuangBach\QuanLySinhVien_Log.ldf',
    SIZE = 5MB,
    MAXSIZE = 20MB,
    FILEGROWTH = 1MB
);


ALTER DATABASE QuanLySinhVien
MODIFY FILE (
    NAME = QuanLySinhVien_Data,
    SIZE = 15MB
);


ALTER DATABASE QuanLySinhVien
MODIFY FILE (
    NAME = QuanLySinhVien_Log,
    FILEGROWTH = 0
);


DBCC SHRINKFILE (
    NAME = QuanLySinhVien_Data,
    TARGETSIZE = 5
);


ALTER DATABASE QuanLySinhVien
ADD FILE (
    NAME = QuanLySinhVien_Data2,
    FILENAME = 'C:\Users\bachh\OneDrive - edumail365\Học Tập\Đại Học\3.Năm Ba\Học Kỳ 1\Hệ quản trị cơ sở dữ liệu\BT\HQTCSDL\TongQuangBach\QuanLySinhVien_Data2.ndf',
    SIZE = 10MB,
    MAXSIZE = UNLIMITED,
    FILEGROWTH = 5MB
);

ALTER DATABASE QuanLySinhVien
REMOVE FILE QuanLySinhVien_Data2;


CREATE TABLE SinhVien (
    ID INT IDENTITY(1, 1) PRIMARY KEY,
    MaSV CHAR(10) UNIQUE,
    HoTen NVARCHAR(50),
    NgaySinh DATE,
    GioiTinh NVARCHAR(10) CHECK (GioiTinh IN ('Nam', 'Nữ')),
    DiaChi NVARCHAR(100),
    Email NVARCHAR(50) UNIQUE
);

-- Thêm dữ liệu vào bảng SinhVien
INSERT INTO SinhVien (MaSV, HoTen, NgaySinh, GioiTinh, DiaChi, Email)
VALUES 
('SV00000001', N'Nguyen Van A', '2001-01-01', N'Nam', N'Hanoi', 'a@example.com'),
('SV00000002', N'Le Thi B', '2002-02-02', N'Nữ', N'Danang', 'b@example.com'),
('SV00000003', N'Tran Van C', '2003-03-03', N'Nam', N'Hue', 'c@example.com'),
('SV00000004', N'Pham Thi D', '2004-04-04', N'Nữ', N'Haiphong', 'd@example.com'),
('SV00000005', N'Do Van E', '2005-05-05', N'Nam', N'HoChiMinh', 'e@example.com');


CREATE TABLE MonHoc (
    ID INT IDENTITY(1, 1) PRIMARY KEY,
    MaMon NVARCHAR(20) UNIQUE,
    TenMon NVARCHAR(50) UNIQUE,
    MoTa NVARCHAR(200)
);

-- Thêm dữ liệu vào bảng MonHoc
INSERT INTO MonHoc (MaMon, TenMon, MoTa)
VALUES 
('MH001', N'Toán Cao Cấp', N'Môn học toán cao cấp'),
('MH002', N'Lập Trình C', N'Lập trình cơ bản với C'),
('MH003', N'Cơ Sở Dữ Liệu', N'Môn học về CSDL'),
('MH004', N'Triết Học', N'Môn học triết học Mác-Lênin'),
('MH005', N'Tiếng Anh', N'Trình độ cơ bản');


CREATE TABLE KetQua (
    IDSV INT,
    IDMon INT,
    Diem FLOAT,
    PRIMARY KEY (IDSV, IDMon),
    FOREIGN KEY (IDSV) REFERENCES SinhVien(ID),
    FOREIGN KEY (IDMon) REFERENCES MonHoc(ID)
);

-- Thêm dữ liệu vào bảng KetQua
INSERT INTO KetQua (IDSV, IDMon, Diem)
VALUES
(1, 1, 8.5),
(1, 2, 7.0),
(1, 3, 6.0),
(2, 1, 9.0),
(2, 3, 8.0),
(3, 2, 7.5),
(3, 4, 6.5),
(4, 1, 7.0),
(4, 5, 9.5),
(5, 3, 8.0);

