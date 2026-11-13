<?php

declare(strict_types=1);

namespace Telnyx\Calls\CallDialParams;

enum RecordRedaction: string
{
    case PCI = 'pci';

    case PII = 'pii';

    case PHI = 'phi';
}
