<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentCreateParams\AdditionalDocument;

/**
 * The type of document being created.
 */
enum DocumentType: string
{
    case LOA = 'loa';

    case INVOICE = 'invoice';

    case CSR = 'csr';

    case OTHER = 'other';
}
