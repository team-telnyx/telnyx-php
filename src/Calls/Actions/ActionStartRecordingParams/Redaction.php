<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartRecordingParams;

enum Redaction: string
{
    case PCI = 'pci';

    case PII = 'pii';

    case PHI = 'phi';
}
