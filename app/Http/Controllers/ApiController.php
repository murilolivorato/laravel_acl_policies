<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Gate;

class ApiController extends Controller
{
    protected $policy;
    protected $paginationNumber = 40;
    protected $user;

    use ApiResponse;
    public function __construct()
    {
        if(auth()->check()) {
            $this->user = auth()->user();
        }
    }
    public function isAble($ability, $targetModel) {
        $gate = Gate::policy($this->policy['model'], $this->policy["class"]);
        return $gate->authorize($ability,  $targetModel);
    }
}
