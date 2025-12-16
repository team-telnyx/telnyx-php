<?php

declare(strict_types=1);

namespace Telnyx\Conferences;

use Telnyx\Conferences\ConferenceRetrieveParams\Region;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieve an existing conference.
 *
 * @see Telnyx\Services\ConferencesService::retrieve()
 *
 * @phpstan-type ConferenceRetrieveParamsShape = array{
 *   region?: null|Region|value-of<Region>
 * }
 */
final class ConferenceRetrieveParams implements BaseModel
{
    /** @use SdkModel<ConferenceRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Region where the conference data is located.
     *
     * @var value-of<Region>|null $region
     */
    #[Optional(enum: Region::class)]
    public ?string $region;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Region|value-of<Region> $region
     */
    public static function with(Region|string|null $region = null): self
    {
        $self = new self;

        null !== $region && $self['region'] = $region;

        return $self;
    }

    /**
     * Region where the conference data is located.
     *
     * @param Region|value-of<Region> $region
     */
    public function withRegion(Region|string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }
}
