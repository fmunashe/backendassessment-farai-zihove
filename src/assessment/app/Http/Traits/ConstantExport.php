<?php


namespace app\Http\Traits;

use App\Enums\RequestStatus;
use App\Enums\SoftwareExperienceLevels;
use App\Enums\UserTypeEnum;
use ReflectionClass;

/**
 * Author: Farai Zihove
 * Mobile: +263778234258
 * Email: zihovem@gmail.com
 * Date: 21/3/2023
 * Time: 10:24
 */
trait ConstantExport
{
    public static function getUserTypes(): array
    {
        $reflection = new ReflectionClass(UserTypeEnum::class);
        return $reflection->getConstants();
    }

}
