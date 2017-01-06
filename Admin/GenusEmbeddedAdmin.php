<?php

namespace Librinfo\VarietiesBundle\Admin;

use Blast\CoreBundle\Admin\CoreAdmin;
use Blast\CoreBundle\Admin\Traits\EmbeddedAdmin;

class GenusEmbeddedAdmin extends CoreAdmin
{
    use EmbeddedAdmin;
    
    protected $baseRouteName = 'admin_vendor_bundlename_adminclassname';
    protected $baseRoutePattern = 'unique-route-pattern';
}
