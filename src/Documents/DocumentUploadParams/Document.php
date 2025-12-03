<?php

declare(strict_types=1);

namespace Telnyx\Documents\DocumentUploadParams;

use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;
use Telnyx\Documents\DocumentUploadParams\Document\DocServiceDocumentUploadInline;
use Telnyx\Documents\DocumentUploadParams\Document\DocServiceDocumentUploadURL;

final class Document implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            DocServiceDocumentUploadURL::class, DocServiceDocumentUploadInline::class,
        ];
    }
}
