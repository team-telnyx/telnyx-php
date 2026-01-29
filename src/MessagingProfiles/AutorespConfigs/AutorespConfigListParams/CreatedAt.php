<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated created_at parameter (deepObject style). Originally: created_at[gte], created_at[lte].
 *
 * @phpstan-type CreatedAtShape = array{gte?: string|null, lte?: string|null}
 */
final class CreatedAt implements BaseModel
{
    /** @use SdkModel<CreatedAtShape> */
    use SdkModel;

    #[Optional]
    public ?string $gte;

    #[Optional]
    public ?string $lte;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $gte = null, ?string $lte = null): self
    {
        $self = new self;

        null !== $gte && $self['gte'] = $gte;
        null !== $lte && $self['lte'] = $lte;

        return $self;
    }

    public function withGte(string $gte): self
    {
        $self = clone $this;
        $self['gte'] = $gte;

        return $self;
    }

    public function withLte(string $lte): self
    {
        $self = clone $this;
        $self['lte'] = $lte;

        return $self;
    }
}
