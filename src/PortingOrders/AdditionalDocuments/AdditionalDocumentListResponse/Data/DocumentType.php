<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListResponse\Data;

/**
 * Identifies the type of additional document.
 */
enum DocumentType: string
{
    case LOA = 'loa';

    case INVOICE = 'invoice';

    case CSR = 'csr';

    case OTHER = 'other';
}
