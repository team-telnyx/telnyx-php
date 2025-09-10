<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords\CustomerServiceRecordVerifyPhoneNumberCoverageResponse\Data;

enum AdditionalDataRequired: string
{
    case NAME = 'name';

    case AUTHORIZED_PERSON_NAME = 'authorized_person_name';

    case ACCOUNT_NUMBER = 'account_number';

    case CUSTOMER_CODE = 'customer_code';

    case PIN = 'pin';

    case ADDRESS_LINE_1 = 'address_line_1';

    case CITY = 'city';

    case STATE = 'state';

    case ZIP_CODE = 'zip_code';

    case BILLING_PHONE_NUMBER = 'billing_phone_number';
}
