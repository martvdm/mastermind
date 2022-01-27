<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Permission
 *
 * @property int $id
 * @property string $permission
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission wherePermission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereUpdatedAt($value)
 */
	class Permission extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property int $priority
 * @property string|null $hexcolor
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Permission[] $permission
 * @property-read int|null $permission_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\RoleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereHexcolor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $picture
 * @property string $role_id
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\user_experience|null $experience
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Role|null $roles
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\game
 *
 * @property int $id
 * @property int $user_id
 * @property string $playboard
 * @property int $score
 * @property string $time
 * @property string $difficulty
 * @property int $victory
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|game newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|game newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|game query()
 * @method static \Illuminate\Database\Eloquent\Builder|game whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|game whereDifficulty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|game whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|game wherePlayboard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|game whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|game whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|game whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|game whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|game whereVictory($value)
 */
	class game extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\level
 *
 * @property int $level
 * @property int $experience
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|level newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|level newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|level query()
 * @method static \Illuminate\Database\Eloquent\Builder|level whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|level whereExperience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|level whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|level whereUpdatedAt($value)
 */
	class level extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\user_experience
 *
 * @property int $user_id
 * @property int $experience
 * @property int $level
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\level|null $levellist
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|user_experience newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|user_experience newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|user_experience query()
 * @method static \Illuminate\Database\Eloquent\Builder|user_experience whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|user_experience whereExperience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|user_experience whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|user_experience whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|user_experience whereUserId($value)
 */
	class user_experience extends \Eloquent {}
}

