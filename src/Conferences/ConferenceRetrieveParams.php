<?php

declare(strict_types=1);

namespace Telnyx\Conferences;

use Telnyx\Conferences\ConferenceRetrieveParams\Region;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieve an existing conference.
 *
 * @see Telnyx\ConferencesService::retrieve()
 *
 * @phpstan-type ConferenceRetrieveParamsShape = array{
 *   region?: Region|value-of<Region>
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
    #[Api(enum: Region::class, optional: true)]
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
        $obj = new self;

        null !== $region && $obj['region'] = $region;

        return $obj;
    }

    /**
     * Region where the conference data is located.
     *
     * @param Region|value-of<Region> $region
     */
    public function withRegion(Region|string $region): self
    {
        $obj = clone $this;
        $obj['region'] = $region;

        return $obj;
    }
}
