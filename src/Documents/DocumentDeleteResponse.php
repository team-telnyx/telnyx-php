<?php

declare(strict_types=1);

namespace Telnyx\Documents;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Documents\DocServiceDocument\AvScanStatus;
use Telnyx\Documents\DocServiceDocument\Size;
use Telnyx\Documents\DocServiceDocument\Status;

/**
 * @phpstan-type DocumentDeleteResponseShape = array{
 *   data?: DocServiceDocument|null
 * }
 */
final class DocumentDeleteResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<DocumentDeleteResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?DocServiceDocument $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param DocServiceDocument|array{
     *   id?: string|null,
     *   av_scan_status?: value-of<AvScanStatus>|null,
     *   content_type?: string|null,
     *   created_at?: string|null,
     *   customer_reference?: string|null,
     *   filename?: string|null,
     *   record_type?: string|null,
     *   sha256?: string|null,
     *   size?: Size|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: string|null,
     * } $data
     */
    public static function with(DocServiceDocument|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param DocServiceDocument|array{
     *   id?: string|null,
     *   av_scan_status?: value-of<AvScanStatus>|null,
     *   content_type?: string|null,
     *   created_at?: string|null,
     *   customer_reference?: string|null,
     *   filename?: string|null,
     *   record_type?: string|null,
     *   sha256?: string|null,
     *   size?: Size|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: string|null,
     * } $data
     */
    public function withData(DocServiceDocument|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
