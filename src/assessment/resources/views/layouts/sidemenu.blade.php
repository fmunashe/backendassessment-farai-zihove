<?php
/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 17/4/2022
 * Time: 08:19
 */
?>
<ul class="side-nav">
    <hr>
    @if(auth()->user()->user_type ==\App\Enums\UserTypeEnum::ADMIN || auth()->user()->user_type ==\App\Enums\UserTypeEnum::SUPER_ADMIN || auth()->user()->user_type ==\App\Enums\UserTypeEnum::USER)
        <li class="side-nav-item">
            <a href="{{route('users.index')}}" class="side-nav-link">
                <i class="uil-users-alt"></i>
                <span>@if(auth()->user()->user_type ==\App\Enums\UserTypeEnum::ADMIN || auth()->user()->user_type ==\App\Enums\UserTypeEnum::SUPER_ADMIN) Users @else My Profile @endif </span>
            </a>
        </li>
        <li class="side-nav-item">
            <a href="{{route('todos.index')}}" class="side-nav-link">
                <i class="uil-pen"></i>
                <span>@if(auth()->user()->user_type ==\App\Enums\UserTypeEnum::ADMIN || auth()->user()->user_type ==\App\Enums\UserTypeEnum::SUPER_ADMIN) Todos @else My Todos @endif </span>
            </a>
        </li>
    @endif

</ul>
