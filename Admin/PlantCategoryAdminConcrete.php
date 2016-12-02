<?php

namespace Librinfo\VarietiesBundle\Admin;

use Blast\CoreBundle\Admin\Traits\Base as BaseAdmin;
use Blast\BaseEntitiesBundle\Admin\Traits\NestedTreeableAdmin;

class PlantCategoryAdminConcrete extends PlantCategoryAdmin
{
    use BaseAdmin, 
        NestedTreeableAdmin
    ;
}