<?php

declare(strict_types=1);

namespace Telnyx\UserTags\UserTagListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   numberTags?: list<string>|null, outboundProfileTags?: list<string>|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * A list of your tags on the given resource type. NOTE: The casing of the tags returned will not necessarily match the casing of the tags when they were added to a resource. This is because the tags will have the casing of the first time they were used within the Telnyx system regardless of source.
     *
     * @var list<string>|null $numberTags
     */
    #[Optional('number_tags', list: 'string')]
    public ?array $numberTags;

    /**
     * A list of your tags on the given resource type. NOTE: The casing of the tags returned will not necessarily match the casing of the tags when they were added to a resource. This is because the tags will have the casing of the first time they were used within the Telnyx system regardless of source.
     *
     * @var list<string>|null $outboundProfileTags
     */
    #[Optional('outbound_profile_tags', list: 'string')]
    public ?array $outboundProfileTags;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $numberTags
     * @param list<string>|null $outboundProfileTags
     */
    public static function with(
        ?array $numberTags = null,
        ?array $outboundProfileTags = null
    ): self {
        $self = new self;

        null !== $numberTags && $self['numberTags'] = $numberTags;
        null !== $outboundProfileTags && $self['outboundProfileTags'] = $outboundProfileTags;

        return $self;
    }

    /**
     * A list of your tags on the given resource type. NOTE: The casing of the tags returned will not necessarily match the casing of the tags when they were added to a resource. This is because the tags will have the casing of the first time they were used within the Telnyx system regardless of source.
     *
     * @param list<string> $numberTags
     */
    public function withNumberTags(array $numberTags): self
    {
        $self = clone $this;
        $self['numberTags'] = $numberTags;

        return $self;
    }

    /**
     * A list of your tags on the given resource type. NOTE: The casing of the tags returned will not necessarily match the casing of the tags when they were added to a resource. This is because the tags will have the casing of the first time they were used within the Telnyx system regardless of source.
     *
     * @param list<string> $outboundProfileTags
     */
    public function withOutboundProfileTags(array $outboundProfileTags): self
    {
        $self = clone $this;
        $self['outboundProfileTags'] = $outboundProfileTags;

        return $self;
    }
}
