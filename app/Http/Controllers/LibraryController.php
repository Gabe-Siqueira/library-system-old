<?php

namespace App\Http\Controllers;

use App\Models\LogErros;
use App\Models\LogUpdate;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Database\Eloquent\Model;

class LibraryController extends Controller
{
    public static function recordError(Exception $error)
    {
        try {
            $me = auth('api')->user();
            $logErro = [
                'Message' => $error->getMessage(),
                'Code' => $error->getCode(),
                'File' => $error->getFile(),
                'Line' => $error->getLine(),
                'TraceAsString' => $error->getTraceAsString(),
                'id_user' => $me->id
            ];
            $logErros = new LogErros();
            $logErros->fill($logErro);
            $logErros->save();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function responseApi($data = [], $message = '', $error = 0): Array
    {
        return [
            'error' => $error,
            'data' => $data,
            'message' => $message
        ];
    }

    public static function logupdate(Model $model): void
    {
        $user = auth('api')->user();
        foreach ($model->getDirty() as $key => $dirting) {
            $log = new LogUpdate;
            $log->id_user = $user->id;
            $log->table = $model->getTable();
            $log->id_register = $model->id;
            $log->field = $key;
            $log->old_value = ($model->getOriginal()[$key] == NULL ? "": $model->getOriginal()[$key]);
            $log->new_value = $model->getDirty()[$key];
            $log->modified_at = date(now());
            $log->save();
        }

    }
}
