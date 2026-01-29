<?php

declare(strict_types=1);

namespace Telnyx\CountryCoverage\CountryCoverageGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TollFreeShape = array{
 *   features?: list<string>|null,
 *   fullPstnReplacement?: bool|null,
 *   internationalSMS?: bool|null,
 *   p2p?: bool|null,
 *   quickship?: bool|null,
 *   reservable?: bool|null,
 * }
 */
final class TollFree implements BaseModel
{
    /** @use SdkModel<TollFreeShape> */
    use SdkModel;

    /** @var list<string>|null $features */
    #[Optional(list: 'string')]
    public ?array $features;

    #[Optional('full_pstn_replacement')]
    public ?bool $fullPstnReplacement;

    #[Optional('international_sms')]
    public ?bool $internationalSMS;

    #[Optional]
    public ?bool $p2p;

    #[Optional]
    public ?bool $quickship;

    #[Optional]
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
     * @param list<string>|null $features
     */
    public static function with(
        ?array $features = null,
        ?bool $fullPstnReplacement = null,
        ?bool $internationalSMS = null,
        ?bool $p2p = null,
        ?bool $quickship = null,
        ?bool $reservable = null,
    ): self {
        $self = new self;

        null !== $features && $self['features'] = $features;
        null !== $fullPstnReplacement && $self['fullPstnReplacement'] = $fullPstnReplacement;
        null !== $internationalSMS && $self['internationalSMS'] = $internationalSMS;
        null !== $p2p && $self['p2p'] = $p2p;
        null !== $quickship && $self['quickship'] = $quickship;
        null !== $reservable && $self['reservable'] = $reservable;

        return $self;
    }

    /**
     * @param list<string> $features
     */
    public function withFeatures(array $features): self
    {
        $self = clone $this;
        $self['features'] = $features;

        return $self;
    }

    public function withFullPstnReplacement(bool $fullPstnReplacement): self
    {
        $self = clone $this;
        $self['fullPstnReplacement'] = $fullPstnReplacement;

        return $self;
    }

    public function withInternationalSMS(bool $internationalSMS): self
    {
        $self = clone $this;
        $self['internationalSMS'] = $internationalSMS;

        return $self;
    }

    public function withP2p(bool $p2p): self
    {
        $self = clone $this;
        $self['p2p'] = $p2p;

        return $self;
    }

    public function withQuickship(bool $quickship): self
    {
        $self = clone $this;
        $self['quickship'] = $quickship;

        return $self;
    }

    public function withReservable(bool $reservable): self
    {
        $self = clone $this;
        $self['reservable'] = $reservable;

        return $self;
    }
}
