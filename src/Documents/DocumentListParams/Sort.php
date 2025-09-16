<?php

declare(strict_types=1);

namespace Telnyx\Documents\DocumentListParams;

enum Sort: string
{
    case FILENAME = 'filename';

    case CREATED_AT = 'created_at';

    case UPDATED_AT = 'updated_at';

    case FILENAME_DESC = '-filename';

    case CREATED_AT_DESC = '-created_at';

    case UPDATED_AT_DESC = '-updated_at';
}
