<?php

declare(strict_types=1);

namespace Telnyx\Payment\AutoRechargePrefs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AutoRechargePrefShape from \Telnyx\Payment\AutoRechargePrefs\AutoRechargePref
 *
 * @phpstan-type AutoRechargePrefListResponseShape = array{
 *   data?: null|AutoRechargePref|AutoRechargePrefShape
 * }
 */
final class AutoRechargePrefListResponse implements BaseModel
{
    /** @use SdkModel<AutoRechargePrefListResponseShape> */
    use SdkModel;

    #[Optional]
    public ?AutoRechargePref $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AutoRechargePref|AutoRechargePrefShape|null $data
     */
    public static function with(AutoRechargePref|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param AutoRechargePref|AutoRechargePrefShape $data
     */
    public function withData(AutoRechargePref|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
