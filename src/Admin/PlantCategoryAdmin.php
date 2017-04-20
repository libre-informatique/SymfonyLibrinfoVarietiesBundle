<?php

namespace Librinfo\VarietiesBundle\Admin;

use Blast\CoreBundle\Admin\CoreAdmin;
use Blast\CoreBundle\Admin\Traits\Base as BaseAdmin;
use Blast\BaseEntitiesBundle\Admin\Traits\NestedTreeableAdmin;

class PlantCategoryAdmin extends CoreAdmin
{
   use BaseAdmin, 
       NestedTreeableAdmin
    ;
}
