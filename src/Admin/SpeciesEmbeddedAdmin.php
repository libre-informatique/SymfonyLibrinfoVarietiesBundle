<?php

namespace Librinfo\VarietiesBundle\Admin;

use Blast\CoreBundle\Admin\CoreAdmin;
use Blast\CoreBundle\Admin\Traits\EmbeddedAdmin;

class SpeciesEmbeddedAdmin extends CoreAdmin
{
    use EmbeddedAdmin;
    
    protected $baseRouteName = 'admin_librinfo_varietiesbundle_speciesembeddedadmin';
    protected $baseRoutePattern = 'species-embedded';
}
