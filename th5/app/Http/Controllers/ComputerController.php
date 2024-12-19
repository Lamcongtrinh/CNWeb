<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    // Hiển thị danh sách các máy tính với phân trang
    public function index()
    {
        $computers = Computer::paginate(5);
        return view('computers.index', compact('computers'));
    }

    // Hiển thị form thêm máy tính mới
    public function create()
    {
        return view('computers.create');
    }

    // Lưu máy tính mới
    public function store(Request $request)
    {
        $request->validate([
            'computer_name' => 'required|max:50',
            'model' => 'required|max:100',
            'operating_system' => 'required|max:50',
            'processor' => 'required|max:50',
            'memory' => 'required|integer',
            'available' => 'required|boolean',
        ]);

        Computer::create($request->all());

        return redirect()->route('computers.index')->with('success', 'Computer created successfully.');
    }

    // Hiển thị chi tiết máy tính
    public function show(Computer $computer)
    {
        return view('computers.show', compact('computer'));
    }

    // Hiển thị form chỉnh sửa thông tin máy tính
    public function edit(Computer $computer)
    {
        return view('computers.edit', compact('computer'));
    }

    // Cập nhật thông tin máy tính
    public function update(Request $request, Computer $computer)
    {
        $request->validate([
            'computer_name' => 'required|max:50',
            'model' => 'required|max:100',
            'operating_system' => 'required|max:50',
            'processor' => 'required|max:50',
            'memory' => 'required|integer',
            'available' => 'required|boolean',
        ]);

        $computer->update($request->all());

        return redirect()->route('computers.index')->with('success', 'Computer updated successfully.');
    }

    // Xóa máy tính
    public function destroy(Computer $computer)
    {
        $computer->delete();

        return redirect()->route('computers.index')->with('success', 'Computer deleted successfully.');
    }
}
