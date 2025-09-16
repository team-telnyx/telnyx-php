<?php

declare(strict_types=1);

namespace Telnyx\RequirementTypes\RequirementTypeListParams;

enum Sort: string
{
    case NAME = 'name';

    case CREATED_AT = 'created_at';

    case UPDATED_AT = 'updated_at';

    case NAME_DESC = '-name';

    case CREATED_AT_DESC = '-created_at';

    case UPDATED_AT_DESC = '-updated_at';
}
