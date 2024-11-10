<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Gate;

abstract class Controller
{
    use ApiResponse;
    public function isAble($ability, $targetModel) {
        $gate = Gate::policy($this->policy['model'], $this->policy["class"]);
        return $gate->authorize($ability,  $targetModel);
        //  return $this->authorize($ability, [$targetModel, $this->policyClass]);
    }
}
