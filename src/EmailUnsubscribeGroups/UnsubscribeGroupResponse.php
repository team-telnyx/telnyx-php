<?php

declare(strict_types=1);

namespace Telnyx\EmailUnsubscribeGroups;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type UnsubscribeGroupShape from \Telnyx\EmailUnsubscribeGroups\UnsubscribeGroup
 *
 * @phpstan-type UnsubscribeGroupResponseShape = array{
 *   data: UnsubscribeGroup|UnsubscribeGroupShape
 * }
 */
final class UnsubscribeGroupResponse implements BaseModel
{
    /** @use SdkModel<UnsubscribeGroupResponseShape> */
    use SdkModel;

    #[Required]
    public UnsubscribeGroup $data;

    /**
     * `new UnsubscribeGroupResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UnsubscribeGroupResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UnsubscribeGroupResponse)->withData(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param UnsubscribeGroup|UnsubscribeGroupShape $data
     */
    public static function with(UnsubscribeGroup|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param UnsubscribeGroup|UnsubscribeGroupShape $data
     */
    public function withData(UnsubscribeGroup|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
