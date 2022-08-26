<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use App\Http\Requests\Setting\UpdateMailSettingsRequest;

class SettingController extends Controller {
    public function general() {
        return view( 'backend.settings.general' );
    }

    public function generalUpdate( Request $request ) {
        $this->validate( $request, [
            'site_title'       => 'required|string|min:3|max:255',
            'site_description' => 'nullable|string|min:5|max:255',
            'site_address'     => 'nullable|string|min:5|max:255',
        ] );

        Setting::updateOrCreate( ['name' => 'site_title'], ['value' => $request->get( 'site_title' )] );
        //\Artisan::call( "env:set APP_NAME='" . $request->get( 'site_title' ) . "'" );
        Setting::updateOrCreate( ['name' => 'site_description'], ['value' => $request->get( 'site_description' )] );
        Setting::updateOrCreate( ['name' => 'site_address'], ['value' => $request->get( 'site_address' )] );

        \LogActivity::addToLog( 'General settings update!.' );
        toast( 'General settings update.', 'success' );
        return redirect()->route( 'app.settings.general' );
    }

    public function appearence() {
        return view( 'backend.settings.appearence' );
    }

    public function appearenceUpdate( Request $request ) {
        $this->validate( $request, [
            'site_logo' => 'nullable|image',
            'favicon'   => 'nullable|image',
        ] );

//return $request;

        if ( $request->hasFile( 'site_logo' ) ) {

//$imageName = image($request->site_logo, 'site_logo', 'logos');
            if ( setting( 'site_logo' ) ) {
                $this->deleteLogo( setting( 'site_logo' ) );
            }

            Setting::updateOrCreate(
                ['name' => 'site_logo'],
                [
                    'value' => Storage::disk( 'public' )->putFile( 'logos', $request->file( 'site_logo' ) ),
                ]
            );
        }

        if ( $request->hasFile( 'favicon' ) ) {

//$imageName = image($request->favicon, 'favicon', 'logos', 33, 33);
            if ( setting( 'favicon' ) ) {
                $this->deleteLogo( setting( 'favicon' ) );
            }

            Setting::updateOrCreate( ['name' => 'favicon'],
                [
                    'value' => Storage::disk( 'public' )->putFile( 'logos', $request->file( 'favicon' ) ),
                ]
            );
        }

        \LogActivity::addToLog( 'Appearence settings update!.' );
        toast( 'Appearence settings update.', 'success' );
        return redirect()->route( 'app.settings.appearence' );
    }

    public function mail(){
        return view('backend.settings.mail');
    }

    public function mailUpdate(UpdateMailSettingsRequest $request){
        Setting::updateSettings($request->validated());
        // Update .env mail settings
        Artisan::call("env:set MAIL_MAILER='". $request->mail_mailer ."'");
        Artisan::call("env:set MAIL_HOST='". $request->mail_host ."'");
        Artisan::call("env:set MAIL_PORT='". $request->mail_port ."'");
        Artisan::call("env:set MAIL_USERNAME='". $request->mail_username ."'");
        Artisan::call("env:set MAIL_PASSWORD='". $request->mail_password ."'");
        Artisan::call("env:set MAIL_ENCRYPTION='". $request->mail_encryption ."'");
        Artisan::call("env:set MAIL_FROM_ADDRESS='". $request->mail_from_address ."'");
        Artisan::call("env:set MAIL_FROM_NAME='". $request->mail_from_name ."'");
        
        \LogActivity::addToLog( 'Mail settings update!.' );
        toast( 'Mail settings update.', 'success' );
        return redirect()->route( 'app.settings.mail' );
    }

    private function deleteLogo( $path ) {
        Storage::disk( 'public' )->delete( $path );
    }

}
