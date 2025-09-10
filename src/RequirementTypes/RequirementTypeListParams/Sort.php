<?php

declare(strict_types=1);

namespace Telnyx\RequirementTypes\RequirementTypeListParams;

enum Sort : string
{

    case NAME = "name";

    case CREATED_AT = "created_at";

    case UPDATED_AT = "updated_at";

    case SORT_-NAME = "-name";

    case SORT_-CREATED_AT = "-created_at";

    case SORT_-UPDATED_AT = "-updated_at";

}