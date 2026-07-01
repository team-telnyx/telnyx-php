<?php

declare(strict_types=1);

namespace Telnyx\Dir\PhoneNumberBatches;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PhoneNumberBatchShape from \Telnyx\Dir\PhoneNumberBatches\PhoneNumberBatch
 *
 * @phpstan-type PhoneNumberBatchGetResponseShape = array{
 *   data: PhoneNumberBatch|PhoneNumberBatchShape
 * }
 */
final class PhoneNumberBatchGetResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberBatchGetResponseShape> */
    use SdkModel;

    /**
     * A phone-number batch groups all numbers added in a single bulk-add request. Telnyx vets the batch as a unit. The response embeds the full `phone_numbers` array so you can read per-number status without a separate call, plus a batch-level `status` summarising the unit's progress.
     */
    #[Required]
    public PhoneNumberBatch $data;

    /**
     * `new PhoneNumberBatchGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberBatchGetResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneNumberBatchGetResponse)->withData(...)
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
     * @param PhoneNumberBatch|PhoneNumberBatchShape $data
     */
    public static function with(PhoneNumberBatch|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * A phone-number batch groups all numbers added in a single bulk-add request. Telnyx vets the batch as a unit. The response embeds the full `phone_numbers` array so you can read per-number status without a separate call, plus a batch-level `status` summarising the unit's progress.
     *
     * @param PhoneNumberBatch|PhoneNumberBatchShape $data
     */
    public function withData(PhoneNumberBatch|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
