<?php

declare(strict_types=1);

namespace Telnyx\EmailUnsubscribeGroups;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create an unsubscribe group.
 *
 * @see Telnyx\Services\EmailUnsubscribeGroupsService::create()
 *
 * @phpstan-type EmailUnsubscribeGroupCreateParamsShape = array{
 *   name: string, description?: string|null
 * }
 */
final class EmailUnsubscribeGroupCreateParams implements BaseModel
{
    /** @use SdkModel<EmailUnsubscribeGroupCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $name;

    #[Optional(nullable: true)]
    public ?string $description;

    /**
     * `new EmailUnsubscribeGroupCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailUnsubscribeGroupCreateParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailUnsubscribeGroupCreateParams)->withName(...)
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
     */
    public static function with(string $name, ?string $description = null): self
    {
        $self = new self;

        $self['name'] = $name;

        null !== $description && $self['description'] = $description;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withDescription(?string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }
}
