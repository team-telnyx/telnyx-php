<?php

declare(strict_types=1);

namespace Telnyx\Number10dlc\Number10dlcGetEnumParams;

enum Endpoint: string
{
    case MNO = 'mno';

    case OPTIONAL_ATTRIBUTES = 'optionalAttributes';

    case USECASE = 'usecase';

    case VERTICAL = 'vertical';

    case ALT_BUSINESS_ID_TYPE = 'altBusinessIdType';

    case BRAND_IDENTITY_STATUS = 'brandIdentityStatus';

    case BRAND_RELATIONSHIP = 'brandRelationship';

    case CAMPAIGN_STATUS = 'campaignStatus';

    case ENTITY_TYPE = 'entityType';

    case EXT_VETTING_PROVIDER = 'extVettingProvider';

    case VETTING_STATUS = 'vettingStatus';

    case BRAND_STATUS = 'brandStatus';

    case OPERATION_STATUS = 'operationStatus';

    case APPROVED_PUBLIC_COMPANY = 'approvedPublicCompany';

    case STOCK_EXCHANGE = 'stockExchange';

    case VETTING_CLASS = 'vettingClass';
}
