<?php

declare(strict_types=1);

namespace Telnyx\Documents;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Documents\DocumentGenerateDownloadLinkResponse\Data;

/**
 * @phpstan-type document_generate_download_link_response = array{data: Data}
 */
final class DocumentGenerateDownloadLinkResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<document_generate_download_link_response> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public Data $data;

    /**
     * `new DocumentGenerateDownloadLinkResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DocumentGenerateDownloadLinkResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DocumentGenerateDownloadLinkResponse)->withData(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(Data $data): self
    {
        $obj = new self;

        $obj->data = $data;

        return $obj;
    }

    public function withData(Data $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
