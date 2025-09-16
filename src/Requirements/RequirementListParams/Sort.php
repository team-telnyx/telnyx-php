<?php

declare(strict_types=1);

namespace Telnyx\Requirements\RequirementListParams;

enum Sort: string
{
    case CREATED_AT = 'created_at';

    case UPDATED_AT = 'updated_at';

    case COUNTRY_CODE = 'country_code';

    case PHONE_NUMBER_TYPE = 'phone_number_type';

    case CREATED_AT_DESC = '-created_at';

    case UPDATED_AT_DESC = '-updated_at';

    case COUNTRY_CODE_DESC = '-country_code';

    case PHONE_NUMBER_TYPE_DESC = '-phone_number_type';
}
