<?php

declare(strict_types=1);

namespace Telnyx\EmailUnsubscribeGroups;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Partial update (only `name` / `description`). `PUT` is not routed.
 *
 * @see Telnyx\Services\EmailUnsubscribeGroupsService::update()
 *
 * @phpstan-type EmailUnsubscribeGroupUpdateParamsShape = array{
 *   description?: string|null, name?: string|null
 * }
 */
final class EmailUnsubscribeGroupUpdateParams implements BaseModel
{
    /** @use SdkModel<EmailUnsubscribeGroupUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional(nullable: true)]
    public ?string $description;

    #[Optional]
    public ?string $name;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $description = null,
        ?string $name = null
    ): self {
        $self = new self;

        null !== $description && $self['description'] = $description;
        null !== $name && $self['name'] = $name;

        return $self;
    }

    public function withDescription(?string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
