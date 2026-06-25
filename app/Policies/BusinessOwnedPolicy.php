<?php
namespace App\Policies;
use App\Models\User;
class BusinessOwnedPolicy { public function before(User $user): ?bool { return $user->is_platform_admin ? true : null; } public function viewAny(User $user): bool { return (bool) $user->current_business_id; } public function view(User $user, object $model): bool { return $this->owns($user, $model); } public function create(User $user): bool { return (bool) $user->current_business_id; } public function update(User $user, object $model): bool { return $this->owns($user, $model); } public function delete(User $user, object $model): bool { return $this->owns($user, $model); } private function owns(User $user, object $model): bool { return (int)($model->business_id ?? $model->id ?? 0) === (int)$user->current_business_id; } }
