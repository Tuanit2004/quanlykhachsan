<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keywords = $request->get('search') ?? '';

        $customers = KhachHang::when($keywords != '', function ($query) use($keywords) {
            $query->where('name', 'like', "%$keywords%")
                ->orWhere('email', 'like', "%$keywords%")
                ->orWhere('phone', 'like', "%$keywords%");
        });

        $customers = $customers->orderByDesc('updated_at')->get();

        return view('admin.customers.index', compact('customers'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'ten_kh' => 'required',
            'email' => 'nullable|email|max:255|unique:kh',
            'sdt' => 'required|unique:kh',
        ], [
            'ten_kh.required' => 'Tên khách hàng không được để trống',
            'sdt.required' => 'Số điện thoại không được để trống',
            'sdt.numeric' => 'Vui lòng nhập đúng định dạng số điện thoại',
            'sdt.unique' => 'Số điện thoại đã tồn tại',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'email.unique' => 'Email đã tồn tại'
        ]);
        // Remove the _token from the request
        $request->request->remove('_token');
        $requestData = $request->all();

        KhachHang::create($requestData);

        return redirect('admin/customers')->with('thongbao', 'Thêm khách hàng thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $customer = KhachHang::findOrFail($id);

        return view('admin.customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $customer = KhachHang::findOrFail($id);

        return view('admin.customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'ten_kh' => 'required',
            'email' => 'nullable|email|max:255|unique:kh,email,'. $id,
            'sdt' => 'required|unique:kh,sdt,' . $id,
        ], [
            'ten_kh.required' => 'Tên khách hàng không được bỏ trống',
            'sdt.required' => 'Số điện thoại không được để trống',
            'sdt.unique' => 'Số điện thoại đã tồn tại',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'email.unique' => 'Email đã tồn tại'
        ]);
        $customer = KhachHang::findOrFail($id);

        $request->request->remove('_token');
        $requestData = $request->all();
        $customer->update($requestData);

        return redirect('admin/customers')->with('thongbao', 'Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        KhachHang::destroy($id);

        return redirect('admin/customers')->with('thongbao', 'Xoá khách hàng thành công!');
    }

}
