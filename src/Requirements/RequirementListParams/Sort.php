<?php

declare(strict_types=1);

namespace Telnyx\Requirements\RequirementListParams;

enum Sort : string
{

    case CREATED_AT = "created_at";

    case UPDATED_AT = "updated_at";

    case COUNTRY_CODE = "country_code";

    case PHONE_NUMBER_TYPE = "phone_number_type";

    case SORT_-CREATED_AT = "-created_at";

    case SORT_-UPDATED_AT = "-updated_at";

    case SORT_-COUNTRY_CODE = "-country_code";

    case SORT_-PHONE_NUMBER_TYPE = "-phone_number_type";

}