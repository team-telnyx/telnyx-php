<?php

declare(strict_types=1);

namespace Telnyx\Dir\DirUpdateInfringementParams\Document;

/**
 * Type of supporting document. Pick the closest match to what the file actually contains; `other` triggers manual vetting and may slow approval. The matching short_name reference list is at `GET /v2/dir/document_types`.
 */
enum DocumentType: string
{
    case LETTER_OF_AUTHORIZATION = 'letter_of_authorization';

    case BUSINESS_REGISTRATION = 'business_registration';

    case ARTICLES_OF_INCORPORATION = 'articles_of_incorporation';

    case TAX_DOCUMENT = 'tax_document';

    case EIN_LETTER = 'ein_letter';

    case TRADEMARK_REGISTRATION = 'trademark_registration';

    case WEBSITE_OWNERSHIP = 'website_ownership';

    case BUSINESS_LICENSE = 'business_license';

    case PROFESSIONAL_LICENSE = 'professional_license';

    case GOVERNMENT_ID = 'government_id';

    case UTILITY_BILL = 'utility_bill';

    case BANK_STATEMENT = 'bank_statement';

    case OTHER = 'other';
}
