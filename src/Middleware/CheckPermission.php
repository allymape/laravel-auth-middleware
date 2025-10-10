<?php

namespace Mape\AuthMiddleware\Middleware;

use Closure;

class CheckPermission
{
    public function handle($request, Closure $next)
    {
        $user = $request->get('auth_user');
        // Get current controller and method
        $action = $request->route()->getActionName();
        [$controller, $method] = explode('@', class_basename($action));
        // Normalize controller name (match your config keys)
        $controller = strtolower($controller); // e.g. AuthController => authcontroller
        $method = $this->mapResourceMethod($method); // e.g. AuthController => authcontroller
        // Load permissions map from config
        $map = config('permissions');
        $module = \Str::replace('controller', '', $controller);
        $permission = $map[$module][$method]['slug'] ?? null;
        if (
            !$user ||
            !isset($user['roles']) ||
            !isset($user['permissions'])
        ) {
            return response()->json([
                'success' => false,
                'status'  => 'error',
                'code'    => 403,
                'message' => 'Unauthorized',
                'data'    => null
            ], 403);
        }
        if (!in_array($permission, $user['permissions'])) {
            return response()->json([
                'success' => false,
                'status'  => 'error',
                'code'    => 403,
                'message' => __('messages.permission.forbidden') ?? 'Forbidden - You have no permission to access this resource.',
                'data'    => null
            ], 403);
        }
        return $next($request);
    }
    private function mapResourceMethod(string $method): ?string
    {
        static $map = [
            // ===== Standard Resource =====
            'index'   => 'index',
            'show'    => 'index',
            'create'  => 'create',
            'store'   => 'create',
            'edit'    => 'update',
            'update'  => 'update',
            'destroy' => 'delete',
            'delete'  => 'delete',
            'restore' => 'delete',
            'permanentlyDeleteStaff' => 'delete',

            // ===== Staff specific =====
            'changePassword' => 'update',
            'updatePersonalInfo' => 'update',
            'activate' => 'update',
            'deactivate' => 'update',

            'getStaffInfo' => 'index',
            'getStaffActiveSessions' => 'index',
            'getLoginHistory' => 'index',
            'getAllActivities' => 'index',
            'getActiveSessions' => 'index',
            'getTrashedStaff' => 'index',

            'logout' => 'auth',
            'refreshToken' => 'auth',
            'logoutSpecificDevice' => 'auth',
            'logoutAllDevices' => 'auth',

            // ===== User specific =====
            'changePassword' => 'update', // same as staff
            'getAllActivities' => 'index',
            'getUserActivities' => 'index',

            // ===== Role & permission =====
            'assignRole' => 'update',
            'updateUserRolePermissions' => 'update',
            'removeRole' => 'delete',
            'getUserRolesWithPermissions' => 'index',
            'getUserRolesWithPermissionsById' => 'index',
            'roles' => 'index', // RoleController::index
            'rolesWithPermissions' => 'index',
            // ===== User auth =====
            'refreshJwtToken' => 'auth',
            // ===== Lookup Tables =====
            'getEducationLevels'   => 'index',
            'createEducationLevel' => 'create',
            'updateEducationLevel' => 'update',
            'deleteEducationLevel' => 'delete',

            'getCountries'   => 'index',
            'getCountry'     => 'index',
            'createCountry'  => 'create',
            'updateCountry'  => 'update',
            'deleteCountry'  => 'delete',
            'importCountries' => 'create',

            // ===== NECTA Examination IDs =====
            'indexNectaExaminationIds'  => 'index',   // index
            'storeNectaExaminationId'   => 'create',  // store
            'showNectaExaminationId'    => 'index',   // show
            'updateNectaExaminationId'  => 'update',  // update
            'destroyNectaExaminationId' => 'delete',  // destroy

            // ===== Documentation =====
            'getDocumentations' => 'index',
            'showDocumentation' => 'index',
            'storeDocumentation' => 'create',
            'updateDocumentation' => 'update',
            'destroyDocumentation' => 'delete',

            // ===== Institutions / Departments / Designations (apiResource) =====
            'institutionIndex'   => 'index',
            'institutionStore'   => 'create',
            'institutionShow'    => 'index',
            'institutionUpdate'  => 'update',
            'institutionDestroy' => 'delete',

            'departmentIndex'   => 'index',
            'departmentStore'   => 'create',
            'departmentShow'    => 'index',
            'departmentUpdate'  => 'update',
            'departmentDestroy' => 'delete',

            'designationIndex'   => 'index',
            'designationStore'   => 'create',
            'designationShow'    => 'index',
            'designationUpdate'  => 'update',
            'designationDestroy' => 'delete',

            // ===== Administrative Areas =====
            'getAreaTypes'          => 'index',
            'ensureAreaTypesExist'  => 'create',

            'getRegions'       => 'index',
            'importRegions'    => 'create',
            'getCouncils'      => 'index',
            'getCouncilsByRegion' => 'index',
            'importCouncils'   => 'create',
            'getWards'         => 'index',
            'getWardsByCouncil' => 'index',
            'importWards'      => 'create',
            'getVillages'      => 'index',
            'getVillagesByWard' => 'index',
            'importVillages'   => 'create',

            'searchArea'            => 'index',
            'getRegionByIdentifier' => 'index',
            'getCouncilByIdentifier' => 'index',
            'getWardByIdentifier'   => 'index',
            'getVillageByIdentifier' => 'index',
            'importAll'             => 'create',

            // ===== Signatures =====
            'storeSignature'  => 'create',
            'showSignature'   => 'index',
            'destroySignature' => 'delete',

            // ===== Stamps =====
            'getUserStampAndSignature' => 'index',
            'indexStamps'    => 'index',
            'storeStamp'     => 'create',
            'showStamp'      => 'index',
            'updateStamp'    => 'update',
            'destroyStamp'   => 'delete',
            // Nested UI Blocks (under Sidebars)
            'indexNested'   => 'index',
            'showNested'    => 'index',
            'storeNested'   => 'create',
            'updateNested'  => 'update',
            'destroyNested' => 'delete',
            // Services
            'sendSms'                   => 'create',
            'getSmsStatus'              => 'view',
            'sendOTP'                   => 'create',
        ];
        return $map[$method] ?? null;
    }
}
