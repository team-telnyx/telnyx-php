<?php

declare(strict_types=1);

namespace Telnyx\SessionAnalysis\SessionAnalysisRetrieveParams;

/**
 * Controls what data to expand on each event node.
 */
enum Expand: string
{
    case RECORD = 'record';

    case NONE = 'none';
}
