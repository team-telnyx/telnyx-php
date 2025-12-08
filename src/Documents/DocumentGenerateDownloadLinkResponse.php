<?php

declare(strict_types=1);

namespace Telnyx\Documents;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Documents\DocumentGenerateDownloadLinkResponse\Data;

/**
 * @phpstan-type DocumentGenerateDownloadLinkResponseShape = array{data: Data}
 */
final class DocumentGenerateDownloadLinkResponse implements BaseModel
{
    /** @use SdkModel<DocumentGenerateDownloadLinkResponseShape> */
    use SdkModel;

    #[Required]
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
     *
     * @param Data|array{url: string} $data
     */
    public static function with(Data|array $data): self
    {
        $obj = new self;

        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{url: string} $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
