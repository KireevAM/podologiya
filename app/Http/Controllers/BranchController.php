<?php

namespace App\Http\Controllers;

use App\Models\Branch;

class BranchController extends Controller
{
    public function show(Branch $branch)
    {
        abort_unless($branch->is_active, 404);

        $legalEntity = $branch->getLegalEntityOrDefault();

        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'MedicalBusiness',
            'name' => $branch->name,
            'address' => [
                '@type' => 'PostalAddress',
                'addressLocality' => $branch->city,
                'streetAddress' => $branch->address,
            ],
            'telephone' => $branch->phone,
        ];

        if ($legalEntity) {
            $schema['legalName'] = $legalEntity->name;
        }

        return view('branch', [
            'branch' => $branch,
            'legalEntity' => $legalEntity,
            'schema' => $schema,
        ]);
    }
}
