<?php

use \Modules\RouterPermissionCheckerService\Http\ProtocolV1\Actions;

Route::group([
    'prefix' => 'api/v1',
], function () {
    Route::post('/send-request', Actions\SendRequestAction::class);
    Route::group([
        'middleware' => [\MicroServiceFramework\HttpClient\ProtocolV1\Http\Middleware\PrepareRequestDTO::class],
    ], function () {
        Route::post('/self-register', Actions\SelfRegisterAction::class);
        Route::post('/receive-permissions', Actions\ReceivePermissionsAction::class);
        Route::post('/self-disable', Actions\SelfDisableAction::class);
    });
});
