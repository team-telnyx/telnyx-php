<?php

declare(strict_types=1);

namespace Telnyx\TrafficPolicyProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type TrafficPolicyProfileShape from \Telnyx\TrafficPolicyProfiles\TrafficPolicyProfile
 *
 * @phpstan-type TrafficPolicyProfileUpdateResponseShape = array{
 *   data?: null|TrafficPolicyProfile|TrafficPolicyProfileShape
 * }
 */
final class TrafficPolicyProfileUpdateResponse implements BaseModel
{
    /** @use SdkModel<TrafficPolicyProfileUpdateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?TrafficPolicyProfile $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param TrafficPolicyProfile|TrafficPolicyProfileShape|null $data
     */
    public static function with(TrafficPolicyProfile|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param TrafficPolicyProfile|TrafficPolicyProfileShape $data
     */
    public function withData(TrafficPolicyProfile|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
