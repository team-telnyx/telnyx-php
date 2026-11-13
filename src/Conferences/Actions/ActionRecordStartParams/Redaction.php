<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions\ActionRecordStartParams;

enum Redaction: string
{
    case PCI = 'pci';

    case PII = 'pii';

    case PHI = 'phi';
}
