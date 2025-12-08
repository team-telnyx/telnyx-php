<?php

declare(strict_types=1);

namespace Telnyx\UserTags\UserTagListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   number_tags?: list<string>|null, outbound_profile_tags?: list<string>|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * A list of your tags on the given resource type. NOTE: The casing of the tags returned will not necessarily match the casing of the tags when they were added to a resource. This is because the tags will have the casing of the first time they were used within the Telnyx system regardless of source.
     *
     * @var list<string>|null $number_tags
     */
    #[Optional(list: 'string')]
    public ?array $number_tags;

    /**
     * A list of your tags on the given resource type. NOTE: The casing of the tags returned will not necessarily match the casing of the tags when they were added to a resource. This is because the tags will have the casing of the first time they were used within the Telnyx system regardless of source.
     *
     * @var list<string>|null $outbound_profile_tags
     */
    #[Optional(list: 'string')]
    public ?array $outbound_profile_tags;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $number_tags
     * @param list<string> $outbound_profile_tags
     */
    public static function with(
        ?array $number_tags = null,
        ?array $outbound_profile_tags = null
    ): self {
        $obj = new self;

        null !== $number_tags && $obj['number_tags'] = $number_tags;
        null !== $outbound_profile_tags && $obj['outbound_profile_tags'] = $outbound_profile_tags;

        return $obj;
    }

    /**
     * A list of your tags on the given resource type. NOTE: The casing of the tags returned will not necessarily match the casing of the tags when they were added to a resource. This is because the tags will have the casing of the first time they were used within the Telnyx system regardless of source.
     *
     * @param list<string> $numberTags
     */
    public function withNumberTags(array $numberTags): self
    {
        $obj = clone $this;
        $obj['number_tags'] = $numberTags;

        return $obj;
    }

    /**
     * A list of your tags on the given resource type. NOTE: The casing of the tags returned will not necessarily match the casing of the tags when they were added to a resource. This is because the tags will have the casing of the first time they were used within the Telnyx system regardless of source.
     *
     * @param list<string> $outboundProfileTags
     */
    public function withOutboundProfileTags(array $outboundProfileTags): self
    {
        $obj = clone $this;
        $obj['outbound_profile_tags'] = $outboundProfileTags;

        return $obj;
    }
}
