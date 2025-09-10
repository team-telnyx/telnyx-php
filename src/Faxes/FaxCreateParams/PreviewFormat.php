<?php

declare(strict_types=1);

namespace Telnyx\Faxes\FaxCreateParams;

/**
 * The format for the preview file in case the `store_preview` is `true`.
 */
enum PreviewFormat: string
{
    case PDF = 'pdf';

    case TIFF = 'tiff';
}
