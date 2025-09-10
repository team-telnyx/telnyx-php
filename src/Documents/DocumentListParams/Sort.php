<?php

declare(strict_types=1);

namespace Telnyx\Documents\DocumentListParams;

enum Sort : string
{

    case FILENAME = "filename";

    case CREATED_AT = "created_at";

    case UPDATED_AT = "updated_at";

    case SORT_-FILENAME = "-filename";

    case SORT_-CREATED_AT = "-created_at";

    case SORT_-UPDATED_AT = "-updated_at";

}