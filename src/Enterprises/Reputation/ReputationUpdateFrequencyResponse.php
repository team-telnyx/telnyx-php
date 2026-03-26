<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type EnterpriseReputationPublicShape from \Telnyx\Enterprises\Reputation\EnterpriseReputationPublic
 *
 * @phpstan-type ReputationUpdateFrequencyResponseShape = array{
 *   data?: null|EnterpriseReputationPublic|EnterpriseReputationPublicShape
 * }
 */
final class ReputationUpdateFrequencyResponse implements BaseModel
{
    /** @use SdkModel<ReputationUpdateFrequencyResponseShape> */
    use SdkModel;

    #[Optional]
    public ?EnterpriseReputationPublic $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param EnterpriseReputationPublic|EnterpriseReputationPublicShape|null $data
     */
    public static function with(
        EnterpriseReputationPublic|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param EnterpriseReputationPublic|EnterpriseReputationPublicShape $data
     */
    public function withData(EnterpriseReputationPublic|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
