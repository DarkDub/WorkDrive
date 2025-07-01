<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
class Avatar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        $user = Auth::user()->registro->avatar;
        $avatarPath = $user ? asset('storage/avatars/' . $user ) : asset('image/avatar-defaul.jpg');

        return view('components.avatar', ['avatarPath' => $avatarPath]);
    }
}
