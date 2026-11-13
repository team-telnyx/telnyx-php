<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionAnswerParams;

enum RecordRedaction: string
{
    case PCI = 'pci';

    case PII = 'pii';

    case PHI = 'phi';
}
