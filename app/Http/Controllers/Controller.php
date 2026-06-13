<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use OpenApi\Attributes as OA;

#[OA\Info(
    title: "Overskull API",
    version: "1.0.0"
)]
#[OA\Server(
    url: 'http://localhost:8000',
    description: 'Servidor principal'
)]
class Controller extends BaseController
{
    //
}