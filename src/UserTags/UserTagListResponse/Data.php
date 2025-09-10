<?php

declare(strict_types=1);

namespace Telnyx\UserTags\UserTagListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type data_alias = array{
 *   numberTags?: list<string>|null, outboundProfileTags?: list<string>|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * A list of your tags on the given resource type. NOTE: The casing of the tags returned will not necessarily match the casing of the tags when they were added to a resource. This is because the tags will have the casing of the first time they were used within the Telnyx system regardless of source.
     *
     * @var list<string>|null $numberTags
     */
    #[Api('number_tags', list: 'string', optional: true)]
    public ?array $numberTags;

    /**
     * A list of your tags on the given resource type. NOTE: The casing of the tags returned will not necessarily match the casing of the tags when they were added to a resource. This is because the tags will have the casing of the first time they were used within the Telnyx system regardless of source.
     *
     * @var list<string>|null $outboundProfileTags
     */
    #[Api('outbound_profile_tags', list: 'string', optional: true)]
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
     * @param list<string> $numberTags
     * @param list<string> $outboundProfileTags
     */
    public static function with(
        ?array $numberTags = null,
        ?array $outboundProfileTags = null
    ): self {
        $obj = new self;

        null !== $numberTags && $obj->numberTags = $numberTags;
        null !== $outboundProfileTags && $obj->outboundProfileTags = $outboundProfileTags;

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
        $obj->numberTags = $numberTags;

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
        $obj->outboundProfileTags = $outboundProfileTags;

        return $obj;
    }
}
