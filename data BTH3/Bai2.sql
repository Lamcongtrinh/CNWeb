CREATE DATABASE QLKhachHang
ON PRIMARY 
(
    NAME = QLKhachHang_Data,
    FILENAME = 'D:\SQL\HQTCSDL\TongQuangBach\QLKhachHang_Data.mdf',
    SIZE = 10MB,
    MAXSIZE = 50MB,
    FILEGROWTH = 2MB
)
LOG ON 
(
    NAME = QLKhachHang_Log,
    FILENAME = 'D:\SQL\HQTCSDL\TongQuangBach\QLKhachHang_Log.ldf',
    SIZE = 5MB,
    MAXSIZE = 20MB,
    FILEGROWTH = 1MB
);

ALTER DATABASE QLKhachHang
MODIFY FILE (
    NAME = QLKhachHang_Data,
    SIZE = 15MB
);

ALTER DATABASE QLKhachHang
MODIFY FILE (
    NAME = QLKhachHang_Log,
    FILEGROWTH = 0
);

DBCC SHRINKFILE (
    NAME = QLKhachHang_Data,
    TARGETSIZE = 5
);

ALTER DATABASE QLKhachHang
ADD FILE (
    NAME = QLKhachHang_Data2,
    FILENAME = 'D:\SQL\HQTCSDL\TongQuangBach\QLKhachHang_Data2.ndf',
    SIZE = 10MB,
    MAXSIZE = UNLIMITED,
    FILEGROWTH = 5MB
);

ALTER DATABASE QLKhachHang
REMOVE FILE QLKhachHang_Data2;


CREATE TABLE KhachHang (
    IDKhachHang INT IDENTITY(1, 1) PRIMARY KEY,
    HoTen NVARCHAR(50),
    GioiTinh NVARCHAR(10),
    DiaChi NVARCHAR(100),
    Email NVARCHAR(50),
    SoDienThoai NVARCHAR(15)
);

-- Thêm dữ liệu vào bảng KhachHang
INSERT INTO KhachHang (HoTen, GioiTinh, DiaChi, Email, SoDienThoai)
VALUES
(N'Nguyen Van A', N'Nam', N'Hanoi', 'nguyenvana@example.com', '0123456789'),
(N'Le Thi B', N'Nữ', N'Danang', 'lethib@example.com', '0987654321'),
(N'Tran Van C', N'Nam', N'Hue', 'tranvanc@example.com', '0911223344'),
(N'Pham Thi D', N'Nữ', N'Saigon', 'phamthid@example.com', '0933445566'),
(N'Do Van E', N'Nam', N'Cantho', 'dovane@example.com', '0944556677');

CREATE TABLE SanPham (
    IDSanPham INT IDENTITY(1, 1),
    TenSP NVARCHAR(100),
    MoTa NVARCHAR(200),
    DonGia FLOAT
);

-- Thêm UNIQUE và PRIMARY KEY bằng lệnh ALTER TABLE
ALTER TABLE SanPham ADD CONSTRAINT PK_SanPham PRIMARY KEY (IDSanPham);
ALTER TABLE SanPham ADD CONSTRAINT UQ_TenSP UNIQUE (TenSP);

-- Thêm dữ liệu vào bảng SanPham
INSERT INTO SanPham (TenSP, MoTa, DonGia)
VALUES
(N'Smartphone', N'Điện thoại thông minh', 15000.5),
(N'Laptop', N'Máy tính xách tay', 20000.0),
(N'Tai nghe', N'Tai nghe Bluetooth', 1500.0),
(N'Tivi', N'Tivi 4K', 10000.0),
(N'Camera', N'Camera giám sát', 5000.0);

CREATE TABLE DonHang (
    IDDonHang INT IDENTITY(1, 1) PRIMARY KEY,
    IDKhachHang INT NOT NULL,
    NgayDatHang DATE,
    TongTien FLOAT NULL,
    FOREIGN KEY (IDKhachHang) REFERENCES KhachHang(IDKhachHang)
);

-- Thêm dữ liệu vào bảng DonHang
INSERT INTO DonHang (IDKhachHang, NgayDatHang)
VALUES
(1, '2024-11-01'),
(2, '2024-11-02'),
(3, '2024-11-03'),
(4, '2024-11-04'),
(5, '2024-11-05');


CREATE TABLE SP_DonHang (
    IDDonHang INT,
    IDSanPham INT,
    SoLuong INT DEFAULT 1,
    ThanhTien FLOAT,
    PRIMARY KEY (IDDonHang, IDSanPham),
    FOREIGN KEY (IDDonHang) REFERENCES DonHang(IDDonHang),
    FOREIGN KEY (IDSanPham) REFERENCES SanPham(IDSanPham)
);

-- Thêm dữ liệu vào bảng SP_DonHang
INSERT INTO SP_DonHang (IDDonHang, IDSanPham, SoLuong)
VALUES
(1, 1, 2),
(1, 2, 1),
(2, 3, 5),
(2, 4, 3),
(3, 1, 1),
(3, 5, 4),
(4, 2, 1),
(4, 3, 2),
(5, 4, 3),
(5, 5, 1);

