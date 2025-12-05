<?php

declare(strict_types=1);

namespace Telnyx\CountryCoverage\CountryCoverageGetResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type LocalShape = array{
 *   features?: list<string>|null,
 *   full_pstn_replacement?: bool|null,
 *   international_sms?: bool|null,
 *   p2p?: bool|null,
 *   quickship?: bool|null,
 *   reservable?: bool|null,
 * }
 */
final class Local implements BaseModel
{
    /** @use SdkModel<LocalShape> */
    use SdkModel;

    /** @var list<string>|null $features */
    #[Api(list: 'string', optional: true)]
    public ?array $features;

    #[Api(optional: true)]
    public ?bool $full_pstn_replacement;

    #[Api(optional: true)]
    public ?bool $international_sms;

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
        ?bool $full_pstn_replacement = null,
        ?bool $international_sms = null,
        ?bool $p2p = null,
        ?bool $quickship = null,
        ?bool $reservable = null,
    ): self {
        $obj = new self;

        null !== $features && $obj['features'] = $features;
        null !== $full_pstn_replacement && $obj['full_pstn_replacement'] = $full_pstn_replacement;
        null !== $international_sms && $obj['international_sms'] = $international_sms;
        null !== $p2p && $obj['p2p'] = $p2p;
        null !== $quickship && $obj['quickship'] = $quickship;
        null !== $reservable && $obj['reservable'] = $reservable;

        return $obj;
    }

    /**
     * @param list<string> $features
     */
    public function withFeatures(array $features): self
    {
        $obj = clone $this;
        $obj['features'] = $features;

        return $obj;
    }

    public function withFullPstnReplacement(bool $fullPstnReplacement): self
    {
        $obj = clone $this;
        $obj['full_pstn_replacement'] = $fullPstnReplacement;

        return $obj;
    }

    public function withInternationalSMS(bool $internationalSMS): self
    {
        $obj = clone $this;
        $obj['international_sms'] = $internationalSMS;

        return $obj;
    }

    public function withP2p(bool $p2p): self
    {
        $obj = clone $this;
        $obj['p2p'] = $p2p;

        return $obj;
    }

    public function withQuickship(bool $quickship): self
    {
        $obj = clone $this;
        $obj['quickship'] = $quickship;

        return $obj;
    }

    public function withReservable(bool $reservable): self
    {
        $obj = clone $this;
        $obj['reservable'] = $reservable;

        return $obj;
    }
}
