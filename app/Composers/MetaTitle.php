<?php

namespace App\Composers;

use Illuminate\View\View;

class MetaTitle
{

    public function compose(View $view)
    {
        $meta_title = null;
        if(request()->segment(1) != '') {
            $meta_title = ucfirst(str_replace('-', ' ', request()->segment(1)));
        }
        if($meta_title !== null) {
            return $view->with('meta_tite', $meta_title);
        }

    }
}
