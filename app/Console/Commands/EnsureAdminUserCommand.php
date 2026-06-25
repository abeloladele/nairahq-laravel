<?php

namespace App\Console\Commands;

use App\Models\Auth\Role;
use App\Models\Common\Company;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EnsureAdminUserCommand extends Command
{
    protected $signature = 'nairahq:ensure-admin
                            {--name=Admin User : Admin display name}
                            {--email= : Admin email address}
                            {--password= : Admin password}';

    protected $description = 'Create or update a NairaHQ administrator user from the CLI.';

    public function handle(): int
    {
        $email = trim((string) $this->option('email'));
        $password = (string) $this->option('password');
        $name = trim((string) $this->option('name')) ?: 'Admin User';

        if ($email === '' || ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error('A valid --email option is required.');
            return self::FAILURE;
        }

        if (strlen($password) < 10) {
            $this->error('The --password option must be at least 10 characters.');
            return self::FAILURE;
        }

        DB::transaction(function () use ($email, $password, $name): void {
            $userModel = user_model_class();

            $user = $userModel::withTrashed()->where('email', $email)->first();

            if ($user && method_exists($user, 'restore') && $user->trashed()) {
                $user->restore();
            }

            if (! $user) {
                $user = $userModel::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => Hash::make($password),
                    'locale' => config('app.locale', 'en-GB'),
                    'enabled' => true,
                ]);
            } else {
                $user->forceFill([
                    'name' => $name,
                    'password' => Hash::make($password),
                    'enabled' => true,
                ])->save();
            }

            $companyIds = Company::query()->pluck('id')->all();
            if (! empty($companyIds)) {
                $user->companies()->syncWithoutDetaching($companyIds);
            }

            $adminRole = Role::query()->orderBy('id')->first();
            if ($adminRole) {
                $user->roles()->syncWithoutDetaching([$adminRole->id]);
            }
        });

        $this->info('Admin user is ready: ' . $email);
        return self::SUCCESS;
    }
}
