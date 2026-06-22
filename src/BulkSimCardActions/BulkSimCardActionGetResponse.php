<?php

declare(strict_types=1);

namespace Telnyx\BulkSimCardActions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type BulkSimCardActionDetailedShape from \Telnyx\BulkSimCardActions\BulkSimCardActionDetailed
 *
 * @phpstan-type BulkSimCardActionGetResponseShape = array{
 *   data?: null|BulkSimCardActionDetailed|BulkSimCardActionDetailedShape
 * }
 */
final class BulkSimCardActionGetResponse implements BaseModel
{
    /** @use SdkModel<BulkSimCardActionGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?BulkSimCardActionDetailed $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param BulkSimCardActionDetailed|BulkSimCardActionDetailedShape|null $data
     */
    public static function with(
        BulkSimCardActionDetailed|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param BulkSimCardActionDetailed|BulkSimCardActionDetailedShape $data
     */
    public function withData(BulkSimCardActionDetailed|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
