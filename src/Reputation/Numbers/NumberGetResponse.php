<?php

declare(strict_types=1);

namespace Telnyx\Reputation\Numbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ReputationPhoneNumberWithReputationData;

/**
 * @phpstan-import-type ReputationPhoneNumberWithReputationDataShape from \Telnyx\ReputationPhoneNumberWithReputationData
 *
 * @phpstan-type NumberGetResponseShape = array{
 *   data?: null|ReputationPhoneNumberWithReputationData|ReputationPhoneNumberWithReputationDataShape,
 * }
 */
final class NumberGetResponse implements BaseModel
{
    /** @use SdkModel<NumberGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?ReputationPhoneNumberWithReputationData $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ReputationPhoneNumberWithReputationData|ReputationPhoneNumberWithReputationDataShape|null $data
     */
    public static function with(
        ReputationPhoneNumberWithReputationData|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param ReputationPhoneNumberWithReputationData|ReputationPhoneNumberWithReputationDataShape $data
     */
    public function withData(
        ReputationPhoneNumberWithReputationData|array $data
    ): self {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
