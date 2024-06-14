<?php

namespace App\Http\Controllers\Dash\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use App\Services\ImageService\ImageServiceSave;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{


    public function edit(Setting $setting)
    {

        return view('admin_end.setting.edit', ['setting' => $setting]);
    }

    public function update(SettingRequest $request)
    {

        try {

            $setting = Setting::findOrFail($request->setting_id);
            $imgService = new  ImageServiceSave();

            if ($request->hasFile('logo')) {

                if ($setting->logo != null) {
                    $imgService->deleteOldStorageImage($setting->logo);
                }
                $result = $imgService->savePublicStorage($request->file('logo'), 'setting');
                $logo_path = $result;
                $setting->logo = $logo_path;
            }

            if ($request->hasFile('icon')) {

                if ($setting->icon != null) {
                    $imgService->deleteOldStorageImage($setting->icon);

                }
                
                $result = $imgService->savePublicStorage($request->file('icon'), 'setting');
                $icon_path = $result;
                $setting->icon = $icon_path;
            }


            $setting->title = $request->title;
            $setting->description = $request->description;
            $setting->keywords = $request->keywords;
            $setting->save();

            session()->flash('success', __('messages.The_update_was_completed_successfully'));
            return redirect()->route('admin.setting.index');

        } catch (\Exception $ex) {
            return view('errors_custom.general_error')
                ->with(['error' => $ex->getMessage()]);
        }


    }
}
