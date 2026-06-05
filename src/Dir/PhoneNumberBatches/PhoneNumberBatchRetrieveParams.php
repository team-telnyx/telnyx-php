<?php

declare(strict_types=1);

namespace Telnyx\Dir\PhoneNumberBatches;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Get a single phone-number batch by id. The enterprise is resolved server-side from the DIR id.
 *
 * @see Telnyx\Services\Dir\PhoneNumberBatchesService::retrieve()
 *
 * @phpstan-type PhoneNumberBatchRetrieveParamsShape = array{dirID: string}
 */
final class PhoneNumberBatchRetrieveParams implements BaseModel
{
    /** @use SdkModel<PhoneNumberBatchRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $dirID;

    /**
     * `new PhoneNumberBatchRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberBatchRetrieveParams::with(dirID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneNumberBatchRetrieveParams)->withDirID(...)
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
    public static function with(string $dirID): self
    {
        $self = new self;

        $self['dirID'] = $dirID;

        return $self;
    }

    public function withDirID(string $dirID): self
    {
        $self = clone $this;
        $self['dirID'] = $dirID;

        return $self;
    }
}
