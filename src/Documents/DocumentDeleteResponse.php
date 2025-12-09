<?php

declare(strict_types=1);

namespace Telnyx\Documents;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Documents\DocServiceDocument\AvScanStatus;
use Telnyx\Documents\DocServiceDocument\Size;
use Telnyx\Documents\DocServiceDocument\Status;

/**
 * @phpstan-type DocumentDeleteResponseShape = array{
 *   data?: DocServiceDocument|null
 * }
 */
final class DocumentDeleteResponse implements BaseModel
{
    /** @use SdkModel<DocumentDeleteResponseShape> */
    use SdkModel;

    #[Optional]
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
     *   avScanStatus?: value-of<AvScanStatus>|null,
     *   contentType?: string|null,
     *   createdAt?: string|null,
     *   customerReference?: string|null,
     *   filename?: string|null,
     *   recordType?: string|null,
     *   sha256?: string|null,
     *   size?: Size|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public static function with(DocServiceDocument|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param DocServiceDocument|array{
     *   id?: string|null,
     *   avScanStatus?: value-of<AvScanStatus>|null,
     *   contentType?: string|null,
     *   createdAt?: string|null,
     *   customerReference?: string|null,
     *   filename?: string|null,
     *   recordType?: string|null,
     *   sha256?: string|null,
     *   size?: Size|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public function withData(DocServiceDocument|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
