<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Permission;
use App\Models\Role;

class PermissionSyncService
{
    public function syncPermissions(): void
    {
        $routes = Route::getRoutes();
        $permissions = [];

        foreach ($routes as $route) {
            $name = $route->getName();
            $action = $route->getActionName();

            if ($name && $action !== 'Closure') {
                $controller = class_basename(explode('@', $action)[0]);

                $permissions[] = [
                    'action_name' => $name,
                    'controller' => $controller,
                    'description' => $name
                ];
            }
        }

        $existing = DB::table('permissions')->pluck('action_name')->toArray();
        $newPermissions = array_filter($permissions, fn ($p) => !in_array($p['action_name'], $existing));

        if (!empty($newPermissions)) {
            DB::table('permissions')->insert($newPermissions);
        }

        // Assign to admin
        $adminRole = Role::where('name', 'admin')->first();
        if ($adminRole) {
            $adminRole->permissions()->sync(Permission::all());
        }
    }
}
