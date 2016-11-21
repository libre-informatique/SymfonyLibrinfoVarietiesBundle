<?php

namespace Librinfo\VarietiesBundle\Admin;

use Librinfo\CoreBundle\Admin\Traits\Base as BaseAdmin;
use Librinfo\BaseEntitiesBundle\Admin\Traits\NestedTreeableAdmin;

class PlantCategoryAdminConcrete extends PlantCategoryAdmin
{
    use BaseAdmin, 
        NestedTreeableAdmin
    ;
}