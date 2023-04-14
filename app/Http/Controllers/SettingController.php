<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Repositories\Setting\SettingRepositoryInterface;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected $settingRepository;

    public function __construct(SettingRepositoryInterface $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = $this->settingRepository->all();

        return view('admin.setting.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.setting.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SettingRequest $request)
    {
        $settingData = [
            'title' => $request['title'],
            'time_start' => $request['time_start'],
            'time_out' => $request['time_out'],
            'breck_time' => $request['breck_time'],
            'ip_address' => $request['ip_address'],
        ];

        $this->settingRepository->store($settingData);

        return redirect(route('setting.index'))->with('success', 'Thêm mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = $this->settingRepository->get($id);

        return view('admin.setting.edit', compact('setting'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request, $id)
    {
        $settingData = [
            'title' => $request['title'],
            'time_start' => $request['time_start'],
            'time_out' => $request['time_out'],
            'breck_time' => $request['breck_time'],
            'ip_address' => $request['ip_address'],
        ];

        $this->settingRepository->update($id, $settingData);

        return redirect(route('setting.index'))->with('success', 'Chỉnh sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->settingRepository->destroy($id);

        return redirect(route('setting.index'))->with('success', 'Xóa thành công');

    }

    public function setActive($id)
    {
        $this->settingRepository->removeAllActive();

        $data =  [
            'active' => 1
        ];
        $setting = $this->settingRepository->update($id, $data);

        return $setting;
    }
}
