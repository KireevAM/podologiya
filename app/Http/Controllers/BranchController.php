<?php

namespace App\Http\Controllers;

use App\Models\Branch;

class BranchController extends Controller
{
    public function show(Branch $branch)
    {
        abort_unless($branch->is_active, 404);

        $legalEntity = $branch->getLegalEntityOrDefault();

        return view('branch', [
            'branch' => $branch,
            'legalEntity' => $legalEntity,
        ]);
    }
}
