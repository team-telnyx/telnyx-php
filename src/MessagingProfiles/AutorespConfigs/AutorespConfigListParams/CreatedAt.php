<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated created_at parameter (deepObject style). Originally: created_at[gte], created_at[lte].
 *
 * @phpstan-type created_at = array{gte?: string, lte?: string}
 */
final class CreatedAt implements BaseModel
{
    /** @use SdkModel<created_at> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $gte;

    #[Api(optional: true)]
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
        $obj = new self;

        null !== $gte && $obj->gte = $gte;
        null !== $lte && $obj->lte = $lte;

        return $obj;
    }

    public function withGte(string $gte): self
    {
        $obj = clone $this;
        $obj->gte = $gte;

        return $obj;
    }

    public function withLte(string $lte): self
    {
        $obj = clone $this;
        $obj->lte = $lte;

        return $obj;
    }
}
