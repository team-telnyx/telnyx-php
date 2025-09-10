<?php

declare(strict_types=1);

namespace Telnyx\Portouts\SupportingDocuments\SupportingDocumentListResponse\Data;

/**
 * Identifies the type of the document.
 */
enum Type: string
{
    case LOA = 'loa';

    case INVOICE = 'invoice';
}
