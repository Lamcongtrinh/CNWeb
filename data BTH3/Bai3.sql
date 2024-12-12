USE QLKhachHang;
go;
UPDATE SP_DonHang
SET ThanhTien = SoLuong * SanPham.DonGia
FROM SP_DonHang
INNER JOIN SanPham ON SP_DonHang.IDSanPham = SanPham.IDSanPham;


UPDATE DonHang
SET TongTien = (
    SELECT SUM(ThanhTien)
    FROM SP_DonHang
    WHERE SP_DonHang.IDDonHang = DonHang.IDDonHang
);


SELECT 
    HoTen,
    RIGHT(HoTen, CHARINDEX(' ', REVERSE(HoTen)) - 1) AS TenKhachHang
FROM KhachHang;


SELECT DonHang.*
FROM DonHang
INNER JOIN KhachHang ON DonHang.IDKhachHang = KhachHang.IDKhachHang
WHERE KhachHang.HoTen = N'Nguyen Van A';

SELECT 
    KhachHang.HoTen,
    SUM(DonHang.TongTien) AS TongSoTien
FROM DonHang
INNER JOIN KhachHang ON DonHang.IDKhachHang = KhachHang.IDKhachHang
WHERE KhachHang.HoTen = N'Nguyen Van A'
GROUP BY KhachHang.HoTen;
