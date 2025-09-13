<?php

declare(strict_types=1);

namespace Telnyx\CountryCoverage\CountryCoverageGetResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type local_alias = array{
 *   features?: list<string>,
 *   internationalSMS?: bool,
 *   p2p?: bool,
 *   quickship?: bool,
 *   reservable?: bool,
 * }
 */
final class Local implements BaseModel
{
    /** @use SdkModel<local_alias> */
    use SdkModel;

    /** @var list<string>|null $features */
    #[Api(list: 'string', optional: true)]
    public ?array $features;

    #[Api('international_sms', optional: true)]
    public ?bool $internationalSMS;

    #[Api(optional: true)]
    public ?bool $p2p;

    #[Api(optional: true)]
    public ?bool $quickship;

    #[Api(optional: true)]
    public ?bool $reservable;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $features
     */
    public static function with(
        ?array $features = null,
        ?bool $internationalSMS = null,
        ?bool $p2p = null,
        ?bool $quickship = null,
        ?bool $reservable = null,
    ): self {
        $obj = new self;

        null !== $features && $obj->features = $features;
        null !== $internationalSMS && $obj->internationalSMS = $internationalSMS;
        null !== $p2p && $obj->p2p = $p2p;
        null !== $quickship && $obj->quickship = $quickship;
        null !== $reservable && $obj->reservable = $reservable;

        return $obj;
    }

    /**
     * @param list<string> $features
     */
    public function withFeatures(array $features): self
    {
        $obj = clone $this;
        $obj->features = $features;

        return $obj;
    }

    public function withInternationalSMS(bool $internationalSMS): self
    {
        $obj = clone $this;
        $obj->internationalSMS = $internationalSMS;

        return $obj;
    }

    public function withP2p(bool $p2p): self
    {
        $obj = clone $this;
        $obj->p2p = $p2p;

        return $obj;
    }

    public function withQuickship(bool $quickship): self
    {
        $obj = clone $this;
        $obj->quickship = $quickship;

        return $obj;
    }

    public function withReservable(bool $reservable): self
    {
        $obj = clone $this;
        $obj->reservable = $reservable;

        return $obj;
    }
}
