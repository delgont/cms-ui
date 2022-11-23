<?php

namespace Delgont\CmsUi\Concerns;

use Illuminate\Support\Facades\View;

use Delgont\Cms\Http\Composers\TemplatesComposer;
use Delgont\Cms\Http\Composers\PostsComposer;
use Delgont\Cms\Http\Composers\MenuComposer;

trait BootComposers
{
    public function bootComposers()
    {
        View::composer(
            [
                'delgont::includes.dropdowns.choose-post-template-dropdown'
            ],
            TemplatesComposer::class
        );

        View::composer(
            [
                'delgont::includes.dropdowns.choose-post-parent-dropdown',
                'delgont::menus.edit'
            ],
            PostsComposer::class
        );

        View::composer(
            [
                'delgont::includes.dropdowns.choose-menu-dropdown'
            ],
            MenuComposer::class
        );
    }
  
}
